<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use DB;
use Auth;


class RegisterController extends Controller
{
    //
    public function create () {
        return view('auth.register.create');
    }

    public function store (StoreUserRequest $request) {

        $usuario = new User;
        $usuario->name = $request->post('name');;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();
        
        Auth::login($usuario);

        return redirect('/dashboard');

    }

}
