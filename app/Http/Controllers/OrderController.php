<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // Tìm đơn hàng
        $orders = Order::select('id','id_admin','gender','total_money','quantity','payment')->get();
        // dd($orders);
        return view('page.order', compact('orders'));
    }
    public function detail($id)
    {
        // Tìm đơn hàng
        $orderDetail = OrderDetail::where('id_order', $id)->get();
        $order = Order::findOrFail($id);
        return view('page.orderDetail', compact('order','orderDetail'));
    }
    public function delHomeOrder($id_order)
    {
        // Tìm đơn hàng
        $order = Order::findOrFail($id_order);

        // Lặp qua các chi tiết đơn hàng để giảm số lượng tồn kho
        foreach ($order->details as $detail) {
            $product = $detail->product;
            if ($product) {
                $product->sold -= $detail->quantity;
                $product->save();
            }
        }
        $order->delete();

        return redirect()->route('home')->with('success', 'Order deleted successfully.');
    }
    public function luckyWheel($id_order){
        return view('page.luckyWheel', compact('id_order'));
    }
    public function updateLuckyResult(Request $request)
    {
        $id_order = $request->input('order_id');
        $gift = $request->input('gift');
        // Lấy thông tin đơn hàng
        $order = Order::find($id_order);
        // Lưu kết quả quay số may mắn vào đơn hàng
        $order->gift = $gift;
        $order->save();

        return redirect()->route('home');
    }
    public function checkout_(Request $request)
    {
        $order = Order::find($request->input('id_order'));
        $order->total_money = $request->input('total_amount');
        $order->quantity = $request->input('total_quantity');
        $order->gender = $request->input('gioitinh');
        if ($request->input('name_user')) {
            $order->name_user = $request->input('name_user');
        }
        $order->status = 'paid';
        if ($request->input('total_amount')>=24000) {
            $order->lucky = 'yes';
        }
        $order->save();
        // Lấy dữ liệu từ trường order_details
        $orderDetails = json_decode($request->input('order_details'), true);

        // Bây giờ $orderDetails là một mảng chứa thông tin chi tiết đơn hàng
        // Bạn có thể xử lý lưu vào cơ sở dữ liệu hoặc thực hiện các thao tác khác tại đây

        // Ví dụ: lưu thông tin đơn hàng vào cơ sở dữ liệu
        foreach ($orderDetails as $item) {
            $orderDetails = new OrderDetail();
            $orderDetails->id_product =  $item['id_product'];
            $orderDetails->id_order = $request->input('id_order');
            $orderDetails->name = $item['name'];
            $orderDetails->price = $item['price'];
            $orderDetails->quantity = $item['quantity'];
            $orderDetails->save();

            $p=Product::find($item['id_product']);
            $p->sold+=$item['quantity'];
            $p->save();
        }

        if ($request->input('total_amount')>20000) {
            return redirect()->route('luckyWheel',$request->input('id_order'));
            
        }
        return redirect()->route('home');
        
    }
    public function create_order()
    {
        $order = Order::where('id_admin', Auth::user()->id)
            ->where('status', 'cart')
            ->first(); // Lấy đơn hàng của người dùng nếu tồn tại và có status là 'cart'

        if ($order) {
            // Xử lý khi đơn hàng đã tồn tại và có status là 'cart'
        } else {
            // Tạo đơn hàng mới nếu không tìm thấy đơn hàng có status là 'cart'
            $order = new Order();
            $order->id_admin = Auth::user()->id;
            $order->status = 'cart'; // Set status là 'cart'
            $order->save();
        }

        $food = Product::where('id_category', '=', 1)->get();
        $drink = Product::where('id_category', '=', 2)->get();
        $combo = Product::where('id_category', '=', 3)->get();


        return view('page.cart', compact('order', 'food', 'drink', 'combo'));
    }
    /**
     * Display a listing of the resource.
     */

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
