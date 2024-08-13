@extends('layout.index')
@section('title')
Nhập kho chi tiết
@endsection
@section('body')
<div class="container" style="min-height: 90vh;">
    <div class="row py-3">
        <div class="col-md-12">
            <h1 class="text-center my-3">Chi tiết nhập kho #{{$stock->id}}</h1>
            <div class="row py-3">
                <div class="col-md-8">
                    <h2>Sản phẩm</h2>
                    @if (!$stockDetail)
                    <div class="alert alert-primary" role="alert">
                        Chưa có sản phẩm nhập hàng
                    </div>
                    @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nguyên liệu sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đơn vị</th>
                                <th scope="col">Giá</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($stockDetail as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->material_product}}</td>
                                <td>{{ $item->name_product}}</td>
                                <td>{{ $item->quantity}}</td>
                                <td>{{ $item->unit}}</td>
                                <td>{{ number_format($item->price,0,',','.')}} ₫</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="col-md-4">
                    <h2>Tổng giỏ hàng</h2>
                    <h5>Phương thức thanh toán: Tiền mặt</h5>
                    <h3>Tổng tiền: <span class="text-primary">{{number_format($stock->price, 0, ',', '.')}} ₫</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection