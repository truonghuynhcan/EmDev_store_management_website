@extends('layout.index')
@section('title')
Danh mục
@endsection
@section('body')
<div class="container" style="min-height: 80vh;">
    <h2 class="mt-3 text-center">Danh mục sản phẩm</h2>
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
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Thêm danh mục
        </button>
    </div>
    <div class="collapse my-3 {{ $errors->any() ? 'show' : '' }}" id="collapseExample">
        <form action="{{ route('addcate') }}" method="post">
            @csrf
            <table class="table table-hover m-auto" style="width: 40%;">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th colspan="3" scope="col">Tên danh mục</th>
                    </tr>
                </thead>
                <tbody id="table_nhap_hang">
                    @foreach(old('names', ['']) as $index => $oldName)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td colspan="3">
                            <input class="form-control @error('names.' . $index) is-invalid @enderror"
                                type="text" name="names[]"
                                value="{{ old('names.' . $index) }}"
                                placeholder="Tên danh mục">
                            @error('names.' . $index)
                            <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </td>
                        @if($index > 0) <!-- Chỉ hiện nút xóa từ hàng thứ hai -->
                        <td>
                            <button type="button" style="width: 37.6px; height: 37.6px;" class="btn btn-danger" onclick="xoaHang(this)">X</button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">
                            <button type="button" class="btn btn-outline-primary container-fluid" onclick="themHang()">+ Thêm hàng</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-3 text-end">
                <button type="submit" class="btn btn-primary w-25">Lưu</button>
            </div>
        </form>
    </div>
    @if (!$cate)
    <div class="alert alert-primary" role="alert">
        Chưa có danh mục
    </div>
    @else
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" style="width: 10%;">#</th>
                <th scope="col" style="width: 70%;">Tên</th>
                <th scope="col" style="width: 20%;">Thao tác</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($cate as $cat)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $cat->name }}</td>
                <td class="d-flex" style="gap: 10px;">
                    <a href="{{ route('editcate', $cat->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('deletecate', $cat->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endif
    <script>
        function themHang() {
            // Lấy tbody để thêm hàng mới
            const tbody = document.getElementById('table_nhap_hang');

            // Đếm số lượng hàng hiện tại trong tbody (trừ đi hàng chứa nút "Thêm hàng")
            const rowCount = tbody.querySelectorAll('tr').length - 1;

            // Tạo phần tử tr mới
            const newRow = document.createElement('tr');

            // Tạo nội dung cho hàng mới
            newRow.innerHTML = `
                <th scope="row">${rowCount + 1}</th>
                <td colspan="3"><input class="form-control" type="text" name="names[]" id="" placeholder="Tên danh mục"></td>
            `;

            // Thêm hàng mới vào trước hàng chứa nút "Thêm hàng"
            tbody.insertBefore(newRow, tbody.lastElementChild);
        }

        function xoaHang(button) {
            // Xóa hàng tương ứng với nút được nhấn
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);

            // Cập nhật lại số thứ tự (STT) của các hàng còn lại
            const rows = document.querySelectorAll('#table_nhap_hang tr');
            rows.forEach((row, index) => {
                if (index < rows.length - 1) { // Trừ đi hàng cuối cùng chứa nút "Thêm hàng"
                    row.querySelector('th').innerText = index + 1;
                }
            });
        }
    </script>
</div>
@endsection