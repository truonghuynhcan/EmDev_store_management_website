@extends('layout.index')
@section('title')
Đơn hàng
@endsection
@section('body')
<div class="container">
    <div class="row py-3">
        <div class="col-md-12">
            <h2>
                Đơn hàng
            </h2>
            @if (!$orders)
            <div class="alert alert-primary" role="alert">
                Chưa có đơn hàng nào
            </div>
            @else
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Thành viên bán ra</th>
                        <th scope="col">Giới tính khách hàng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Số lượng sản phẩm</th>
                        <th scope="col">Phương thức thanh toán</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($orders as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->user->name}}</td>
                        <td>{{$item->gender == 0 ? 'Nam' : 'Nữ'}}</td>
                        <td>{{ number_format($item->total_money,0,',','.')}} ₫</td>
                        <td>{{ $item->quantity}}</td>
                        <td>{{$item->payment == 'cash' ? 'Tiền mặt' : 'Chuyển khoản'}}</td>
                        <td>
                            <a href="{{route('orderDetail',$item->id)}}" class="btn btn-outline-primary">Xem chi tiết</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection