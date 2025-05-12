<?php

namespace Tests\Feature;

use App\Models\User;
use App\RuleEnums;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\Rule;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_dashboard()
    {
        $admin = User::factory()->create(['user_type' => 'admin']);
        $this->actingAs($admin);

        $response = $this->get('/admin/dashboard');
        $response->assertStatus(200);
    }

    public function test_non_admin_cannot_access_dashboard()
    {
        $user = User::factory()->create(['user_type' => RuleEnums::Company->value]);
        $this->actingAs($user);

        $response = $this->get('/admin/dashboard');
        $response->assertRedirect();
    }
}
