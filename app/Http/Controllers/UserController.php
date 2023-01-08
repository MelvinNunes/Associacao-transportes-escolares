<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Reserva;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function admin(Request $request)
    {
        return view('admin.profile');
    }

    public function me(Request $request)
    {
        $user = $request->user();
        $user_reserves = Reserva::where('id_usuario', $user->id)->get();
        $total_reservas = count($user_reserves);
        return view('user.profile', ['user' => $user, 'total_reservas' => $total_reservas]);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $user->name = $request->name;
        $user->contact = $request->contact;
        $user->address = $request->address;
        $user->save();
        return redirect('/perfil')->with('user_updated', 'sucess');
    }
}
