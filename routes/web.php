
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [SiteController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
