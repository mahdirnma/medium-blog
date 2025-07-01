<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCotroller extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
