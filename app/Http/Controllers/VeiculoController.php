<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::query()
            ->join('modelos', 'veiculos.modelo_id', 'modelos.id')
            ->join('montadoras', 'modelos.montadora_id', 'montadoras.id')
            ->select('veiculos.*', 'modelos.nome as modelo', 'montadoras.nome as montadora')
            ->paginate(10);

        return view('veiculos.index', [
            'veiculos' => $veiculos
        ]);
    }

    public function show($id)
    {
        $veiculo = Veiculo::query()
            ->join('modelos', 'veiculos.modelo_id', 'modelos.id')
            ->join('montadoras', 'modelos.montadora_id', 'montadoras.id')
            ->select('veiculos.*', 'modelos.nome as modelo', 'montadoras.nome as montadora')
            ->where('veiculos.id', '=', $id)
            ->first();

        return view('veiculos.show', [
            'veiculo' => $veiculo
        ]);
    }

    public function store(VeiculoRequest $request)
    {
        $validated = $request->validated();

        Veiculo::create([
            'numero_portas' => $validated['numero_portas'],
            'cor' => $validated['cor'],
            'fabricante' => $validated['fabricante'],
            'ano_modelo' => $validated['ano_modelo'],
            'ano_fabricacao' => $validated['ano_fabricacao'],
            'placa' => $validated['placa'],
            'chassi' => $validated['chassi'],
            'modelo_id' => $validated['modelo_id']
        ]);

        return redirect()->to(route('veiculos.index'))->with('success', 'Veículo cadastrado com sucesso');
    }
}
