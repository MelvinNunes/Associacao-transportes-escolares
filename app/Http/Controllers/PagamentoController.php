<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Models\Reserva;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    //
    public function store(Request $request)
    {
        $pagamento = new Pagamento();
        $user = auth()->user();
        $id_reserva = request('id_reserva');

        if (strlen($request->contacto) > 8 && $request->contacto == 841234567) {
            $pagamento->contacto = $request->contacto;
        } else {
            return redirect('/reservas' . '/' . $id_reserva)->with('erro', 'O contacto é invalido!');
        }

        $reserva = Reserva::where('id', $id_reserva)->first();

        $pagamento->id_reserva = $id_reserva;
        $pagamento->id_usuario = $user->id;
        $pagamento->data_pagamento = now();
        $pagamento->criado_por = $user->id;
        $pagamento->modificado_por = $user->id;
        $pagamento->save();

        $reserva->estado = "PAGO";
        $reserva->save();

        return redirect('/reservas' . '/' . $id_reserva)->with('success', 'A reserva foi paga com sucesso!');
    }
}
