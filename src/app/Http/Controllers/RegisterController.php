<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(RegisterUserRequest $request) {
    \App\Models\User::create([
        'name' => $request->name, 
        'email' => $request->email, 
        'password' => Hash::make($request->password),
    
        ]);
        return '/mypage/profile';
    }

    
}