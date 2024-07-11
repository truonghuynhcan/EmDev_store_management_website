@extends('layout.index')
@section('title')
    Đăng nhập
@endsection

@section('body')
    <div class="d-flex align-items-center py-4 ">

        <main class="m-auto bg-body-tertiary p-3 rounded" style="width: 300px;">
            <form action="{{route('login_')}}" method="POST">
                @csrf
                <h1 class="mb-3 fw-bold text-center">Em<span class="text-primary">Dev</span></h1>
                <h1 class="h3 mb-3 fw-normal">Đăng nhập</h1>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color:red">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Nhớ tài khoản
                    </label>
                </div>
                <a href="{{ route('register') }}">Đăng ký</a>
                <br>
                <button class="btn btn-primary w-100 py-2" type="submit">Đăng nhập</button>
            </form>
        </main>
    </div>
@endsection
