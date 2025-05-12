<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Developer',
                'image' => 'fa fa-code',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.'
            ],
            [
                'name' => 'Technology',
                'image' => 'fa fa-code',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.'
            ],
            [
                'name' => 'Accounting',
                'image' => 'fa fa-bar-chart',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.'
            ],
            [
                'name' => 'Medical',
                'image' => 'fa fa-medkit',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.'
            ],
            [
                'name' => 'Government',
                'image' => 'fa fa-university',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.'
            ],
            [
                'name' => 'Media & News',
                'image' => 'fa fa-newspaper-o',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.'
            ],
            [
                'name' => 'Restaurants',
                'image' => 'fa fa-cutlery',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.'
            ],
            [
                'name' => 'All Categories',
                'image' => 'fa fa-th',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.'
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
