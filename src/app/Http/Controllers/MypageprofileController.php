<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MypageprofileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $profile = $user->profile;
        return view('mypageprofile', compact('user', 'profile'));
    }

    public function save(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name'          => ['required','string','max:255'],
            'postal_code'   => ['nullable','string','max:20'],
            'address'       => ['nullable','string','max:255'],
            'building_name' => ['nullable','string','max:255'],
            'image'         => ['nullable','image','mimes:jpeg,png,jpg,gif,svg,webp','max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('img', 'public');
        }

    $user->profile()->updateOrCreate([], $data);

        return redirect()->route('items.index');
    }
}