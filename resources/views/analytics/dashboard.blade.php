@extends('layout.index')
@section('title')
    Thống kê
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <!-- Total Revenue -->
            <div class="col-md-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Doanh Thu</h5>
                        <p class="card-text">{{ number_format($totalRevenue,0,',','.')}} ₫</p>
                    </div>
                </div>
            </div>
            <!-- Total Profit -->
            <div class="col-md-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Lợi Nhuận</h5>
                        <p class="card-text">0 ₫</p>
                    </div>
                </div>
            </div>
            <!-- Total Products -->
            <div class="col-md-3">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Số Lượng Sản Phẩm Bán Ra</h5>
                        <p class="card-text">{{ $totalSoldProducts}}</p>
                    </div>
                </div>
            </div>
            <!-- Total Customers -->
            <div class="col-md-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Khách Hàng</h5>
                        <p class="card-text">{{ $totalUser}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Earnings Overview -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Doanh Thu Theo Ngày</h5>
                        <div id="earnings_chart" class="chart-container"></div>
                    </div>
                </div>
            </div>
            <!-- Revenue Sources -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Revenue Sources</h5>
                        <div id="revenue_chart" class="chart-container"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bar Chart -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Số Lượng Bán Theo Sản Phẩm</h5>
                        <div id="bar_chart" class="chart-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card {
            margin: 20px;
        }

        .chart-container {
            height: 400px;
        }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            drawEarningsOverview();
            drawRevenueSources();
            drawBarChart();
        }

        function drawEarningsOverview() {
            var data = google.visualization.arrayToDataTable([
                ['Ngày', 'Doanh Thu'],
                @foreach($revenueByDay as $revenue)
                    ['{{ $revenue->date }}', {{ $revenue->total_revenue }}],
                @endforeach
            ]);

            var options = {
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('earnings_chart'));
            chart.draw(data, options);
        }

        function drawRevenueSources() {
            var data = google.visualization.arrayToDataTable([
                ['Tên Sản Phẩm', 'Số lượng'],
            ]);

            var options = {
                pieHole: 0.4,
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('revenue_chart'));
            chart.draw(data, options);
        }

        function drawBarChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tên sản phẩm', 'Số lượng'],
                @foreach($countSoldProducts as $productsold)
                    [decodeURIComponent('{{ json_encode($productsold->product->name) }}'), {{ $productsold->total_sold }}],
                @endforeach
            ]);

            var options = {
                chartArea: {
                    width: '50%'
                },
                hAxis: {
                    title: 'Số Lượng Bán Ra Theo Sản Phẩm',
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('bar_chart'));
            chart.draw(data, options);
        }
    </script>
@endsection
