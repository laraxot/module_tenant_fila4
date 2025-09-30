<?php

declare(strict_types=1);

namespace Modules\Tenant\Providers;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> 15079c8 (.)
=======
use Override;
>>>>>>> 764bbef (.)
use Modules\Tenant\Providers\Filament\AdminPanelProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Providers\XotBaseServiceProvider;

use function Safe\realpath;

class TenantServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Tenant';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)
    #[Override]
    public function boot(): void
    {
        parent::boot();

        // Skip complex configuration during testing
        //if (! $this->app->environment('testing')) {
        $this->mergeConfigs();
        //}

<<<<<<< HEAD
=======
    public function boot(): void
    {
        parent::boot();
        
        // Skip complex configuration during testing
        //if (! $this->app->environment('testing')) {
           $this->mergeConfigs();
        //}
        
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
        $this->registerDB();
        $this->registerMorphMap();
        $this->publishConfig();
    }

    public function publishConfig(): void
    {
        // ---
    }

    public function registerMorphMap(): void
    {
        $map = TenantService::config('morph_map');
<<<<<<< HEAD
<<<<<<< HEAD
        if (!\is_array($map)) {
=======
        if (! \is_array($map)) {
>>>>>>> 15079c8 (.)
=======
        if (!\is_array($map)) {
>>>>>>> 764bbef (.)
            $map = [];
        }

        Relation::morphMap($map);
    }

    public function registerDB(): void
    {
        // Skip database purge/reconnect during testing to preserve test DB mappings
        if ($this->app->environment('testing')) {
            Schema::defaultStringLength(191);
            return;
        }

        if (Request::has('act') && Request::input('act') === 'migrate') {
            DB::purge('mysql'); // Call to a member function prepare() on null
            DB::reconnect('mysql');
        }

        // DB::purge(); //Call to a member function prepare() on null
        // Database connection [mysql] not configured.
        DB::reconnect();
        Schema::defaultStringLength(191);
    }

<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> 15079c8 (.)
=======
    #[Override]
>>>>>>> 764bbef (.)
    public function register(): void
    {
        parent::register();
        $this->app->register(AdminPanelProvider::class);
    }

    public function mergeConfigs(): void
    {
        /*
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)
         * dddx([
         * 'base_path' => base_path(),
         * 'path1' => realpath(__DIR__ . '/../../../'),
         * 'run' => $this->app->runningUnitTests(),
         * 'run1' => $this->app->runningInConsole(),
         * ]);
         */
<<<<<<< HEAD
=======
        dddx([
            'base_path' => base_path(),
            'path1' => realpath(__DIR__ . '/../../../'),
            'run' => $this->app->runningUnitTests(),
            'run1' => $this->app->runningInConsole(),
        ]);
        */
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
        // if ($this->app->runningUnitTests()) {
        // if (base_path() !== realpath(__DIR__ . '/../../../')) {
        //     // $this->publishes([
        //     //    __DIR__ . '/../config/xra.php' => config_path('xra.php'),
        //     // ], 'config');

        //     $name = TenantService::getName();
        //     File::makeDirectory(config_path($name), 0755, true, true);

        //     $this->mergeConfigFrom(__DIR__ . '/../config/xra.php', 'xra');

        //     return;
        // }

        $configs = TenantService::getConfigNames();

        foreach ($configs as $config) {
            $tmp = TenantService::config($config['name']);
        }
    }
}
