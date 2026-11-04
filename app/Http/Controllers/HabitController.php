<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Models\User;
use App\Http\Requests\HabitRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

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
    public function store(HabitRequest $request)
    {
        $validated = $request->validated();

        /** @var User $user */
        $user = Auth::user();

        $user->habits()->create($validated);

        return redirect()
            ->route('site.dashboard')
            ->with('success', 'Hábito criado com sucesso!');
    }

    public function edit(Habit $habit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habit $habit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        //
    }
}

