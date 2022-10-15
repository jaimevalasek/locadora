<?php

namespace App\Http\Controllers;

use App\Facades\CalculateDatabaseResults;
use App\Facades\CalculateDatabaseResultsFacade;
use App\Http\Requests\LocadoraRequest;
use App\Models\Endereco;
use App\Models\Locadora;
use App\Models\Veiculo;
use App\Models\VeiculoLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $locadoraVeiculos = CalculateDatabaseResultsFacade::getVeiculosWhereNotIn(
            DB::table('locadora_veiculos')->select('veiculo_id')->get()->toArray()
        );
       
        $veiculos = Veiculo::query()
        ->join('modelos', 'veiculos.modelo_id', 'modelos.id')
        ->select('veiculos.id', 'veiculos.placa', 'modelos.nome')
        ->whereNotIn('veiculos.id', $locadoraVeiculos)
        ->get();

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

            $veiculoLogUpdate = VeiculoLog::query()
                ->where('veiculo_id', '=', $veiculo->id)
                ->whereNull('data_fim')
                ->first();

            if ($veiculoLogUpdate) {
                $veiculoLogUpdate->update([
                    'data_fim' => \Carbon\Carbon::now(),
                ]);
    
                $veiculoLogUpdate->save();
            }

            VeiculoLog::create([
                'modelo' => $veiculo->modelo->nome,
                'montadora' => $veiculo->modelo->montadora->nome,
                'data_inicio' => \Carbon\Carbon::now(),
                'veiculo_id' => $veiculo->id,
                'locadora_id' => $locadora->id,
            ]);
            
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
            $locadora_id = $veiculo->locadora[0]->id;

            $veiculo->locadora()->detach();

            $veiculoLogUpdate = VeiculoLog::query()
                ->where('veiculo_id', '=', $veiculo->id)
                ->where('locadora_id', '=', $locadora_id)
                ->whereNull('data_fim')
                ->first();

            if ($veiculoLogUpdate) {
                $veiculoLogUpdate->update([
                    'data_fim' => \Carbon\Carbon::now(),
                ]);
    
                $veiculoLogUpdate->save();
            }            

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

        $endereco = Endereco::query()
            ->where('locadora_id', '=', $id)->first();

        $endereco->update([
            'cep' => $validated['cep'],
            'rua' => $validated['rua'],
            'numero' => $validated['numero'],
            'bairro' => $validated['bairro'],
            'cidade' => $validated['cidade'],
            'estado' => $validated['estado'],
        ]);

        $endereco->save();
        
        return redirect()->to(route('locadoras.index'))->with('success', 'Locadora atualizada com sucesso!.');
    }

    public function delete($id)
    {
        $verificacaoEstoque = DB::table('locadora_veiculos')->select('veiculo_id')->where('locadora_id', '=', $id)->first();
        
        $locadora = Locadora::find($id);

        if ($verificacaoEstoque) {
            return redirect()->to(route('locadoras.index'))->with('error', 'Não foi possível excluir a locadora porque ela tem carros cadastrados!.');
        }

        $success = "Locadora {$locadora->razao_social} excluida com sucesso!.";
        $locadora->delete();

        return redirect()->to(route('locadoras.index'))->with('success', $success);
    }
}
