<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
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

        $food = Product::where('id_category', '=', 1)->get();
        $drink = Product::where('id_category', '=', 2)->get();

        return view('page.cart', compact('order', 'food', 'drink'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
