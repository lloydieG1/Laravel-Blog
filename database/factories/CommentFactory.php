<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Page;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Array of models that can have comments
        $commentables = [
            Page::class,
            Post::class,
        ];
        $randomCommentableType = fake()->randomElement($commentables);

        return [
            'likes' => fake()->randomNumber(),
            'body' => fake()->paragraph(),
            'date_commented' => fake()->dateTime(),
            'commentable_id' => $randomCommentableType::factory(),
            'commentable_type' => $randomCommentableType
        ];
    }
}
