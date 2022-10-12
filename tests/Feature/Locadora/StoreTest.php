<?php

namespace Tests\Feature\Locadora;

use App\Models\Locadora;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_not_be_able_to_register_duplicate_locadora()
    {
        $dados = [
            'nome_fantasia' => 'Unidas Aluguel de Carros',
            'razao_social' => 'Unidas Aluguel LTDA',
            'cnpj' => '04.147.499/0001-90',
            'email' => 'sporer.danial@schuppe.org',
            'telefone' => fake()->numerify('(##) #####-####'),
            'cidade' => 'Curitiba',
            'estado' => 'PR'
        ];

        Locadora::factory()->create($dados);

        $this->post(route('locadoras.store'), $dados)
            ->assertSessionHasErrors([
                'cnpj' => trans('validation.unique', ['attribute' => 'cnpj'])
            ]);

        
    }
}
