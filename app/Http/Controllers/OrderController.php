<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create_order()
    {
        $order = Order::where('id_admin', Auth::user()->id)
            ->where('status', 'cart')
            ->first(); // Lấy đơn hàng của người dùng nếu tồn tại và có status là 'cart'

        if ($order) {
            // Xử lý khi đơn hàng đã tồn tại và có status là 'cart'
        } else {
            // Tạo đơn hàng mới nếu không tìm thấy đơn hàng có status là 'cart'
            $order = new Order();
            $order->id_admin = Auth::user()->id;
            $order->status = 'cart'; // Set status là 'cart'
            $order->save();
        }

        return view('page.cart', compact('order'));
    }

}
