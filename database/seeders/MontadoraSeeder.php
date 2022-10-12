<?php

namespace Database\Seeders;

use App\Models\Modelo;
use App\Models\Montadora;
use App\Models\Veiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MontadoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $montadora = Montadora::create([
            'nome' => 'GM'
        ]);

        $modelo = Modelo::create([
            'nome' => 'Onix Plus',
            'montadora_id' => $montadora->id
        ]);

        Veiculo::create([
            'numero_portas' => 4,
            'cor' => 'Branco',
            'fabricante' => 'General Motors',
            'ano_modelo' => 2021,
            'ano_fabricacao' => 2020,
            'placa' => strtoupper(fake()->bothify('???-#?##')),
            'chassi' => fake()->bothify('#########'),
            'modelo_id' => $modelo->id,
        ]); 

        Veiculo::create([
            'numero_portas' => 2,
            'cor' => 'Preto',
            'fabricante' => 'General Motors',
            'ano_modelo' => 2022,
            'ano_fabricacao' => 2022,
            'placa' => strtoupper(fake()->bothify('???-#?##')),
            'chassi' => fake()->bothify('#########'),
            'modelo_id' => $modelo->id,
        ]); 

        $modelo = Modelo::create([
            'nome' => 'Cruse',
            'montadora_id' => $montadora->id
        ]);

        Veiculo::create([
            'numero_portas' => 4,
            'cor' => 'Vermelho',
            'fabricante' => 'General Motors',
            'ano_modelo' => 2020,
            'ano_fabricacao' => 2020,
            'placa' => strtoupper(fake()->bothify('???-#?##')),
            'chassi' => fake()->bothify('#########'),
            'modelo_id' => $modelo->id,
        ]); 

        Montadora::create([
            'nome' => 'Mercedes-Bens'
        ]);

        $montadora = Montadora::create([
            'nome' => 'Volkswagen'
        ]);

        $modelo = Modelo::create([
            'nome' => 'Gol',
            'montadora_id' => $montadora->id
        ]);

        Veiculo::create([
            'numero_portas' => 2,
            'cor' => 'Branco',
            'fabricante' => 'Volkswagen',
            'ano_modelo' => 2021,
            'ano_fabricacao' => 2021,
            'placa' => strtoupper(fake()->bothify('???-#?##')),
            'chassi' => fake()->bothify('#########'),
            'modelo_id' => $modelo->id,
        ]);

        $modelo = Modelo::create([
            'nome' => 'Jeta Sedan',
            'montadora_id' => $montadora->id
        ]);

        Veiculo::create([
            'numero_portas' => 4,
            'cor' => 'Prata',
            'fabricante' => 'Volkswagen',
            'ano_modelo' => 2019,
            'ano_fabricacao' => 2019,
            'placa' => strtoupper(fake()->bothify('???-#?##')),
            'chassi' => fake()->bothify('#########'),
            'modelo_id' => $modelo->id,
        ]);

        Montadora::create([
            'nome' => 'Scania'
        ]);

        Montadora::create([
            'nome' => 'Toyota'
        ]);

        Montadora::create([
            'nome' => 'Ford'
        ]);

        Montadora::create([
            'nome' => 'Chery'
        ]);

        Montadora::create([
            'nome' => 'Honda'
        ]);

        Montadora::create([
            'nome' => 'Hyundai'
        ]);

        Montadora::create([
            'nome' => 'Land Rover'
        ]);

        Montadora::create([
            'nome' => 'PSA'
        ]);

        Montadora::create([
            'nome' => 'Citroen'
        ]);

        Montadora::create([
            'nome' => 'Peugeot'
        ]);

        Montadora::create([
            'nome' => 'Nissan'
        ]);

        Montadora::create([
            'nome' => 'Fiat'
        ]);

        Montadora::create([
            'nome' => 'Iveco'
        ]);

        Montadora::create([
            'nome' => 'Renault'
        ]);

        Montadora::create([
            'nome' => 'Audi'
        ]);
    }
}
