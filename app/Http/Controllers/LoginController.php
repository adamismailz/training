<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login() {
        return view('auth.login');
    }

    function loginAttempt() {

        $idAuth = auth()->attempt([

            'email' => request()->email,
            'password' => request()->password,

        ]);
        if($idAuth){
            return redirect()->route('welcome');
        }
        else{
            return redirect()->route('errors.unauthorized');
        }
        }

    function logout(){
        Auth::logout();

        return redirect('login');
    }
    
}
