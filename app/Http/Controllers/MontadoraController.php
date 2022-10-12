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

    public function store(MontadoraRequest $requset)
    {
        $validated = $requset->validated();

        Montadora::create([
            'nome' => $validated['nome']
        ]);

        return redirect()->to(route('montadora.index'))->with('success', 'Montadora cadastrada com sucesso!');
    }
}
