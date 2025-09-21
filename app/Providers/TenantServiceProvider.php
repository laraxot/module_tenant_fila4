<?php

declare(strict_types=1);

namespace Modules\Tenant\Providers;

<<<<<<< HEAD
use Override;
use Modules\Tenant\Providers\Filament\AdminPanelProvider;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Override;
>>>>>>> b93ef594b4 (.)
use Modules\Tenant\Providers\Filament\AdminPanelProvider;
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
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
=======
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
    public function boot(): void
    {
        parent::boot();

        // Skip complex configuration during testing
        //if (! $this->app->environment('testing')) {
        $this->mergeConfigs();
        //}
<<<<<<< HEAD
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
    public function boot(): void
    {
        parent::boot();
        
        // Skip complex configuration during testing
        //if (! $this->app->environment('testing')) {
           $this->mergeConfigs();
        //}
        
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
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
        if (!\is_array($map)) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (!\is_array($map)) {
=======
        if (! \is_array($map)) {
>>>>>>> a12f125f4a (.)
=======
        if (!\is_array($map)) {
>>>>>>> b93ef594b4 (.)
=======
        if (! \is_array($map)) {
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
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
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
    public function register(): void
    {
        parent::register();
        $this->app->register(AdminPanelProvider::class);
<<<<<<< HEAD
=======
=======
    public function register(): void
    {
        parent::register();
        $this->app->register(Filament\AdminPanelProvider::class);
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    }

    public function mergeConfigs(): void
    {
        /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
         * dddx([
         * 'base_path' => base_path(),
         * 'path1' => realpath(__DIR__ . '/../../../'),
         * 'run' => $this->app->runningUnitTests(),
         * 'run1' => $this->app->runningInConsole(),
         * ]);
         */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        dddx([
            'base_path' => base_path(),
            'path1' => realpath(__DIR__ . '/../../../'),
            'run' => $this->app->runningUnitTests(),
            'run1' => $this->app->runningInConsole(),
        ]);
        */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
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
