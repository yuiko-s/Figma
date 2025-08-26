<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
Route::get('/', [ItemController::class, 'index'])->name('items.index');
});

Route::get('/item/{id}', [ItemController::class, 'show'])->name('items.show');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/mypage', function () {
    return view('mypage');
})->name('mypage');

Route::get('/sell', function () {
    return view('sell');
})->name('sell');