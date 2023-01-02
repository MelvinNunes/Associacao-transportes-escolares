<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use Illuminate\Http\Request;

class MotoristaController extends Controller
{
    //
    public function index()
    {
        $motoristas = Motorista::all();
        return view('admin.drivers', ['motoristas' => $motoristas]);
    }

    public function store(Request $request)
    {
        $motorista = new Motorista();

        $motorista->nome_motorista = $request->nome_motorista;
        $motorista->morada = $request->morada;
        $motorista->nr_carta = $request->nr_carta;
        $motorista->data_nasci = $request->data_nasci;
        $motorista->data_emissao_carta = $request->data_emissao_carta;
        $motorista->criado_por = null;
        $motorista->modificado_por = null;
        $motorista->save();

        return redirect('/admin/motoristas')->with('motorista', 'Adicionado com sucesso');
    }
}
