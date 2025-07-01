<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(LoginUserRequest $request)
    {
        $myData = $request->only('email', 'password');
        if (Auth::attempt($myData)) {
            return to_route('admin.dashboard');
        }
        return to_route('login.form');
    }
}
