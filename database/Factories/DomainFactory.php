<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Tenant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Tenant\Models\Domain;

/**
 * @extends Factory<Domain>
 */
=======
namespace Modules\Tenant\Database\Factories;

use Modules\Tenant\Models\Domain;
use Illuminate\Database\Eloquent\Factories\Factory;

>>>>>>> 45eb13c (.)
class DomainFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     *
     * @var class-string<Domain>
=======
>>>>>>> 45eb13c (.)
     */
    protected $model = Domain::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'domain' => $this->faker->domainName(),
            'is_primary' => $this->faker->boolean(20),
            'is_ssl_enabled' => $this->faker->boolean(80),
            'is_active' => $this->faker->boolean(90),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }

    /**
     * Indicate that the domain is primary.
     */
    public function primary(): static
    {
        return $this->state(fn (array $_attributes) => [
            'is_primary' => true,
        ]);
    }

    /**
     * Indicate that the domain is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $_attributes) => [
            'is_active' => true,
        ]);
    }

    /**
     * Indicate that SSL is enabled.
     */
    public function sslEnabled(): static
    {
        return $this->state(fn (array $_attributes) => [
            'is_ssl_enabled' => true,
        ]);
=======
     */
    public function definition(): array
    {
        return [];
>>>>>>> 45eb13c (.)
    }
}
