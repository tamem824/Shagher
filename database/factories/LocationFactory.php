<?php

namespace Database\Factories;

use App\Gender;
use App\JobStatus;
use App\Models\Job;
use App\Models\JobListing;
use App\Models\Category;
use App\Models\Location;
use App\Models\Tag;
use App\Models\Company;
use App\Models\User;
use App\Qualification;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'tag_id' => Tag::factory(),
            'posted_by' => User::factory(),
            'title' => $this->faker->jobTitle(),
            'location'=>Location::factory()
            'description' => $this->faker->paragraphs(3, true),
            'salary' => $this->faker->randomElement(['Negotiable', '$1000 - $2000', '$2000+']),
            'start_date' => $this->faker->date(),
            'expiration_date' => $this->faker->dateTimeBetween('+1 week', '+2 months')->format('Y-m-d'),
            'gender' => $this->faker->randomElement([Gender::Male, Gender::Female]),
            'qualification' => $this->faker->randomElement(Qualification::cases()),
            'career_level_id' => Tag::factory(),
            'employment_type_id' => Tag::factory(),
            'job_type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Freelance']),
            'is_featured' => $this->faker->boolean(),
            'status' => $this->faker->randomElement(JobStatus::cases()),
            'responsibility' => json_encode($this->faker->sentences(3)),
            'skill_experience' => json_encode($this->faker->sentences(2)),
            'experience' => json_encode($this->faker->sentences(2)),
        ];
    }
}
