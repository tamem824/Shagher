<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Developer',
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa
',
            'image' => 'electronics.jpg',
            'created_at' => now(),
            'updated_at' => now(),]);

        DB::table('categories')->insert([
            'name' => 'Developer',
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa
',
            'image' => 'electronics.jpg',
            'created_at' => now(),
            'updated_at' => now(),]);
    }
}


