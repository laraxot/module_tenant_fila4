<?php

/**
 * @see https://dev.to/hasanmn/automatically-update-createdby-and-updatedby-in-laravel-using-bootable-traits-28g9.
 */

declare(strict_types=1);

namespace Modules\Tenant\Models\Traits;

<<<<<<< HEAD
use Sushi\Sushi;
=======
<<<<<<< HEAD
use Sushi\Sushi;
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Tenant\Services\TenantService;

use function Safe\json_encode;

trait SushiToPhpArray
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
        $name = Str::of($this->getTable())->replace('_', '-')->toString();

        $rows = TenantService::getConfig($name);

        $items = array_values($rows);

        return $items;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)

        /*
         * $files = File::glob($path.'/*.json');
         * $rows = [];
         * foreach ($files as $id => $file) {
         * $json = File::json($file);
         * $item = [];
         * foreach ($this->schema as $name => $type) {
         * $value = $json[$name] ?? null;
         * if (is_array($value)) {
         * $value = json_encode($value, JSON_PRETTY_PRINT);
         * }
         * $item[$name] = $value;
         * }
         * $rows[] = $item;
         * }
         *
         * return $rows;
         */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        /*
        $files = File::glob($path.'/*.json');
        $rows = [];
        foreach ($files as $id => $file) {
            $json = File::json($file);
            $item = [];
            foreach ($this->schema as $name => $type) {
                $value = $json[$name] ?? null;
                if (is_array($value)) {
                    $value = json_encode($value, JSON_PRETTY_PRINT);
                }
                $item[$name] = $value;
            }
            $rows[] = $item;
        }

        return $rows;
        */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        /*
         * $files = File::glob($path.'/*.json');
         * $rows = [];
         * foreach ($files as $id => $file) {
         * $json = File::json($file);
         * $item = [];
         * foreach ($this->schema as $name => $type) {
         * $value = $json[$name] ?? null;
         * if (is_array($value)) {
         * $value = json_encode($value, JSON_PRETTY_PRINT);
         * }
         * $item[$name] = $value;
         * }
         * $rows[] = $item;
         * }
         *
         * return $rows;
         */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    }

    /**
     * bootUpdater function.
     */
    protected static function bootSushiToPhpArray(): void
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
>>>>>>> b13ae59 (.)
        static::creating(function ($model): void {
            // Arr::keyBy($array,

            dd($model->toArray());
        });
        /*
         * updating.
         */
        static::updating(function ($model): void {
            dd($model->toArray());
        });
<<<<<<< HEAD
=======
=======
        static::creating(
            function ($model): void {
                // Arr::keyBy($array,
=======
        static::creating(function ($model): void {
            // Arr::keyBy($array,
>>>>>>> b93ef594b4 (.)

            dd($model->toArray());
        });
        /*
         * updating.
         */
<<<<<<< HEAD
=======
        static::creating(
            function ($model): void {
                // Arr::keyBy($array,

                dd($model->toArray());
            }
        );
        /*
         * updating.
         */
>>>>>>> origin/develop
        static::updating(
            function ($model): void {
                dd($model->toArray());
            }
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        static::updating(function ($model): void {
            dd($model->toArray());
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

        static::deleting(function ($_model): void {
            dd('WIP');
        });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        */

        static::deleting(
            function ($model): void {
                dd('WIP');
            }
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
         */

        static::deleting(function ($_model): void {
            dd('WIP');
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
