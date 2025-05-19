<?php

namespace Database\Factories;

use App\Gender;
use App\JobStatus;
use App\Models\Job;
use App\Models\JobListing;
use App\Models\Category;
use App\Models\Location;
use App\Models\Tag;
use App\Models\Company;
use App\Models\User;
use App\Qualification;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition(): array
    {
        return [
           'name'=>$this->faker->city()
        ];
    }
}
