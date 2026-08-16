<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DownloadFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'file' => 'downloads/' . fake()->uuid() . '.pdf',
            'category' => fake()->randomElement(['forms', 'reports', 'policies', 'other']),
            'order' => fake()->numberBetween(1, 10),
            'is_active' => true,
            'featured' => fake()->boolean(20),
        ];
    }
}
