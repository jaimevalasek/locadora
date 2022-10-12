<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocadoraRequest;
use App\Models\Locadora;
use Illuminate\Http\Request;

class LocadoraController extends Controller
{
    public function index()
    {
        $locadoras = Locadora::query()->paginate(1);

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

    public function store(LocadoraRequest $request)
    {
        $validated = $request->validated();

        Locadora::create([
            'nome_fantasia' => $validated->nome_fantasia,
            'razao_social' => $validated->razao_social,
            'cnpj' => $validated->cnpj,
            'email' => $validated->email,
            'telefone' => $validated->telefone,
            'cidade' => $validated->cidade,
            'estado' => $validated->estado,
        ]);

        return redirect()->to(route('locadora.index'))->with('success', 'Locadora criada com sucesso!.');
    }

    public function update(LocadoraRequest $request, $id)
    {
        $locadora = Locadora::find($id);
    }
}
