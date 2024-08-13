@extends('layout.index')
@section('title')
Nhân viên
@endsection
@section('body')
<div class="container" style="min-height: 90vh;">
    <div class="row py-3">
        <div class="col-md-12">
            <h2>
                Sửa thông tin nhân viên
            </h2>
            <form action="{{ route('updateuser',$user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" name="name"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        id="floatingInputName"
                        placeholder="Nguyễn Văn A"
                        value="{{ old('name', $user->name) }}">
                    <label for="floatingInputName">Tên nhân viên</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        id="floatingInput"
                        placeholder="name@example.com"
                        value="{{ old('email', $user->email) }}">
                    <label for="floatingInput">Email</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" name="password"
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Mật khẩu mới</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary my-3">Lưu</button>
            </form>
        </div>
    </div>
</div>
@endsection