<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        if ($user->is_admin) {
            return view('admin.home', ['user' => $user]);
        }
    }
}
