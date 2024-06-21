<?php

// echo json_encode($revenue_stats);


?>

<div class="card" style="border-radius:20px">
    <div class="card-body p-5">
        <!-- Header Start -->

        <!-- Header End -->
        <div class="row g-2 align-items-center list_button_statis justify-content-between">
            <!-- Stats header Buttons -->
            <div class="col-auto btn-list">
                <a href="?query=last_week" class="btn bg-transparent btn-light shadow-none last_week"
                    id="revenue_last_week" class="nav-link" data-i18n="statististics.tabs_in_select_range.week"> Last
                    Week
                </a>
                <a href="?query=current_month" class="btn bg-transparent btn-light shadow-none last_month "
                    id="revenue_last_month" class="nav-link" data-i18n="statististics.tabs_in_select_range.month">
                    Current
                    Month </a>
                <a href="?query=last_year" class="btn bg-transparent btn-light shadow-none last_year"
                    id="revenue_last_year" data-i18n="statististics.tabs_in_select_range.year"> Last Year </a>
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
            <!-- revenues Card Start -->
            <div class="sms_statistics_ma_kpi_card mb-2">
                <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="assets/dist/img/revenue.png" height="50px;" width="50px;"
                                style="background-color:white; padding:10px; border-radius:10px;">
                            <h3 class="mt-3"><?php echo $revenue_stats["totalRevenue"]['total']; ?>
                                <?php echo $currency[0]['symbol']; ?></h3>
                            <strong style="color:#4987D8"
                                data-i18n="statististics.cards_in_Revenues.product_tab_in_static.card1_in_product.normal_product">Revenues</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- revenues Card End -->

            <!-- Rehearsals Card Start -->
            <div class="sms_statistics_ma_kpi_card mb-2">
                <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="assets/dist/img/cart.png" height="50px;" width="50px;"
                                style="background-color:white; padding:10px; border-radius:10px;">
                            <h3 class="mt-3"><?php echo json_encode($revenue_stats["totalRehearsals"]['total']); ?>
                                <?php echo $currency[0]['symbol']; ?></h3>
                            <strong style="color:#4987D8"
                                data-i18n="statististics.cards_in_Revenues.product_tab_in_static.card2_in_normal_product.normal_product_in_card2">Rehearsals</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Rehearsals Card End -->

            <!-- Order average Card Start -->
            <div class="sms_statistics_ma_kpi_card mb-2">
                <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="assets/dist/img/revenue.png" height="50px;" width="50px;"
                                style="background-color:white; padding:10px; border-radius:10px;">
                            <h3 class="mt-3"><?php echo $revenue_stats["orderAverage"]['total']; ?>
                                <?php echo $currency[0]['symbol']; ?></h3>
                            <strong style="color:#4987D8"
                                data-i18n="statististics.cards_in_Revenues.product_tab_in_static.card3_in_Sale.normal_product">Order
                                average</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order average Card End -->

            <!-- Order Card Start -->
            <div class="sms_statistics_ma_kpi_card mb-2">
                <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="assets/dist/img/arrow.png" height="50px;" width="50px;"
                                style="background-color:white; padding:10px; border-radius:10px;">
                            <h3 class="mt-3"><?php echo $revenue_stats["totalShipments"]['total']; ?>
                                <?php echo $currency[0]['symbol']; ?></h3>
                            <strong style="color:#4987D8"
                                data-i18n="statististics.cards_in_Revenues.product_tab_in_static.card4_in_product.normal_product">Shipments</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order Card End -->

            <!-- net income Card Start -->
            <div class="sms_statistics_ma_kpi_card mb-2">
                <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="assets/dist/img/revenue.png" height="50px;" width="50px;"
                                style="background-color:white; padding:10px; border-radius:10px;">
                            <h3 class="mt-3"><?php echo $revenue_stats["netIncome"]['total']; ?>
                                <?php echo $currency[0]['symbol']; ?></h3>
                            <strong style="color:#4987D8"
                                data-i18n="statististics.cards_in_Revenues.product_tab_in_static.card5_in_product.normal_product">Net
                                Income</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- net income Card End -->
        </div>
        <div id="chart-combination-3"></div>
        <div class="row g-2 align-items-center">
            <div class="col-auto ms-auto btn-list mt-5 mb-5 sms_mu_for_rtl_row_cards">
                <div class="text-light p-1" style="background-color:#627e0c; border-radius:5px;"
                    data-i18n="statististics.chart_below_btn.firts_btn.text"> Net Income</div>
                <div class="text-light p-1" style="background-color:#8b59e4; border-radius:5px;"
                    data-i18n="statististics.chart_below_btn.second_btn.text"> Shipments
                </div>
                <div class="text-light p-1" style="background-color:#9215a8; border-radius:5px;"
                    data-i18n="statististics.chart_below_btn.third_btn.text"> Order Average
                </div>
                <div class="text-light p-1" style="background-color:#dc2285; border-radius:5px;"
                    data-i18n="statististics.chart_below_btn.fourth_btn.text"> Rehearsals
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
    function getQueryParams() {
        const params = {};
        window.location.search.substring(1).split("&").forEach(param => {
            const [key, value] = param.split("=");
            params[decodeURIComponent(key)] = decodeURIComponent(value);
        });
        return params;
    }

    // Example of dynamic data update
    async function fetchAndFormatDataOfRevenue() {
        let queryParamsForGraph = getQueryParams().query;

        // Default to 'last_week' if no query parameter is provided
        if (!queryParamsForGraph) {
            queryParamsForGraph = 'last_week';
        }
        console.log('params', queryParamsForGraph);

        const response = await fetch(`/statistics/revenue?query=${queryParamsForGraph}&is_rest=true`);
        const data = await response.json();

        // Prepare the dynamicData object
        const dynamicData = {
            totalRevenue: [],
            totalRehearsals: [],
            orderAverage: [],
            totalShipments: [],
            netIncome: [],
            numberOfOrders: [],
            totalDistinctProductsOnOrder: []
        };

        // Extract the dates from the data
        const dates = Object.keys(data.totalRevenue.byDate).sort();

        // Iterate over each date and push the values to dynamicData
        dates.forEach(date => {
            dynamicData.totalRevenue.push(data.totalRevenue.byDate[date] || 0);
            dynamicData.totalRehearsals.push(data.totalRehearsals.byDate[date] || 0);
            dynamicData.orderAverage.push(data.orderAverage.byDate[date] || 0);
            dynamicData.totalShipments.push(data.totalShipments.byDate[date] || 0);
            dynamicData.netIncome.push(data.netIncome.byDate[date] || 0);
            dynamicData.numberOfOrders.push(data.numberOfOrders.byDate[date] || 0);
            dynamicData.totalDistinctProductsOnOrder.push(data.totalDistinctProductsOnOrder.byDate[date] || 0);
        });
        console.log(dynamicData);

        return [dates, dynamicData];
    }

    document.addEventListener("DOMContentLoaded", async function () {
        var [dates, dynamicData] = await fetchAndFormatDataOfRevenue();

        // Initialize the chart
        var chart = new ApexCharts(document.getElementById('chart-combination-3'), {
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
                    name: "Net Income",
                    data: []
                },
                {
                    name: "Total Shipments",
                    data: []
                },
                {
                    name: "Order Average",
                    data: []
                },
                {
                    name: "Total Rehearsals",
                    data: []
                },
                {
                    name: "Total Revenue",
                    data: []
                }, {
                    name: "Number of Orders",
                    data: []
                }, {
                    name: "Total Distinct Products On Order",
                    data: []
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
            colors: ['#627e0c', '#8b59e4', '#9215a8', '#dc2285', '#ac3f4f', '#7bc043', '#041f60'],
            legend: {
                show: false,
            },
        });
        chart.render();

        // Function to update the chart with new data
        function updateChartData(newData) {
            chart.updateSeries([{
                name: "Total Revenue",
                data: newData.totalRevenue
            }, {
                name: "Total Rehearsals",
                data: newData.totalRehearsals
            }, {
                name: "Order Average",
                data: newData.orderAverage
            }, {
                name: "Total Shipments",
                data: newData.totalShipments
            }, {
                name: "Net Income",
                data: newData.netIncome
            }, {
                name: "Number of Orders",
                data: newData.numberOfOrders
            }, {
                name: "Total Distinct Products On Order",
                data: newData.totalDistinctProductsOnOrder
            }]);
        }

        console.log(dynamicData);

        // Call the update function with the dynamic data
        updateChartData(dynamicData);
    });
</script>


<script>

</script>
<script>
    //     function getQueryParams() {
    //     const params = {};
    //     window.location.search.substring(1).split("&").forEach(param => {
    //         const [key, value] = param.split("=");
    //         params[decodeURIComponent(key)] = decodeURIComponent(value);
    //     });
    //     return params;
    // }

    // Get query parameters
    var queryParamsRevenue = getQueryParams();

    if (queryParamsRevenue.query === 'last_week') {
        // Add the .sms_w_date_active class to the element with the ID 'last_week'
        document.getElementById('overview_last_week').classList.add('stats_filters_active');
        document.getElementById('products_last_week').classList.add('stats_filters_active');
        document.getElementById('orders_last_week').classList.add('stats_filters_active');
        document.getElementById('revenue_last_week').classList.add('stats_filters_active');



    } else if (queryParamsRevenue.query === 'current_month') {
        // Add the .sms_w_date_active class to the element with the ID 'current_month'
        document.getElementById('overview_last_month').classList.add('stats_filters_active');
        document.getElementById('products_last_month').classList.add('stats_filters_active');
        document.getElementById('orders_last_month').classList.add('stats_filters_active');
        document.getElementById('revenue_last_month').classList.add('stats_filters_active');


    } else if (queryParamsRevenue.query === 'last_year') {
        // Add the .sms_w_date_active class to the element with the ID 'last_year'
        document.getElementById('overview_last_year').classList.add('stats_filters_active');
        document.getElementById('products_last_year').classList.add('stats_filters_active');
        document.getElementById('orders_last_year').classList.add('stats_filters_active');
        document.getElementById('revenue_last_year').classList.add('stats_filters_active');

    }
</script>