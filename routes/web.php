
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HabitController;


// SITE
Route::get('/', [SiteController::class, 'index'])
    ->name('site.index');

// LOGIN
Route::get('/login', [LoginController::class, 'index'])
    ->name('site.login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('auth.login');

// CADASTRO
Route::get('/cadastro', [RegisterController::class, 'index'])
    ->name('site.register');

Route::post('/cadastro', [RegisterController::class, 'store'])
    ->name('auth.register');

// DASHBOARD / LOGOUT
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [SiteController::class, 'dashboard'])
        ->name('site.dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('auth.logout');

//Habits


Route::get('/dashboard/create', [HabitController::class, 'create'])
    ->name('habits.create');

Route::post('/dashboard/habits', [HabitController::class, 'store'])
    ->name('habits.store');
Route::delete('/dashboard/habits/{habit}', [HabitController::class, 'destroy'])
    ->name('habits.destroy');
Route::put('/dashboard/habits/{habit}', [HabitController::class, 'update'])
    ->name('habit.update');
Route::get('/dashboard/habits/{habit}', [HabitController::class, 'edit'])
    ->name('habit.edit');

});
