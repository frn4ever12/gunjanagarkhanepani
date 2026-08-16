<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoticeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'file' => 'notices/' . fake()->uuid() . '.pdf',
            'publish_date' => fake()->date(),
            'expiry_date' => fake()->date(),
            'priority' => fake()->numberBetween(1, 3),
            'is_published' => true,
            'is_public' => fake()->boolean(),
            'category' => fake()->randomElement(['general', 'vacancy', 'tender', 'other']),
        ];
    }
}
