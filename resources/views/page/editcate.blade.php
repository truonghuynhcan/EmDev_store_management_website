@extends('layout.index')
@section('title')
Danh mục
@endsection
@section('body')
<div class="container" style="min-height: 90vh;">
    <div class="row py-3">
        <div class="col-md-12">
            <h2>
                Sửa thông tin danh mục
            </h2>
            <form action="{{ route('updatecate',$cate->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" name="name"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        id="floatingInputName"
                        placeholder="Nguyễn Văn A"
                        value="{{ old('name', $cate->name) }}">
                    <label for="floatingInputName">Tên danh mục</label>
                    @error('name')
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