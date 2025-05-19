<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {

        $users = User::factory()->count(10)->create([
            'user_type' => 1,
        ]);

        foreach ($users as $index => $user) {
            Company::create([
                'user_id' => $user->id,
                'uri' => 'company-' . $user->id,
                'is_approved' => $index < 5,
            ]);
        }
    }
}
