<?php

<<<<<<< HEAD
declare(strict_types=1);


=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);


=======
>>>>>>> a12f125f4a (.)
=======
declare(strict_types=1);


>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
use Nwidart\Modules\Activators\FileActivator;
use Nwidart\Modules\Providers\ConsoleServiceProvider;

return [
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
    /*
     * |--------------------------------------------------------------------------
     * | Module Namespace
     * |--------------------------------------------------------------------------
     * |
     * | Default module namespace.
     * |
     */
    'namespace' => 'Modules',
    /*
     * |--------------------------------------------------------------------------
     * | Module Stubs
     * |--------------------------------------------------------------------------
     * |
     * | Default module stubs.
     * |
     */
<<<<<<< HEAD
=======
=======

=======
>>>>>>> b93ef594b4 (.)
    /*
     * |--------------------------------------------------------------------------
     * | Module Namespace
     * |--------------------------------------------------------------------------
     * |
     * | Default module namespace.
     * |
     */
    'namespace' => 'Modules',
    /*
<<<<<<< HEAD
=======

    /*
    |--------------------------------------------------------------------------
    | Module Namespace
    |--------------------------------------------------------------------------
    |
    | Default module namespace.
    |
    */
    'namespace' => 'Modules',

    /*
>>>>>>> origin/develop
    |--------------------------------------------------------------------------
    | Module Stubs
    |--------------------------------------------------------------------------
    |
    | Default module stubs.
    |
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
     * |--------------------------------------------------------------------------
     * | Module Stubs
     * |--------------------------------------------------------------------------
     * |
     * | Default module stubs.
     * |
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    'stubs' => [
        'enabled' => false,
        'path' => base_path('vendor/nwidart/laravel-modules/src/Commands/stubs'),
        'files' => [
            'routes/web' => 'routes/web.php',
            'routes/api' => 'routes/api.php',
            'views/index' => 'resources/views/index.blade.php',
            'views/master' => 'resources/views/layouts/master.blade.php',
            'scaffold/config' => 'config/config.php',
            'composer' => 'composer.json',
            'assets/js/app' => 'resources/assets/js/app.js',
            'assets/sass/app' => 'resources/assets/sass/app.scss',
            'vite' => 'vite.config.js',
            'package' => 'package.json',
        ],
        'replacements' => [
            /**
             * Define custom replacements for each section.
             * You can specify a closure for dynamic values.
             *
             * Example:
             *
             * 'composer' => [
             *      'CUSTOM_KEY' => fn (\Nwidart\Modules\Generators\ModuleGenerator $generator) => $generator->getModule()->getLowerName() . '-module',
             *      'CUSTOM_KEY2' => fn () => 'custom text',
             *      'LOWER_NAME',
             *      'STUDLY_NAME',
             *      // ...
             * ],
             *
             * Note: Keys should be in UPPERCASE.
             */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
            'routes/web' => [
                'LOWER_NAME',
                'STUDLY_NAME',
                'PLURAL_LOWER_NAME',
                'KEBAB_NAME',
                'MODULE_NAMESPACE',
                'CONTROLLER_NAMESPACE',
            ],
            'routes/api' => [
                'LOWER_NAME',
                'STUDLY_NAME',
                'PLURAL_LOWER_NAME',
                'KEBAB_NAME',
                'MODULE_NAMESPACE',
                'CONTROLLER_NAMESPACE',
            ],
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
            'routes/web' => ['LOWER_NAME', 'STUDLY_NAME', 'PLURAL_LOWER_NAME', 'KEBAB_NAME', 'MODULE_NAMESPACE', 'CONTROLLER_NAMESPACE'],
            'routes/api' => ['LOWER_NAME', 'STUDLY_NAME', 'PLURAL_LOWER_NAME', 'KEBAB_NAME', 'MODULE_NAMESPACE', 'CONTROLLER_NAMESPACE'],
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
            'routes/web' => ['LOWER_NAME', 'STUDLY_NAME', 'PLURAL_LOWER_NAME', 'KEBAB_NAME', 'MODULE_NAMESPACE', 'CONTROLLER_NAMESPACE'],
            'routes/api' => ['LOWER_NAME', 'STUDLY_NAME', 'PLURAL_LOWER_NAME', 'KEBAB_NAME', 'MODULE_NAMESPACE', 'CONTROLLER_NAMESPACE'],
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
            'vite' => ['LOWER_NAME', 'STUDLY_NAME', 'KEBAB_NAME'],
            'json' => ['LOWER_NAME', 'STUDLY_NAME', 'KEBAB_NAME', 'MODULE_NAMESPACE', 'PROVIDER_NAMESPACE'],
            'views/index' => ['LOWER_NAME'],
            'views/master' => ['LOWER_NAME', 'STUDLY_NAME', 'KEBAB_NAME'],
            'scaffold/config' => ['STUDLY_NAME'],
            'composer' => [
                'LOWER_NAME',
                'STUDLY_NAME',
                'VENDOR',
                'AUTHOR_NAME',
                'AUTHOR_EMAIL',
                'MODULE_NAMESPACE',
                'PROVIDER_NAMESPACE',
                'APP_FOLDER_NAME',
            ],
        ],
        'gitkeep' => true,
    ],
    'paths' => [
        /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
         * |--------------------------------------------------------------------------
         * | Modules path
         * |--------------------------------------------------------------------------
         * |
         * | This path is used to save the generated module.
         * | This path will also be added automatically to the list of scanned folders.
         * |
         */
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
        'modules' => base_path('Modules'),
        /*
         * |--------------------------------------------------------------------------
         * | Modules assets path
         * |--------------------------------------------------------------------------
         * |
         * | Here you may update the modules' assets path.
         * |
         */
        'assets' => public_path('modules'),
        /*
         * |--------------------------------------------------------------------------
         * | The migrations' path
         * |--------------------------------------------------------------------------
         * |
         * | Where you run the 'module:publish-migration' command, where do you publish the
         * | the migration files?
         * |
         */
        'migration' => base_path('database/migrations'),
        /*
         * |--------------------------------------------------------------------------
         * | The app path
         * |--------------------------------------------------------------------------
         * |
         * | app folder name
         * | for example can change it to 'src' or 'App'
         */
        'app_folder' => 'app/',
        /*
         * |--------------------------------------------------------------------------
         * | Generator path
         * |--------------------------------------------------------------------------
         * | Customise the paths where the folders will be generated.
         * | Setting the generate key to false will not generate that folder
         */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        |--------------------------------------------------------------------------
        | Modules path
        |--------------------------------------------------------------------------
        |
        | This path is used to save the generated module.
        | This path will also be added automatically to the list of scanned folders.
        |
        */
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
        'modules' => base_path('Modules'),
        /*
         * |--------------------------------------------------------------------------
         * | Modules assets path
         * |--------------------------------------------------------------------------
         * |
         * | Here you may update the modules' assets path.
         * |
         */
        'assets' => public_path('modules'),
        /*
         * |--------------------------------------------------------------------------
         * | The migrations' path
         * |--------------------------------------------------------------------------
         * |
         * | Where you run the 'module:publish-migration' command, where do you publish the
         * | the migration files?
         * |
         */
        'migration' => base_path('database/migrations'),
        /*
         * |--------------------------------------------------------------------------
         * | The app path
         * |--------------------------------------------------------------------------
         * |
         * | app folder name
         * | for example can change it to 'src' or 'App'
         */
        'app_folder' => 'app/',
        /*
<<<<<<< HEAD
=======
        'modules' => base_path('Modules'),

        /*
        |--------------------------------------------------------------------------
        | Modules assets path
        |--------------------------------------------------------------------------
        |
        | Here you may update the modules' assets path.
        |
        */
        'assets' => public_path('modules'),

        /*
        |--------------------------------------------------------------------------
        | The migrations' path
        |--------------------------------------------------------------------------
        |
        | Where you run the 'module:publish-migration' command, where do you publish the
        | the migration files?
        |
        */
        'migration' => base_path('database/migrations'),

        /*
        |--------------------------------------------------------------------------
        | The app path
        |--------------------------------------------------------------------------
        |
        | app folder name
        | for example can change it to 'src' or 'App'
        */
        'app_folder' => 'app/',

        /*
>>>>>>> origin/develop
        |--------------------------------------------------------------------------
        | Generator path
        |--------------------------------------------------------------------------
        | Customise the paths where the folders will be generated.
        | Setting the generate key to false will not generate that folder
        */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
         * |--------------------------------------------------------------------------
         * | Generator path
         * |--------------------------------------------------------------------------
         * | Customise the paths where the folders will be generated.
         * | Setting the generate key to false will not generate that folder
         */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        'generator' => [
            // app/
            'actions' => ['path' => 'app/Actions', 'generate' => false],
            'casts' => ['path' => 'app/Casts', 'generate' => false],
            'channels' => ['path' => 'app/Broadcasting', 'generate' => false],
            'class' => ['path' => 'app/Classes', 'generate' => false],
            'command' => ['path' => 'app/Console', 'generate' => false],
            'component-class' => ['path' => 'app/View/Components', 'generate' => false],
            'emails' => ['path' => 'app/Emails', 'generate' => false],
            'event' => ['path' => 'app/Events', 'generate' => false],
            'enums' => ['path' => 'app/Enums', 'generate' => false],
            'exceptions' => ['path' => 'app/Exceptions', 'generate' => false],
            'jobs' => ['path' => 'app/Jobs', 'generate' => false],
            'helpers' => ['path' => 'app/Helpers', 'generate' => false],
            'interfaces' => ['path' => 'app/Interfaces', 'generate' => false],
            'listener' => ['path' => 'app/Listeners', 'generate' => false],
            'model' => ['path' => 'app/Models', 'generate' => false],
            'notifications' => ['path' => 'app/Notifications', 'generate' => false],
            'observer' => ['path' => 'app/Observers', 'generate' => false],
            'policies' => ['path' => 'app/Policies', 'generate' => false],
            'provider' => ['path' => 'app/Providers', 'generate' => true],
            'repository' => ['path' => 'app/Repositories', 'generate' => false],
            'resource' => ['path' => 'app/Transformers', 'generate' => false],
            'route-provider' => ['path' => 'app/Providers', 'generate' => true],
            'rules' => ['path' => 'app/Rules', 'generate' => false],
            'services' => ['path' => 'app/Services', 'generate' => false],
            'scopes' => ['path' => 'app/Models/Scopes', 'generate' => false],
            'traits' => ['path' => 'app/Traits', 'generate' => false],
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======

>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
            // app/Http/
            'controller' => ['path' => 'app/Http/Controllers', 'generate' => true],
            'filter' => ['path' => 'app/Http/Middleware', 'generate' => false],
            'request' => ['path' => 'app/Http/Requests', 'generate' => false],
<<<<<<< HEAD
            // config/
            'config' => ['path' => 'config', 'generate' => true],
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            // config/
            'config' => ['path' => 'config', 'generate' => true],
=======
=======
>>>>>>> origin/develop

            // config/
            'config' => ['path' => 'config', 'generate' => true],

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            // config/
            'config' => ['path' => 'config', 'generate' => true],
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
            // database/
            'factory' => ['path' => 'database/factories', 'generate' => true],
            'migration' => ['path' => 'database/migrations', 'generate' => true],
            'seeder' => ['path' => 'database/seeders', 'generate' => true],
<<<<<<< HEAD
            // lang/
            'lang' => ['path' => 'lang', 'generate' => false],
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            // lang/
            'lang' => ['path' => 'lang', 'generate' => false],
=======
=======
>>>>>>> origin/develop

            // lang/
            'lang' => ['path' => 'lang', 'generate' => false],

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            // lang/
            'lang' => ['path' => 'lang', 'generate' => false],
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
            // resource/
            'assets' => ['path' => 'resources/assets', 'generate' => true],
            'svg' => ['path' => 'resources/svg', 'generate' => true],
            'component-view' => ['path' => 'resources/views/components', 'generate' => false],
            'views' => ['path' => 'resources/views', 'generate' => true],
<<<<<<< HEAD
            // routes/
            'routes' => ['path' => 'routes', 'generate' => true],
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            // routes/
            'routes' => ['path' => 'routes', 'generate' => true],
=======
=======
>>>>>>> origin/develop

            // routes/
            'routes' => ['path' => 'routes', 'generate' => true],

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            // routes/
            'routes' => ['path' => 'routes', 'generate' => true],
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
            // tests/
            'test-feature' => ['path' => 'tests/Feature', 'generate' => true],
            'test-unit' => ['path' => 'tests/Unit', 'generate' => true],
        ],
    ],
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
    /*
     * |--------------------------------------------------------------------------
     * | Auto Discover of Modules
     * |--------------------------------------------------------------------------
     * |
     * | Here you configure auto discover of module
     * | This is useful for simplify module providers.
     * |
     */
    'auto-discover' => [
        /*
         * |--------------------------------------------------------------------------
         * | Migrations
         * |--------------------------------------------------------------------------
         * |
         * | This option for register migration automatically.
         * |
         */
        'migrations' => true,
        /*
         * |--------------------------------------------------------------------------
         * | Translations
         * |--------------------------------------------------------------------------
         * |
         * | This option for register lang file automatically.
         * |
         */
        'translations' => false,
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Package commands
     * |--------------------------------------------------------------------------
     * |
     * | Here you can define which commands will be visible and used in your
     * | application. You can add your own commands to merge section.
     * |
     */
    'commands' => ConsoleServiceProvider::defaultCommands()
        ->merge([
            // New commands go here
        ])
        ->toArray(),
    /*
     * |--------------------------------------------------------------------------
     * | Scan Path
     * |--------------------------------------------------------------------------
     * |
     * | Here you define which folder will be scanned. By default will scan vendor
     * | directory. This is useful if you host the package in packagist website.
     * |
     */
<<<<<<< HEAD
=======
=======

=======
>>>>>>> b93ef594b4 (.)
    /*
     * |--------------------------------------------------------------------------
     * | Auto Discover of Modules
     * |--------------------------------------------------------------------------
     * |
     * | Here you configure auto discover of module
     * | This is useful for simplify module providers.
     * |
     */
    'auto-discover' => [
        /*
         * |--------------------------------------------------------------------------
         * | Migrations
         * |--------------------------------------------------------------------------
         * |
         * | This option for register migration automatically.
         * |
         */
        'migrations' => true,
        /*
         * |--------------------------------------------------------------------------
         * | Translations
         * |--------------------------------------------------------------------------
         * |
         * | This option for register lang file automatically.
         * |
         */
        'translations' => false,
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Package commands
     * |--------------------------------------------------------------------------
     * |
     * | Here you can define which commands will be visible and used in your
     * | application. You can add your own commands to merge section.
     * |
     */
    'commands' => ConsoleServiceProvider::defaultCommands()
        ->merge([
            // New commands go here
        ])
        ->toArray(),
    /*
<<<<<<< HEAD
=======

    /*
    |--------------------------------------------------------------------------
    | Auto Discover of Modules
    |--------------------------------------------------------------------------
    |
    | Here you configure auto discover of module
    | This is useful for simplify module providers.
    |
    */
    'auto-discover' => [
        /*
        |--------------------------------------------------------------------------
        | Migrations
        |--------------------------------------------------------------------------
        |
        | This option for register migration automatically.
        |
        */
        'migrations' => true,

        /*
        |--------------------------------------------------------------------------
        | Translations
        |--------------------------------------------------------------------------
        |
        | This option for register lang file automatically.
        |
        */
        'translations' => false,

    ],

    /*
    |--------------------------------------------------------------------------
    | Package commands
    |--------------------------------------------------------------------------
    |
    | Here you can define which commands will be visible and used in your
    | application. You can add your own commands to merge section.
    |
    */
    'commands' => ConsoleServiceProvider::defaultCommands()
        ->merge([
            // New commands go here
        ])->toArray(),

    /*
>>>>>>> origin/develop
    |--------------------------------------------------------------------------
    | Scan Path
    |--------------------------------------------------------------------------
    |
    | Here you define which folder will be scanned. By default will scan vendor
    | directory. This is useful if you host the package in packagist website.
    |
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
     * |--------------------------------------------------------------------------
     * | Scan Path
     * |--------------------------------------------------------------------------
     * |
     * | Here you define which folder will be scanned. By default will scan vendor
     * | directory. This is useful if you host the package in packagist website.
     * |
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    'scan' => [
        'enabled' => false,
        'paths' => [
            base_path('vendor/*/*'),
        ],
    ],
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
    /*
     * |--------------------------------------------------------------------------
     * | Composer File Template
     * |--------------------------------------------------------------------------
     * |
     * | Here is the config for the composer.json file, generated by this package
     * |
     */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop

    /*
    |--------------------------------------------------------------------------
    | Composer File Template
    |--------------------------------------------------------------------------
    |
    | Here is the config for the composer.json file, generated by this package
    |
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    /*
     * |--------------------------------------------------------------------------
     * | Composer File Template
     * |--------------------------------------------------------------------------
     * |
     * | Here is the config for the composer.json file, generated by this package
     * |
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    'composer' => [
        'vendor' => env('MODULE_VENDOR', 'nwidart'),
        'author' => [
            'name' => env('MODULE_AUTHOR_NAME', 'Nicolas Widart'),
            'email' => env('MODULE_AUTHOR_EMAIL', 'n.widart@gmail.com'),
        ],
        'composer-output' => false,
    ],
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
    /*
     * |--------------------------------------------------------------------------
     * | Choose what laravel-modules will register as custom namespaces.
     * | Setting one to false will require you to register that part
     * | in your own Service Provider class.
     * |--------------------------------------------------------------------------
     */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop

    /*
    |--------------------------------------------------------------------------
    | Choose what laravel-modules will register as custom namespaces.
    | Setting one to false will require you to register that part
    | in your own Service Provider class.
    |--------------------------------------------------------------------------
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    /*
     * |--------------------------------------------------------------------------
     * | Choose what laravel-modules will register as custom namespaces.
     * | Setting one to false will require you to register that part
     * | in your own Service Provider class.
     * |--------------------------------------------------------------------------
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    'register' => [
        'translations' => true,
        /**
         * load files on boot or register method
         */
        'files' => 'register',
    ],
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
    /*
     * |--------------------------------------------------------------------------
     * | Activators
     * |--------------------------------------------------------------------------
     * |
     * | You can define new types of activators here, file, database, etc. The only
     * | required parameter is 'class'.
     * | The file activator will store the activation status in storage/installed_modules
     */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop

    /*
    |--------------------------------------------------------------------------
    | Activators
    |--------------------------------------------------------------------------
    |
    | You can define new types of activators here, file, database, etc. The only
    | required parameter is 'class'.
    | The file activator will store the activation status in storage/installed_modules
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    /*
     * |--------------------------------------------------------------------------
     * | Activators
     * |--------------------------------------------------------------------------
     * |
     * | You can define new types of activators here, file, database, etc. The only
     * | required parameter is 'class'.
     * | The file activator will store the activation status in storage/installed_modules
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    'activators' => [
        'file' => [
            'class' => FileActivator::class,
            'statuses-file' => base_path('modules_statuses.json'),
        ],
    ],
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======

>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    'activator' => 'file',
];
