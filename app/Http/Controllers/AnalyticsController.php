<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function dashboard()
    {
        $totalRevenue = Order::where('status', 'paid')->sum('total_money');

        $countSoldProducts = OrderDetail::select('id_product', OrderDetail::raw('SUM(quantity) as total_sold'))
                                        ->with('product')
                                        ->groupBy('id_product')
                                        ->get();
        
        $totalSoldProducts = OrderDetail::sum('quantity');

        $totalUser = Order::count('id');

        $revenueByDay = Order::select(Order::raw('DATE(created_at) as date'), Order::raw('SUM(total_money) as total_revenue'))
                             ->where('status', 'paid')
                             ->groupBy(Order::raw('DATE(created_at)'))
                             ->orderBy('date')
                             ->get()
                             ->map(function ($item) {
                                $item->date = \Carbon\Carbon::parse($item->date)->format('d/m/Y');
                                return $item;
                            });
        // dd($countSoldProducts);
        return view('analytics.dashboard', compact('totalRevenue', 'countSoldProducts','totalSoldProducts','totalUser','revenueByDay'));
    }
}

