<?php

/**
 * @see https://dev.to/hasanmn/automatically-update-createdby-and-updatedby-in-laravel-using-bootable-traits-28g9.
 */

declare(strict_types=1);

namespace Modules\Tenant\Models\Traits;

<<<<<<< HEAD
use Sushi\Sushi;
use Exception;
=======
<<<<<<< HEAD
use Sushi\Sushi;
use Exception;
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
use Illuminate\Support\Facades\File;
use Modules\Tenant\Services\TenantService;
use Webmozart\Assert\Assert;

use function Safe\json_encode;
use function Safe\unlink;

trait SushiToJsons
{
<<<<<<< HEAD
    use Sushi;
=======
<<<<<<< HEAD
    use Sushi;
=======
    use \Sushi\Sushi;
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)

    public function getSushiRows(): array
    {
        $tbl = $this->getTable();
<<<<<<< HEAD
        $path = TenantService::filePath('database/content/' . $tbl);
        $files = File::glob($path . '/*.json');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $path = TenantService::filePath('database/content/' . $tbl);
        $files = File::glob($path . '/*.json');
=======
        $path = TenantService::filePath('database/content/'.$tbl);
        $files = File::glob($path.'/*.json');
>>>>>>> a12f125f4a (.)
=======
        $path = TenantService::filePath('database/content/' . $tbl);
        $files = File::glob($path . '/*.json');
>>>>>>> b93ef594b4 (.)
=======
        $path = TenantService::filePath('database/content/'.$tbl);
        $files = File::glob($path.'/*.json');
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        $rows = [];
        foreach ($files as $id => $file) {
            $json = File::json($file);
            $item = [];
            foreach ($this->schema ?? [] as $name => $type) {
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

<<<<<<< HEAD
        $filename = 'database/content/' . $tbl . '/' . $id . '.json';
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $filename = 'database/content/' . $tbl . '/' . $id . '.json';
=======
        $filename = 'database/content/'.$tbl.'/'.$id.'.json';
>>>>>>> a12f125f4a (.)
=======
        $filename = 'database/content/' . $tbl . '/' . $id . '.json';
>>>>>>> b93ef594b4 (.)
=======
        $filename = 'database/content/'.$tbl.'/'.$id.'.json';
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)

        $file = TenantService::filePath($filename);

        return $file;
    }

    /**
     * @return ?string
     */
    public function getConnectionName()
    {
        return parent::getConnectionName();
    }

    /**
     * @return ?string
     */
    public function getConnectionName()
    {
        return parent::getConnectionName();
    }

    /**
     * @return ?string
     */
    public function getConnectionName()
    {
        return parent::getConnectionName();
    }

    /**
     * bootUpdater function.
     */
    protected static function bootSushiToJsons(): void
    {
        /*
         * During a model create Eloquent will also update the updated_at field so
         * need to have the updated_by field here as well.
         */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
        static::creating(function ($model): void {
            $model->id = $model->max('id') + 1;
            $model->updated_at = now();
            $model->updated_by = authId();
            $model->created_at = now();
            $model->created_by = authId();
            $data = $model->toArray();
            $item = [];
            if (!is_iterable($model->schema)) {
                throw new Exception('Schema not iterable');
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
            }
            foreach ($model->schema as $name => $type) {
                $value = $data[$name] ?? null;
                $item[$name] = $value;
            }
            $content = json_encode($item, JSON_PRETTY_PRINT);
            $file = $model->getJsonFile();
            if (!File::exists(\dirname($file))) {
                File::makeDirectory(\dirname($file), 0o755, true, true);
            }
            File::put($file, $content);
        });
        /*
         * updating.
         */
        static::updating(function ($model): void {
            $file = $model->getJsonFile();
            $model->updated_at = now();
            $model->updated_by = authId();
            $content = $model->toJson(JSON_PRETTY_PRINT);
            File::put($file, $content);
        });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        static::creating(
            function ($model): void {
                $model->id = $model->max('id') + 1;
                $model->updated_at = now();
                $model->updated_by = authId();
                $model->created_at = now();
                $model->created_by = authId();
                $data = $model->toArray();
                $item = [];
                if (! is_iterable($model->schema)) {
<<<<<<< HEAD
                    throw new Exception('Schema not iterable');
=======
                    throw new \Exception('Schema not iterable');
>>>>>>> origin/develop
                }
                foreach ($model->schema as $name => $type) {
                    $value = $data[$name] ?? null;
                    $item[$name] = $value;
                }
                $content = json_encode($item, JSON_PRETTY_PRINT);
                $file = $model->getJsonFile();
                if (! File::exists(\dirname($file))) {
                    File::makeDirectory(\dirname($file), 0755, true, true);
                }
                File::put($file, $content);
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
            }
            foreach ($model->schema as $name => $type) {
                $value = $data[$name] ?? null;
                $item[$name] = $value;
            }
            $content = json_encode($item, JSON_PRETTY_PRINT);
            $file = $model->getJsonFile();
            if (!File::exists(\dirname($file))) {
                File::makeDirectory(\dirname($file), 0o755, true, true);
            }
            File::put($file, $content);
        });
        /*
         * updating.
         */
<<<<<<< HEAD
=======
            }
        );
        /*
         * updating.
         */
>>>>>>> origin/develop
        static::updating(
            function ($model): void {
                $file = $model->getJsonFile();
                $model->updated_at = now();
                $model->updated_by = authId();
                $content = $model->toJson(JSON_PRETTY_PRINT);
                File::put($file, $content);
            }
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        static::updating(function ($model): void {
            $file = $model->getJsonFile();
            $model->updated_at = now();
            $model->updated_by = authId();
            $content = $model->toJson(JSON_PRETTY_PRINT);
            File::put($file, $content);
        });
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        // -------------------------------------------------------------------------------------
        /*
         * Deleting a model is slightly different than creating or deleting.
         * For deletes we need to save the model first with the deleted_by field
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
         */

        static::deleting(function ($model): void {
            unlink($model->getJsonFile());
        });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        */

        static::deleting(
            function ($model): void {
                unlink($model->getJsonFile());
            }
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
         */

        static::deleting(function ($model): void {
            unlink($model->getJsonFile());
        });
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)

        // ----------------------
    }

    // end function boot
<<<<<<< HEAD
}

// end trait Updater
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
}

// end trait Updater
=======
}// end trait Updater
>>>>>>> a12f125f4a (.)
=======
}

// end trait Updater
>>>>>>> b93ef594b4 (.)
=======
}// end trait Updater
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
