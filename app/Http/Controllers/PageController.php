<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function delHomeOrder($id_order)
    {
        // Check if the order exists
        $order = Order::find($id_order);

        if ($order) {
            // Delete the order
            $order->delete();
            // Redirect to the home route with a success message
            return redirect()->route('home')->with('success', 'Order deleted successfully.');
        } else {
            // Redirect to the home route with an error message if the order does not exist
            return redirect()->route('home')->with('error', 'Order not found.');
        }

    }
    public function home()
    {
        $food = Product::where('id_category', '=', 1)->get();
        $drink = Product::where('id_category', '=', 2)->get();
        $combo = Product::where('id_category', '=', 3)->get();
        $orders = Order::where('id_admin', '=', Auth::user()->id)->get();
        return view('page.home', compact('orders', 'food', 'drink', 'combo'));
    }
}
