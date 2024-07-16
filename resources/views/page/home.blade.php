@extends('layout.index')
@section('title')
    Trang chủ
@endsection
@section('body')
    <section class="mt-3">
        <div class="container text-end">
            <a href="{{ route('create_order') }}" class="btn btn-primary">Thêm đơn hàng mới</a>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <section class="col">
                <h1 class=" mt-3">Menu</h1>
                <div class="mt-3">
                    <div class="mt-3">
                        <h3>Combo</h3>
                        <hr width="200px" class="mt-1 border border-light border-3 rounded">
                        @foreach ($combo as $item)
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-3">
                                        <img src="{{ asset('') }}images/{{ $item->image }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-9">
                                        <div class="card-body">
                                            <span class="d-none" id="card-id">{{ $item->id }}</span>
                                            <h6 class="card-title">{{ $item->name }}</h6>
                                            <p class="card-text text-end">
                                                @if ($item->sale_price)
                                                    <span class="h3 text-primary">{{ number_format($item->sale_price, 0, ',', '.') }} ₫</span>
                                                    <del class="ms-2 fw-light">{{ number_format($item->price, 0, ',', '.') }} ₫</del>
                                                @else
                                                    <span class="h3 text-primary">{{ number_format($item->price, 0, ',', '.') }} ₫</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class=" mt-3">
                        <h3>Food</h3>
                        <hr width="200px" class="mt-1 border border-light border-3 rounded">
                        @foreach ($food as $item)
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-3">
                                        <img src="{{ asset('') }}images/{{ $item->image }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-9">
                                        <div class="card-body">
                                            <span class="d-none" id="card-id">{{ $item->id }}</span>
                                            <h6 class="card-title">{{ $item->name }}</h6>
                                            <p class="card-text text-end">
                                                @if ($item->sale_price)
                                                    <span class="h3 text-primary">{{ number_format($item->sale_price, 0, ',', '.') }} ₫</span>
                                                    <del class="ms-2 fw-light">{{ number_format($item->price, 0, ',', '.') }} ₫</del>
                                                @else
                                                    <span class="h3 text-primary">{{ number_format($item->price, 0, ',', '.') }} ₫</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class=" mt-3">
                        <h3>Nước</h3>
                        <hr width="200px" class="mt-1 border border-light border-3 rounded">
                        @foreach ($drink as $item)
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-3">
                                        <img src="{{ asset('') }}images/{{ $item->image }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-9">
                                        <div class="card-body">
                                            <span class="d-none" id="card-id">{{ $item->id }}</span>
                                            <h6 class="card-title">{{ $item->name }}</h6>
                                            <p class="card-text text-end">
                                                @if ($item->sale_price)
                                                    <span class="h3 text-primary">{{ number_format($item->sale_price, 0, ',', '.') }} ₫</span>
                                                    <del class="ms-2 fw-light">{{ number_format($item->price, 0, ',', '.') }} ₫</del>
                                                @else
                                                    <span class="h3 text-primary">{{ number_format($item->price, 0, ',', '.') }} ₫</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
         
        </div>
    </div>
    <section class="mt-3 bg-body-tertiary">
        <div class="container py-3">
            <h2>
                Đơn hàng trong ngày
            </h2>
            @if ($orders->isEmpty())
                <div class="alert alert-primary" role="alert">
                    Hãy bắt đầu với những đơn hàng đầu tiên
                </div>
            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Tổng đơn</th>
                            <th scope="col">Gift</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($orders as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name_user ? $item->name_user : 'Ẩn danh' }}</td>
                                <td>{{ number_format($item->total_money,0,',','.')}} ₫</td>
                                <td>
                                    <span class="badge bg-{{ $item->gift == 'Gấu bông' ? 'primary' : ($item->gift == 'Móc khóa' ? 'info' : ($item->gift == 'Sticker' ? 'success' : 'secondary')) }}">{{ $item->gift ? $item->gift : $item->lucky }}</span>
                                </td>
                                <td>
                                    <a href="{{route('delHomeOrder',$item->id)}}" class="btn btn-outline-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection
