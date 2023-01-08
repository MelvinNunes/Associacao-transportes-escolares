<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrinhaController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContactosController;
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
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');

Route::get('/admin/carrinhas', [CarrinhaController::class, 'index_admin'])->middleware('auth');

Route::post('/admin/carrinha', [CarrinhaController::class, 'store'])->middleware('auth');

Route::get('/admin/carrinha/{id}', [CarrinhaController::class, 'update_index'])->middleware('auth');

Route::post('/admin/carrinha/update', [CarrinhaController::class, 'update'])->middleware('auth');

Route::post('/admin/carrinha/delete/{id}', [CarrinhaController::class, 'destroy'])->middleware('auth');

Route::get('/admin/carrinhas/s', [CarrinhaController::class, 'search_carrinhas'])->middleware('auth');

Route::get('/admin/motoristas', [MotoristaController::class, 'index'])->middleware('auth');

Route::post('/admin/motorista', [MotoristaController::class, 'store'])->middleware('auth');

Route::get('/admin/motorista/{id}', [MotoristaController::class, 'update_index'])->middleware('auth');

Route::post('/admin/motorista/update', [MotoristaController::class, 'update'])->middleware('auth');

Route::post('/admin/motorista/delete/{id}', [MotoristaController::class, 'destroy'])->middleware('auth');

Route::get('/admin/motoristas/s', [MotoristaController::class, 'search_drivers'])->middleware('auth');

Route::get('/admin/clientes', [ClientsController::class, 'index'])->middleware('auth');

Route::get('/admin/perfil', [UserController::class, 'admin'])->middleware('auth');

Route::get('/s', [IndexController::class, 'search_rota']);

Route::get('/contactos', [IndexController::class, 'index_contacts']);

Route::get('/carrinhas', [CarrinhaController::class, 'index']);

Route::get('/carrinhas/{rota}', [CarrinhaController::class, 'findOne']);

Route::get('/motorista/{id}', [MotoristaController::class, 'get_one'])->middleware('auth');

Route::get('/perfil', [UserController::class, 'me'])->middleware('auth');

Route::post('/perfil', [UserController::class, 'update'])->middleware('auth');

Route::get('/reservas', [ReservaController::class, 'get_user_reserves'])->middleware('auth');

Route::post('/reservar', [ReservaController::class, 'store'])->middleware('auth');

Route::get('/reservas/{id}', [ReservaController::class, 'get_reserve'])->middleware('auth');

Route::post('/reserva/pagar', [PagamentoController::class, 'store'])->middleware('auth');

Route::post('/reseva/apagar/{id}', [ReservaController::class, 'destroy'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
