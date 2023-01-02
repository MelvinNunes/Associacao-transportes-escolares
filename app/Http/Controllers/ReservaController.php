<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    //
    public function store(Request $request)
    {

        $reserva = new Reserva();

        $reserva->id_usuario = $request->id_usuario;
        $reserva->id_carrinha = $request->id_carrinha;
        $reserva->nr_meses_reservado = $request->nr_meses_reservado;

        $reserva->save();

        return redirect("/")->with("reserva_success", "success");
    }
}
