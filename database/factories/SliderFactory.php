<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'subtitle' => fake()->sentence(),
            'image' => 'sliders/' . fake()->uuid() . '.jpg',
            'button_text' => fake()->word(),
            'button_url' => fake()->url(),
            'order' => fake()->numberBetween(1, 10),
            'is_active' => true,
            'featured' => fake()->boolean(30),
        ];
    }
}
