@extends('layout.index')

@section('title')
Sửa sản phẩm
@endsection

@section('body')
<div class="container" style="min-height: 90vh;">
    <div class="row py-3">
        <div class="col-md-12">
            <h2>
                Sửa thông tin sản phẩm
            </h2>
            <form action="{{ route('updatepro', $pro->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Tên sản phẩm -->
                <div class="form-floating mb-3">
                    <input type="text" name="name"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        id="floatingInputName"
                        placeholder="Nguyễn Văn A"
                        value="{{ old('name', $pro->name) }}">
                    <label for="floatingInputName">Tên sản phẩm</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Danh mục sản phẩm -->
                <div class="form-floating mb-3">
                    <select name="id_category" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option value="" disabled>Chọn danh mục</option> <!-- Option mặc định -->
                        @foreach($categories as $cate)
                        <option value="{{ $cate->id }}" {{ old('id_category', $pro->id_category) == $cate->id ? 'selected' : '' }}>
                            {{ $cate->name }}
                        </option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Danh mục sản phẩm</label>
                    @error('id_category')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Ảnh sản phẩm -->
                <div class="my-3">
                    <label for="formFile" class="form-label">Ảnh sản phẩm</label>
                    <input class="form-control" name="image" type="file" id="formFile">
                    @if ($pro->image)
                    <img src="{{ asset('images/' . $pro->image) }}" alt="Ảnh sản phẩm hiện tại" width="100px" class="mt-2">
                    @endif
                    @error('image')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Giá -->
                <div class="form-floating mb-3">
                    <input type="number" name="price"
                        class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                        id="floatingInputPrice"
                        placeholder="Giá"
                        value="{{ old('price', $pro->price) }}">
                    <label for="floatingInputPrice">Giá</label>
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Giá sale -->
                <div class="form-floating mb-3">
                    <input type="number" name="sale_price"
                        class="form-control {{ $errors->has('sale_price') ? 'is-invalid' : '' }}"
                        id="floatingInputSalePrice"
                        placeholder="Giá sale"
                        value="{{ old('sale_price', $pro->sale_price) }}">
                    <label for="floatingInputSalePrice">Giá sale</label>
                    @error('sale_price')
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
