<?php

declare(strict_types=1);

namespace Modules\Tenant\Models\Traits;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Modules\Tenant\Services\TenantService;
use Sushi\Sushi;
use Throwable;
use Webmozart\Assert\Assert;

use function Safe\file_get_contents;
use function Safe\json_decode;
use function Safe\json_encode;

/**
 * Trait SushiToJson.
 *
 * Questo trait permette ai modelli di utilizzare il pacchetto Sushi per leggere
 * dati da file JSON con isolamento per tenant. Ogni tenant ha i propri file JSON
 * nella directory config/{tenant_name}/database/content/.
 *
 * @see https://github.com/calebporzio/sushi
 */
trait SushiToJson
{
    use Sushi;

    /**
     * Ottiene il percorso del file JSON per il modello corrente.
     * Il file è specifico per il tenant corrente e la tabella del modello.
     *
     * @return string Percorso completo del file JSON
     */
    public function getJsonFile(): string
    {
        $tbl = $this->getTable();
        Assert::string($tbl, __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));
        $path = TenantService::filePath('database/content/'.$tbl.'.json');

        return $path;
    }

    /**
     * Metodo richiesto da Sushi per popolare la tabella in-memory.
     * Delegato a getSushiRows() per mantenere separazione semantica.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getRows(): array
    {
        return $this->getSushiRows();
    }

    /**
     * Ottiene i dati dal file JSON per il modello Sushi.
     * I dati vengono normalizzati per garantire compatibilità con Eloquent.
     *
     * @return array<int, array<string, mixed>> Array di record per Sushi
     *
     * @throws Exception Se i dati non sono in formato array valido
     */
    public function getSushiRows(): array
    {
        $path = $this->getJsonFile();
        $form = $this->getSchema();
        if (! File::exists($path)) {
            return [];
        }

        $data = json_decode(file_get_contents($path), true);
        if (! \is_array($data)) {
            throw new Exception('Data is not array ['.$path.']');
        }

        // Normalize nested arrays/objects into JSON strings for Sushi
        $normalizedData = [];
        foreach ($data as $item) {
            if (\is_array($item)) {
                foreach ($item as $key => $value) {
                    if (\is_array($value) || \is_object($value)) {
                        $value = json_encode($value);
                    }
                    $item[$key] = $value;
                }
            }
        }

        // Ensure $form is iterable array for PHPStan safety
        /** @var array<string, mixed> $form */
        $form = (array) $form;

        $result = Arr::map($normalizedData, function ($item) use ($form) {
            if (! is_array($item)) {
                return $item;
            }
            if (is_array($form)) {
                foreach ($form as $key => $type) {
                    if (is_string($key) && ! isset($item[$key])) {
                        $item[$key] = null;
                    }
                }
            }

            return $item;
        });

        Assert::isArray($result);

        /** @var array<int, array<string, mixed>> $finalResult */
        $finalResult = [];
        foreach ($result as $idx => $item) {
            if (is_array($item)) {
                /** @var array<string, mixed> $itemTyped */
                $itemTyped = [];
                foreach ($item as $k => $v) {
                    if (is_string($k)) {
                        $itemTyped[$k] = $v;
                    }
                }
                $finalResult[] = $itemTyped;
            }
        }

        return $finalResult;
    }

    /**
     * Carica i dati esistenti dal file JSON.
     * Preserva la struttura originale dei dati senza normalizzazione.
     *
     * @return array<int, array<string, mixed>> Dati esistenti
     */
    public function loadExistingData(): array
    {
        $path = $this->getJsonFile();

        if (! File::exists($path)) {
            return [];
        }

        $content = file_get_contents($path);
        $data = json_decode($content, true);

        if (! is_array($data)) {
            return [];
        }

        // Assicura che i dati abbiano la struttura corretta
        /** @var array<int, array<string, mixed>> $result */
        $result = [];
        foreach ($data as $item) {
            if (is_array($item)) {
                /** @var array<string, mixed> $itemTyped */
                $itemTyped = [];
                foreach ($item as $k => $v) {
                    if (is_string($k)) {
                        $itemTyped[$k] = $v;
                    }
                }
                $result[] = $itemTyped;
            }
        }

        return $result;
    }

    /**
     * Salva i dati del modello nel file JSON.
     * Crea la directory se non esiste e salva con formattazione JSON.
     * Utilizza JSON_PRETTY_PRINT e JSON_UNESCAPED_UNICODE per leggibilità.
     *
     * @param  array<int, array<string, mixed>>  $data  Array di record da salvare
     * @return bool True se il salvataggio è riuscito, false in caso di errore
     */
    public function saveToJson(array $data): bool
    {
        try {
            $file = $this->getJsonFile();
            $directory = dirname($file);

            if (! File::exists($directory)) {
                File::makeDirectory($directory, 0o755, true, true);
            }

            $content = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            File::put($file, $content);

            return true;
        } catch (Exception $e) {
            report($e);

            return false;
        }
    }

    /**
     * Ottiene l'ID successivo disponibile per un nuovo record.
     *
     * @return int ID successivo disponibile
     */
    protected function getNextId(): int
    {
        $existingData = $this->loadExistingData();

        if (empty($existingData)) {
            return 1;
        }

        $keys = array_keys($existingData);
        if (empty($keys)) {
            return 1;
        }

        $maxId = max($keys);

        return is_numeric($maxId) ? (((int) $maxId) + 1) : 1;
    }

    /**
     * Boot method per il trait SushiToJson.
     * Gestisce gli eventi di creazione, aggiornamento e cancellazione
     * per sincronizzare automaticamente i dati con i file JSON.
     */
    protected static function bootSushiToJson(): void
    {
        static::creating(function ($model): void {
            /** @var static $modelWithTrait */
            $modelWithTrait = $model;
            $file = $modelWithTrait->getJsonFile();

            // Load existing data and compute next ID
            $existingData = $modelWithTrait->loadExistingData();
            $rows = $existingData;
            $maxIdFromFile = 0;
            foreach ($rows as $r) {
                if (! \is_array($r)) {
                    continue;
                }
                $rawId = $r['id'] ?? 0;
                $id = \is_numeric($rawId) ? ((int) $rawId) : 0;
                $maxIdFromFile = max($maxIdFromFile, $id);
            }
            // Safely read current max id from table (Sushi in-memory)
            $maxIdFromDb = 0;
            try {
                /** @var int|null $dbMax */
                $dbMax = static::query()->max('id');
                if (\is_int($dbMax)) {
                    $maxIdFromDb = $dbMax;
                }
            } catch (Throwable) {
                // ignore if table not initialized yet
            }

            $nextId = max($maxIdFromFile, $maxIdFromDb) + 1;
            $modelWithTrait->setAttribute('id', $nextId);
            $modelWithTrait->setAttribute('updated_at', now());
            $modelWithTrait->setAttribute('created_at', now());

            // Set audit fields if available via helper
            $authId = $modelWithTrait->authId();
            if ($authId !== null) {
                $modelWithTrait->setAttribute('updated_by', $authId);
                $modelWithTrait->setAttribute('created_by', $authId);
            }

            // Add new record to existing data
            $existingData[] = $modelWithTrait->getAttributes();

            // Ensure directory exists and save
            $modelWithTrait->ensureDirectoryExists($file);
            $modelWithTrait->saveToJson($modelWithTrait->normalizeRowsForSave($existingData));
        });

        static::updating(function ($model): void {
            /** @var static $modelWithTrait */
            $modelWithTrait = $model;
            $modelWithTrait->setAttribute('updated_at', now());

            // Set audit fields if available via helper
            $authId = $modelWithTrait->authId();
            if ($authId !== null) {
                $modelWithTrait->setAttribute('updated_by', $authId);
            }

            // Update existing record
            $existingData = $modelWithTrait->loadExistingData();
            $id = (int) ($modelWithTrait->getAttribute('id') ?? 0);

            if ($id > 0) {
                $index = $modelWithTrait->findRowIndexById($existingData, $id);
                if ($index !== null) {
                    $existingData[$index] = $modelWithTrait->toArray();
                    $normalizedData = $modelWithTrait->normalizeRowsForSave($existingData);
                    /** @var array<int, array<string, mixed>> $typedData */
                    $typedData = [];
                    foreach ($normalizedData as $idx => $item) {
                        if (is_array($item)) {
                            /** @var array<string, mixed> $itemTyped */
                            $itemTyped = [];
                            foreach ($item as $k => $v) {
                                if (is_string($k)) {
                                    $itemTyped[$k] = $v;
                                }
                            }
                            $typedData[] = $itemTyped;
                        }
                    }
                    $modelWithTrait->saveToJson($typedData);
                }
            }
        });

        static::deleting(function ($model): void {
            /** @var static $modelWithTrait */
            $modelWithTrait = $model;
            $id = (int) ($modelWithTrait->getAttribute('id') ?? 0);

            if ($id > 0) {
                $existingData = $modelWithTrait->loadExistingData();
                $index = $modelWithTrait->findRowIndexById($existingData, $id);

                if ($index !== null) {
                    unset($existingData[$index]);
                    $existingData = array_values($existingData);
                    $modelWithTrait->saveToJson($modelWithTrait->normalizeRowsForSave($existingData));
                }
            }
        });
    }

    /**
     * Normalize rows to array<int, array<string, mixed>> for JSON save.
     *
     * @param  array<int, mixed>  $rows
     * @return array<int, array<string, mixed>>
     */
    protected function normalizeRowsForSave(array $rows): array
    {
        /** @var array<int, array<string, mixed>> $out */
        $out = [];
        foreach ($rows as $row) {
            if (is_array($row)) {
                /** @var array<string, mixed> $item */
                $item = [];
                foreach ($row as $k => $v) {
                    if (is_string($k)) {
                        $item[$k] = $v;
                    }
                }
                $out[] = $item;
            }
        }

        return $out;
    }

    /**
     * Trova l'indice del record nell'array dato un id.
     *
     * @param  array<int, array<string, mixed>>  $rows
     * @return int|null Indice se trovato, altrimenti null
     */
    protected function findRowIndexById(array $rows, int $id): ?int
    {
        foreach ($rows as $index => $row) {
            if (is_array($row) && ((int) ($row['id'] ?? 0)) === $id) {
                return (int) $index;
            }
        }

        return null;
    }

    /**
     * Ottiene l'ID dell'utente autenticato per i campi di audit.
     */
    protected function authId(): int|string|null
    {
        if (\function_exists('authId')) {
            return authId();
        }

        if (class_exists('\Illuminate\Support\Facades\Auth')) {
            return Auth::id();
        }

        return null;
    }

    /**
     * Assicura che la directory per il file JSON esista.
     */
    protected function ensureDirectoryExists(string $filePath): void
    {
        $directory = dirname($filePath);

        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0o755, true, true);
        }
    }
}
