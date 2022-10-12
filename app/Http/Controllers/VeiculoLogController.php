<?php

namespace App\Http\Controllers;

use App\Models\VeiculoLog;
use Illuminate\Http\Request;

class VeiculoLogController extends Controller
{
    public function index()
    {
        $veiculosLogs = VeiculoLog::query()->paginate();

        return view('veiculos-logs.index', [
            'veiculosLogs' => $veiculosLogs
        ]);
    }

    public function store()
    {
        
    }
}
