<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $movies = DB::table('filmes') ->get();
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
            'capa' => 'required|url',
            'trailer' => 'required|url',
            'duracao' => 'required|integer',
            'lancamento' => 'required|integer',
            'genero' => 'required|max:50',
            'realizador' => 'required|max:50',
            'sinopse' => 'required|max:500',
            'imdb_rating' => 'required|max:50',
        ]);

        DB::table('filmes')->insert([
            'titulo' => $request -> titulo,
            'capa' => $request -> capa,
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
            'capa' => 'required|url',
            'trailer' => 'required|url',
            'duracao' => 'required|integer',
            'lancamento' => 'required|integer',
            'genero' => 'required|max:50',
            'realizador' => 'required|max:50',
            'sinopse' => 'required|max:500',
            'imdb_rating' => 'required|max:50',
        ]);

        DB::table('filmes')
            -> where('id', $request -> id)
            -> update([
                'titulo' => $request -> titulo,
                'capa' => $request -> capa,
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
}
