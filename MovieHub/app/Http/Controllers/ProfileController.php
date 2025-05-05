<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Filme;

class ProfileController extends Controller
{
    public function showUser() {
        $ourUser = Auth::user();
        return view('users.profile', compact('ourUser'));
    }


    public function updateUser(Request $request) {
        $request->validate([
            'name' => 'required',
            'image' => 'image'
        ]);

        $user = Auth::user();
        $updateData = ['name' => $request->name];

        if ($request->hasFile('image')) {
            if ($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }

            $photo = Storage::putFile('userPhotos', $request->file('image'));
            $updateData['image'] = $photo;
        }

        DB::table('users')
            ->where('id', $user->id)
            ->update($updateData);

        return redirect()->route('user.show')->with('message', 'User updated successfully!');
    }

    public function toggleFavorito($id)
    {
        $user = auth()->user();
        $filme = Filme::findOrFail($id);

        if ($user->favoritos()->where('filme_id', $filme->id)->exists()) {
            $user->favoritos()->detach($filme->id);
            $mensagem = 'Removido dos favoritos.';
        } else {
            $user->favoritos()->attach($filme->id);
            $mensagem = 'Adicionado aos favoritos.';
        }

        return back()->with('status', $mensagem);

    }

    public function meusFavoritos()
    {
        $userId = auth()->id();

        $filmes = DB::table('favoritos')
            ->join('filmes', 'favoritos.filme_id', '=', 'filmes.id')
            ->where('favoritos.user_id', $userId)
            ->select('filmes.*')
            ->get();

    return view('movies.favorites', compact('filmes'));
    }

}
