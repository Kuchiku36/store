<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // ont met le faker word dans une variable pour l'insiré directement comme nom d'image
        $name = fake()->word(7,true) ;
                return [
            'name'=>$name ,
            'image'=>fake()->imageUrl(640,480, $name,true) ,
            //
        ];
    }
}
