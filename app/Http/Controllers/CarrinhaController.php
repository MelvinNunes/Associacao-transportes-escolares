<?php

namespace App\Http\Controllers;

use App\Models\Carrinha;
use App\Models\Motorista;
use Illuminate\Http\Request;

class CarrinhaController extends Controller
{
    //
    public function index()
    {

        $carrinhas = Carrinha::all();
        return view('carrinha.buslist', ['carrinhas' => $carrinhas]);
    }

    public function index_admin()
    {
        $carrinhas = Carrinha::all();
        $motoristas = Motorista::all();

        return view('admin.schoolbuses', ['carrinhas' => $carrinhas, 'motoristas' => $motoristas]);
    }

    public function find($id)
    {
        $carrinha = Carrinha::find($id);
        return view('reserva.reserve', ['carrinha' => $carrinha]);
    }

    public function findOne($rota)
    {
        $carrinha = Carrinha::where('rota', $rota)->firstOrFail();
        return view('reserva.reserve', ['carrinha' => $carrinha]);
    }

    public function store(Request $request)
    {
        $carrinha = new Carrinha();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $request->image->move(public_path("img/carrinhas"), $imageName);
        }

        $carrinha->image = $imageName;
        $carrinha->id_motorista = $request->id_motorista;
        $carrinha->contacto = $request->contacto;
        $carrinha->rota = $request->rota;
        $carrinha->nr_lugares = $request->nr_lugares;
        $carrinha->preco = $request->preco;
        // $carrinha->criado_por = 
        // $carrinha->modificado_por = 
        $carrinha->save();

        return redirect("/admin/carrinhas")->with("carrinha", "carrinha adicionada");
    }
}
