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
                        <h5 class="card-title">Tổng Sản Phẩm đã Bán</h5>
                        <p class="card-text">5</p>
                    </div>
                </div>
            </div>
            <!-- Total Customers -->
            <div class="col-md-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Khách Hàng</h5>
                        <p class="card-text">68</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Earnings Overview -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Earnings Overview</h5>
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
                        <h5 class="card-title">Bar Chart</h5>
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
                ['Month', 'Earnings'],
                ['Jan', 10000],
                ['Feb', 20000],
                ['Mar', 15000],
                ['Apr', 30000],
                ['May', 25000],
                ['Jun', 20000],
                ['Jul', 30000],
                ['Aug', 35000],
                ['Sep', 30000],
                ['Oct', 40000],
                ['Nov', 35000],
                ['Dec', 45000]
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
                ['Source', 'Percentage'],
                ['Direct', 55],
                ['Social', 30],
                ['Referral', 15]
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
                ['Month', 'Earnings'],
                ['January', 3000],
                ['February', 4000],
                ['March', 5000],
                ['April', 6000],
                ['May', 7000],
                ['June', 8000]
            ]);

            var options = {
                chartArea: {
                    width: '50%'
                },
                hAxis: {
                    title: 'Total Earnings',
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('bar_chart'));
            chart.draw(data, options);
        }
    </script>
@endsection
