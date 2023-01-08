<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MotoristaController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        if ($user->is_admin) {
            $motoristas = Motorista::all();
            return view('admin.drivers', ['motoristas' => $motoristas]);
        }
        return redirect('/');
    }

    public function get_one($id)
    {
        $motorista = Motorista::where('id', $id)->first();
        return view('reserva.motorista', ['motorista' => $motorista]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->is_admin) {
            $motorista = new Motorista();
            if (strlen($request->nome_motorista) != 0) {
                $motorista->nome_motorista = $request->nome_motorista;
            } else {
                return redirect('/admin/motoristas')->with('erro_adding', 'O nome do motorista não pode ser nulo!');
            }
            if (strlen($request->contacto) > 5) {
                $motorista->contacto = $request->contacto;
            } else {
                return redirect('/admin/motoristas')->with('erro_adding', 'O contacto do motorista deve possuir no minimo 5 digitos!');
            }
            $motorista->morada = $request->morada;
            $motorista->nr_carta = $request->nr_carta;
            $age = Carbon::parse($request->data_nasci)->age;
            if ($age >= 21) {
                $motorista->data_nasci = $request->data_nasci;
            } else {
                return redirect('/admin/motoristas')->with('erro_adding', 'Motorista é menor de 21 anos!');
            }
            if ($request->data_emissao_carta < now()) {
                $motorista->data_emissao_carta = $request->data_emissao_carta;
            } else {
                return redirect('/admin/motoristas')->with('erro_adding', 'A data de emissão da carta esta no futuro!');
            }
            $motorista->criado_por = $user->id;
            $motorista->modificado_por = $user->id;
            $motorista->save();
            return redirect('/admin/motoristas')->with('motorista', 'Adicionado com sucesso');
        }
        return redirect('/');
    }

    public function update_index($id)
    {
        $user = auth()->user();
        if ($user->is_admin) {
            $motorista = Motorista::find($id);
            if (!empty($motorista)) {
                return view('admin.driver', ['motorista' => $motorista]);
            }
            return redirect('/');
        }
        return redirect('/');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        if ($user->is_admin) {
            $motorista = Motorista::find($request->id);
            if (!empty($motorista)) {
                if (strlen($request->nome_motorista) != 0) {
                    $motorista->nome_motorista = $request->nome_motorista;
                } else {
                    return redirect('/admin/motoristas')->with('erro_adding', 'O nome do motorista não pode ser nulo!');
                }
                if (strlen($request->contacto) > 5) {
                    $motorista->contacto = $request->contacto;
                } else {
                    return redirect('/admin/motoristas')->with('erro_adding', 'O contacto do motorista deve possuir no minimo 5 digitos!');
                }
                $motorista->morada = $request->morada;
                $motorista->nr_carta = $request->nr_carta;
                $age = Carbon::parse($request->data_nasci)->age;
                if ($age >= 21) {
                    $motorista->data_nasci = $request->data_nasci;
                } else {
                    return redirect('/admin/motoristas')->with('erro_adding', 'Motorista é menor de 21 anos!');
                }
                if ($request->data_emissao_carta < now()) {
                    $motorista->data_emissao_carta = $request->data_emissao_carta;
                } else {
                    return redirect('/admin/motoristas')->with('erro_adding', 'A data de emissão da carta esta no futuro!');
                }
                $motorista->modificado_por = $user->id;
                $motorista->save();
                return redirect('/admin/motoristas')->with('updated', 'success');
            }
            return redirect('/');
        }
        return redirect('/');
    }

    public function destroy($id)
    {
        $user = auth()->user();
        if ($user->is_admin) {
            $motorista = Motorista::find($id);
            if (!empty($motorista)) {
                $motorista->delete();
                return redirect('/admin/motoristas')->with('deleted', 'success');
            }
            return redirect('/');
        }
        return redirect('/');
    }

    public function search_drivers()
    {

        $search = request('nome_motorista');

        if ($search) {
            $motoristas = Motorista::where([
                ['nome_motorista', 'like', '%' . $search . '%']
            ])->get();
            return view('admin.driver_search', ['motoristas' => $motoristas, 'search' => $search]);
        }
        return redirect('/');
    }
}
