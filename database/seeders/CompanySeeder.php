<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {

        if (User::count() === 0) {
            \App\Models\User::factory()->count(5)->create();
        }


        foreach (User::all() as $user) {
            Company::create([
                'user_id' => $user->id,
                'uri' => 'company-' . $user->id,
                'is_approved' => true,
            ]);
        }
    }
}
