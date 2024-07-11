@extends('layout.index')
@section('title')
    Đơn hàng
@endsection
@section('body')
<div class="container">
    <div class="row">
        <section class="col-md-7">
            <h1 class=" mt-3">Giỏ hàng #102</h1>
            <div class="mt-3">
                <div class="">
                    <h3>Combo</h3>
                    <hr width="200px" class="mt-1 border border-light border-3 rounded">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-3">
                                <img src="../images/btt.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-7">
                                <div class="card-body">
                                    <h6 class="card-title">Combo 1 - Bánh tráng trộn, trà chanh, bánh tráng cuộn</h6>
                                    <p class="card-text">
                                        <span class="h3 text-primary">40.000 ₫</span>
                                        <del class="ms-2 fw-light">50.000 ₫</del>
                                    </p>
                                </div>
                            </div>
                            <div class="col-2 d-flex align-items-center pe-2">
                                <input class="form-control" type="number" value="0" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-3">
                                <img src="../images/btt.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-7">
                                <div class="card-body">
                                    <h6 class="card-title">Combo 1 - Bánh tráng trộn, trà chanh, bánh tráng cuộn</h6>
                                    <p class="card-text">
                                        <span class="h3 text-primary">40.000 ₫</span>
                                        <del class="ms-2 fw-light">50.000 ₫</del>
                                    </p>
                                </div>
                            </div>
                            <div class="col-2 d-flex align-items-center pe-2">
                                <input class="form-control" type="number" value="0" name="" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" mt-3">
                    <h3>Bánh tráng</h3>
                    <hr width="200px" class="mt-1 border border-light border-3 rounded">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-3">
                                <img src="../images/btt.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-7">
                                <div class="card-body">
                                    <h6 class="card-title">Bánh tráng phơi sương sương</h6>
                                    <p class="card-text">
                                        <span class="h3 text-primary">40.000 ₫</span>
                                        <del class="ms-2 fw-light">50.000 ₫</del>
                                    </p>
                                </div>
                            </div>
                            <div class="col-2 d-flex align-items-center pe-2">
                                <input class="form-control" type="number" value="0" name="" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" mt-3">
                    <h3>Nước</h3>
                    <hr width="200px" class="mt-1 border border-light border-3 rounded">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-3">
                                <img src="../images/btt.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-7">
                                <div class="card-body">
                                    <h6 class="card-title">Bánh tráng phơi sương sương</h6>
                                    <p class="card-text">
                                        <span class="h3 text-primary">40.000 ₫</span>
                                        <del class="ms-2 fw-light">50.000 ₫</del>
                                    </p>
                                </div>
                            </div>
                            <div class="col-2 d-flex align-items-center pe-2">
                                <input class="form-control" type="number" value="0" name="" id="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <aside class="col-md-5">
            <div class="container-fluid">
                <h1>Thanh toán</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Combo 1 - Bánh tráng trộn, trà chanh, bánh tráng cuộn</td>
                        <td class="text-end">40.000₫</td>
                        <td class="text-center">2</td>
                        <td class="text-end">80.000₫</td>
                    </tr>
                    <tr>
                        <td>Bánh tráng phơi sương sương</td>
                        <td class="text-end">40.000₫</td>
                        <td class="text-center">2</td>
                        <td class="text-end">80.000₫</td>
                    </tr>
                </table>
                <form action="" method="post">
                    <hr class="border-4">
                    <div class="d-flex justify-content-between">
                        <div>tong so luong</div>
                        <div>tong so luong</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>tong tièn</div>
                        <div>tong tièn</div>
                    </div>
                    <hr class="border-4">
                    <input type="submit" class="mt-3 btn btn-primary" value="Thanh toán tiền mặt">
                    <input type="submit" class="mt-3 btn btn-outline-primary" disabled value="Thanh toán online">
                </form> 
            </div>
            </á>
    </div>
</div>
@endsection
