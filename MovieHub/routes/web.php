<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UtilsController;

Route::get('/', [HomeController::class, 'index'])-> name('home');
Route::get('movie/show/{id}', [HomeController::class, 'showMovie'])-> name('movie.show');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])-> name('admin.dashboard');
Route::get('admin/movie/show/{id}', [AdminController::class, 'showMovieDetails'])-> name('admin.movie.show');
Route::get('admin/movie/delete/{id}', [AdminController::class, 'deleteMovie'])-> name('admin.movie.delete');
Route::get('admin/movie/add', [AdminController::class, 'addMovie'])-> name('admin.movie.add');
Route::post('admin/movie/store', [AdminController::class, 'storeMovie'])-> name('admin.movie.store');
Route::put('admin/movie/update', [AdminController::class, 'updateMovie'])-> name('admin.movie.update');

//Route::view('/login', 'auth.login')->name('login');
//Route::view('/register', 'auth.register')->name('register');

Route::fallback([UtilsController::class, 'fallback']);
