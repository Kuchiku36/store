<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>fake()->randomDigitNotZero(),
            'nom'=>fake()->word(15),
            'description'=>fake()->sentence(20),
            'price'=>fake()->randomFloat(2 , 20 , 200 ) , //clique droit atteindre la définition

            //
        ];
    }
}
