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
}
