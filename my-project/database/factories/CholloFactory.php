<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Chollo;

class CholloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'titulo' => $this->faker->name(),
            'descripcion' => $this->faker->paragraph(),
            'url' => $this->faker->url(),
            'categoria' => $this->faker->randomElement(['electronica','hogar','cuidadoPersona','alimentacion','deportes','moda']),
            'precio' => $this->faker->randomDigit(),
            'precio_descuento' => $this->faker->randomDigit(),
            'disponible' => $this->faker->boolean(),
        ];
    }
}
