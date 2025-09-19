<?php

declare(strict_types=1);

namespace Modules\Tenant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Tenant\Models\TestSushiModel;

/**
 * @extends Factory<TestSushiModel>
 */
class TestSushiModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<TestSushiModel>
     */
    protected $model = TestSushiModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['active', 'inactive', 'pending', 'completed']),
            'metadata' => [
                'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
                'category' => $this->faker->word(),
                'tags' => $this->faker->words(3),
            ],
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'created_by' => $this->faker->numberBetween(1, 100),
            'updated_by' => $this->faker->numberBetween(1, 100),
        ];
    }

    /**
     * Indicate that the model is active.
     */
    public function active(): static
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> 15079c8 (.)
=======
        return $this->state(fn(array $_attributes) => [
>>>>>>> 764bbef (.)
            'status' => 'active',
        ]);
    }

    /**
     * Indicate that the model is inactive.
     */
    public function inactive(): static
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> 15079c8 (.)
=======
        return $this->state(fn(array $_attributes) => [
>>>>>>> 764bbef (.)
            'status' => 'inactive',
        ]);
    }

    /**
     * Indicate that the model is pending.
     */
    public function pending(): static
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> 15079c8 (.)
=======
        return $this->state(fn(array $_attributes) => [
>>>>>>> 764bbef (.)
            'status' => 'pending',
        ]);
    }

    /**
     * Set high priority metadata.
     */
    public function highPriority(): static
    {
        return $this->state(function (array $attributes) {
            /** @var array<string, mixed> $metadata */
            $metadata = is_array($attributes['metadata'] ?? null) ? $attributes['metadata'] : [];
            $metadata['priority'] = 'high';
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> 15079c8 (.)
=======

>>>>>>> 764bbef (.)
            return [
                'metadata' => $metadata,
            ];
        });
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> 15079c8 (.)
=======
}
>>>>>>> 764bbef (.)
