@extends('layout.index')
@section('title')
    Hóa đơn nhập kho
@endsection
@section('body')
    <div class="container">
        <h2 class=" mt-3 text-center">HÓA ĐƠN NHẬP HÀNG</h2>
        <form action="{{ route('taoOrderNhapHang') }}" method="post">
            @csrf
            <div class="mt-3">
                <span>Tên hóa đơn</span>: <input type="text" name="name" id="name" value="Nhập hàng lần {{ $soLanNhapKho }}">
            </div>
            @if ($errors->any())
                <div class="mt-3 alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mt-3">
                <span>Ghi chú</span>: <input type="text" name="note" id="note" placeholder="Ghi chú">
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Nguyên Liệu</th>
                        <th scope="col">Tên hàng</th>
                        <th scope="col">ID</th>
                        <th scope="col" class="text-end">Đơn giá</th>
                        <th scope="col" class="text-end">Số lượng</th>
                        <th scope="col">Đơn vị</th>
                        <th scope="col" class="text-end">Thành tiền</th>
                    </tr>
                </thead>
                <tbody id="table_nhap_hang">
                    <tr>
                        <th scope="row">1</th>
                        <td><input type="text" name="nguyenlieu[]" id="" placeholder="Nguyên liệu" style="width:120px"></td>
                        <td><input type="text" name="tensanpham[]" id="" placeholder="Tên hàng" style="width:120px"></td>
                        <td>
                            <select name="id_sp[]" onchange="capNhatTenSanPham(this)" class="form-select" aria-label="Default select example" style="width:120px">
                                <option value="" selected>none</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}" data-name="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" min="0" name="dongia[]" oninput="thanhtiensp(this)" placeholder="10000" class="text-end" style="width:150px"></td>
                        <td><input type="number" min="1" value="1" name="soluong[]" oninput="thanhtiensp(this)" placeholder="Số Lượng" class="text-end" style="width:120px"></td>
                        <td><input type="text" name="donvi[]" id="" placeholder="kg, bịch, túi, cái" style="width:120px"></td>
                        <td><input type="text" disabled value="0đ" name="thanhtien" class="text-end" style="width:120px"></td>
                    </tr>
                    <tr>
                        <td colspan="8"><button type="button" class="btn btn-outline-primary container-fluid" onclick="themHang()">+ Thêm hàng</button></td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-3">
                <span>Tổng tiền: </span><span class="h4 text-primary" id="tongtien">0đ</span>
                <input type="number" name="tongtien" value="0" min="0" hidden>
            </div>
            <div class="mt-3 d-flex">
                <span>Người nhập:</span>
                <select name="id_user" class="form-select ms-2" aria-label="Default select example" style="width:300px">
                    <option value="" selected>none</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3 text-end">
                <button type="submit" class="btn btn-primary w-25">Lưu</button>
            </div>
        </form>
        <br>
        <script>
            function thanhtiensp(element) {
                // Lấy hàng cha chứa các ô input
                const row = element.closest('tr');

                // Lấy giá trị của đơn giá và số lượng
                const dongia = row.querySelector('input[name="dongia[]"]').value;
                const soluong = row.querySelector('input[name="soluong[]"]').value;

                if (dongia != null && soluong != null) {
                    // Tính thành tiền
                    const thanhtien = dongia * soluong;

                    // Cập nhật giá trị cho ô thành tiền
                    row.querySelector('input[name="thanhtien"]').value = thanhtien.toLocaleString('vi-VN') + 'đ';
                }

                tinhTongTien();
            }

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
                <td><input type="text" name="nguyenlieu[]" id="" placeholder="Nguyên liệu" style="width:120px"></td>
                <td><input type="text" name="tensanpham[]" id="" placeholder="Tên hàng" style="width:120px"></td>
                <td>
                    <select name="id_sp[]" onchange="capNhatTenSanPham(this)" class="form-select" aria-label="Default select example" style="width:120px">
                        <option value="" selected>none</option>
                        @foreach ($products as $item)
                            <option value="{{ $item->id }}" data-name="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" min="0" name="dongia[]" oninput="thanhtiensp(this)" placeholder="10000" class="text-end" style="width:150px"></td>
                <td><input type="number" min="1" value="1" name="soluong[]" oninput="thanhtiensp(this)" placeholder="Số Lượng" class="text-end" style="width:120px"></td>
                <td><input type="text" name="donvi[]" id="" placeholder="kg, bịch, túi, cái" style="width:120px"></td>
                <td><input type="text" disabled value="0đ" name="thanhtien" class="text-end" style="width:120px"></td>
            `;

                // Thêm hàng mới vào trước hàng chứa nút "Thêm hàng"
                tbody.insertBefore(newRow, tbody.lastElementChild);
            }

            function tinhTongTien() {
                const tbody = document.getElementById('table_nhap_hang');
                var tongTien = 0;

                tbody.querySelectorAll('tr').forEach(row => {
                    const thanhtien = row.querySelector('input[name="thanhtien"]').value;
                    if (thanhtien) {
                        const value = parseFloat(thanhtien.replace(/[^\d]/g, '')); // Loại bỏ các ký tự không phải số
                        tongTien += value;
                    }
                    document.querySelector('input[name="tongtien"]').value = tongTien;
                    document.querySelector('#tongtien').innerHTML = tongTien.toLocaleString('vi-VN') + ' đ';
                });
            }

            function capNhatTenSanPham(selectElement) {
                // Lấy giá trị name từ option được chọn
                const selectedOption = selectElement.options[selectElement.selectedIndex];
                const tenSanPham = selectedOption.getAttribute('data-name');

                // Tìm ô input tương ứng để cập nhật tên sản phẩm
                const row = selectElement.closest('tr');
                const inputTenSanPham = row.querySelector('input[name="tensanpham[]"]');

                // Cập nhật giá trị vào ô input
                if (inputTenSanPham) {
                    inputTenSanPham.value = tenSanPham;
                }
            }
        </script>

    </div>
@endsection
