<?php

namespace Database\Seeders;

use App\Models\Endereco;
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
        $locadora = Locadora::create([
            'nome_fantasia' => 'Unidas Aluguel de Carros',
            'razao_social' => 'Unidas Aluguel LTDA',
            'cnpj' => fake()->numerify('##.###.###/0001-##'),
            'email' => fake()->email(),
            'telefone' => fake()->numerify('(##) #####-####'),
        ]);

        Endereco::create([
            'cep' => '83852-266',
            'rua' => 'Rua Floriano Peixoto',
            'numero' => '589',
            'bairro' => 'Tarumã',
            'cidade' => 'Curitiba',
            'estado' => 'PR',
            'locadora_id' => $locadora->id,
        ]);

        $locadora = Locadora::create([
            'nome_fantasia' => 'Localiza Aluguel de Carros',
            'razao_social' => 'Localiza Aluguel LTDA',
            'cnpj' => fake()->numerify('##.###.###/0001-##'),
            'email' => fake()->email(),
            'telefone' => fake()->numerify('(##) #####-####'),
        ]);

        Endereco::create([
            'cep' => '12554-376',
            'rua' => 'Rua Augusto Liberato',
            'numero' => '69',
            'bairro' => 'Nações do centro',
            'cidade' => 'São Paulo',
            'estado' => 'SP',
            'locadora_id' => $locadora->id,
        ]);

        $locadora = Locadora::create([
            'nome_fantasia' => 'Movida Aluguel de Carros',
            'razao_social' => 'Movida Aluguel LTDA',
            'cnpj' => fake()->numerify('##.###.###/0001-##'),
            'email' => fake()->email(),
            'telefone' => fake()->numerify('(##) #####-####'),
        ]);

        Endereco::create([
            'cep' => '52444-544',
            'rua' => 'Rua Marechal Teodoro Sampaio',
            'numero' => '8900',
            'bairro' => 'Barra da Tijuca',
            'cidade' => 'Rio de Janeiro',
            'estado' => 'RJ',
            'locadora_id' => $locadora->id,
        ]);
    }
}
