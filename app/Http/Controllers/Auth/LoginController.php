<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller
{

    /**
     * login
     */
    public function login(Request $request)
    {
        $user_name = $request->input('user_name');
        $password = $request->input('password');
        if (Auth::attempt(['user_name' => $user_name, 'password' => $password], false)) {
            $user = Auth::user();
            return redirect('/inicio');
        } else {
            return redirect('/login')->with('status', 'Usuario no encontrado!');
        }
    }
}