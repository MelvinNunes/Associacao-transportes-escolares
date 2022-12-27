<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', [IndexController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/carrinhas', function () {
    return view('admin.schoolbuses');
});

Route::get('/admin/motoristas', function () {
    return view('admin.drivers');
});

Route::get('/admin/clientes', function () {
    return view('admin.clients');
});

Route::get('/admin/perfil', function () {
    return view('admin.profile');
});

Route::get('/contactos', function () {
    return view('contact');
});

Route::get('/entrar', function () {
    return view('auth.login');
});

Route::get('/registrar', function () {
    return view('auth.logon');
});

Route::get('/carrinhas', function () {
    return view('carrinha.buslist');
});

Route::get('/carrinhas/nome', function () {
    return view('reserva.reserve');
});

Route::get('/perfil', function () {
    return view('user.profile');
});

Route::get('/userid/reservas', function () {
    return view('user.reserves');
});

Route::get('/user/reservas/id', function () {
    return view('user.reserve_details');
});

Route::get('/userid/reservas/id', function () {
    return view('user.reserve_details_pay');
});
