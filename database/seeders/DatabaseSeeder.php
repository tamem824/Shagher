<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        {
            User::create([
                'name'=>'admin',
                'email'=>'admin2@example.com',
                'phone_number'=>'0000000000',
                'address'=>"sss",
                'gender'=>1,
                'photo'=>'sad.pnj',
                'password'=>bcrypt('password')]);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
