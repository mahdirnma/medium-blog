<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
            if (Gate::allows('isAdmin')) {
                return to_route('admin.dashboard');
            }
            if (Gate::allows('isUser')) {
                return to_route('writer.posts.index');
            }
        }
        return to_route('login.form');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login.form');
    }
}
