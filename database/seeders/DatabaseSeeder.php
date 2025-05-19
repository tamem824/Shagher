<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::statement('PRAGMA foreign_keys = OFF;');

        $this->call([
            TagSeeder::class,
            LocationSeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            CategorySeeder::class,
            JobSeeder::class,
        ]);


        DB::statement('PRAGMA foreign_keys = ON;');
    }
}
