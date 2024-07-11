@extends('layout.index')
@section('title')
    Đăng Ký
@endsection

@section('body')
    <div class="d-flex align-items-center py-4 ">

        <main class="m-auto bg-body-tertiary p-3 rounded" style="width: 300px;">
            <form action="{{ route('register_') }}" method="POST">
                @csrf
                <h1 class="mb-3 fw-bold text-center">Em<span class="text-primary">Dev</span></h1>
                <h1 class="h3 mb-3 fw-normal">Đăng ký</h1>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color:red">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Trương Huỳnh Can">
                    <label for="name">Họ và tên</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword">
                    <label for="floatingPassword">Mật khẩu</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="repeatPassword" class="form-control" id="floatingrepeatPassword">
                    <label for="floatingrepeatPassword">Xác minh mật khẩu</label>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Nhớ tài khoản
                    </label>
                </div>
                <a href="{{ route('login') }}">Đăng nhập</a>
                <br>
                <button class="btn btn-primary w-100 py-2" type="submit">Đăng ký</button>
            </form>
        </main>
    </div>
@endsection
