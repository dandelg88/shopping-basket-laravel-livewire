<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucfirst($this->faker->word),
            'price' => $this->faker->numberBetween(100, 5000),
            'excerpt' => $this->faker->paragraph(2),
        ];
    }
}
