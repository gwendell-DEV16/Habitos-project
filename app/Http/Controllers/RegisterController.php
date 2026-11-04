<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $dados = $request->validated();

        $user = User::create($dados);

        return redirect()
            ->route('site.login')
            ->with('success', 'Cadastro realizado com sucesso!');

            Auth::login($user);

            return redirect()->route('site.dashboard');
    }
}
