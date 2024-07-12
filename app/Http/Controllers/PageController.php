<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home(){
        $orders = Order::where('id_admin', '=',Auth::user()->id)->get();
        return view('page.home', compact('orders'));
    }
}
