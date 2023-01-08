<?php

namespace App\Http\Controllers;

use App\Models\Carrinha;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    //
    public function store(Request $request)
    {
        $rota = request('rota');
        $carrinha_id = request('id_carrinha');

        $user = auth()->user();

        $carrinha = Carrinha::where('id', $carrinha_id)->first();

        if ($carrinha->nr_lugares_ocupados > $carrinha->nr_lugares) {
            return redirect("/carrinhas" .  "/" . $rota)->with("error", "A carrinha já excedeu a quantidade máxima de passageiros!");;
        }

        $reservou = Reserva::where('id_usuario', $user->id)->where('id_carrinha', $carrinha_id)->first();

        if (empty($reservou)) {
            $reserva = new Reserva();
            $reserva->id_usuario = $user->id;
            $reserva->id_carrinha = $request->id_carrinha;
            $reserva->estado = "PENDENTE";
            if ($request->nr_meses_reservado < 12) {
                $reserva->nr_meses_reservado = $request->nr_meses_reservado;
            } else {
                return redirect("/carrinhas" .  "/" . $rota)->with("error", "Só pode reservar uma carrinha até 1 ano (12 meses)!");
            }
            $reserva->save();

            $lugares_ocupados = $carrinha->nr_lugares_ocupados + 1;
            $carrinha->nr_lugares_ocupados = $lugares_ocupados;
            $carrinha->save();


            return redirect("/reservas")->with("success_reserva", "Carrinha reservada com sucesso. Proceda para o pagamento!");
        }
        return redirect('/');
    }

    public function get_user_reserves()
    {
        $user = auth()->user();
        $id = $user->id;
        $reservas = Reserva::where('id_usuario', $id)->get();
        return view('user.reserves', ['reservas' => $reservas]);
    }

    public function get_reserve($id)
    {
        $user = auth()->user();
        $reserve = Reserva::where('id', $id)->where('id_usuario', $user->id)->first();

        if (empty($reserve)) {
            return redirect('/');
        }

        $carrinha = Carrinha::where('id', $reserve->id_carrinha)->firstOrFail();

        $lugares_disponiveis = $carrinha->nr_lugares - $carrinha->nr_lugares_ocupados;

        if (!empty($reserve)) {
            return view('user.reserve_details', ['reserva' => $reserve, 'lugares_disponiveis' => $lugares_disponiveis]);
        }

        $carrinha = Carrinha::where('id', $id)->firstOrFail();
        $rota = $carrinha->rota;
        return redirect('/carrinhas' . '/' . $rota);
    }


    public function destroy($id)
    {
        $reserva = Reserva::where('id', $id)->first();
        $user = auth()->user();
        if ($reserva->id_usuario = $user->id) {
            $reserva->delete();
            return redirect('/reservas')->with('deleted', 'Reserva cancelada com sucesso!');
        }
        return redirect('/');
    }
}
