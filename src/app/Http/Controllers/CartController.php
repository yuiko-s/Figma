<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        // 商品存在チェック
        $item = Item::findOrFail($id);

        // 簡易実装：セッションに商品IDを追加
        $cart = $request->session()->get('cart', []);
        $cart[] = $item->id;
        $request->session()->put('cart', $cart);

    }
}
