<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        if ($user->is_admin) {
            $clientes = Reserva::all();
            return view('admin.clients', ['clientes' => $clientes]);
        }
    }
}
