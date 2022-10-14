<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocadoraRequest;
use App\Models\Endereco;
use App\Models\Locadora;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class LocadoraController extends Controller
{
    public function index()
    {
        $locadoras = Locadora::query()->paginate();

        return view('locadoras.index', [
            'locadoras' => $locadoras
        ]);
    }

    public function show(Locadora $locadora)
    {
        return view('locadoras.show', [
            'locadora' => $locadora
        ]);
    }

    public function veiculos(Locadora $locadora)
    {
        $veiculos = Veiculo::query()
            ->join('locadora_veiculos', 'veiculos.id', 'locadora_veiculos.veiculo_id')
            ->where('locadora_veiculos.locadora_id', '=', $locadora->id)
            ->paginate();

        return view('locadoras.veiculos', [
            'veiculos' => $veiculos,
            'locadora' => $locadora,
        ]);
    }

    public function veiculo(Locadora $locadora)
    {
        $veiculos = Veiculo::get();

        return view('locadoras.veiculo', [
            'locadora' => $locadora,
            'veiculos' => $veiculos,
        ]);
    }

    public function veiculoAttach(Request $request, $id)
    {
        $request->validate([
            'veiculo_id'     => ['required', 'integer'],
        ]);

        $veiculo = Veiculo::query()
            ->join('locadora_veiculos', 'veiculos.id', 'locadora_veiculos.veiculo_id')
            ->where('locadora_veiculos.veiculo_id', '=', $request->veiculo_id)
            ->first();

        if (!$veiculo) {
            $locadora = Locadora::find($id);
            $veiculo = Veiculo::find($request->veiculo_id);

            $locadora->veiculos()->attach($veiculo);
            
            return redirect()->to(route('locadora.veiculos', $id))->with('success', "Veículo adicionado a locadora com sucesso!.");
        }

        return redirect()->to(route('locadora.veiculos', $id))->with('info', "O veículo já adicionado a uma locadora!.");
    }

    public function veiculoDetach($id)
    {
        $temVeiculo = Veiculo::query()
            ->join('locadora_veiculos', 'veiculos.id', 'locadora_veiculos.veiculo_id')
            ->where('locadora_veiculos.veiculo_id', '=', $id)
            ->first();

        if ($temVeiculo) {
            $veiculo = Veiculo::find($id);

            $veiculo->locadora()->detach();
            
            return redirect()->back()->with('success', "Veículo foi removido da locadora com sucesso!.");
        }

        return redirect()->back()->with('error', "O veículo não existe na uma locadora!.");
    }

    public function create()
    {
        return view('locadoras.create');
    }

    public function edit(Locadora $locadora)
    {
        return view('locadoras.edit', [
            'locadora' => $locadora
        ]);
    }

    public function store(LocadoraRequest $request)
    {
        $validated = $request->validated();

        $locadora = Locadora::create([
            'nome_fantasia' => $validated['nome_fantasia'],
            'razao_social' => $validated['razao_social'],
            'cnpj' => $validated['cnpj'],
            'email' => $validated['email'],
            'telefone' => $validated['telefone'],
        ]);

        Endereco::create([
            'cep' => $validated['cep'],
            'rua' => $validated['rua'],
            'numero' => $validated['numero'],
            'bairro' => $validated['bairro'],
            'cidade' => $validated['cidade'],
            'estado' => $validated['estado'],
            'locadora_id' => $locadora->id,
        ]);

        return redirect()->to(route('locadoras.index'))->with('success', 'Locadora criada com sucesso!.');
    }

    public function update(LocadoraRequest $request, $id)
    {
        $validated = $request->validated();
        $locadora = Locadora::find($id);

        $locadora->update([
            'nome_fantasia' => $validated['nome_fantasia'],
            'razao_social' => $validated['razao_social'],
            'cnpj' => $validated['cnpj'],
            'email' => $validated['email'],
            'telefone' => $validated['telefone'],
        ]);
        
        return redirect()->to(route('locadoras.index'))->with('success', 'Locadora atualizada com sucesso!.');
    }

    public function delete($id)
    {
        if (!$locadora = Locadora::find($id)) {
            return redirect()->to(route('locadoras.index'))->with('error', 'Não foi possível localizar a locadora para excluir!.');
        }

        $success = "Locadora {$locadora->razao_social} excluida com sucesso!.";
        $locadora->delete();

        return redirect()->to(route('locadoras.index'))->with('success', $success);
    }
}
