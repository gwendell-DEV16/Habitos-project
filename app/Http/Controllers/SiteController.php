<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function index()
    {

        $name = "Wendell Gomes";
        $habitos = ["ler", "escrever", "pensar"];

        //return view('home', [
        //    'name' => $name,
        //    'habitos' => $habitos
        //]);

        return view('home', compact('name','habitos'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
