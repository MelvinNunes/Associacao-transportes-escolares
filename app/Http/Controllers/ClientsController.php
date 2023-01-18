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
            return view('admin.clients', ['reservas' => $clientes]);
        }
    }
    
    public function delete(){
        $user = auth()->user();
        if ($user->is_admin) {
            $id = request('id'):
            $reserva = Reserva::where('id_usuario', $id)->first();
            $reserva->delete();
            redirect("/admin/clientes")->with("success", "Usuario dissociado com sucesso!"); 
        }
    }
}
