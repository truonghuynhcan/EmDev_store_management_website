<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function dashboard()
    {
        $totalRevenue = Order::where('status', 'paid')->sum('total_money');
        return view('analytics.dashboard', compact('totalRevenue'));
    }
}
