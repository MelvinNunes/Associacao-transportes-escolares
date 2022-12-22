<?php

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
    return view('home');
});

Route::get('/admin', function () {
    return view('admin.home.home');
});

Route::get('/admin/carrinhas', function () {
    return view('admin.carrinhas.schoolbuses');
});

Route::get('/admin/motoristas', function () {
    return view('admin.motoristas.drivers');
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
