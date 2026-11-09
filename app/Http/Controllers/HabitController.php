<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Models\User;
use App\Http\Requests\HabitRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HabitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
{
    $userId = Auth::id();

if ($habit->user_id != $userId) {
    abort(403, 'Você não tem permissão para atualizar este hábito.');
}

    $habit->update($request->all());

    return redirect()
        ->route('site.dashboard')
        ->with('success', 'Hábito atualizado com sucesso!');
}

public function edit(Habit $habit)
{
    if ($habit->user_id != Auth::id()) {
        abort(403, 'Você não tem permissão para editar este hábito.');
    }

    return view('edit', compact('habit'));
}

    public function destroy(Habit $habit)
{
    $user = Auth::user();

    if ($habit->user_id != $user->getAuthIdentifier()) {
        abort(403, 'Você não tem permissão para excluir este hábito.');
    }

    $habit->delete();

    return redirect()
        ->route('site.dashboard')
        ->with('success', 'Hábito excluído com sucesso!');
}
}
