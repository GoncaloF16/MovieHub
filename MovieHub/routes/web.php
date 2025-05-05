<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UtilsController;
use App\Http\Controllers\ProfileController;

Route::redirect('/', '/home');

Route::get('/home', [HomeController::class, 'index'])-> name('home');
Route::get('movie/show/{id}', [HomeController::class, 'showMovie'])-> name('movie.show');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])-> name('admin.dashboard');
Route::get('admin/movie/show/{id}', [AdminController::class, 'showMovieDetails'])-> name('admin.movie.show');
Route::get('admin/movie/delete/{id}', [AdminController::class, 'deleteMovie'])-> name('admin.movie.delete');
Route::get('admin/movie/add', [AdminController::class, 'addMovie'])-> name('admin.movie.add');
Route::post('admin/movie/store', [AdminController::class, 'storeMovie'])-> name('admin.movie.store');
Route::put('admin/movie/update', [AdminController::class, 'updateMovie'])-> name('admin.movie.update');

Route::get('/profile', [ProfileController::class, 'showUser'])->name('user.show');
Route::put('/profile/update', [ProfileController::class, 'updateUser'])-> name('user.update');

Route::get('/register', [AuthController::class, 'registerForm']) -> name('register');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register.user');

Route::fallback([UtilsController::class, 'fallback']);
