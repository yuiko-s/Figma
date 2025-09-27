<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\Order;
use App\Models\TrPart;


class PurchaseController extends Controller
{
    // 購入ページ
    public function show(Item $item)
    {
        
        $address = session('address', [
            'postal_code'    => '',
            'shippingaddress'=> '',
            'building_name'  => '',
        ]);

        $paymentOptions = ['コンビニ払い', 'カード払い'];

        return view('purchase', compact('item','address','paymentOptions'));
    }

    public function store(Request $request, Item $item)
    {
        $data = $request->validate([
            'paymentmethod'   => ['required','in:コンビニ払い,カード払い'],
        ]);

        $address = session('address', []);

        Order::create([
            'item_id'         => $item->id,
            'buyer_id'        => Auth::id(),
            'paymentmethod'   => $data['paymentmethod'],
            'paymentprice'    => $item->price,
            'postal_code'     => $address['postal_code'] ?? '',
            'shippingaddress' => $address['shippingaddress'] ?? '',
            'building_name'   => $address['building_name'] ?? '',
        ]);

        return redirect()->route('items.index');
    }

    // 住所変更ページ表示
    public function editAddress(Item $item)
    {
        $address = session('address', [
            'postal_code'    => '',
            'shippingaddress'=> '',
            'building_name'  => '',
        ]);
        return view('address', compact('item','address'));
    }

    // 住所更新
    public function updateAddress(Request $request, Item $item)
    {
        $data = $request->validate([
            'postal_code'     => ['required','string'],
            'shippingaddress' => ['required','string'],
            'building_name'   => ['nullable','string'],
        ]);

        session(['address' => $data]);

        return redirect()->route('purchase', $item->id);
    }
}