<?php

namespace Tests\Feature;

use App\Models\User;
use App\RuleEnums;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_job_title_is_required()
    {
        $company = User::factory()->create(['user_type' => RuleEnums::Company->value]);

        $this->actingAs($company);

        $response = $this->post('/admin/jobs', [
            'description' => 'Missing title',
            'category_id' => 1,
        ]);

        $response->assertSessionHasErrors('title');
    }

    public function test_job_description_is_required()
    {
        $company = User::factory()->create(['user_type' => RuleEnums::Company->value]);
        $this->actingAs($company);

        $response = $this->post('/admin/jobs', [
            'title' => 'No Description',
            'category_id' => 1,
        ]);

        $response->assertSessionHasErrors('description');
    }
}
