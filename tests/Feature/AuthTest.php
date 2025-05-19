<?php

namespace Tests\Feature;

use App\Models\User;
use App\RuleEnums;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->post(route('company.register'), [
            'name' => 'Test Company',
            'email' => 'test@example.com',
            'password' => 'password',

            'password_confirmation' => 'password',
            'user_type'=>RuleEnums::Company->value,
            'uri'=>'www.paodksd.com',
            'terms'=>true,
        ]);


        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $this->assertAuthenticatedAs($user);
    }

    public function test_guest_cannot_access_admin()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/login');
    }
}
