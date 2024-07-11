<?php

use App\Http\Controllers\OrderController;
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

Route::get('/tao-don-hang', [OrderController::class, 'create_order'])->name('create_order');
Route::get('/trang-chu', function () {
    return view('page.home');
})->name('home');
