<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OfficialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'position' => fake()->jobTitle(),
            'photo' => 'officials/' . fake()->uuid() . '.jpg',
            'order' => fake()->numberBetween(1, 10),
            'is_active' => true,
            'show_on_homepage' => fake()->boolean(30),
        ];
    }
}
