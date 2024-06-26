<?php

// echo json_encode($orders_stats);


?>
<div class="card" style="border-radius:20px">
                <div class="card-body p-5">
                    <!-- Header Start -->

                    <!-- Header End -->
                    <div class="row g-2 align-items-center list_button_statis justify-content-between">
                        <!-- Stats header Buttons -->
                        <div class="col-auto btn-list">
                            <a href="?query=last_week" id="orders_last_week" class="btn bg-transparent btn-light shadow-none last_week"
                                class="nav-link" data-i18n="statististics.tabs_in_select_range.week"> Last Week
                            </a>
                            <a href="?query=current_month" id="orders_last_month" class="btn bg-transparent btn-light shadow-none last_month "
                                class="nav-link" data-i18n="statististics.tabs_in_select_range.month"> Current
                                Month </a>
                            <a href="?query=last_year" id="orders_last_year" class="btn bg-transparent btn-light shadow-none last_year"
                                data-i18n="statististics.tabs_in_select_range.year"> Last Year </a>
                        </div>
                        <!-- Date Range Button -->
                        <div class="col-2">
                            <a href="#" class="btn btn-pill" data-bs-toggle="modal" data-bs-target="#modal-team"
                            style="background-color:#EFEFEF; border:none;" data-i18n="statististics.tabs_in_select_range.button">
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
                                        <h3 class="mt-3"><?php echo number_format($orders_stats["totalOrders"]); ?></h3>
                                        <strong style="color:#4987D8" data-i18n="statististics.cards_in_orders.card1_in_product.normal_product">Order</strong>
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
                                        <h3 class="mt-3"><?php echo number_format($orders_stats["totalRevenue"]); ?> <?php echo $orders_stats['current_currency']; ?></h3>
                                        <strong style="color:#4987D8" 
                                        
                                        data-i18n="statististics.cards_in_orders.card2_in_normal_product.normal_product_in_card2"
                                        >Total Revenue</strong>
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
                                        <h3 class="mt-3"><?php echo number_format($orders_stats["orderAverage"]); ?> <?php echo $orders_stats['current_currency']; ?></h3>
                                        <strong style="color:#4987D8"  data-i18n="statististics.cards_in_orders.card3_in_Sale.normal_product">Order Average</strong>
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
                                        <h3 class="mt-3"><?php echo number_format($orders_stats["averageItems"]); ?></h3>
                                        <strong style="color:#4987D8"  data-i18n="statististics.cards_in_orders.card4_in_product.normal_product">Average items</strong>
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
                                        <h3 class="mt-3"><?php echo number_format($orders_stats["totalCustomers"]); ?></h3>
                                        <strong style="color:#4987D8" data-i18n="statististics.cards_in_orders.card5_in_product.normal_product">Customers</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- customers Card End -->
                    </div>
                    <div id="chart-combination-4"></div>
                    <div class="row g-2 align-items-center">
                        <div class="col-auto ms-auto btn-list mt-5 mb-5 sms_mu_for_rtl_row_cards">
                            <div class="text-light p-1" style="background-color:#627e0c; border-radius:5px;"
                                data-i18n="statististics.chart_below_btn.firts_btn.text"> New
                                Customer</div>
                            <div class="text-light p-1" style="background-color:#8b59e4; border-radius:5px;"
                                data-i18n="statististics.chart_below_btn.second_btn.text"> Customer
                            </div>
                            <div class="text-light p-1" style="background-color:#9215a8; border-radius:5px;"
                                data-i18n="statististics.chart_below_btn.third_btn.text"> Product
                            </div>
                            <div class="text-light p-1" style="background-color:#dc2285; border-radius:5px;"
                                data-i18n="statististics.chart_below_btn.fourth_btn.text"> Order
                            </div>
                            <div class="text-light p-1" style="background-color:#ac3f4f; border-radius:5px;"
                                data-i18n="statististics.chart_below_btn.five_btn.text"> Revenues
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
                    columnWidth: '50%',
                    gap: '3%',
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
                data: [4000, 1000, 3500, 3500, 4000, 3000, 5000]
            }, {
                name: "Returning Customer",
                data: [3000,4300, 1900, 2200, 2400, 4300, 2200]
            }, {
                name: "Product",
                data: [3000, 2000, 1600, 1300, 3000, 2500, 2500]
            }, {
                name: "Order",
                data: [2000, 1300, 900, 1500, 2400, 1300, 2200]
            }, {
                name: "Revenue",
                data: [2000, 2500, 500, 3500, 2400, 1300, 2200]
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

<script>
                        // // Function to get query parameters from the URL
                        // function getQueryParams() {
                        //     const params = {};
                        //     window.location.search.substring(1).split("&").forEach(param => {
                        //         const [key, value] = param.split("=");
                        //         params[decodeURIComponent(key)] = decodeURIComponent(value);
                        //     });
                        //     return params;
                        // }

                        // // Get query parameters
                        // const queryParams = getQueryParams();

                        // if (queryParams.query === 'last_week') {
                        //     // Add the .filter_tab_active class to the element with the ID 'last_week'
                        //     const elements = document.querySelectorAll('.last_week');
                        //     elements.forEach(element => {
                        //         element.classList.add('filter_tab_active');
                        //     });
                        // }
                        // else if (queryParams.query === 'last_month') {
                        //     // Add the .filter_tab_active class to the element with the ID 'current_month'

                        //     const elements = document.querySelectorAll('.last_month');
                        //     elements.forEach(element => {
                        //         element.classList.add('filter_tab_active');
                        //     });
                        // }
                        // else if (queryParams.query === 'last_year') {
                        //     // Add the .filter_tab_active class to the element with the ID 'last_year'
                        //     const elements = document.querySelectorAll('.last_year');
                        //     elements.forEach(element => {
                        //         element.classList.add('filter_tab_active');
                        //     });
                        // }


                    </script>
<script>
            function getQueryParams() {
            const params = {};
            window.location.search.substring(1).split("&").forEach(param => {
                const [key, value] = param.split("=");
                params[decodeURIComponent(key)] = decodeURIComponent(value);
            });
            return params;
        }

        // Get query parameters
        var queryParamsOrders = getQueryParams();

     if (queryParamsOrders.query === 'last_week') {
            // Add the .sms_w_date_active class to the element with the ID 'last_week'
            document.getElementById('overview_last_week').classList.add('stats_filters_active');
            document.getElementById('products_last_week').classList.add('stats_filters_active');
            document.getElementById('orders_last_week').classList.add('stats_filters_active');
            document.getElementById('revenue_last_week').classList.add('stats_filters_active');

            

        } else if (queryParamsOrders.query === 'current_month') {
            // Add the .sms_w_date_active class to the element with the ID 'current_month'
            document.getElementById('overview_last_month').classList.add('stats_filters_active');
            document.getElementById('products_last_month').classList.add('stats_filters_active');
            document.getElementById('orders_last_month').classList.add('stats_filters_active');
            document.getElementById('revenue_last_month').classList.add('stats_filters_active');


        } else if (queryParams.query === 'last_year') {
            // Add the .sms_w_date_active class to the element with the ID 'last_year'
            document.getElementById('overview_last_year').classList.add('stats_filters_active');
            document.getElementById('products_last_year').classList.add('stats_filters_active');
            document.getElementById('orders_last_year').classList.add('stats_filters_active');
            document.getElementById('revenue_last_year').classList.add('stats_filters_active');

        }
</script>
