<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $user  = Auth::user(); 
        $tab = request('tab', 'sell'); // デフォは出品した商品
        if (!in_array($tab, ['sell','order'])) {
            $tab = 'sell';
        }

        if ($tab === 'sell') {
            $list = $user->items()->latest()->paginate(12);
        } else { 
            $list = $user->ordersItems()->latest()->paginate(12);
       }

       return view('mypage', [
            'user' => $user,
            'tab'  => $tab,
            'list' => $list,
        ]);
    }
}
