<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Models\Modelo;
use App\Models\Montadora;
use App\Models\Veiculo;
use App\Models\VeiculoLog;
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

    public function logs($id)
    {
        $logs = VeiculoLog::query()
            ->join('veiculos', 'veiculo_logs.veiculo_id', 'veiculos.id')
            ->join('locadoras', 'veiculo_logs.locadora_id', 'locadoras.id')
            ->join('modelos', 'veiculos.modelo_id', 'modelos.id')
            ->select(
                'veiculo_logs.*', 
                'veiculos.cor', 
                'veiculos.ano_modelo', 
                'veiculos.placa',
                'veiculos.chassi',
                'modelos.nome as modelo',
                'locadoras.nome_fantasia as locadora'
            )->where('veiculo_logs.veiculo_id', '=', $id)
            ->paginate();
            
        return view('veiculos.logs', [
            'logs' => $logs
        ]);
    }

    public function create()
    {
        $modelos = Modelo::get();

        return view('veiculos.create', [
            'modelos' => $modelos
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

    public function edit(Veiculo $veiculo)
    {
        $modelos = Modelo::get();

        return view('veiculos.edit', [
            'veiculo' => $veiculo,
            'modelos' => $modelos,
        ]);
    }

    public function update(VeiculoRequest $request, $id)
    {
        $validated = $request->validated();
        $veiculo = Veiculo::find($id);

        $veiculo->update([
            'numero_portas' => $validated['numero_portas'],
            'cor' => $validated['cor'],
            'fabricante' => $validated['fabricante'],
            'ano_modelo' => $validated['ano_modelo'],
            'ano_fabricacao' => $validated['ano_fabricacao'],
            'placa' => $validated['placa'],
            'chassi' => $validated['chassi'],
            'modelo_id' => $validated['modelo_id']
        ]);

        $veiculo->save();

        return redirect()->to(route('veiculos.index'))->with('success', "O veículo da placa {$veiculo->placa} foi atualizado com sucesso");
    }

    public function delete($id)
    {
        if (!$veiculo = Veiculo::find($id)) {
            return redirect()->to(route('veiculos.index'))->with('error', 'Não foi possível localizar o veículo para excluir!.');
        }

        $success = "Veículo placa {$veiculo->placa} exclido com sucesso!";
        $veiculo->delete();

        return redirect()->to(route('veiculos.index'))->with('success', $success);
    }
}
