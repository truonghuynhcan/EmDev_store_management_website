<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function(){return redirect()->route('login');});
Route::get('/dang-nhap', [UserController::class, 'login'])->name('login');
Route::post('/dang-nhap-loading', [UserController::class, 'login_'])->name('login_');
Route::get('/dang-ky', [UserController::class, 'register'])->name('register');
Route::post('/dang-ky-loading', [UserController::class, 'register_'])->name('register_');
Route::get('/dang-xuat', [UserController::class, 'logout'])->name('logout');

Route::get('/tao-don-hang', [OrderController::class, 'create_order'])->name('create_order');
Route::post('/tao-don-hang', [OrderController::class, 'checkout_'])->name('checkout_');
Route::get('/vong-quay-may-man/{id_order}', [OrderController::class, 'luckyWheel'])->name('luckyWheel');
Route::post('/update-lucky-result', [OrderController::class, 'updateLuckyResult'])->name('updateLuckyResult');
Route::get('/trang-chu', [PageController::class, 'home'] )->name('home');

Route::get('/thong-ke', [AnalyticsController ::class, 'dashboard'] )->name('dashboard');


Route::prefix('api')->group(function(){
    // Route::get('/products',[ProductController::class, 'products']
});