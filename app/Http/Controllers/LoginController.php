<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    
    
    // retornoar o formulário de cadastro do usuário
    public function create () {
        return view('auth.login.create');
    }

    public function store (Request $request){

        $email = $request->post('email');
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password'=>$password])) {
            return redirect('/dashboard');
        }
    
        return redirect('/login');
    }

    public function destroy (Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); //csrf

        return redirect('/');
    }

}
