<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Locadora>
 */
class LocadoraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome_fantasia' => fake()->name(),
            'razao_social' => fake()->name(),
            'cnpj' => fake()->numerify('##.###.###/0001-##'),
            'email' => fake()->email(),
            'telefone' => fake()->numerify('(##) #####-####'),
            'cidade' => fake()->city(),
            'estado' => 'SP'
        ];
    }
}
