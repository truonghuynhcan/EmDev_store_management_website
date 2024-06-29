<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <!-- dẫn đến menu -->
        <a class="navbar-brand fw-bold" href="{{route('home')}}">Em<span class="text-primary">Dev</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Thống kê
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Đơn hàng trong ngày</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Tất cả</a></li>
                        <li><a class="dropdown-item" href="#">Nhân viên</a></li>
                        <li><a class="dropdown-item" href="#">Nhập kho</a></li>
                        <li><a class="dropdown-item" href="#">Sản phẩm</a></li>
                        <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>