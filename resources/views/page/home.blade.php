@extends('layout.index')
@section('title')
    Trang chủ
@endsection
@section('body')
    <section class="mt-3">
        <div class="container">
            <a href="{{ route('create_order') }}" class="btn btn-primary">Thêm đơn hàng mới</a>
            <a href="#" class="btn btn-outline-primary">Menu</a>
        </div>
    </section>
    <section class="mt-3 bg-body-tertiary">
        <div class="container">
            <h2>
                Đơn hàng trong ngày
            </h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Tổng đơn</th>
                        <th scope="col">Thanh toán</th>
                        <th scope="col">Gift</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($orders as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->name_user?$item->name_user:'Ẩn danh'}}</td>
                            <td>{{$item->total_money}}</td>
                            <td>{{$item->payment}}</td>
                            <td>
                                <span class="badge bg-primary">{{$item->gift?$item->gift:$item->lucky}}</span>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <span class="badge bg-primary">Gấu bông</span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>Thornton</td>
                        <td>
                            <span class="badge bg-info">Móc khóa</span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        <td>
                            <span class="badge bg-success">Sticker</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>
@endsection
