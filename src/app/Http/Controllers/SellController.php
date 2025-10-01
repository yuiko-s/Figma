<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class SellController extends Controller
{
    public function create()
    {
        return view('sell'); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image'       => ['nullable','image','mimes:jpeg,png,jpg,gif,svg,webp','max:4096'],
            'category'    => ['required','string','max:50'],
            'condition'   => ['required','string','max:50'],
            'name'        => ['required','string','max:255'],
            'brand'       => ['nullable','string','max:255'],
            'description' => ['required','string'],
            'price'       => ['required','integer','min:1','max:99999999'],
        ]);

        if ($request->hasFile('image')) {
            // storage/app/public/img に保存し、DBには 'img/xxxx.jpg' を入れる
            $data['image'] = $request->file('image')->store('img', 'public');
        }

        $data['user_id']   = Auth::id();
        $data['is_active'] = $data['is_active'] ?? true;
        $data['is_sold']   = $data['is_sold']   ?? false;

        Item::create($data);

       
        return redirect()->route('mypage', ['tab' => 'sell']);
    }
}