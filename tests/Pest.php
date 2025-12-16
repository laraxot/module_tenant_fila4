<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Foundation\Testing\DatabaseTransactions;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
use Modules\Tenant\Models\Tenant;
use Modules\Tenant\Models\TenantUser;
use Modules\Tenant\Tests\TestCase;

/*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
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
=======
<<<<<<< HEAD
>>>>>>> b13ae59 (.)

pest()->extend(TestCase::class)->in('Feature', 'Unit');

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

expect()->extend('toBe' + 'Tenant' + '', function () {
    /** @var \Pest\Expectation<mixed> $this */
    return $this->toBeInstanceOf(...);
});

expect()->extend('toBe' + 'Tenant' + '', function () {
    /** @var \Pest\Expectation<mixed> $this */
    return $this->toBeInstanceOf(...);
});

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
<<<<<<< HEAD
=======
=======
=======
use Modules\Tenant\Tests\TestCase;

/*
>>>>>>> origin/develop
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)

pest()->extend(TestCase::class)->in('Feature', 'Unit');

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

expect()->extend('toBeTenant', fn() => $this->toBeInstanceOf(Tenant::class));

expect()->extend('toBeTenantUser', fn() => $this->toBeInstanceOf(TenantUser::class));

/*
<<<<<<< HEAD
=======

pest()->extend(TestCase::class)
    ->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeTenant', function () {
    return $this->toBeInstanceOf(\Modules\Tenant\Models\Tenant::class);
});

expect()->extend('toBeTenantUser', function () {
    return $this->toBeInstanceOf(\Modules\Tenant\Models\TenantUser::class);
});

/*
>>>>>>> origin/develop
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
 * |--------------------------------------------------------------------------
 * | Functions
 * |--------------------------------------------------------------------------
 * |
 * | While Pest is very powerful out-of-the-box, you may have some testing code specific to your
 * | project that you don't want to repeat in every file. Here you can also expose helpers as
 * | global functions to help you to reduce the number of lines of code in your test files.
 * |
 */
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)

function createTenant(array $attributes = []): Tenant
{
    return Tenant::factory()->create($attributes);
}

function makeTenant(array $attributes = []): Tenant
{
    return Tenant::factory()->make($attributes);
}

function createTenantUser(array $attributes = []): TenantUser
{
    return TenantUser::factory()->create($attributes);
}

function makeTenantUser(array $attributes = []): TenantUser
{
    return TenantUser::factory()->make($attributes);
<<<<<<< HEAD
=======
=======

function createTenant(array $attributes = []): \Modules\Tenant\Models\Tenant
{
    return \Modules\Tenant\Models\Tenant::factory()->create($attributes);
}

function makeTenant(array $attributes = []): \Modules\Tenant\Models\Tenant
{
    return \Modules\Tenant\Models\Tenant::factory()->make($attributes);
}

function createTenantUser(array $attributes = []): \Modules\Tenant\Models\TenantUser
{
    return \Modules\Tenant\Models\TenantUser::factory()->create($attributes);
}

function makeTenantUser(array $attributes = []): \Modules\Tenant\Models\TenantUser
{
    return \Modules\Tenant\Models\TenantUser::factory()->make($attributes);
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
}
