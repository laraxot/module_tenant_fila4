<?php

declare(strict_types=1);

use Modules\Tenant\Models\Tenant;
use Modules\Tenant\Tests\TestCase;
use Webmozart\Assert\Assert;
use Pest\Expectation; 

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

pest()->extend(TestCase::class)->in('Feature', 'Unit', 'Integration', 'Performance');

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

expect()->extend('toBeTenant', fn (mixed $value): Expectation => expect($value)->toBeInstanceOf(Tenant::class));

// NOTE: TenantUser model non esiste - rimossa expectation

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

/**
 * Create a tenant instance in the database.
 *
 * @param array<string, mixed> $attributes
 * @return Tenant
 */
function createTenant(array $attributes = []): Tenant
{
    /** @var \Illuminate\Database\Eloquent\Factories\Factory<Tenant> $factory */
    $factory = Tenant::factory();
    /** @var Tenant $tenant */
    $tenant = $factory->create($attributes);
    // Explicitly assert type for PHPStan if it can't infer from factory()->create()
    Assert::isInstanceOf($tenant, Tenant::class);
    return $tenant;
}

/**
 * Make a tenant instance (without saving to database).
 *
 * @param array<string, mixed> $attributes
 * @return Tenant
 */
function makeTenant(array $attributes = []): Tenant
{
    /** @var \Illuminate\Database\Eloquent\Factories\Factory<Tenant> $factory */
    $factory = Tenant::factory();
    /** @var Tenant $tenant */
    $tenant = $factory->make($attributes);
    // Explicitly assert type for PHPStan if it can't infer from factory()->make()
    Assert::isInstanceOf($tenant, Tenant::class);
    return $tenant;
}

// NOTE: TenantUser model non esiste - funzioni helper rimosse
// Quando il modello sarà implementato, riabilitare queste funzioni
