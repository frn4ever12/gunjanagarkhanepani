<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'content' => fake()->paragraphs(3, true),
            'image' => 'news/' . fake()->uuid() . '.jpg',
            'publish_date' => fake()->date(),
            'is_published' => true,
            'is_press_release' => fake()->boolean(),
        ];
    }
}
