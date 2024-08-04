@extends('layout.index')
@section('title')
Đơn hàng chi tiết
@endsection
@section('body')
<div class="container" style="min-height: 80vh;">
    <h1 class="text-center my-3">Chi tiết đơn hàng #{{$order->id}}</h1>
    <div class="row py-3">
        <div class="col-md-8">
            <h2>Sản phẩm</h2>
            @foreach ($orderDetail as $item)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-3">
                        <img src="{{ asset('') }}images/{{ $item->product->image }}" class="rounded-start" height="150px" alt="...">
                    </div>
                    <div class="col-9">
                        <div class="card-body row">
                            <div class="col-8">
                                <h6 class="card-title">{{ $item->name }}</h6>
                                @if ($item->product->price > $item->price)
                                <span class="h3 text-primary">{{ number_format($item->price, 0, ',', '.') }} ₫</span>
                                <del class="ms-2 fw-light">{{ number_format($item->product->price, 0, ',', '.') }} ₫</del>
                                @else
                                <span class="h3 text-primary">{{ number_format($item->price, 0, ',', '.') }} ₫</span>
                                @endif
                            </div>
                            <div class="card-text text-end col-4">
                                <h6>Số lượng: {{$item->quantity}}</h6>
                                <h4>Số tiền: <span class="text-primary">{{number_format($item->quantity * $item->price, 0, ',', '.')}} ₫</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-4">
            @if($order->gift)
            <h2>Kết quả quay thưởng</h2>
            <div class="card bg-body-tertiary" style="height: 150px;">
                <h3 class="text-primary text-center my-auto">{{$order->gift}}</h3>
            </div>
            @endif
            <h2 class="pb-3">Tổng giỏ hàng</h2>
            <h5>Phương thức thanh toán: Tiền mặt</h5>
            <h3>Tổng tiền: <span class="text-primary">{{number_format($order->total_money, 0, ',', '.')}} ₫</h3>
        </div>
    </div>
</div>
@endsection