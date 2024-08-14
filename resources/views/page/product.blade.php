@extends('layout.index')
@section('title')
Sản Phẩm
@endsection
@section('body')
<div class="container" style="min-height: 90vh;">
    <div class="row py-3">
        <div class="col-md-12">
            <h2>
                Sản Phẩm
            </h2>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hoàn tất!</strong> {{session('success')}}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Không thành công!</strong> {{session('error')}}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Thêm sản phẩm</button>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm sản phẩm mới</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('addpro') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        id="floatingInputName"
                                        placeholder="Nguyễn Văn A"
                                        value="{{ old('name') }}">
                                    <label for="floatingInputName">Tên sản phẩm</label>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-floating">
                                    <select name="id_category" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="" disabled selected>Chọn danh mục</option> <!-- Option mặc định -->
                                        @foreach($categories as $cate)
                                        <option value="{{ $cate->id }}" {{ old('id_category') == $cate->id ? 'selected' : '' }}>
                                            {{ $cate->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Danh mục sản phẩm</label>
                                </div>
                                @error('id_category')
                                <div style="color:#ea868f;">
                                    {{ $message }}
                                </div>
                                @enderror


                                <div class="my-3">
                                    <label for="formFile" class="form-label">Ảnh sản phẩm</label>
                                    <input class="form-control" name="image" type="file" id="formFile">
                                    @error('image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="price"
                                        class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                        id="floatingInput"
                                        placeholder="name@example.com"
                                        value="{{ old('price') }}">
                                    <label for="floatingInput">Giá</label>
                                    @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="sale_price"
                                        class="form-control {{ $errors->has('sale_price') ? 'is-invalid' : '' }}"
                                        id="floatingInput"
                                        placeholder="name@example.com"
                                        value="{{ old('sale_price') }}">
                                    <label for="floatingInput">Giá sale</label>
                                    @error('sale_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-secondary" data-bs-dismiss="modal">Hủy</a>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @if (!$products)
            <div class="alert alert-primary my-3" role="alert">
                Chưa có sản phẩm
            </div>
            @else
            <table class="table table-hover my-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Đã bán</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider align-middle">
                    @foreach ($products as $pro)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{ asset('images/'.$pro->image) }}" alt="" width="120px"></td>
                        <td>{{ $pro->name}}</td>
                        <td>{{ $pro->category->name}}</td>
                        <td class="text-center">{{ $pro->sold}}</td>
                        <td>
                            @if ($pro->sale_price)
                            <span class="h3 text-primary">{{ number_format($pro->sale_price, 0, ',', '.') }} ₫</span>
                            <del class="ms-2 fw-light">{{ number_format($pro->price, 0, ',', '.') }} ₫</del>
                            @else
                            <span class="h3 text-primary">{{ number_format($pro->price, 0, ',', '.') }} ₫</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex" style="gap: 10px;">
                                <a href="{{ route('updatepro',$pro->id) }}" class="btn btn-warning">Sửa</a>
                                <form action="{{ route('deletepro',$pro->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.show();
    });
</script>
@endif
@endsection