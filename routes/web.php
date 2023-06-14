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
Route::get('/compras/report', [CompraController::class, 'showReport']);
Route::get('/fornecedores/report', [FornecedorController::class, 'showReport']);
Route::get('/equipamentos/report', [EquipamentoController::class, 'showReport']);
Route::get('/compras/{compra_id}', [CompraController::class, 'show'])->name('compras.show');
Route::get('/equipamentos/{compra_id}', [EquipamentoController::class, 'show'])->name('equipamentos.show');
Route::get('/fornecedores/{compra_id}', [FornecedorController::class, 'show'])->name('fornecedores.show');


Route::resource('setor', SetorController::class);
Route::resource('compra', CompraController::class);
Route::resource('usuario', UsuarioController::class);
Route::resource('saidaequipamento', SaidaequimapentoController::class);
Route::resource('desccompras', DesccomprasController::class);
Route::resource('equipamento', EquipamentoController::class);
Route::resource('insumo', InsumoController::class);
Route::resource('fornecedor', FornecedorController::class);
Route::resource('saidainsumo', SaidainsumoController::class);
