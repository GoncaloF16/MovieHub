<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
}
