<?php
it('allows guests to view job listings', function () {
    $job = \App\Models\Job::factory()->create();

    $response = $this->get(route('jobs.index'));

    $response->assertStatus(200);
    $response->assertSee($job->title);
});
