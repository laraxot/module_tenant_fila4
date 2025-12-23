<?php

declare(strict_types=1);

use Modules\Tenant\Models\Tenant;
<<<<<<< HEAD
use Modules\Tenant\Models\TenantUser;
use Modules\Tenant\Tests\TestCase;
=======
use Modules\Tenant\Tests\TestCase;
use Webmozart\Assert\Assert;
>>>>>>> laraxot/develop

/*
 * |--------------------------------------------------------------------------
 * | Test Case
 * |--------------------------------------------------------------------------
 * |
 * | The closure you provide to your test functions is always bound to a specific PHPUnit test
 * | case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
 * | need to change it using the "pest()" function to bind a different classes or traits.
 * |
 */

<<<<<<< HEAD
pest()->extend(TestCase::class)->in('Feature', 'Unit');
=======
pest()->extend(TestCase::class)->in('Feature', 'Unit', 'Integration', 'Performance');
>>>>>>> laraxot/develop

/*
 * |--------------------------------------------------------------------------
 * | Expectations
 * |--------------------------------------------------------------------------
 * |
 * | When you're writing tests, you often need to check that values meet certain conditions. The
 * | "expect()" function gives you access to a set of "expectations" methods that you can use
 * | to assert different things. Of course, you may extend the Expectation API at any time.
 * |
 */

<<<<<<< HEAD
expect()->extend('toBeTenant', fn () => $this->toBeInstanceOf(Tenant::class));

expect()->extend('toBeTenantUser', fn () => $this->toBeInstanceOf(TenantUser::class));
=======
// NOTE: The 'toBeTenant' expectation was removed as it was not used elsewhere
// and caused PHPStan errors related to '$this' binding.
>>>>>>> laraxot/develop

/*
 * |--------------------------------------------------------------------------
 * | Functions
 * |--------------------------------------------------------------------------
 * |
 * | While Pest is very powerful out-of-the-box, you may have some testing code specific to your
 * | project that you don't want to repeat in every file. Here you can also expose helpers as
 * | global functions to help you to reduce the number of lines of code in your test files.
 * |
 */

function createTenant(array $attributes = []): Tenant
{
<<<<<<< HEAD
    return Tenant::factory()->create($attributes);
=======
    /** @var Tenant $tenant */
    $tenant = Tenant::factory()->create($attributes);
    Assert::isInstanceOf($tenant, Tenant::class); // Added for PHPStan
    return $tenant;
>>>>>>> laraxot/develop
}

function makeTenant(array $attributes = []): Tenant
{
<<<<<<< HEAD
    return Tenant::factory()->make($attributes);
}

function createTenantUser(array $attributes = []): TenantUser
{
    return TenantUser::factory()->create($attributes);
}

function makeTenantUser(array $attributes = []): TenantUser
{
    return TenantUser::factory()->make($attributes);
}
=======
    /** @var Tenant $tenant */
    $tenant = Tenant::factory()->make($attributes);
    Assert::isInstanceOf($tenant, Tenant::class); // Added for PHPStan
    return $tenant;
}

// Removed TenantUser functions as the model doesn't exist in this module
>>>>>>> laraxot/develop
