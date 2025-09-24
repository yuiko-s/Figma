<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }

    public function store(User $user,RegisterUserRequest $request) {
        
        $user = [
        'name' => $request->name, 
        'email' => $request->email, 
        'password' => Hash::make($request->password),
        ];
        User::create($user);

        Auth::login($user);

        return redirect('/mypage/profile');
    }

    
}