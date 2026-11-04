<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

    public function dashboard(): View
    {
        $user = Auth::user();

        $habits = $user->habits;

        return view('dashboard', compact('habits'));
    }
}
