<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FAQFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => fake()->sentence() . '?',
            'answer' => fake()->paragraph(),
            'order' => fake()->numberBetween(1, 10),
            'is_published' => true,
        ];
    }
}
