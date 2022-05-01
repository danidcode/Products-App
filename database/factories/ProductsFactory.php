<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //datos aletorios que se insertarán en las columnas de la tabla productos
        return [
            'Name' => $this ->faker->name(),
            'Price' => $this->faker->numberBetween(10,250),
            'Observaciones' =>$this->faker->realTextBetween(10,20),
            'CategoryID' =>$this->faker->numberBetween(1,4),
            'AlmacenID' =>$this->faker->numberBetween(1,5)

        ];
    }
}
