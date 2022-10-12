<?php

namespace Database\Seeders;

use App\Models\Locadora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocadoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Locadora::create([
            'nome_fantasia' => 'Unidas Aluguel de Carros',
            'razao_social' => 'Unidas Aluguel LTDA',
            'cnpj' => '61.322.618/0001-62',
            'email' => fake()->email(),
            'telefone' => fake()->numerify('(##) #####-####'),
            'cidade' => 'Curitiba',
            'estado' => 'PR'
        ]);

        Locadora::create([
            'nome_fantasia' => 'Localiza Aluguel de Carros',
            'razao_social' => 'Localiza Aluguel LTDA',
            'cnpj' => '85.955.191/0001-06',
            'email' => fake()->email(),
            'telefone' => fake()->numerify('(##) #####-####'),
            'cidade' => 'São Paulo',
            'estado' => 'SP'
        ]);

        Locadora::create([
            'nome_fantasia' => 'Movida Aluguel de Carros',
            'razao_social' => 'Movida Aluguel LTDA',
            'cnpj' => '27.112.174/0001-00',
            'email' => fake()->email(),
            'telefone' => fake()->numerify('(##) #####-####'),
            'cidade' => 'Rio de Janeiro',
            'estado' => 'RJ'
        ]);
    }
}
