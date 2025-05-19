<?php

use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobPostingTest extends TestCase
{
    use RefreshDatabase;


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

        $response = $this->get(route('jobs'));

        $response->assertStatus(200);
        $response->assertSee($job->title);
    }
}
