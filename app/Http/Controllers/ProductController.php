<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('page.product', compact('products'));
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'names.*' => [
                'required',
                function($attribute, $value, $fail) use ($request) {
                    $names = $request->input('names');
                    if (count(array_filter($names)) !== count(array_unique(array_filter($names)))) {
                        return $fail('Các danh mục không được trùng nhau.');
                    }
                },
            ],
        ], [
            'names.*.required' => 'Vui lòng nhập tên danh mục',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Lưu các danh mục vào cơ sở dữ liệu
        foreach ($request->input('names') as $name) {
            if (!empty($name)) {
                $Product = new Product();
                $Product->name = $name;
                $Product->save();
            }
        }
    
        return redirect()->back()->with('success', 'Đã thêm danh mục thành công');
    }

    public function edit($id)
    {
        $cate = Product::findorfail($id);
        return view('page.editcate', compact('cate'));
    }

    function update(Request $request,$id)
    {
        
        $cate = Product::findorfail($id);
        $request->validate([
            'name' => [
            'required',
            Rule::unique('categories')->ignore($cate->id),
        ],
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Tên danh mục bị trùng',
        ]);
        $cate->name = $request->name;
        $cate->save();
        return redirect()->route('Product')->with('success', 'Sửa danh mục thành công');
    }

    public function delete($id)
    {
        $cate = Product::findorfail($id);
        $cate->delete();
        return redirect()->route('Product')->with('success', 'Xoá danh mục thành công');
    }
}
