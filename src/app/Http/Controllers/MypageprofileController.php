<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageprofileController extends Controller
{
     public function index(){
        return view('mypageprofile');
     }

     public function create(Request $request){
        $form = $request->all();
        return redirect('mypageprofile');
     }
}


