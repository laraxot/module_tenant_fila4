<?php

declare(strict_types=1);

namespace Modules\Tenant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Tenant;

/**
<<<<<<< HEAD
 * @extends Factory<Tenant>
=======
<<<<<<< HEAD
 * @extends Factory<Tenant>
=======
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\User\Models\Tenant>
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
 */
class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
     * @var class-string<Tenant>
=======
<<<<<<< HEAD
     * @var class-string<Tenant>
=======
     * @var class-string<\Modules\User\Models\Tenant>
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
     */
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'domain' => $this->faker->domainName(),
            'database' => 'tenant_' . $this->faker->unique()->slug(),
            'is_active' => $this->faker->boolean(80),
            'settings' => [
                'timezone' => $this->faker->randomElement(['Europe/Rome', 'Europe/London', 'America/New_York']),
                'locale' => $this->faker->randomElement(['it', 'en', 'de']),
                'currency' => $this->faker->randomElement(['EUR', 'USD', 'GBP']),
            ],
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }

    /**
     * Indicate that the tenant is active.
     */
    public function active(): static
    {
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> a12f125f4a (.)
=======
        return $this->state(fn(array $_attributes) => [
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
            'is_active' => true,
        ]);
    }

    /**
     * Indicate that the tenant is inactive.
     */
    public function inactive(): static
    {
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> a12f125f4a (.)
=======
        return $this->state(fn(array $_attributes) => [
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
            'is_active' => false,
        ]);
    }
}
