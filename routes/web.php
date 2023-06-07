<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\DesccomprasController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\SaidaequimapentoController;
use App\Http\Controllers\SaidainsumoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UsuarioController;
use App\Models\Saidainsumos;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/tipo', [TiposController::class, 'listar'])->name('listar.tipos');
//Route::get('/tipo/create', [TiposController::class, 'create']);
//Route::get('/tipo/report', [TiposController::class, 'showReport']);
//Route::get('/tipo/{tipo_id}', [TiposController::class, 'show'])->name('tipo.show');
//Route::post('tipo', [TiposController::class, 'store']);
//Route::patch('/tipo/{tipo_id}', [TiposController::class, 'update']);
//Route::delete('/tipo/{tipo_id}', [TiposController::class, 'deletar']);


//Route::get('reserva/reserva/{id}', [ReservasController::class, 'devolucao'])->name('reserva.devolucao');
//Route::resource('local', LocaisController::class);
Route::resource('setor', SetorController::class);
Route::resource('compra', CompraController::class);
Route::resource('usuario', UsuarioController::class);
Route::resource('saidaequipamento', SaidaequimapentoController::class);
Route::resource('desccompras', DesccomprasController::class);
Route::resource('equipamento', EquipamentoController::class);
Route::resource('insumo', InsumoController::class);
Route::resource('fornecedor', FornecedorController::class);
Route::resource('saidainsumo', SaidainsumoController::class);
