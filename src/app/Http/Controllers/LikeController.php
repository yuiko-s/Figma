<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class LikeController extends Controller
{
    public function purchase($itemId)
    {
        Auth::user()->like($itemId);
    }

    public function destroy($itemId)
    {
        Auth::user()->unlike($itemId);
       
    }
}
