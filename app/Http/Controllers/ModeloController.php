<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModeloRequest;
use App\Models\Modelo;
use App\Models\Montadora;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function index()
    {
        $modelos = Modelo::query()
            ->join('montadoras', 'modelos.montadora_id', 'montadoras.id')
            ->select('modelos.*', 'montadoras.nome as montadora')
            ->paginate(10);

        return view('modelos.index', [
            'modelos' => $modelos
        ]);
    }

    public function show($id)
    {
        $modelo = Modelo::query()
            ->join('montadoras', 'modelos.montadora_id', 'montadoras.id')
            ->select('modelos.*', 'montadoras.nome as montadora')
            ->where('modelos.id', '=', $id)
            ->first();

        return view('modelos.show', [
            'modelo' => $modelo
        ]);
    }

    public function create()
    {
        $montadoras = Montadora::get();

        return view('modelos.create', [
            'montadoras' => $montadoras
        ]);
    }

    public function store(ModeloRequest $request)
    {
        $validated = $request->validated();

        $modelo = Modelo::create([
            'nome' => $validated['nome'],
            'montadora_id' => $validated['montadora_id'],
        ]);

        return redirect()->to(route('modelos.index'))->with('success', "O modelo {$modelo->nome} foi cadastrado com sucesso!.");
    }

    public function edit(Modelo $modelo)
    {
        $montadoras = Montadora::get();

        return view('modelos.edit', [
            'modelo' => $modelo,
            'montadoras' => $montadoras,
        ]);
    }

    public function update(ModeloRequest $request, $id)
    {
        $validated = $request->validated();
        $modelo = Modelo::find($id);

        $modelo->update([
            'nome' => $validated['nome'],
            'montadora_id' => $validated['montadora_id'],
        ]);

        $modelo->save();

        return redirect()->to(route('modelos.index'))->with('success', "O modelo {$modelo->nome} foi atualizado com sucesso!.");
    }

    public function delete($id)
    {
        if (!$modelo = Modelo::find($id)) {
            return redirect()->to(route('modelos.index'))->with('error', 'Não foi possível localizar o modelo para excluir!.');
        }

        $success = "Modelo {$modelo->nome} excluido com sucesso!.";
        $modelo->delete();

        return redirect()->to(route('modelos.index'))->with('success', $success);
    }
}
