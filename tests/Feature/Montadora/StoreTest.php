<?php

namespace Tests\Feature\Montadora;

use App\Models\Montadora;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_not_be_able_to_register_duplicate_montadora()
    {
        $dados = [
            'nome' => 'Ford'
        ];

        Montadora::factory()->create($dados);

        $this->post(route('montadoras.store'), $dados)
            ->assertSessionHasErrors([
                'nome' => 'O nome dessa montadora já está cadastrado.'
            ]);

        
    }
}
