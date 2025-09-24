<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\Order;

class PurchaseController extends Controller
{

    public function purchase($item_id)
    {
        $item = Item::findOrFail($item_id);
        return view('purchase', compact("item"));
    }
    
    //支払い方法登録

    
    //配送先登録

    public function store(Request $request,$item_id)
    {
        
        $order = $request->only(['item_id','buyer_id','paymentprice','paymentmethod','postal_code','shippingaddress']);
            Order::create($order);
        return view('items.index');
    }

    
}
