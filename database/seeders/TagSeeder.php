<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $tags = [
            // Career Levels
            ['name' => 'Entry Level', 'types' => ['career_level']],
            ['name' => 'Mid Level', 'types' => ['career_level']],
            ['name' => 'Senior Level', 'types' => ['career_level']],

            // Employment Types
            ['name' => 'Full-Time', 'types' => ['employment_type']],
            ['name' => 'Part-Time', 'types' => ['employment_type']],
            ['name' => 'Contract', 'types' => ['employment_type']],


        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag['name'],
                'types' => json_encode($tag['types']),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
