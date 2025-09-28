<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Like;
use App\Models\Purchase;


class ItemController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
         $items = Item::with('likes')
            ->where('user_id', '!=', Auth::id())
            ->get();
        }else{
            $items = Item::with('likes')->get();
            }
            $likes = like::all();

            return view('item', compact('items','likes'));
        
    }


    public function show($id)
    {
        $item = Item::withCount('likes')->findOrFail($id);
        return view('item-detail', compact('item'));
    }

    //いいね
    public function likeItem(Request $request, Item $item)
    {
        $userId = Auth::id();

        $liked_item = $item->likes()->where('user_id', $userId);
        
        if ($liked_item->exists()){
            $liked_item->delete();
            $favorited = false;
                } else {    
                Like::create(['user_id'=>$userId, 'item_id'=>$item->id]);
                $favorited = true;
                }
                 return redirect()->route('items.show', ['id' => $item->id]);
            }
    
    public function likes()
    {
        $items = \Auth::user()->likes()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'items' => $items,
        ];
        return view('items.likes', $data);
    } 

    public function purchase(Request $request)
    {
        $purchase = $request->only(['item_id', 'buyer_id']);
        return view('purchase',compact('purchase'));
    }
    
}