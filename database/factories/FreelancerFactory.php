<?php

namespace Database\Factories;

use App\Models\Freelancer;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Freelancer>
 */
class FreelancerFactory extends Factory
{
    protected $model = Freelancer::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'skills_id' => Tag::factory(),
            'career_level_id' => Tag::factory(),
            'experience' => $this->faker->numberBetween(1, 10),
        ];
    }
}
