<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){

    $users = new User;
    $users = $users->where('email','=', request()->email)->first();

    if($users && Hash::check(request()->password, $users->getAuthPassword())){
        return $users->createToken(time())->plainTextToken;
    }
    return 'Salah Tu Bro!!!';
    }

    public function logout(){

     auth()->user()->currentAccessToken()->delete();

     return 'Dah Logout!!!!!!!!!!!!!!!!!!';
    }

}
