<?php

/**
 * @see https://dev.to/hasanmn/automatically-update-createdby-and-updatedby-in-laravel-using-bootable-traits-28g9.
 */

declare(strict_types=1);

namespace Modules\Tenant\Models\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Tenant\Services\TenantService;
use Sushi\Sushi;

use function Safe\json_encode;

trait SushiToPhpArray
{
    use Sushi;

    public function getSushiRows(): array
    {
        $name = Str::of($this->getTable())->replace('_', '-')->toString();

        $rows = TenantService::getConfig($name);

        $items = array_values($rows);

        return $items;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)

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
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
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
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)
        static::creating(function ($model): void {
            // Type safety for $model in closure
            if (! $model instanceof \Illuminate\Database\Eloquent\Model) {
                return;
            }
            
            // Removed dd() for production code
            if (method_exists($model, 'toArray')) {
                $model->toArray();
            }
        });
        /*
         * updating.
         */
        static::updating(function ($model): void {
            // Type safety for $model in closure
            if (! $model instanceof \Illuminate\Database\Eloquent\Model) {
                return;
            }
            
            // Removed dd() for production code
            if (method_exists($model, 'toArray')) {
                $model->toArray();
            }
        });
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
        static::updating(
            function ($model): void {
                dd($model->toArray());
            }
        );
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
        // -------------------------------------------------------------------------------------
        /*
         * Deleting a model is slightly different than creating or deleting.
         * For deletes we need to save the model first with the deleted_by field
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)
         */

        static::deleting(function ($model): void {
            // Type safety for $model in closure
            if (! $model instanceof \Illuminate\Database\Eloquent\Model) {
                return;
            }
            
            // Removed dd() for production code
        });
<<<<<<< HEAD
=======
        */

        static::deleting(
            function ($model): void {
                dd('WIP');
            }
        );
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)

        // ----------------------
    }

    // end function boot
<<<<<<< HEAD
<<<<<<< HEAD
}

// end trait Updater
=======
}// end trait Updater
>>>>>>> 15079c8 (.)
=======
}

// end trait Updater
>>>>>>> 764bbef (.)
