<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
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
}
