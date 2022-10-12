<?php

use App\Http\Controllers\LocadoraController;
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
    return view('welcome');
});

Route::resource('locadoras', LocadoraController::class)
    ->only('index', 'show', 'edit', 'store');

Route::resource('montadoras', MontadoraController::class)
    ->only('index', 'show', 'store');

Route::resource('veiculos', VeiculoController::class)
    ->only('index', 'show', 'edit', 'store');

Route::resource('modelos', ModeloController::class)
    ->only('index', 'show', 'edit', 'store');  
    
Route::resource('veiculo-logs', VeiculoLogController::class)
    ->only('index', 'store');