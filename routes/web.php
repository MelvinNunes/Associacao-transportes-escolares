<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrinhaController;
use App\Http\Controllers\ClientsController;
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
use App\Http\Controllers\UserController;

Route::get('/', [IndexController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/carrinhas', [CarrinhaController::class, 'index_admin']);

Route::post('/admin/carrinha', [CarrinhaController::class, 'store']);

Route::get('/admin/motoristas', [MotoristaController::class, 'index']);

Route::post('/admin/motorista', [MotoristaController::class, 'store']);

Route::get('/admin/clientes', [ClientsController::class, 'index']);

Route::get('/admin/perfil', [UserController::class, 'admin']);

Route::get('/s', [IndexController::class, 'search_rota']);

Route::get('/contactos', [IndexController::class, 'index_contacts']);

Route::get('/entrar', [AuthController::class, 'index_login']);

Route::get('/registrar', [AuthController::class, 'index_logon']);

Route::get('/carrinhas', [CarrinhaController::class, 'index']);

Route::get('/carrinhas/{rota}', [CarrinhaController::class, 'findOne']);

Route::get('/perfil', [UserController::class, 'me']);

Route::get('/{id}/reservas', [UserController::class, 'get_user_reserves']);

Route::get('/u={id}/reservas/{reserve}', [UserController::class, 'get_reserve']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
