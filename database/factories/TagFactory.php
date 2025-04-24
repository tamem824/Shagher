<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Job;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'types'=>json_encode($this->faker->sentences(2)),
        ];
    }

    /**
     * Generate a polymorphic relationship with a model (e.g., JobListing, Freelancer).
     *
     * @param  string  $model
     * @param  int  $count
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withTaggable(string $model, int $count = 1)
    {
        return $this->afterCreating(function (Tag $tag) use ($model, $count) {

            $taggableModel = new $model;

            $taggableModel->tags()->attach($tag->id);
        });
    }
}
