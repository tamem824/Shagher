<?php

namespace Tests\Feature;
use Pest\Laravel;
use App\Models\User;
use App\RuleEnums;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\Rule;
use Tests\TestCase;
use Illuminate\Support\Str;
class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_dashboard()
    {
        $admin = User::factory()->create([
            'user_type' => RuleEnums::Admin->value,
        ]);

        $this->actingAs($admin);

        $response = $this->get(route('admin.dashboard'));
        dd($response->headers->get('Location'));


        $response->assertStatus(200);
    }


    public function test_non_admin_cannot_access_dashboard()
    {
        $user = User::factory()->create([
            'user_type' => collect([RuleEnums::Company->value, RuleEnums::Freelance->value])->random()
        ]);
        $this->actingAs($user);

        $response = $this->get('/admin/dashboard');
        $response->assertRedirect();
    }
}
