<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'location' => fake()->randomElement(['header', 'footer']),
            'is_active' => true,
        ];
    }
}
