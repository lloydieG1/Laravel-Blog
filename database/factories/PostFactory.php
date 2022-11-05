<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Page;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'likes' => fake()->randomNumber(),
            'body' => fake()->paragraph(),
            'image_url' => fake()->url(),
            'date_posted' => fake()->dateTime(),
            'page_id' => Page::factory()
        ];
    }
}
