<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function index_login()
    {
        return view('auth.login');
    }

    public function index_logon()
    {
        return view('auth.logon');
    }
}
