<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <!-- dẫn đến menu -->
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Em<span class="text-primary">Dev</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">Thống kê</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user')}}">Nhân viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('stock')}}">Nhập kho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('order')}}">Đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">Đăng xuất</a>
                </li>
            </ul>
            <div>
                @auth
                    <img src="{{ asset('images/btt.jpg') }}" width="40px" class="rounded-5" alt="">
                    <span>{{ Auth::user()->name }}</span>
                @endauth
            </div>
        </div>
    </div>
</nav>
