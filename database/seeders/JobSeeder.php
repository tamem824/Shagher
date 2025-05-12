<?php

namespace Database\Seeders;



use App\Gender;
use App\JobStatus;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Location;

use App\Qualification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('job_listings')->insert([
                'category_id' => Category::inRandomOrder()->first()->id,
                'tag_id' => Tag::inRandomOrder()->first()->id,
                'posted_by' => User::inRandomOrder()->first()->id,
                'location_id' => Location::inRandomOrder()->first()->id,
                'title' => $faker->jobTitle,
                'description' => $faker->paragraph,
                'salary' => $faker->numberBetween(1, 9) * 10,
                'start_date' => $faker->date(),
                'experience_years' => fake()->randomElement(array_map(fn($e) => $e->value, \App\Experience::cases())),

                'expiration_date' => $faker->date(),
                'gender' => $faker->randomElement(array_map(fn($g) => $g->value, Gender::cases())),
                'qualification' => $faker->randomElement(array_map(fn($q) => $q->value, Qualification::cases())),
                'career_level_id' => Tag::inRandomOrder()->first()->id,
                'employment_type_id' => Tag::inRandomOrder()->first()->id,
                'job_type' => $faker->randomElement(['Full-time', 'Part-time', 'Freelance']),
                'is_featured' => $faker->boolean(50),
                'status' => $faker->randomElement(array_map(fn($s) => $s->value, JobStatus::cases())),
                'responsibility' => json_encode([$faker->sentence, $faker->sentence]),
                'skill_experience' => json_encode([$faker->word, $faker->word]),
                'experience' => json_encode([$faker->sentence, $faker->sentence]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
