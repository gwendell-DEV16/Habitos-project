<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // GET /login
    public function index()
    {
        return view('login');
    }
}
