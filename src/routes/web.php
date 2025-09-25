<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\MypageprofileController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    });
    Route::post('/items/{item}/like', [ItemController::class, 'likeItem'])->name('items.like');

    Route::get('/purchase/{item}',  [PurchaseController::class, 'show'])->name('purchase');
    Route::post('/purchase/{item}', [PurchaseController::class, 'store'])->name('purchase.store');


    Route::get('/purchase/address/{item}',  [PurchaseController::class, 'editAddress'])->name('purchase.address.form');
    Route::post('/purchase/address/{item}', [PurchaseController::class, 'updateAddress'])->name('purchase.address.store');


    Route::get('/order', [ItemController::class, 'order'])->name('order');


    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');

    Route::get('/mypage/profile', [MypageprofileController::class, 'index'])->name('mypage.profile');
    Route::post('/mypage/profile', [MypageprofileController::class, 'store'])->name('mypage.profile.store');
    
    //　ログインしないと表示されないものはここ


Route::get('/', [ItemController::class, 'index'])->name('items.index');

Route::get('/item/{id}', [ItemController::class, 'show'])->name('items.show');


Route::get('/like/{id}',[LikeController::class, 'like'])->name('like');


Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/sell', function () {
    return view('sell');
})->name('sell');