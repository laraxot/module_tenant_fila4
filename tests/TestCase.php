<?php

declare(strict_types=1);

namespace Modules\Tenant\Tests;

<<<<<<< HEAD
use Illuminate\Foundation\Application;
use Modules\Tenant\Providers\TenantServiceProvider;
=======
use Modules\Tenant\Providers\TenantServiceProvider;
use Illuminate\Foundation\Application;
>>>>>>> 15079c8 (.)
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Xot\Tests\CreatesApplication;

/**
 * Base test case for Tenant module tests.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Load Tenant module specific configurations
        $this->loadLaravelMigrations();
<<<<<<< HEAD

=======
        
>>>>>>> 15079c8 (.)
        // Seed any required data for Tenant tests
        $this->artisan('module:seed', ['module' => 'Tenant']);
    }

    /**
     * Get package providers.
     *
     * @param Application $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            TenantServiceProvider::class,
        ];
    }
}
