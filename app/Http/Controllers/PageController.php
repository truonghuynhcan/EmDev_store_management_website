<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home(){
        $food = Product::where('id_category', '=', 1)->get();
        $drink = Product::where('id_category', '=', 2)->get();
        $combo = Product::where('id_category', '=', 3)->get();
        $orders = Order::where('id_admin', '=',Auth::user()->id)->get();
        return view('page.home', compact('orders', 'food', 'drink', 'combo'));
    }
}
