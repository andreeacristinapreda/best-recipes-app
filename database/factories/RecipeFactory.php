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
            'instructions' => $this->faker->sentence(),
            'ingredients' => 'water, salt, bread',
            'duration' => $this->faker->numberBetween(10, 100),
        ];
    }
}
