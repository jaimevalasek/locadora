<?php

namespace Tests\Feature\Veiculo;

use App\Models\Modelo;
use App\Models\Montadora;
use App\Models\Veiculo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_not_be_able_to_register_duplicate_veiculo()
    {
        $montadora = Montadora::factory()->createOne();
        $modelo = Modelo::factory()->create([
            'nome' => 'Gol',
            'montadora_id' => $montadora->id,
        ]);

        $dados = [
            'numero_portas' => 4,
            'cor' => 'Prata',
            'fabricante' => 'Volkswagen',
            'ano_modelo' => 2019,
            'ano_fabricacao' => 2019,
            'placa' => 'ZPG-6J07',
            'chassi' => '392893962',
            'modelo_id' => $modelo->id,
        ];

        
        Veiculo::factory()->create($dados);

        $this->post(route('veiculos.store'), $dados)
            ->assertSessionHasErrors([
                'placa' => 'Já tem um carro cadastrado com esta placa',
                'chassi' => 'Já tem um carro cadastrado com este chassi',
            ]);

        
    }
}
