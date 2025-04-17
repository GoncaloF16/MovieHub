<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UtilsController;

Route::get('/', [HomeController::class, 'index'])-> name('home');
Route::get('movie/show/{id}', [HomeController::class, 'showMovie'])-> name('movie.show');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])-> name('admin.dashboard');

//Route::view('/login', 'auth.login')->name('login');
//Route::view('/register', 'auth.register')->name('register');

Route::fallback([UtilsController::class, 'fallback']);
