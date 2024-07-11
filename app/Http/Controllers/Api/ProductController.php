<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Lấy danh sách sản phẩm
        $products = Product::all();
        return response()->json($products);
    }

    public function show($id)
    {
        // Lấy thông tin chi tiết sản phẩm
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        // Tạo mới sản phẩm
        $product = new Product();
        $product->id_category = $request->input('id_category');
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->price = $request->input('price');
        $product->salePrice = $request->input('salePrice');
        $product->instock = $request->input('instock', 0);
        $product->sold = $request->input('sold', 0);
        $product->status = $request->input('status', '1');
        $product->save();

        return response()->json($product, 201); // 201 Created
    }

    public function update(Request $request, $id)
    {
        // Cập nhật thông tin sản phẩm
        $product = Product::findOrFail($id);
        $product->id_category = $request->input('id_category');
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->price = $request->input('price');
        $product->salePrice = $request->input('salePrice');
        $product->instock = $request->input('instock', 0);
        $product->sold = $request->input('sold', 0);
        $product->status = $request->input('status', '1');
        $product->save();

        return response()->json($product, 200); // 200 OK
    }

    public function destroy($id)
    {
        // Xóa sản phẩm
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204); // 204 No Content
    }
}
