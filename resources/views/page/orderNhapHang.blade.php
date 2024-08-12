@extends('layout.index')
@section('title')
Hóa đơn nhập kho
@endsection
@section('body')
<div class="container">
    <h2 class=" mt-3 text-center">HÓA ĐƠN NHẬP HÀNG</h2>
    <form action="" method="">
        <div class="mt-3">
            <span>Tên hóa đơn</span>: <input type="text" name="name" id="name" value="Nhập hàng lần 1">
        </div>
        <div class="mt-3">
            <span>Ghi chú</span>: <input type="text" name="name" id="name" placeholder="Ghi chú">
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
                    <td><input type="text" name="nguyenlieu" id="" placeholder="Nguyên liệu" style="width:120px"></td>
                    <td><input type="text" name="tensanpham" id="" placeholder="Tên hàng" style="width:120px"></td>
                    <td>
                        <select class="form-select" aria-label="Default select example" style="width:120px">
                            <option selected>none</option>
                            <option value="1">bánh tráng</option>
                            <option value="2">trà tắt</option>
                            <option value="3">bò né</option>
                        </select>
                    </td>
                    <td><input type="number" min="0" name="dongia" oninput="thanhtiensp(this)" placeholder="Đơn giá" class="text-end" style="width:150px"></td>
                    <td><input type="number" min="0" name="soluong" oninput="thanhtiensp(this)" placeholder="Số Lượng" class="text-end" style="width:120px"></td>
                    <td><input type="text" name="donvi" id="" placeholder="Đơn vị" style="width:120px"></td>
                    <td><input type="text" disabled value="0đ" name="thanhtien" class="text-end" style="width:120px"></td>
                </tr>
                <tr>
                    <td colspan="8"><button type="button" class="btn btn-outline-primary container-fluid" onclick="themHang()">+ Thêm hàng</button></td>
                </tr>
            </tbody>
        </table>
        <div class="mt-3">
            <span>Tổng tiền</span>
            <input type="text" name="tongtien" id="tongtien" value="0 ₫" disabled>
        </div>
        <div class="mt-3 d-flex">
            <span>Người nhập:</span>
            <select class="form-select ms-2" aria-label="Default select example" style="width:200px">
                <option selected>none</option>
                <option value="1">can</option>
                <option value="2">Nhi</option>
                <option value="3">Dương</option>
            </select>
        </div>
        <div class="mt-3 text-end">
            <a href="" class="btn btn-primary w-25">Lưu</a>
        </div>
    </form>
    <br>
    <script>
        function thanhtiensp(element) {
            // Lấy hàng cha chứa các ô input
            const row = element.closest('tr');

            // Lấy giá trị của đơn giá và số lượng
            const dongia = row.querySelector('input[name="dongia"]').value;
            const soluong = row.querySelector('input[name="soluong"]').value;

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
                <td><input type="text" name="nguyenlieu" id="" placeholder="Nguyên liệu" style="width:120px"></td>
                <td><input type="text" name="tensanpham" id="" placeholder="Tên hàng" style="width:120px"></td>
                <td>
                    <select class="form-select" aria-label="Default select example" style="width:120px">
                        <option selected>none</option>
                        <option value="1">bánh tráng</option>
                        <option value="2">trà tắt</option>
                        <option value="3">bò né</option>
                    </select>
                </td>
                <td><input type="number" min="0" name="dongia" oninput="thanhtiensp(this)" placeholder="Đơn giá" class="text-end" style="width:150px"></td>
                <td><input type="number" min="0" name="soluong" oninput="thanhtiensp(this)" placeholder="Số Lượng" class="text-end" style="width:120px"></td>
                <td><input type="text" name="donvi" id="" placeholder="Đơn vị" style="width:120px"></td>
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
                document.getElementById('tongtien').value = tongTien.toLocaleString('vi-VN')  + ' ₫';
            });
        }
    </script>

</div>
@endsection