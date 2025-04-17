<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $order = $request->input('order', 'asc');

        $filmes = Filme::when($search, function ($query, $search) {
                return $query->where('titulo', 'like', "%{$search}%");
            })
            ->orderBy('titulo', $order)
            ->paginate(8);

        return view('index', compact('filmes'));
    }


    public function showMovie($titulo) {
        $filme = DB::table('filmes')
            -> where('titulo', $titulo)
            -> first();
        return view('movies.show_movie', compact('filme'));
    }

}
