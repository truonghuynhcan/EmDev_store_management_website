<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index()
    {
        $cate = Category::get();
        return view('page.category', compact('cate'));
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'names.*' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
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
                $category = new Category();
                $category->name = $name;
                $category->save();
            }
        }

        return redirect()->back()->with('success', 'Đã thêm danh mục thành công');
    }

    public function edit($id)
    {
        $cate = Category::findorfail($id);
        return view('page.editcate', compact('cate'));
    }

    function update(Request $request, $id)
    {

        $cate = Category::findorfail($id);
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
        return redirect()->route('category')->with('success', 'Sửa danh mục thành công');
    }

    public function delete($id)
    {
        $cate = Category::findorfail($id);
        // Kiểm tra xem danh mục có liên quan đến bất kỳ sản phẩm nào không
        if ($cate->products()->count() > 0) {
            return redirect()->back()->with('error', 'Danh mục không thể xóa vì có sản phẩm liên quan');
        }
        $cate->delete();
        return redirect()->route('category')->with('success', 'Xoá danh mục thành công');
    }
}
