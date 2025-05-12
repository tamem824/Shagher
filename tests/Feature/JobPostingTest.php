<?php

use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobPostingTest extends TestCase
{
    use RefreshDatabase;

    public function test_company_can_create_job()
    {
        $company = User::factory()->create(['user_type' => 'company']);
        $this->actingAs($company);

        $response = $this->post('/admin/jobs', [
            'title' => 'Senior Developer',
            'description' => 'Full stack developer needed.',
            'category_id' => 1,
            'tags' => ['php', 'laravel']
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('jobs', ['title' => 'Senior Developer']);
    }

    public function test_guest_cannot_create_job()
    {
        $response = $this->post('/admin/jobs', [
            'title' => 'Should not be created'
        ]);

        $response->assertRedirect('/login');
    }

    public function test_guests_can_view_job_listings()
    {
        $job = Job::factory()->create();

        $response = $this->get(route('jobs.index'));

        $response->assertStatus(200);
        $response->assertSee($job->title);
    }
}
