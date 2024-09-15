<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'tags' => 'good, yummy, new',
            'short_description' => $this->faker->sentence(),
            'ingredients' => 'water, salt, bread',
            'instructions' => $this->faker->sentence(),
            'duration' => $this->faker->numberBetween(10, 100),
        ];
    }
}
