<?php

namespace App\Http\Controllers;

use App\Models\Carrinha;
use App\Models\Motorista;
use App\Models\Reserva;
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
        $lugares_disponiveis = $carrinha->nr_lugares - $carrinha->nr_lugares_ocupados;

        $user = auth()->user();

        if (!empty($user)) {
            $reservou = Reserva::where('id_usuario', $user->id)->where('id_carrinha', $carrinha->id)->first();
            return view('reserva.reserve', ['carrinha' => $carrinha, 'user_id' => $user->id, 'lugares_disponiveis' => $lugares_disponiveis, 'reservou' => $reservou]);
        }
        return view('reserva.reserve', ['carrinha' => $carrinha, 'lugares_disponiveis' => $lugares_disponiveis]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->is_admin) {
            $carrinha = new Carrinha();
            if (strlen($request->rota) > 5) {
                $carrinha->rota = $request->rota;
            } else {
                return redirect("/admin/carrinhas")->with("error", "Adicione um nome de rota mais inclusivo!");
            }
            if ($request->id_motorista > 0) {
                $carrinha->id_motorista = $request->id_motorista;
            } else {
                return redirect("/admin/carrinhas")->with("error", "O motorista não pode ser nulo!");
            }
            if (!strlen($request->contacto) < 5) {
                $carrinha->contacto = $request->contacto;
            } else {
                return redirect("/admin/carrinhas")->with("error", "O contacto deve ter no minimo 5 digitos!");
            }
            if ($request->nr_lugares < 100 && $request->nr_lugares >= 5) {
                $carrinha->nr_lugares = $request->nr_lugares;
                $carrinha->nr_lugares_ocupados = 0;
            } else {
                return redirect("/admin/carrinhas")->with("error", "A carrinha deve ter no minimo 5 lugares e no maximo 100!");
            }
            if ($request->preco > 0) {
                $carrinha->preco = $request->preco;
            } else {
                return redirect("/admin/carrinhas")->with("error", "Determine um preço mensal para a sua carrinha!");
            }
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $requestImage = $request->image;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $request->image->move(public_path("img/carrinhas"), $imageName);
                $carrinha->image = $imageName;
            }
            $carrinha->criado_por = $user->id;
            $carrinha->modificado_por = $user->id;
            $carrinha->save();
            return redirect("/admin/carrinhas")->with("carrinha", "carrinha adicionada");
        }
        return redirect('/');
    }

    public function update_index($id)
    {
        $user = auth()->user();
        if ($user->is_admin) {
            $carrinha = Carrinha::find($id);
            $motoristas = Motorista::all();
            $motorista = Motorista::where('id', $carrinha->id_motorista)->first();
            if (!empty($carrinha)) {
                return view('admin.bus', ['carrinha' => $carrinha, 'motoristas' => $motoristas, 'motorista' => $motorista]);
            }
            return redirect('/');
        }
        return redirect('/');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        if ($user->is_admin) {
            $carrinha = Carrinha::find($request->id);
            if (!empty($carrinha)) {
                if ($request->hasFile('image') && $request->file('image')->isValid()) {
                    $requestImage = $request->image;
                    $extension = $requestImage->extension();
                    $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
                    $request->image->move(public_path("img/carrinhas"), $imageName);
                    $carrinha->image = $imageName;
                }
                $carrinha->id_motorista = $request->id_motorista;
                $carrinha->contacto = $request->contacto;
                $carrinha->rota = $request->rota;
                $carrinha->nr_lugares = $request->nr_lugares;
                $carrinha->preco = $request->preco;
                $carrinha->criado_por = $user->id;
                $carrinha->save();
                return redirect('/admin/carrinhas')->with('updated', 'success');
            }
            return redirect('/');
        }
        return redirect('/');
    }

    public function destroy($id)
    {
        $user = auth()->user();
        if ($user->is_admin) {
            $carrinha = Carrinha::find($id);
            if (!empty($carrinha)) {
                $carrinha->delete();
                return redirect('/admin/carrinhas')->with('deleted', 'success');
            }
            return redirect('/');
        }
        return redirect('/');
    }

    public function search_carrinhas()
    {
        $search = request('rota');
        if ($search) {
            $carrinhas = Carrinha::where([
                ['rota', 'like', '%' . $search . '%']
            ])->get();
            return view('admin.bus_search', ['carrinhas' => $carrinhas, 'search' => $search]);
        }
        return redirect('/');
    }
}
