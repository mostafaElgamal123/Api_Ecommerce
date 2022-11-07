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
        $offer_list=[10,15,20,25,30,35,40];
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'price' => rand(300,500),
            'offer' => $offer_list[rand(0,(count($offer_list)-1))],
            'quantity' => rand(1,20),
            'image' => "https://via.placeholder.com/350",
            'available' => "yes",
        ];
    }
}
