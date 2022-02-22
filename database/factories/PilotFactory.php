<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PilotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idAmministratore' => 1,
            'nome' => $this->faker->name,
            'cognome' => $this->faker->lastName,
            'sesso' => 'uomo',
            'idCategoria' => 1,
            'idTeam' => 1,
        ];
    }
}
