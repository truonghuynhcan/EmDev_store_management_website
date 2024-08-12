<?php

namespace App\Http\Controllers;

use App\Models\StockEntry;
use App\Models\StockItem;
use Illuminate\Http\Request;

class StockController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = StockEntry::select('id','id_user','name','price','note')->get();
        return view('page.stock', compact('stocks'));
    }
    public function detail($id)
    {
        $stockDetail = StockItem::where('id_stock_entry', $id)->get();
        $stock = StockEntry::findOrFail($id);
        return view('page.stockDetail', compact('stock','stockDetail'));
    }
    
    public function orderNhapKho()
    {
      
        return view('page.orderNhapHang');
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
