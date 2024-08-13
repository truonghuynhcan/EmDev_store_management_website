<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockEntry;
use App\Models\StockItem;
use App\Models\User;
use Illuminate\Http\Request;

class StockController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = StockEntry::select('id', 'id_user', 'name', 'price', 'note')->get();
        return view('page.stock', compact('stocks'));
    }
    public function detail($id)
    {
        $stockDetail = StockItem::where('id_stock_entry', $id)->get();
        $stock = StockEntry::findOrFail($id);
        return view('page.stockDetail', compact('stock', 'stockDetail'));
    }

    public function orderNhapKho()
    {
        $products = Product::select('id', 'name')->get();
        $users = User::select('id', 'name')->get();
        $soLanNhapKho = StockEntry::count() + 1;
        return view('page.orderNhapHang', compact('products', 'users', 'soLanNhapKho'));
    }
    public function taoOrderNhapHang(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'note' => 'nullable|string',
            'id_user' => 'exists:users,id',
            'tongtien' => 'required|numeric|min:0',
        
            'nguyenlieu.*' => 'required|string',
            'tensanpham.*' => 'required|string',
            'soluong.*' => 'required|numeric|min:1',
            'donvi.*' => 'required|string',
            'dongia.*' => 'required|numeric|min:0',
        ], [
            'name.required' => 'Vui lòng điền Tên Hóa Đơn',
            'name.string' => 'Tên Hóa Đơn phải là chuỗi ký tự.',
            'name.max' => 'Tên Hóa Đơn không được vượt quá 255 ký tự.',
            
            'id_user.required' => 'Vui lòng điền Người Nhập Hàng',
            'id_user.exists' => 'Người dùng được chọn không tồn tại trong hệ thống.',

            'tongtien.required' => 'Vui lòng điền Thêm Sản Phẩm',
        
            'nguyenlieu.*.required' => 'Vui lòng điền Nguyên liệu',
            'nguyenlieu.*.string' => 'Nguyên liệu phải là chuỗi ký tự.',
        
            'tensanpham.*.required' => 'Tên Vui lòng điền Tên Sản Phẩm',
            'tensanpham.*.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
        
            'soluong.*.required' => 'Vui lòng điền Số Lượng',
            'soluong.*.numeric' => 'Số lượng phải là một số.',
            'soluong.*.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
        
            'donvi.*.required' => 'Vui lòng điền Đơn Vị',
            'donvi.*.string' => 'Đơn vị phải là chuỗi ký tự.',
        
            'dongia.*.required' => 'Vui lòng điền Đơn Giá',
            'dongia.*.numeric' => 'Đơn giá phải là một số.',
            'dongia.*.min' => 'Đơn giá không được nhỏ hơn 0.',
        
        ]);

        $s = new StockEntry();
        $s->name = $request->input('name');
        $s->note = $request->input('note') ?? null;
        $s->price = $request->input('tongtien');
        $s->id_user = $request->input('id_user');
        $s->save();

        // lấy id order nhập hàng
        $s = StockEntry::where('name', $request->input('name'))->select('id')->first();
        // $id_sp = $request->id_sp;
        $nguyenlieu = $request->nguyenlieu;
        $tensanpham = $request->tensanpham;
        $soluong = $request->soluong;
        $donvi = $request->donvi;
        $dongia = $request->dongia;

        foreach ($tensanpham as $index => $tenSanPham) {
            $item = new StockItem();
            $item->id_stock_entry = $s->id;
            $item->material_product = $nguyenlieu[$index];
            $item->name_product = $tenSanPham;
            $item->quantity = $soluong[$index];
            $item->unit = $donvi[$index];
            $item->price = $dongia[$index];
            $item->save();
        }

        return redirect()->route('stock');
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
