<?php

namespace App\Http\Controllers;

use App\Models\Carrinha;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {

        $carrinhas = Carrinha::all();
        return view('home', ['carrinhas' => $carrinhas]);
    }

    public function index_contacts()
    {
        return view('contact');
    }

    public function search_rota()
    {
        $search = request('rota');

        if ($search) {
            $carrinhas = Carrinha::where([
                ['rota', 'like', '%' . $search . '%']
            ])->get();
        }
        return view('search', ['carrinhas' => $carrinhas, 'search' => $search]);
    }
}
