<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'numero_portas' => 4,
            'cor' => 'Prata',
            'fabricante' => 'Volkswagen',
            'ano_modelo' => 2019,
            'ano_fabricacao' => 2019,
            'placa' => strtoupper(fake()->bothify('???-#?##')),
            'chassi' => fake()->bothify('#########'),
            'modelo_id' => 1,
        ];
    }
}
