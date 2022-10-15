<?php

use App\Http\Controllers\LocadoraController;
use App\Http\Controllers\LocadoraModeloController;
use App\Http\Controllers\LocadoraVeiculoController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\MontadoraController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\VeiculoLogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->to(route('locadoras.index'));
});

Route::get('locadora/delete/{id}', [LocadoraController::class, 'delete'])->name('locadora.delete');
Route::get('locadora/veiculos/{locadora}', [LocadoraController::class, 'veiculos'])->name('locadora.veiculos');
Route::get('locadora/veiculo/{locadora}', [LocadoraController::class, 'veiculo'])->name('locadora.veiculo');
Route::post('locadora/veiculo-locadora/{locadora}', [LocadoraController::class, 'veiculoAttach'])->name('locadora.veiculo-attach');
Route::get('locadora/veiculo-locadora-delete/{locadora}', [LocadoraController::class, 'veiculoDetach'])->name('locadora.veiculo-detach');

Route::get('relatorio/locadora-veiculos', [LocadoraVeiculoController::class, 'index'])->name('relatorio.locadora-veiculos');
Route::get('relatorio/locadora-modelos', [LocadoraModeloController::class, 'index'])->name('relatorio.locadora-modelos');
Route::get('veiculo/logs/{id}', [VeiculoController::class, 'logs'])->name('veiculo.logs');

Route::resource('locadoras', LocadoraController::class)
    ->only('index', 'show', 'create', 'edit', 'store', 'update');

Route::get('montadora/delete/{id}', [MontadoraController::class, 'delete'])->name('montadora.delete');
Route::resource('montadoras', MontadoraController::class)
    ->only('index', 'show', 'create', 'edit', 'store', 'update');

Route::get('veiculo/delete/{id}', [VeiculoController::class, 'delete'])->name('veiculo.delete');
Route::resource('veiculos', VeiculoController::class)
    ->only('index', 'show', 'create', 'edit', 'store', 'update');

Route::get('modelo/delete/{id}', [ModeloController::class, 'delete'])->name('modelo.delete');
Route::resource('modelos', ModeloController::class)
    ->only('index', 'show', 'create', 'edit', 'store', 'update');  
    
Route::resource('veiculo-logs', VeiculoLogController::class)
    ->only('index', 'show');