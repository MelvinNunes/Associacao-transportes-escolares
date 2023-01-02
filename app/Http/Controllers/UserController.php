<?php

namespace App\Http\Controllers;

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
        return view('user.profile');
    }

    public function get_user_reserves()
    {
        return view('user.reserves');
    }

    public function get_reserve($id, $reserve)
    {
        if ($id > 1) {
            return view('user.reserve_details');
        }
        return view('user.reserve_details_pay');
    }
}
