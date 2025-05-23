<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('filmes');

        if (!empty($search)) {
            $query->where('titulo', 'like', '%' . $search . '%');
        }

        $movies = $query ->paginate(10);
        foreach ($movies as $movie) {
            $movie->short_synopsis = Str::limit($movie->sinopse, 20, '...');
        }
        return view('admin.dashboard', compact('movies'));
    }

    public function showMovieDetails($id) {
        $movie = DB::table('filmes')->where('id', $id)->first();

        return view('admin.movie_details', compact('movie'));
    }

    public function deleteMovie($id) {
        DB::table('filmes')
            ->where('id', $id)
            ->delete();

        return redirect()->route('admin.dashboard')->with('delete', 'Movie deleted sucessfuly!');
    }

    public function addMovie() {
        return view('admin.add_movie');
    }

    public function storeMovie(Request $request) {
        $request -> validate([
            'titulo' => 'required|max:50',
            'trailer' => 'required|url',
            'duracao' => 'required|integer',
            'lancamento' => 'required|integer',
            'genero' => 'required|max:50',
            'realizador' => 'required|max:50',
            'sinopse' => 'required|max:750',
            'imdb_rating' => 'required|max:50',
        ]);

        $capaPath = null;

        if ($request->hasFile('capa_file')) {
            $capaPath = $request->file('capa_file')->store('capas', 'public');
        } else {
            return back()->withErrors(['capa_file' => 'É necessário fazer upload de uma imagem'])->withInput();
        }

        DB::table('filmes')->insert([
            'titulo' => $request -> titulo,
            'capa' => $capaPath,
            'trailer' => $request -> trailer,
            'duracao' => $request -> duracao,
            'lancamento' => $request -> lancamento,
            'genero' => $request -> genero,
            'realizador' => $request -> realizador,
            'sinopse' => $request -> sinopse,
            'imdb_rating' => $request -> imdb_rating
        ]);
        return redirect() -> route('admin.dashboard') -> with('add', 'Movie created successfully!');
    }

    public function updateMovie(Request $request){
        //dd($request->all());

        $request -> validate([
            'titulo' => 'required|max:50',
            'trailer' => 'required|url',
            'duracao' => 'required|integer',
            'lancamento' => 'required|integer',
            'genero' => 'required|max:50',
            'realizador' => 'required|max:50',
            'sinopse' => 'required|max:750',
            'imdb_rating' => 'required|max:50',
        ]);

        $filme = DB::table('filmes')->where('id', $request->id)->first();

        $capaPath = $filme->capa;

        if ($request->hasFile('capa_file')) {
            $capaPath = $request->file('capa_file')->store('capas', 'public');
        } else {
            $capaPath = $filme->capa;
             }

        DB::table('filmes')
            -> where('id', $request -> id)
            -> update([
                'titulo' => $request -> titulo,
                'capa' => $capaPath,
                'trailer' => $request -> trailer,
                'duracao' => $request -> duracao,
                'lancamento' => $request -> lancamento,
                'genero' => $request -> genero,
                'realizador' => $request -> realizador,
                'sinopse' => $request -> sinopse,
                'imdb_rating' => $request -> imdb_rating
            ]);
        return redirect() -> route('admin.dashboard') -> with('update', 'Movie updated successfully!');
    }

    public function listUsers(Request $request) {
        $search = $request->input('search');
        $query = DB::table('users');

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $users = $query->paginate(10);
        return view('admin.manage_users', compact('users'));
    }

    public function showUsersDetails($id) {
        $user = DB::table('users')->where('id', $id)->first();

        return view('admin.user_details', compact('user'));
    }

    public function deleteUsers($id) {
        DB::table('users')
            ->where('id', $id)
            ->delete();

        return redirect()->route('admin.users.list')->with('delete', 'User deleted sucessfuly!');
    }


    public function updateUsers(Request $request){
        //dd($request->all());

        $request -> validate([
            'name' => 'required|max:50',
            'user_type' => 'required|max:50',
        ]);

        DB::table('users')
            -> where('id', $request -> id)
            -> update([
                'name' => $request -> name,
                'user_type' => $request -> user_type,
            ]);
        return redirect() -> route('admin.users.list') -> with('update', 'User updated successfully!');
    }
}
