<div class="card" style="border-radius:20px">
                <div class="card-body p-5">
                    <!-- Header Start -->

                    <!-- Header End -->
                    <div class="row g-2 align-items-center">
                        <!-- Stats header Buttons -->
                        <div class="col-auto btn-list">
                            <a href="#row_1" class="btn btn-pill btn-light tab-pane" class="nav-link"
                                data-bs-toggle="tab" style="background-color:#A8C3E7;"> Last Week </a>
                            <a href="#row_2" class="btn btn-pill btn-light tab-pane" class="nav-link"
                                data-bs-toggle="tab"> Current
                                Month </a>
                            <a href="" class="btn btn-pill btn-light tab-pane"> Last Year </a>
                        </div>
                        <!-- Date Range Button -->
                        <div class="col-auto ms-auto">
                            <a href="#" class="btn btn-pill" data-bs-toggle="modal" data-bs-target="#modal-team"
                                style="background-color:#A8C3E7; border:none;">
                                Select a Date Range
                            </a>
                        </div>
                    </div>
                    <div class="row mt-5 mb-5 d-flex flex-md-row flex-wrap flex-column justify-content-between tab-pane active show"
                        id="row_1">
                        <!-- Order Card Start -->
                        <div class="sms_statistics_ma_kpi_card mb-2">
                            <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="assets/dist/img/cart.png" height="50px;" width="50px;"
                                            style="background-color:white; padding:10px; border-radius:10px;">
                                        <h3 class="mt-3">850</h3>
                                        <strong style="color:#4987D8">Order</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Order Card End -->

                        <!-- total revenue Card Start -->
                        <div class="sms_statistics_ma_kpi_card mb-2">
                            <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="assets/dist/img/revenue.png" height="50px;" width="50px;"
                                            style="background-color:white; padding:10px; border-radius:10px;">
                                        <h3 class="mt-3">15,450 NIS</h3>
                                        <strong style="color:#4987D8">Total Revenue</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- total revenue Card End -->

                        <!-- Order average Card Start -->
                        <div class="sms_statistics_ma_kpi_card mb-2">
                            <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="assets/dist/img/revenue.png" height="50px;" width="50px;"
                                            style="background-color:white; padding:10px; border-radius:10px;">
                                        <h3 class="mt-3">450 NIS</h3>
                                        <strong style="color:#4987D8">Order Average</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Order average Card End -->

                        <!-- Average items Card Start -->
                        <div class="sms_statistics_ma_kpi_card mb-2">
                            <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="assets/dist/img/cart.png" height="50px;" width="50px;"
                                            style="background-color:white; padding:10px; border-radius:10px;">
                                        <h3 class="mt-3">15</h3>
                                        <strong style="color:#4987D8">Average items</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Average items Card End -->

                        <!-- customers Card Start -->
                        <div class="sms_statistics_ma_kpi_card mb-2">
                            <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="assets/dist/img/newuser.png" height="50px;" width="50px;"
                                            style="background-color:white; padding:10px; border-radius:10px;">
                                        <h3 class="mt-3">350</h3>
                                        <strong style="color:#4987D8">Customers</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- customers Card End -->
                    </div>
                    <div id="chart-combination-4"></div>
                    <!-- Colors Button Start-->
                    <div class="row g-2 align-items-center">
                        <div class="col-auto ms-auto btn-list mt-5 mb-5">
                            <div class="text-light p-1" style="background-color:#627e0c; border-radius:5px;"> New
                                Customer </div>
                            <div class="text-light p-1" style="background-color:#8b59e4; border-radius:5px;"> Customer
                            </div>
                            <div class="text-light p-1" style="background-color:#9215a8; border-radius:5px;"> Product
                            </div>
                            <div class="text-light p-1" style="background-color:#dc2285; border-radius:5px;"> Order
                            </div>
                            <div class="text-light p-1" style="background-color:#ac3f4f; border-radius:5px;"> Revenues
                            </div>
                        </div>
                    </div>
                    <!-- Colors Button End -->

                    <!-- Icon Box End -->
                </div>
            </div>


<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-combination-4'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 240,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '20%',
                    gap: '5%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "New Customer",
                data: [3000, 1000, 2000, 3500, 4000, 3000, 5000]
            }, {
                name: "Returning Customer",
                data: [2000, 1300, 900, 500, 2400, 1300, 2200]
            }, {
                name: "Product",
                data: [3000, 2000, 1600, 1300, 3000, 2500, 2500]
            }, {
                name: "Order",
                data: [2000, 1300, 900, 500, 2400, 1300, 2200]
            }, {
                name: "Revenue",
                data: [2000, 1300, 900, 500, 2400, 1300, 2200]
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                categories: ['First', 'Crimson', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Sabbath'],
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            colors: ['#627e0c', '#8b59e4', '#9215a8', '#dc2285', '#ac3f4f'],
            legend: {
                show: false,
            },
        })).render();
    });

    // @formatter:on
</script>