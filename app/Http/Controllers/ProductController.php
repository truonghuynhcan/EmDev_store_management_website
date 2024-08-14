<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
        $categories = Category::get();
        return view('page.product', compact('products', 'categories'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'id_category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
        ], [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'id_category.required' => 'Danh mục sản phẩm là bắt buộc.',
            'id_category.exists' => 'Danh mục sản phẩm không tồn tại.',
            'image.image' => 'Vui lòng chọn một ảnh hợp lệ.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
            'price.required' => 'Giá là bắt buộc.',
            'price.numeric' => 'Giá phải là một số.',
            'sale_price.numeric' => 'Giá sale phải là một số.',
            'sale_price.lt' => 'Giá sale phải nhỏ hơn giá gốc.',
        ]);


        // Tạo đối tượng Product
        $product = new Product();
        $product->name = $request->name;
        $product->id_category = $request->id_category;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;

        // Xử lý ảnh nếu có
        if ($request->hasFile('image')) {
            // Lấy file ảnh
            $image = $request->file('image');

            // Tạo tên file ảnh duy nhất
            $imageName = time() . '.' . $image->extension();

            // Di chuyển file ảnh đến thư mục public/images
            $image->move(public_path('images'), $imageName);

            // Lưu tên file ảnh vào cơ sở dữ liệu
            $product->image = $imageName;
        }

        // Lưu thông tin sản phẩm
        $product->save();

        return redirect()->back()->with('success', 'Đã thêm sản phẩm thành công');
    }

    public function edit($id)
    {
        $pro = Product::findorfail($id);
        $categories = Category::get();
        return view('page.editpro', compact('pro', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'id_category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
        ], [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'id_category.required' => 'Danh mục sản phẩm là bắt buộc.',
            'id_category.exists' => 'Danh mục sản phẩm không tồn tại.',
            'image.image' => 'Vui lòng chọn một ảnh hợp lệ.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
            'price.required' => 'Giá là bắt buộc.',
            'price.numeric' => 'Giá phải là một số.',
            'sale_price.numeric' => 'Giá sale phải là một số.',
            'sale_price.lt' => 'Giá sale phải nhỏ hơn giá gốc.',
        ]);

        // Tìm sản phẩm cần cập nhật
        $product = Product::findOrFail($id);

        // Cập nhật thông tin sản phẩm
        $product->name = $request->name;
        $product->id_category = $request->id_category;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;

        // Xử lý ảnh nếu có
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($product->image && file_exists(public_path('images/' . $product->image))) {
                unlink(public_path('images/' . $product->image));
            }

            // Lưu ảnh mới
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // Cập nhật tên ảnh trong cơ sở dữ liệu
            $product->image = $imageName;
        }

        // Lưu sản phẩm
        $product->save();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('product')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }


    public function delete($id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($id);

        // Xóa ảnh liên quan (nếu có)
        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }

        // Xóa sản phẩm khỏi cơ sở dữ liệu
        $product->delete();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('product')->with('success', 'Sản phẩm đã được xóa thành công!');
    }
}
