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
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])-> name('admin.dashboard');
    Route::get('admin/movie/show/{id}', [AdminController::class, 'showMovieDetails'])-> name('admin.movie.show');
    Route::delete('admin/movie/delete/{id}', [AdminController::class, 'deleteMovie'])-> name('admin.movie.delete');
    Route::get('admin/movie/add', [AdminController::class, 'addMovie'])-> name('admin.movie.add');
    Route::post('admin/movie/store', [AdminController::class, 'storeMovie'])-> name('admin.movie.store');
    Route::put('admin/movie/update', [AdminController::class, 'updateMovie'])-> name('admin.movie.update');

    Route::get('admin/users/list', [AdminController::class, 'listUsers'])-> name('admin.users.list');
    Route::get('admin/users/show/{id}', [AdminController::class, 'showUsersDetails'])-> name('admin.users.show');
    Route::delete('admin/users/delete/{id}', [AdminController::class, 'deleteUsers'])-> name('admin.users.delete');
    Route::put('admin/users/update', [AdminController::class, 'updateUsers'])-> name('admin.users.update');
});

Route::get('/profile', [ProfileController::class, 'showUser'])->name('user.show') -> middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'updateUser'])-> name('user.update');

Route::middleware(['auth'])->group(function () {
    Route::post('/movies/{id}/favorite', [ProfileController::class, 'toggleFavorito'])->name('filmes.favorito');
});
Route::get('/my-favorites', [ProfileController::class, 'meusFavoritos'])->name('filmes.favoritos.lista')->middleware('auth');


Route::get('/register', [AuthController::class, 'registerForm']) -> name('register');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register.user');

Route::fallback([UtilsController::class, 'fallback']);
