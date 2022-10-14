<?php

namespace App\Http\Controllers;

use App\Http\Requests\MontadoraRequest;
use App\Models\Montadora;
use Illuminate\Http\Request;

class MontadoraController extends Controller
{
    public function index()
    {
        $montadoras = Montadora::query()->paginate(10);

        return view('montadoras.index', [
            'montadoras' => $montadoras
        ]);
    }

    public function show(Montadora $montadora)
    {
        return view('montadoras.show', [
            'montadora' => $montadora
        ]);
    }

    public function create()
    {
        return view('montadoras.create');
    }

    public function store(MontadoraRequest $requset)
    {
        $validated = $requset->validated();

        $montadora = Montadora::create([
            'nome' => $validated['nome']
        ]);

        return redirect()->to(route('montadoras.index'))->with('success', "Montadora {$montadora->nome} cadastrada com sucesso!");
    }

    public function edit(Montadora $montadora)
    {
        return view('montadoras.edit', [
            'montadora' => $montadora
        ]);
    }

    public function update(MontadoraRequest $requset, $id)
    {
        $validated = $requset->validated();
        $montadora = Montadora::find($id);

        $montadora->update([
            'nome' => $validated['nome']
        ]);
        $montadora->save();

        return redirect()->to(route('montadoras.index'))->with('success', "Montadora {$montadora->nome} atualizada com sucesso!");
    }

    public function delete($id)
    {
        if (!$montadora = Montadora::find($id)) {
            return redirect()->to(route('montadoras.index'))->with('error', 'Não foi possível localizar a montadora para excluir!.');
        }

        $success = "Montadora {$montadora->nome} exclida com sucesso!";
        $montadora->delete();

        return redirect()->to(route('montadoras.index'))->with('success', $success);
    }
}
