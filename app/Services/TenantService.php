<?php

declare(strict_types=1);

namespace Modules\Tenant\Services;

<<<<<<< HEAD
// use Illuminate\Support\Facades\Storage;
use Exception;
use ReflectionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Modules\Tenant\Actions\GetTenantNameAction;
use Modules\Xot\Actions\Arr\SaveArrayAction;
use Modules\Xot\Actions\File\FixPathAction;
use Nwidart\Modules\Facades\Module;
use Webmozart\Assert\Assert;

use function Safe\json_decode;
use function Safe\preg_replace;
use function Safe\realpath;

/**
 * Class TenantService.
=======
use Illuminate\Database\Eloquent\Model;
use Modules\Tenant\Actions\Config\GetTenantConfigArrayAction;
use Modules\Tenant\Actions\Config\GetTenantConfigPathAction;
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Tenant\Actions\Config\ResolveTenantConfigValueAction;
use Modules\Tenant\Actions\Config\SaveTenantConfigAction;
use Modules\Tenant\Actions\GetTenantNameAction;
use Modules\Tenant\Actions\Models\ResolveTenantModelClassAction;
use Modules\Tenant\Actions\Models\ResolveTenantModelInstanceAction;
use Modules\Tenant\Actions\Translations\TranslateTenantKeyAction;

/**
 * TenantService - Facade sottile per operazioni tenant-aware.
 *
 * Questo service funge da facade centralizzata che delega tutta la business logic
 * a Actions dedicate (Spatie QueueableAction), seguendo il pattern architetturale Laraxot.
 *
 * Pattern: Service Locator / Facade Pattern
 * - API pubblica stabile e leggibile
 * - Business logic delegata alle Actions
 * - Facilita test, refactor e queue/offload
 *
 * @see \Modules\Tenant\docs\configuration.md Per dettagli architetturali
>>>>>>> laraxot/develop
 */
class TenantService
{
    /**
<<<<<<< HEAD
     * Undocumented function.
=======
     * Ottiene il nome del tenant corrente basato sul server name.
     *
     * @return string Il nome del tenant identificato
>>>>>>> laraxot/develop
     */
    public static function getName(): string
    {
        return app(GetTenantNameAction::class)->execute();
    }

<<<<<<< HEAD
    // end function

    /**
     * Undocumented function.
     */
    public static function filePath(string $filename): string
    {
        if (\function_exists('isRunningTestBench') && isRunningTestBench()) {
            return realpath(__DIR__.'/../Config').\DIRECTORY_SEPARATOR.$filename;
        }
        $path = base_path('config/'.self::getName().'/'.$filename);

        return str_replace(['/', '\\'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $path);
    }

    // end function
    /**
     * tenant config.
     * ret_old \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed.
     * ret_old1 \Illuminate\Config\Repository|mixed.
     */
    public static function config(string $key, string|int|array|null $_default = null): float|int|string|array|null
    {
        /*
         * if(app()->runningInConsole()){
         * return config($key, $default);
         * }
         */
        if (\function_exists('inAdmin') && inAdmin() && Str::startsWith($key, 'morph_map') && Request::segment(2) !== null) {
            $module_name = Request::segment(2);
            $models = getModuleModels($module_name);
            $original_conf = config('morph_map');
            if (! \is_array($original_conf)) {
                $original_conf = [];
            }

            $path = self::filePath('morph_map.php');
            $tenant_conf = [];
            if (File::exists($path)) {
                $tenant_conf = File::getRequire($path);
            }

            if (! \is_array($tenant_conf)) {
                $tenant_conf = [];
            }

            $merge_conf = collect($models)->merge($original_conf)->merge($tenant_conf)->all();
            Config::set('morph_map', $merge_conf);
            $res = config($key);

            if (is_numeric($res) || \is_string($res) || \is_array($res)) {
                return $res;
            }

            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        $group = collect(explode('.', $key))->first();

        $original_conf = config($group);
        $tenant_name = self::getName();
        

        $config_name = str_replace('/', '.', $tenant_name).'.'.$group;
        $extra_conf = config($config_name);

        if (! \is_array($original_conf)) {
            $original_conf = [];
        }

        if (! \is_array($extra_conf)) {
            $extra_conf = [];
        }

        // -- ogni modulo ha la sua connessione separata
        // -- replicazione liveuser con lu.. tenere lu anche in database
        if ($key === 'database') {
            $default = Arr::get($extra_conf, 'default', null);
            if ($default === null) {
                $default = Arr::get($original_conf, 'default', null);
            }
            if ($default === null) {
                // $default = 'mysql';
                // $default = env('DB_CONNECTION', 'mysql');
                $default = config('database.default');
            }

            /**
             * @var Collection<\Nwidart\Modules\Module>
             */
            $modules = Module::toCollection();
            foreach ($modules as $module) {
                $name = $module->getSnakeName();
                // Type narrowing: both $name and $default must be valid array keys
                if (! is_string($name) && ! is_int($name)) {
                    continue;
                }
                if (! is_string($default) && ! is_int($default)) {
                    continue;
                }
                if (isset($extra_conf['connections'])) {
                    $connections = $extra_conf['connections'];
                    if (! is_array($connections)) {
                        continue;
                    }
                    if (! isset($connections[$name])) {
                        // Skip if the default connection doesn't exist in extra_conf (e.g., 'testing' connection)
                        if (! isset($connections[$default])) {
                            continue;
                        }
                        $defaultConnection = $connections[$default];
                        if (is_array($defaultConnection) && is_array($extra_conf['connections'])) {
                            $extra_conf['connections'][$name] = $defaultConnection;
                        }
                    }
                }
            }
        }
>>>>>>> a29caa7 (.)

        $merge_conf = collect($original_conf)->merge($extra_conf)->all();
        if ($group === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        Config::set($group, $merge_conf);

        $res = config($key);

        if ($res === null && isset($_default)) {
            $index = Str::after($key, $group.'.');
            $data = Arr::set($extra_conf, $index, $_default);
            /*
             * dddx([
             * 'key' => $key,
             * 'group' => $group,
             * 'index' => $index,
             * '$config_name' => $config_name,
             * 'data' => $data,
             * ]);
             */
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
            // self::saveConfig($group,$data);
            // return $default;
        }

        // dddx(gettype($res));//array;
        if (is_numeric($res) || \is_string($res) || \is_array($res) || $res === null) {
            return $res;
        }

        // dddx($res); // Debugging call removed for production
        throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        // return $res;
    }

    public static function getConfigPath(string $key): string
    {
        $name = self::getName();

        return str_replace('/', '.', $name).'.'.$key;
    }

    public static function getConfig(string $name): array
    {
        $path = self::filePath($name.'.php');
        try {
            $data = File::getRequire($path);
        } catch (Exception $e) {
            $data = [];
        }
        if (! \is_array($data)) {
            $data = [];
        }

        return $data;
    }

    public static function saveConfig(string $name, array $data): void
    {
        $path = self::filePath($name.'.php');

        $config_data = [];
        if (File::exists($path)) {
            $config_data = File::getRequire($path);
        }

        if (! \is_array($config_data)) {
            $config_data = [];
        }

        $config_data = array_merge_recursive_distinct($config_data, $data); // funzione in helper

        $config_data = Arr::sortRecursive($config_data);
        app(SaveArrayAction::class)->execute(
            data: $config_data,
            filename: $path,
        );
        /*
        $path = self::filePath($name.'.php');
        $content = '<?php'.\chr(13).\chr(13).' return '.var_export($config_data, true).';';
        $content = str_replace('\\\\', '\\', $content);

        File::put($path.'', $content);
        */
    }

    /**
     * Undocumented function.
     */
    public static function modelClass(string $name): ?string
    {
        $name = Str::singular($name);
        $name = Str::snake($name);

        // $class = \Illuminate\Database\Eloquent\Relations\Relation::getMorphedModel($name);
        $class = self::config('morph_map.'.$name);

        if ($class === null) {
            $models = getAllModulesModels();
            if (! isset($models[$name])) {
<<<<<<< HEAD
                throw new Exception('model unknown ['.$name.']
                [line:'.__LINE__.']['.basename(__FILE__).']');
=======
                throw new Exception('model unknown ['.
                $name.
                ']
                [line:'.
                __LINE__.
                ']['.
                basename(__FILE__).
                    ']');
>>>>>>> a29caa7 (.)
            }

            $class = $models[$name];
            $data = [];
            $data[$name] = $class;
            self::saveConfig('morph_map', $data);
        }

<<<<<<< HEAD
        if (\is_string($class)) {
            return $class;
        }

        if (\is_array($class)) {
            Assert::string($res = $class[0], __FILE__.':'.__LINE__.' - '.class_basename(self::class));

            return $res;
=======
        // $model = app($class);
        if (! \is_string($class)) {
            if (\is_array($class)) {
                Assert::string($res = $class[0], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));

                return $res;
            }

            dddx([
                'name' => $name,
                'class' => $class,
            ]);
        }

        // 272    Method Modules\Tenant\Services\TenantService::model()
        // should return Illuminate\Database\Eloquent\Model
        // but returns object.
        // $model = new $class();
        if (! \is_string($class)) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
>>>>>>> a29caa7 (.)
        }

        // dddx([
        //     'name' => $name,
        //     'class' => $class,
        // ]);
        throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
    }

    /**
     * @throws ReflectionException
     */
    public static function model(string $name): Model
    {
        $class = self::modelClass($name);

        $model = app($class);
        Assert::isInstanceOf($model, Model::class);

        return $model;
    }

    /**
     * deprecated non dobbiamo usare in tenant robe di panel .. tenant dipende solo da xot.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \ReflectionException
     *                              public static function modelEager(string $name): \Illuminate\Database\Eloquent\Builder {
     *                              $model = self::model($name);
     *                              // Strict comparison using === between null and Illuminate\Database\Eloquent\Model will always evaluate to false.
     *                              // if (null === $model) {
     *                              // return null;
     *                              //    throw new \Exception('model is null');
     *                              // }
     *                              $panel = PanelService::make()->get($model);
     *                              // Strict comparison using === between null and Modules\Cms\Contracts\PanelContract will always evaluate to false.
     *                              // if (null === $panel) {
     *                              // return null;
     *                              //    throw new \Exception('panel is null');
     *                              // }
     *                              $with = $panel->with();
     *                              // $model = $model->load($with);
     *                              $with = $panel->with;
     *                              $model = $model->with($with);
     *
     * return $model;
     * }
     */

    /**
     * Find the path to a localized Markdown resource. copiata da jetstream.php.
     */
    public static function localizedMarkdownPath(string $name): string
    {
        preg_replace('#(\.md)$#i', '.'.app()->getLocale().'$1', $name);
        $lang = app()->getLocale();
        $paths = [
            self::filePath('lang/'.$lang.'/'.$name),
            self::filePath($name),
        ];

        $path = Arr::first($paths, file_exists(...));
        if (! \is_string($path)) {
            return '#';

            // throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
        }

        return $path;
    }

    public static function trans(string $key): string
    {
        $lang = app()->getLocale();
        $trans_file = Str::of($key)
            ->before('.')
            ->append('.php')
            ->toString();
        $arr_key = Str::of($key)->after('.')->toString();
        $path = self::filePath('lang/'.$lang.'/'.$trans_file);

        // Check if translation file exists
        if (!File::exists($path)) {
            return $key; // Return key if translation file doesn't exist
        }

        $data = File::getRequire($path);
        Assert::isArray($data);
        $res = Arr::get($data, $arr_key);
<<<<<<< HEAD

        // Return key if translation not found
        if ($res === null) {
            return $key;
        }

        // Handle case where translation is not a string
        if (!is_string($res)) {
            return $key;
        }

        // Assert::string($res, 'arr_key: '.$arr_key.' [line::'.__LINE__.' class::'.class_basename(self::class).']');
=======
        Assert::string($res, 'arr_key: '.$arr_key.' [line::'.__LINE__.' class::'.class_basename(__CLASS__).']');
>>>>>>> a29caa7 (.)

        return $res;
    }

    public static function getConfigNames(): array
    {
        try {
            $name = self::getName();
        } catch (\Exception $e) {
            // Se c'è un errore nel caricamento del nome tenant, usa default
            // Questo evita errori come "Target class [env] does not exist" durante il bootstrap
            $name = 'localhost';
        }

        // if (app()->runningInConsole()) {
        // File::makeDirectory(config_path($name), 0755, true, true);
        // File::copyDirectory(realpath(__DIR__.'/../Config'), config_path($name));

        //  Using $this when not in object context
        // $this->publishes([
        //    __DIR__ . '/../config/xra.php' => config_path('xra.php'),
        // ], 'config');

        // Using $this when not in object context
        // $this->mergeConfigFrom(, 'xra');
        // $path = __DIR__.'/../config/xra.php';
        // $key = 'xra';
        // $config = app()->make('config');
        // $config->set($key, array_merge(
        //    require $path, $config->get($key, [])
        // ));
        // dddx($name);
        // dddx();
        // }

<<<<<<< HEAD
        try {
            $dir = config_path($name);
            
            // Gestione sicura di FixPathAction per evitare errori durante bootstrap
            try {
                $dir = app(FixPathAction::class)->execute($dir);
            } catch (\Exception $e) {
                // Se c'è un errore nella risoluzione di FixPathAction, usa il path originale
                // Questo evita errori durante il bootstrap quando il container non è completamente inizializzato
            }
=======
        $dir = config_path($name);
        $dir = app(FixPathAction::class)->execute($dir);
>>>>>>> a29caa7 (.)

            if (! File::isDirectory($dir)) {
                return [];
            }

<<<<<<< HEAD
            $files = File::files($dir);

            return collect($files)
                ->filter(static fn ($item): bool => $item->getExtension() === 'php')
                ->map(static fn ($item, $k): array => [
                    'id' => $k + 1,
                    'name' => $item->getFilenameWithoutExtension(),
                ])
                ->values()
                ->all();
        } catch (\Exception $e) {
            // Se c'è un errore nel caricamento dei file di configurazione, ritorna array vuoto
            // Questo evita errori durante il bootstrap
            return [];
        }
=======
        return collect($files)
            ->filter(static fn ($item): bool => $item->getExtension() === 'php')
            ->map(static fn ($item, $k): array => [
                'id' => $k + 1,
                'name' => $item->getFilenameWithoutExtension(),
            ])
            ->values()
            ->all();
>>>>>>> a29caa7 (.)
    }

    /**
     * @return array<string>
     */
    public static function allModules(): array
    {
        $filePath = static::filePath('modules_statuses.json');
        $contents = File::get($filePath);
        try {
            /** @var array */
            $json = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
        } catch (Exception $e) {
<<<<<<< HEAD
            throw new Exception($e->getMessage().'['.$filePath.']['.__LINE__.']['.basename(__FILE__).']');
        }
        $modules = [];
        if (\is_array($json)) {
=======
            throw new Exception(
                $e->getMessage().'['.$filePath.']['.__LINE__.']['.basename(__FILE__).']',
            );
        }
        $modules = [];
        if (is_array($json)) {
>>>>>>> a29caa7 (.)
            foreach ($json as $name => $enabled) {
                if (! $enabled) {
                    continue;
                }

                if (! File::exists(base_path('Modules/'.$name))) {
                    continue;
                }

                $modules[] = $name;
            }
        }

        return $modules;
=======
    /**
     * Costruisce il percorso completo per un file tenant-specific.
     *
     * @param  string  $filename  Nome del file relativo alla directory tenant
     * @return string Percorso completo del file
     */
    public static function filePath(string $filename): string
    {
        return app(GetTenantFilePathAction::class)->execute($filename);
    }

    /**
     * Risolve un valore di configurazione tenant-aware.
     *
     * Merge tra configurazione globale e tenant-specific, con supporto per default.
     *
     * @param  string  $key  Chiave di configurazione (es. 'app.name')
     * @param  string|int|array|null  $default  Valore di default se la chiave non esiste
     * @return float|int|string|array|null Valore risolto della configurazione
     */
    public static function config(string $key, string|int|array|null $default = null): float|int|string|array|null
    {
        return app(ResolveTenantConfigValueAction::class)->execute($key, $default);
    }

    /**
     * Ottiene il percorso del file di configurazione per una chiave specifica.
     *
     * @param  string  $key  Chiave di configurazione
     * @return string Percorso completo del file di configurazione
     */
    public static function getConfigPath(string $key): string
    {
        return app(GetTenantConfigPathAction::class)->execute($key);
    }

    /**
     * Carica un intero array di configurazione tenant-specific.
     *
     * @param  string  $name  Nome del file di configurazione (senza estensione)
     * @return array<string, mixed> Array di configurazione completo
     */
    public static function getConfig(string $name): array
    {
        return app(GetTenantConfigArrayAction::class)->execute($name);
    }

    /**
     * Salva un array di configurazione tenant-specific su file.
     *
     * @param  string  $name  Nome del file di configurazione (senza estensione)
     * @param  array<string, mixed>  $data  Dati di configurazione da salvare
     */
    public static function saveConfig(string $name, array $data): void
    {
        app(SaveTenantConfigAction::class)->execute($name, $data);
    }

    /**
     * Ottiene i nomi di tutte le configurazioni disponibili.
     *
     * @return array<int, array{id: int, name: string}>
     */
    public static function getConfigNames(): array
    {
        // Must add the use Modules\Tenant\Actions\Config\GetTenantConfigNamesAction;
        return app(\Modules\Tenant\Actions\Config\GetTenantConfigNamesAction::class)->execute();
    }

    /**
     * Risolve il nome completo della classe di un modello tenant-aware.
     *
     * @param  string  $name  Nome breve del modello (es. 'user', 'patient')
     * @return string|null Nome completo della classe o null se non trovato
     */
    public static function modelClass(string $name): string
    {
        return app(ResolveTenantModelClassAction::class)->execute($name);
    }

    /**
     * Risolve e restituisce un'istanza di modello tenant-aware.
     *
     * @param  string  $name  Nome breve del modello (es. 'user', 'patient')
     * @return Model Istanza del modello risolto
     *
     * @throws \ReflectionException Se la classe del modello non può essere istanziata
     */
    public static function model(string $name): Model
    {
        return app(ResolveTenantModelInstanceAction::class)->execute($name);
    }

    /**
     * Traduce una chiave di traduzione nel contesto tenant corrente.
     *
     * @param  string  $key  Chiave di traduzione (es. 'common.welcome')
     * @return string Stringa tradotta o la chiave stessa se la traduzione non esiste
     */
    public static function trans(string $key): string
    {
        return app(TranslateTenantKeyAction::class)->execute($key);
    }

    /**
     * Ottiene tutti i moduli abilitati per il tenant corrente.
     *
     * @return array<int, string> Array di nomi moduli abilitati
     */
    public static function allModules(): array
    {
        return app(\Modules\Tenant\Actions\Modules\GetTenantModulesAction::class)->execute();
>>>>>>> laraxot/develop
    }
}
