@extends('layout.index')
@section('title')
Nhập kho
@endsection
@section('body')
<div class="container" style="min-height: 90vh;">
    <div class="row py-3">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <h2>
                    Nhập kho
                </h2>
                <a href="{{route('orderNhapKho')}}" class="btn btn-primary">Thêm</a>
            </div>
            @if (!$stocks)

            <div class="alert alert-primary" role="alert">
                Chưa nhập hàng
            </div>
            @else
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Thành viên nhập hàng</th>
                        <th scope="col">Lần nhập hàng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($stocks as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->user->name}}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ number_format($item->price,0,',','.')}} ₫</td>
                        <td>{{$item->note == null ? 'Không' : $item->note}}</td>
                        <td>
                            <a href="{{route('stockDetail',$item->id)}}" class="btn btn-outline-primary">Xem chi tiết</a>
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