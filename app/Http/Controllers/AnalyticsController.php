<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function dashboard(){
        return view('analytics.dashboard');
    }
}
