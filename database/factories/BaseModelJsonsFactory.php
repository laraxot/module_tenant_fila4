<?php

declare(strict_types=1);

namespace Modules\Tenant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Tenant\Models\BaseModelJsons;

/**
<<<<<<< HEAD
 * @extends Factory<BaseModelJsons>
=======
<<<<<<< HEAD
 * @extends Factory<BaseModelJsons>
=======
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Tenant\Models\BaseModelJsons>
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
 */
class BaseModelJsonsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
     * @var class-string<BaseModelJsons>
=======
<<<<<<< HEAD
     * @var class-string<BaseModelJsons>
=======
     * @var class-string<\Modules\Tenant\Models\BaseModelJsons>
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
     */
    protected $model = BaseModelJsons::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'created_by' => $this->faker->uuid(),
            'updated_by' => $this->faker->uuid(),
        ];
    }
<<<<<<< HEAD
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> a12f125f4a (.)
=======
}
>>>>>>> b93ef594b4 (.)
=======
}
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
