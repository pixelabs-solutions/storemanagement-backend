<?php
// echo json_encode($products_stats);

?>
<div class="card" style="border-radius:20px">
    <div class="card-body p-5">
        <!-- Header Start -->

        <!-- Header End -->
        <div class="row g-2 align-items-center list_button_statis justify-content-between">
            <!-- Stats header Buttons -->
            <div class="col-auto btn-list">
                <a href="?query=last_week" class="btn bg-transparent btn-light shadow-none last_week"
                    id="products_last_week" class="nav-link" data-i18n="statististics.tabs_in_select_range.week"> Last
                    Week
                </a>
                <a href="?query=current_month" class="btn bg-transparent btn-light shadow-none last_month "
                    id="products_last_month" class="nav-link" data-i18n="statististics.tabs_in_select_range.month">
                    Current
                    Month </a>
                <a href="?query=last_year" class="btn bg-transparent btn-light shadow-none last_year"
                    id="products_last_year" data-i18n="statististics.tabs_in_select_range.year"> Last Year </a>
            </div>
            <!-- Date Range Button -->
            <div class="col-2">
                <a href="#" class="btn btn-pill" data-bs-toggle="modal" data-bs-target="#modal-team"
                    style="background-color:#EFEFEF; border:none;"
                    data-i18n="statististics.tabs_in_select_range.button">
                    Select a Date Range
                </a>
            </div>
        </div>
        <div class="row mt-5 mb-5 d-flex flex-md-row flex-wrap flex-column justify-content-between tab-pane active show"
            id="row_1">
            <!-- Product Card Start -->
            <div class="sms_statistics_ma_kpi_card mb-2">
                <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="assets/dist/img/cart.png" height="50px;" width="50px;"
                                style="background-color:white; padding:10px; border-radius:10px;">
                            <h3 class="mt-3"><?php echo $products_stats["totalProducts"]['total']; ?></h3>
                            <strong style="color:#4987D8"
                                data-i18n="statististics.cards_in_product.product_tab_in_static.card1_in_product.normal_product">Product</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Card End -->

            <!-- Normal Products Card Start -->
            <div class="sms_statistics_ma_kpi_card mb-2">
                <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="assets/dist/img/order.png" height="50px;" width="50px;"
                                style="background-color:white; padding:10px; border-radius:10px;">
                            <h3 class="mt-3"><?php echo $products_stats["normalProducts"]['total']; ?></h3>
                            <strong style="color:#4987D8"
                                data-i18n="statististics.cards_in_product.product_tab_in_static.card2_in_normal_product.normal_product_in_card2">Normal
                                Products</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Normal Products Card End -->

            <!-- Products on sale Card Start -->
            <div class="sms_statistics_ma_kpi_card mb-2">
                <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="assets/dist/img/productsonsale.png" height="50px;" width="50px;"
                                style="background-color:white; padding:10px; border-radius:10px;">
                            <h3 class="mt-3"><?php echo $products_stats["saleProducts"]['total']; ?></h3>
                            <strong style="color:#4987D8"
                                data-i18n="statististics.cards_in_product.product_tab_in_static.card3_in_Sale.normal_product">Product
                                On Sale</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products on sale Card End -->

            <!-- Order Card Start -->
            <div class="sms_statistics_ma_kpi_card mb-2">
                <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="assets/dist/img/cart.png" height="50px;" width="50px;"
                                style="background-color:white; padding:10px; border-radius:10px;">
                            <h3 class="mt-3"><?php echo $products_stats["numberOfOrders"]['total']; ?></h3>
                            <strong style="color:#4987D8"
                                data-i18n="statististics.cards_in_product.product_tab_in_static.card4_in_product.normal_product">Order</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order Card End -->

            <!-- Products on order Card Start -->
            <div class="sms_statistics_ma_kpi_card mb-2">
                <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="assets/dist/img/order.png" height="50px;" width="50px;"
                                style="background-color:white; padding:10px; border-radius:10px;">
                            <h3 class="mt-3"><?php echo $products_stats["totalDistinctProductsOnOrder"]['total']; ?>
                            </h3>
                            <strong style="color:#4987D8"
                                data-i18n="statististics.cards_in_product.product_tab_in_static.card5_in_product.normal_product">Products
                                on order</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products on order Card End -->
        </div>
        <div id="chart-combination-2"></div>
        <!-- Colors Button Start-->
        <div class="row g-2 align-items-center ">
            <div class="col-auto ms-auto btn-list mt-5 mb-5 sms_mu_for_rtl_row_cards">
                <div class="text-light p-1" style="background-color:#627e0c; border-radius:5px;"
                    data-i18n="statististics.chart_below_btn.firts_btn.text"> Daily Average</div>
                <div class="text-light p-1" style="background-color:#8b59e4; border-radius:5px;"
                    data-i18n="statististics.chart_below_btn.second_btn.text"> Orders
                </div>
                <div class="text-light p-1" style="background-color:#9215a8; border-radius:5px;"
                    data-i18n="statististics.chart_below_btn.third_btn.text"> Product On Sale
                </div>
                <div class="text-light p-1" style="background-color:#dc2285; border-radius:5px;"
                    data-i18n="statististics.chart_below_btn.fourth_btn.text"> Normal Product
                </div>
                <div class="text-light p-1" style="background-color:#ac3f4f; border-radius:5px;"
                    data-i18n="statististics.chart_below_btn.five_btn.text"> Products
                </div>
            </div>
        </div>
        <!-- Colors Button End -->

        <!-- Icon Box End -->
    </div>
</div>


<script>
    function getQueryParams() {
        const params = {};
        window.location.search.substring(1).split("&").forEach(param => {
            const [key, value] = param.split("=");
            params[decodeURIComponent(key)] = decodeURIComponent(value);
        });
        return params;
    }

    // Example of dynamic data update
    async function fetchAndFormatDataOfProducts() {
        let queryParamsForGraph = getQueryParams().query;

        // Default to 'last_week' if no query parameter is provided
        if (!queryParamsForGraph) {
            queryParamsForGraph = 'last_week';
        }
        console.log('params', queryParamsForGraph);

        const response = await fetch(`/statistics/products?query=${queryParamsForGraph}&is_rest=true`);
        const data = await response.json();

        // Prepare the dynamicData object
        const dynamicData = {
            totalProducts: [],
            normalProducts: [],
            saleProducts: [],
            numberOfOrders: [],
            totalDistinctProductsOnOrder: []
        };

        // Extract the dates from the data
        const dates = Object.keys(data.totalProducts.byDate).sort();

        // Iterate over each date and push the values to dynamicData
        dates.forEach(date => {
            dynamicData.totalProducts.push(data.totalProducts.byDate[date] || 0);
            dynamicData.normalProducts.push(data.normalProducts.byDate[date] || 0);
            dynamicData.saleProducts.push(data.saleProducts.byDate[date] || 0);
            dynamicData.numberOfOrders.push(data.numberOfOrders.byDate[date] || 0);
            dynamicData.totalDistinctProductsOnOrder.push(data.totalDistinctProductsOnOrder.byDate[date] || 0);
        });
        console.log(dynamicData);

        return [dates, dynamicData];
    }

    document.addEventListener("DOMContentLoaded", async function () {
        var [dates, dynamicData] = await fetchAndFormatDataOfProducts();

        // Initialize the chart
        var chart = new ApexCharts(document.getElementById('chart-combination-2'), {
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
                    columnWidth: '70%',
                    gap: '2%',
                }

            },
            stroke: {
                colors: ["transparent"],
                width: 5
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },

            series: [
                {
                    name: "Distinct Products on Order",
                    data: dynamicData.totalDistinctProductsOnOrder
                },
                {
                    name: "Number of Orders",
                    data: dynamicData.numberOfOrders
                }, {
                    name: "Sale Products",
                    data: dynamicData.saleProducts
                }, {
                    name: "Normal Products",
                    data: dynamicData.normalProducts
                }, {
                    name: "Total Products",
                    data: dynamicData.totalProducts
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
                categories: dates,
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
        });
        chart.render();
    });
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
    // } else if (queryParams.query === 'last_month') {
    //     // Add the .filter_tab_active class to the element with the ID 'current_month'

    //     const elements = document.querySelectorAll('.last_month');
    //     elements.forEach(element => {
    //         element.classList.add('filter_tab_active');
    //     });
    // } else if (queryParams.query === 'last_year') {
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
    var queryParamsProducts = getQueryParams();

    if (queryParamsProducts.query === 'last_week') {
        // Add the .sms_w_date_active class to the element with the ID 'last_week'
        document.getElementById('overview_last_week').classList.add('stats_filters_active');
        document.getElementById('products_last_week').classList.add('stats_filters_active');
        document.getElementById('orders_last_week').classList.add('stats_filters_active');
        document.getElementById('revenue_last_week').classList.add('stats_filters_active');



    } else if (queryParamsProducts.query === 'current_month') {
        // Add the .sms_w_date_active class to the element with the ID 'current_month'
        document.getElementById('overview_last_month').classList.add('stats_filters_active');
        document.getElementById('products_last_month').classList.add('stats_filters_active');
        document.getElementById('orders_last_month').classList.add('stats_filters_active');
        document.getElementById('revenue_last_month').classList.add('stats_filters_active');


    } else if (queryParamsProducts.query === 'last_year') {
        // Add the .sms_w_date_active class to the element with the ID 'last_year'
        document.getElementById('overview_last_year').classList.add('stats_filters_active');
        document.getElementById('products_last_year').classList.add('stats_filters_active');
        document.getElementById('orders_last_year').classList.add('stats_filters_active');
        document.getElementById('revenue_last_year').classList.add('stats_filters_active');

    }
</script>