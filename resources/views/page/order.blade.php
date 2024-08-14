@extends('layout.index')
@section('title')
    Đơn hàng
@endsection
@section('body')
    <div class="container" style="min-height: 90vh;">
        <div class="row py-3">
            <div class="col-md-12">
                <div class="d-flex">
                    <h2>
                        Đơn hàng
                    </h2>
                </div>
                <form id="dateFilterForm" class="row my-3">
                    <div class="col-5 col-md-3">
                        <label for="startDate">Từ ngày:</label>
                        <input class="form-control" type="date" id="startDate" name="startDate">
                    </div>
                    <div class="col-5 col-md-3">
                        <label for="endDate">Đến ngày:</label>
                        <input class="form-control" type="date" id="endDate" name="endDate">
                    </div>
                    <div class="col-2 col-md-3 d-flex">
                        <button type="button" class="btn btn-outline-primary" onclick="filterByDate()">Lọc</button>
                    </div>
                </form>
                <input class="mb-3 form-control" style="max-width:30vh" type="text" id="searchInput" placeholder="Tìm kiếm thành viên bán ...">


                @if (!$orders)
                    <div class="alert alert-primary" role="alert">
                        Chưa có đơn hàng nào
                    </div>
                @else
                    <table class="table table-hover" id="sortableTable">
                        <thead>
                            <tr>
                                <th scope="col" onclick="sortTable(0)">#</th>
                                <th scope="col" onclick="sortTable(1)">Thành viên bán ra</th>
                                <th scope="col" class="text-center" onclick="sortTable(2)">Giới tính</th>
                                <th scope="col" class="text-end" onclick="sortTable(3)">Tổng tiền</th>
                                <th scope="col" class="text-center" onclick="sortTable(4)">Ngày bán</th>
                                <th scope="col" class="text-center" onclick="sortTable(5)">Thanh toán</th>
                                <th scope="col" class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($orders as $item)
                                <tr>
                                    <td class="fw-bold" scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td class="text-center">{{ $item->gender == 0 ? 'Nam' : 'Nữ' }}</td>
                                    <td class="text-end">{{ number_format($item->total_money, 0, ',', '.') }} ₫</td>
                                    <td class="text-center">{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td class="text-center">{{ $item->payment == 'cash' ? 'Tiền mặt' : 'Chuyển khoản' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('orderDetail', $item->id) }}" class="btn btn-outline-primary">Xem chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        <script>
            document.getElementById('searchInput').addEventListener('keyup', function() {
                var input, filter, table, tr, td, i, j, txtValue;
                input = document.getElementById('searchInput');
                filter = input.value.toUpperCase();
                table = document.querySelector('table');
                tr = table.getElementsByTagName('tr');

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 1; i < tr.length; i++) {
                    tr[i].style.display = 'none'; // Hide the row initially
                    td = tr[i].getElementsByTagName('td');
                    for (j = 0; j < td.length; j++) {
                        if (td[j]) {
                            txtValue = td[j].textContent || td[j].innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = ''; // Show the row if match found
                                break; // Stop searching in the current row
                            }
                        }
                    }
                }
            });

            function sortTable(n) {
                var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                table = document.getElementById("sortableTable");
                switching = true;
                // Set the sorting direction to ascending:
                dir = "asc";
                // Make a loop that will continue until no switching has been done:
                while (switching) {
                    switching = false;
                    rows = table.rows;
                    // Loop through all table rows (except the first, which contains table headers):
                    for (i = 1; i < (rows.length - 1); i++) {
                        shouldSwitch = false;
                        // Get the two elements you want to compare, one from current row and one from the next:
                        x = rows[i].getElementsByTagName("TD")[n];
                        y = rows[i + 1].getElementsByTagName("TD")[n];
                        // Check if the two rows should switch place, based on the direction, asc or desc:
                        if (dir === "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir === "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                    if (shouldSwitch) {
                        // If a switch has been marked, make the switch and mark that a switch has been done:
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        // Each time a switch is done, increase this count by 1:
                        switchcount++;
                    } else {
                        // If no switching has been done AND the direction is "asc", set the direction to "desc" and run the while loop again.
                        if (switchcount === 0 && dir === "asc") {
                            dir = "desc";
                            switching = true;
                        }
                    }
                }
            }

            function filterByDate() {
                var startDate = document.getElementById("startDate").value;
                var endDate = document.getElementById("endDate").value;
                var table = document.getElementById("sortableTable");
                var tr = table.getElementsByTagName("tr");

                var start = new Date(startDate);
                start.setHours(0, 0, 0, 0);

                var end = new Date(endDate);
                end.setHours(23, 59, 59, 999);


                for (var i = 1; i < tr.length; i++) {
                    var td = tr[i].getElementsByTagName("td")[4]; // Cột ngày bán
                    if (td) {
                        var dateText = td.textContent || td.innerText;
                        var dateParts = dateText.split('/');
                        var rowDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);

                        if (rowDate >= start && rowDate <= end) {
                            tr[i].style.display = ""; // Hiển thị các hàng nằm trong khoảng thời gian
                        } else {
                            tr[i].style.display = "none"; // Ẩn các hàng nằm ngoài khoảng thời gian
                        }
                    }
                }
            }
        </script>
    </div>
@endsection
