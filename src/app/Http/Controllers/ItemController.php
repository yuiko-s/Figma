<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
        $items = Item::where('user_id', '!=', Auth::id());
        }else{
            $items = Item::all();
            }
            return view('item', compact('items'));
        
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('item-detail', compact('item'));
    }
}
