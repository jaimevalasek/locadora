<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModeloRequest;
use App\Models\Locadora;
use App\Models\Modelo;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class LocadoraVeiculoController extends Controller
{
    public function index(Request $request)
    {
        $modelos = Modelo::get();

        $locadoraVeiculos = Veiculo::query()
            ->join('locadora_veiculos', 'veiculos.id', 'locadora_veiculos.veiculo_id')
            ->join('locadoras', 'locadora_veiculos.locadora_id', 'locadoras.id')
            ->join('modelos', 'veiculos.modelo_id', 'modelos.id')
            ->select('veiculos.placa', 'veiculos.created_at', 'locadoras.nome_fantasia', 'modelos.nome')
            ->when($request->locadora, function($query, $val) {
                if ($val) {
                    $query->where('locadoras.nome_fantasia', 'like', '%' . $val . '%');
                }
            })->when($request->data, function($query, $val) {
                if ($val) {
                    $val = \Carbon\Carbon::createFromFormat('d/m/Y', $val, 'UTC')->format('Y-m-d');
                    $query->whereDate('veiculos.created_at', '>=', $val . ' 00:00:00')
                    ->whereDate('veiculos.created_at', '<=', $val . ' 23:59:59');
                }
            })->when($request->modelo, function($query, $val) {
                if ($val) {
                    $query->where('veiculos.modelo_id', '=', $val);
                }
            })->paginate();
            
        return view('locadora-veiculos.index', [
            'locadoraVeiculos' => $locadoraVeiculos,
            'modelos' => $modelos
        ]);
    }
}
