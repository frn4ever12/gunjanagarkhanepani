<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'description' => fake()->paragraph(),
            'icon' => fake()->randomElement(['fa-tint', 'fa-home', 'fa-tools', 'fa-file-alt']),
            'order' => fake()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}
