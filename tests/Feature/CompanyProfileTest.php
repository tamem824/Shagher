<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_company_can_view_own_profile()
    {
        $companyUser = User::factory()->create(['user_type' => 'company']);

        $company = \App\Models\Company::factory()->create([
            'user_id' => $companyUser->id,
            'name' => 'Test Company',
        ]);

        $this->actingAs($companyUser);

        $response = $this->get(route('company.profile'));

        $response->assertStatus(200);
        $response->assertSee('Test Company');
    }

}
