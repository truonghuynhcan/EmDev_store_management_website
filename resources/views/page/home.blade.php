@extends('layout.index')
@section('title')
    Trang chủ
@endsection
@section('body')
    <section class="mt-3">
        <div class="container">
            <a href="#" class="btn btn-primary">Thêm đơn hàng mới</a>
            <a href="#" class="btn btn-outline-primary">Menu</a>
        </div>
    </section>
    <section class="mt-3">
        <div class="container">
            <h3>Combo</h3>
            <hr width="200px" class="mt-1 border border-light border-3 rounded">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <img src="../images/btt.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Combo 1 - Bánh tráng trộn, trà chanh, bánh tráng cuộn</h5>
                            <p class="card-text text-end"><del class="fw-light">50.000 ₫</del><span class="ms-2 h3 text-primary">40.000 ₫</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <img src="../images/btt.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Combo 1 - Bánh tráng trộn, trà chanh, bánh tráng cuộn</h5>
                            <p class="card-text text-end"><del class="fw-light">50.000 ₫</del><span class="ms-2 h3 text-primary">40.000 ₫</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <h3>Bánh tráng</h3>
            <hr width="200px" class="mt-1 border border-light border-3 rounded">

            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="../images/btt.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">Bánh tráng phơi sương sương</h5>
                            <p class="card-text text-end">
                                <del class="fw-light">50.000 ₫</del>
                                <br>
                                <span class="ms-2 h3 text-primary">40.000 ₫</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="../images/btt.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">Bánh tráng phơi sương sương</h5>
                            <p class="card-text text-end">
                                <del class="fw-light">50.000 ₫</del>
                                <br>
                                <span class="ms-2 h3 text-primary">40.000 ₫</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="../images/btt.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">Bánh tráng phơi sương sương</h5>
                            <p class="card-text text-end">
                                <del class="fw-light">50.000 ₫</del>
                                <br>
                                <span class="ms-2 h3 text-primary">40.000 ₫</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
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
                    <tr>
                        <th scope="row">0</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td></td>
                    </tr>
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
