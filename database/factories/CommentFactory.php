<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'post_id' => Post::factory(),
            'comment_id' => null,
            'content' => $this->faker->paragraph(),
            'replay' => $this->faker->optional()->sentence(),
            'is_liked' => $this->faker->boolean(),
        ];
    }
}
