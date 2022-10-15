<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocadoraModeloController extends Controller
{
    public function index(Request $request)
    {
        $locadoraModelos = Modelo::query()
            ->join('montadoras', 'modelos.montadora_id', 'montadoras.id')
            ->join('veiculos', 'modelos.id', 'veiculos.modelo_id')
            ->join('locadora_veiculos', 'veiculos.id', 'locadora_veiculos.veiculo_id')
            ->join('locadoras', 'locadora_veiculos.locadora_id', 'locadoras.id')
            ->select(DB::raw('count(veiculos.id) as veiculos'), 'locadoras.nome_fantasia', 'modelos.nome', 'montadoras.nome as montadora')
            ->groupBy('locadoras.id', 'modelos.nome')
            ->when($request->locadora, function($query, $val) {
                $query->where('locadoras.nome_fantasia', 'like', '%' . $val . '%');
            })->paginate();
        
        return view('locadora-modelos.index', [
            'locadoraModelos' => $locadoraModelos
        ]);
    }
}
