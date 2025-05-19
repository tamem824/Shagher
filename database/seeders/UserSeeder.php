<?php

namespace Database\Seeders;

use App\Gender;
use App\Models\Company;
use App\Models\User;
use App\RuleEnums;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'gender' => Gender::Male,
            'user_type' => RuleEnums::Admin,
            'phone_number' => ('09########'),

        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'gender' => Gender::Male,
            'user_type' => RuleEnums::Freelance,
            'phone_number' => ('09########'),

        ]);
        $user = User::create([
            'name' => 'Company',
            'email' => 'company@example.com',
            'password' => bcrypt('password'),
            'gender' => Gender::Male,
            'user_type' => RuleEnums::Company,
            'phone_number' => '0999999999',
        ]);

        Company::create([
            'user_id' => $user->id,
            'uri' => 'company-profile',
            'is_approved' => true,
        ]);
    }
}
