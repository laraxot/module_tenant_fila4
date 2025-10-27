<?php

/**
 * @see https://dev.to/hasanmn/automatically-update-createdby-and-updatedby-in-laravel-using-bootable-traits-28g9.
 */

declare(strict_types=1);

namespace Modules\Tenant\Models\Traits;

<<<<<<< HEAD
=======
use Exception;
>>>>>>> 0f9bf43 (.)
use Illuminate\Support\Facades\File;
use Modules\Tenant\Services\TenantService;
use Sushi\Sushi;
use Webmozart\Assert\Assert;

use function Safe\json_encode;
use function Safe\unlink;

/**
 * @method string getJsonFile()
 *
 * @phpstan-ignore-next-line method.notFound
 */
trait SushiToJsons
{
    use Sushi;

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getSushiRows(): array
    {
        $tbl = $this->getTable();
        $path = TenantService::filePath('database/content/'.$tbl);
        $files = File::glob($path.'/*.json');
<<<<<<< HEAD
        Assert::isArray($files, 'Files must be an array');

=======
>>>>>>> 0f9bf43 (.)
        $rows = [];
        foreach ($files as $file) {
            if (! is_string($file)) {
                continue;
            }

            $json = File::json($file);
            Assert::isArray($json, 'JSON content must be an array');

            /** @var array<string, mixed> $item */
            $item = [];
            /** @var array<string, mixed> $schema */
            $schema = (array) ($this->schema ?? []);
            foreach ($schema as $name => $type) {
                if (! is_string($name)) {
                    continue;
                }

                $value = $json[$name] ?? null;
                if (is_array($value)) {
                    $value = json_encode($value, JSON_PRETTY_PRINT);
                }
                $item[$name] = $value;
            }
            $rows[] = $item;
        }

        return $rows;
    }

    public function getJsonFile(): string
    {
        Assert::string($tbl = $this->getTable());
        Assert::string($id = $this->getKey());

        $filename = 'database/content/'.$tbl.'/'.$id.'.json';

        $file = TenantService::filePath($filename);

        return $file;
    }

    /**
     * bootUpdater function.
     */
    protected static function bootSushiToJsons(): void
    {
        /*
         * During a model create Eloquent will also update the updated_at field so
         */
        static::creating(function ($model): void {
<<<<<<< HEAD
            /** @var static $model */
            $maxId = $model->max('id');
            Assert::numeric($maxId, 'Max id must be numeric');
            $nextId = ((int) $maxId) + 1;
            $model->setAttribute('id', $nextId);
            $authId = authId();
            if (property_exists($model, 'created_by')) {
                // Usa setAttribute per evitare problemi di tipo
                $model->setAttribute('created_by', $authId);
=======
            $model->id = $model->max('id') + 1;
            $model->updated_at = now();
            $model->updated_by = authId();
            $model->created_at = now();
            $model->created_by = authId();
            $data = $model->toArray();
            $item = [];
            if (! is_iterable($model->schema)) {
                throw new Exception('Schema not iterable');
>>>>>>> 0f9bf43 (.)
            }

            $data = $model->toArray();
            Assert::isArray($data, 'Model data must be an array');

            /** @var array<string, mixed> $item */
            $item = [];
            /** @var array<string, mixed> $schema */
            $schema = (array) ($model->schema ?? []);
            foreach ($schema as $name => $type) {
                if (! is_string($name)) {
                    continue;
                }
                $value = $data[$name] ?? null;
                $item[$name] = $value;
            }
            $content = json_encode($item, JSON_PRETTY_PRINT);
            /** @phpstan-ignore function.alreadyNarrowedType */
            if (! is_string($content)) {
                throw new \RuntimeException('JSON encoding failed');
            }
            /** @var string $file */
            /** @phpstan-ignore-next-line method.notFound */
            $file = $model->getJsonFile();
<<<<<<< HEAD
            Assert::string($file, 'File path must be string');
            $dir = \dirname($file);
            if (! File::exists($dir)) {
                File::makeDirectory($dir, 0o755, true, true);
=======
            if (! File::exists(\dirname($file))) {
                File::makeDirectory(\dirname($file), 0o755, true, true);
>>>>>>> 0f9bf43 (.)
            }
            File::put($file, $content);
        });
        /*
         */
        static::updating(function ($model): void {
            /** @var static $model */
            /** @var string $file */
            /** @phpstan-ignore-next-line method.notFound */
            $file = $model->getJsonFile();
            $model->setAttribute('updated_at', now());
            $model->setAttribute('updated_by', authId());
            $content = $model->toJson(JSON_PRETTY_PRINT);
            File::put($file, $content);
        });
        // -------------------------------------------------------------------------------------
        /*
         * For deletes we need to save the model first with the deleted_by field
         */

        static::deleting(function ($model): void {
            /** @var static $model */
            /** @var string $file */
            /** @phpstan-ignore-next-line method.notFound */
            $file = $model->getJsonFile();
            unlink($file);
        });

        // ----------------------
    }

    // end function boot
}

// end trait Updater
