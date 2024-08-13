<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){return redirect()->route('login');});
Route::get('/dang-nhap', [UserController::class, 'login'])->name('login');
Route::post('/dang-nhap-loading', [UserController::class, 'login_'])->name('login_');
Route::get('/dang-ky', [UserController::class, 'register'])->name('register');
Route::post('/dang-ky-loading', [UserController::class, 'register_'])->name('register_');
Route::get('/dang-xuat', [UserController::class, 'logout'])->name('logout');
Route::get('/nhan-vien', [UserController::class, 'index'])->name('user');

Route::get('/tao-don-hang', [OrderController::class, 'create_order'])->name('create_order');
Route::post('/tao-don-hang', [OrderController::class, 'checkout_'])->name('checkout_');
Route::get('/vong-quay-may-man/{id_order}', [OrderController::class, 'luckyWheel'])->name('luckyWheel');
Route::post('/update-lucky-result', [OrderController::class, 'updateLuckyResult'])->name('updateLuckyResult');
Route::get('/trang-chu', [PageController::class, 'home'] )->name('home');
Route::get('/trang-chu-xoa-don-hang/{id_order}', [OrderController::class, 'delHomeOrder'] )->name('delHomeOrder');

Route::get('/thong-ke', [AnalyticsController ::class, 'dashboard'] )->name('dashboard');
Route::get('/don-hang', [OrderController ::class, 'index'] )->name('order');
Route::get('/nhap-kho', [StockController ::class, 'index'] )->name('stock');
Route::get('/hoa-don-nhap-kho', [StockController ::class, 'orderNhapKho'] )->name('orderNhapKho');
Route::post('/tao-hoa-don-nhap-kho', [StockController ::class, 'taoOrderNhapHang'] )->name('taoOrderNhapHang');
Route::get('/don-hang-chi-tiet/{id}', [OrderController ::class, 'detail'] )->name('orderDetail');
Route::get('/nhap-kho-chi-tiet/{id}', [StockController ::class, 'detail'] )->name('stockDetail');


Route::prefix('api')->group(function(){
    // Route::get('/products',[ProductController::class, 'products']
});