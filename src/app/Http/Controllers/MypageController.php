<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class MypageController extends Controller
{
    public function index()
    {
        $user  = Auth::user();
        $tab = request('tab', 'sell');
        if (!in_array($tab, ['sell','buy'], true)) {
            $tab = 'sell';
        }

        if ($tab === 'sell') {
            $list = $user->items()->latest()->paginate(12);
        } else {
            $list = $user->purchasedItems()->latest()->paginate(12);
        }

    return view('mypage', [
            'user' => $user,
            'tab'  => $tab,
            'items' => $list,
        ]);
    }
}
