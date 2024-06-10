<?php
require_once __DIR__ . '/../partials/header.php';
// echo json_encode($overview_stats);

?>

<style>
    .sms_statistics_ma_kpi_card {
        width: 19%;
    }

    .sms_w_active_item {
        background-color: #4987D870 !important;

    }

    .sms_w_item_deactive {
        background-color: white;
    }

    @media screen and (max-width: 775px) {
        .sms_statistics_ma_kpi_card {
            width: 100%;
        }
    }
    .rtl .list_button_statis{
        /* margin-left: 0;
        margin-right: auto; */
        gap: 55%;
    }
/* 
    .filter_tab_active {
        background-color: #A8C3E7 !important;
    } */
 /* Add this in the style tag or a separate CSS file */
#loader {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-family: 'Arial', sans-serif;
    color: #333;
    text-align: center;
}

#loader .spinner {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #3498db;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    animation: spin 2s linear infinite;
    margin-bottom: 20px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

#loader h1 {
    font-size: 1.5em;
    margin: 0;
    padding: 0;
}
</style>

<!-- Icon Box Start -->

<div class="row g-2 mt-5  mb-5 ">
<div id="loader">
    <div class="spinner"></div>
    <h1>Loading, please wait...</h1>
</div>
    <div>
        <ul class="nav justify-content-between nav-tabs" data-bs-toggle="tabs" style="border:none;">
            <li class="nav-item mb-2">
                <a href="#tabs_overview" class="nav-link active sms_w_active_item justify-content-center"
                    data-bs-toggle="tab" style=" border-radius:20px; padding: 5px 30px; width:150px;"
                    data-i18n="statististics.tabs_in_static.tab_overview">Overview</a>
            </li>
            <li class="nav-item mb-2">
                <a href="#tabs_product" class="nav-link sms_w_item_deactive justify-content-center" data-bs-toggle="tab"
                    style=" border-radius:20px; padding: 5px 30px; width:150px; "
                    data-i18n="statististics.tabs_in_static.tab_Products">Products</a>
            </li>
            <li class="nav-item mb-2">
                <a href="#tabs_revenues" class="nav-link sms_w_item_deactive justify-content-center"
                    data-bs-toggle="tab" style=" border-radius:20px; padding: 5px 30px; width:150px;"
                    data-i18n="statististics.tabs_in_static.tab_Revenues">Revenues</a>

            </li>
            <li class="nav-item mb-2">
                <a href="#tabs_orders" class="nav-link sms_w_item_deactive justify-content-center" data-bs-toggle="tab"
                    style=" border-radius:20px; padding: 5px 30px; width:150px;"
                    data-i18n="statististics.tabs_in_static.tab_Orders">Orders</a>

            </li>


        </ul>
    </div>

    <div class="tab-content">
        <div class="tab-pane active show" id="tabs_overview">
            <div class="card" style="border-radius:20px">
                <div class="card-body p-5">
                    <!-- Header Start -->

                    <div class="row g-2 align-items-center list_button_statis">
                        <!-- Stats header Buttons -->
                        <div class="col-auto btn-list">
                            <a href="?query=last_week" class="btn btn-pill  last_week btn-light tab-pane"
                                class="nav-link" style="background:#A8C3E7" data-i18n="statististics.tabs_in_select_range.week"> Last Week
                            </a>
                            <a href="?query=last_month" class="btn btn-light shadow-none last_month "
                                class="nav-link" data-i18n="statististics.tabs_in_select_range.month"> Current
                                Month </a>
                            <a href="?query=last_year" class="btn btn-light shadow-none last_year"
                                data-i18n="statististics.tabs_in_select_range.year"> Last Year </a>
                        </div>
                        <!-- Date Range Button -->
                        <div class="col-auto ms-auto">
                            <a href="#" class="btn btn-pill" data-bs-toggle="modal" data-bs-target="#modal-team"
                                style="background-color:#A8C3E7; border:none;" data-i18n="statististics.tabs_in_select_range.button">
                                Select a Date Range
                            </a>
                        </div>  
                    </div>


  

                    <div class="row mt-5 mb-5 d-flex flex-md-row flex-wrap flex-column justify-content-between tab-pane active show sms_mu_for_rtl_row_cards"
                        id="row_1">
                        <!-- New Customer Card Start -->
                        <div class="sms_statistics_ma_kpi_card mb-2">
                            <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="assets/dist/img/newuser.png" height="50px;" width="50px;"
                                            style="background-color:white; padding:10px; border-radius:10px;">
                                        <h3 class="mt-3"><?php echo $overview_stats["newCustomers"]; ?></h3>
                                        <strong style="color:#4987D8"
                                            data-i18n="statististics.cards_in_overview.crad_text_blue_in_card_customer">New
                                            Customer</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New Customer Card End -->

                        <!-- Returning Customer Card Start -->
                        <div class="sms_statistics_ma_kpi_card mb-2">
                            <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="assets/dist/img/returning.png" height="50px;" width="50px;"
                                            style="background-color:white; padding:10px; border-radius:10px;">
                                        <h3 class="mt-3"><?php echo $overview_stats["returningCustomers"]; ?></h3>
                                        <strong style="color:#4987D8"
                                            data-i18n="statististics.cards_in_overview.crad_text_blue_in_card_returing">Returning
                                            Customer</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Returning Customer Card End -->

                        <!-- Product Card Start -->
                        <div class="sms_statistics_ma_kpi_card mb-2">
                            <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="assets/dist/img/cart.png" height="50px;" width="50px;"
                                            style="background-color:white; padding:10px; border-radius:10px;">
                                        <h3 class="mt-3"><?php echo $overview_stats["totalProducts"]; ?></h3>
                                        <strong style="color:#4987D8"
                                            data-i18n="statististics.cards_in_overview.crad_text_blue_in_card_product">Product</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Card End -->

                        <!-- Order Card Start -->
                        <div class="sms_statistics_ma_kpi_card mb-2">
                            <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="assets/dist/img/order.png" height="50px;" width="50px;"
                                            style="background-color:white; padding:10px; border-radius:10px;">
                                        <h3 class="mt-3"><?php echo $overview_stats["totalOrders"]; ?></h3>
                                        <strong style="color:#4987D8"
                                            data-i18n="statististics.cards_in_overview.crad_text_blue_in_card_order">Order</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Order Card End -->

                        <!-- Revenue Card Start -->
                        <div class="sms_statistics_ma_kpi_card mb-2">
                            <div class=" align-items-center" style="background-color:#F2F2F2; border-radius:20px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="assets/dist/img/revenue.png" height="50px;" width="50px;"
                                            style="background-color:white; padding:10px; border-radius:10px;">
                                        <h3 class="mt-3"><?php echo $overview_stats["totalRevenue"]; ?></h3>
                                        <strong style="color:#4987D8"
                                            data-i18n="statististics.cards_in_overview.crad_text_blue_in_card_revenue">Revenue</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Revenue Card End -->
                    </div>
                    <div id="chart-combination"></div>
                    <!-- Colors Button Start-->
                    <div class="row g-2 align-items-center ">
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
        </div>
        <div class="tab-pane" id="tabs_product">
            <?php
            include ('products.php');
            ?>
        </div>
        <div class="tab-pane" id="tabs_revenues">
            <?php
            include ('revinue.php');
            ?>
        </div>
        <div class="tab-pane" id="tabs_orders">
            <?php
            include ('orders.php');
            ?>
        </div>
    </div>

</div>




<!-- Model Start -->

<div class="modal modal-blur fade" id="modal-team" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select a Date Range</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="GET">
                <div class="modal-body">
                    <div class="row mb-3 align-items-end">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <!-- <label class="form-label">From Date</label> -->
                            <label for="startDate">Start Date</label>
                            <input id="startDate" name="date_from" class="form-control" type="date" />
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="startDate">To Date</label>
                            <input id="startDate" name="date_to" class="form-control" type="date" />
                        </div>

                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-pill btn-info" data-bs-dismiss="modal">Search</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- Model End -->

<script>
   document.addEventListener("DOMContentLoaded", function () {
    // Get all nav-link elements
    var navLinks = document.querySelectorAll('.nav-link');

    // Retrieve the stored active tab from localStorage
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        var activeTabLink = document.querySelector(`a[href="${activeTab}"]`);
        if (activeTabLink) {
            navLinks.forEach(function (link) {
                link.classList.remove('sms_w_active_item');
                link.classList.add('sms_w_item_deactive');
            });
            activeTabLink.classList.add('sms_w_active_item');
            activeTabLink.classList.remove('sms_w_item_deactive');
            new bootstrap.Tab(activeTabLink).show();
        }
    }

    // Loop through each nav-link element
    navLinks.forEach(function (navLink) {
        // Attach onclick event handler
        navLink.addEventListener('click', function () {
            // Remove active class from all nav-links
            navLinks.forEach(function (link) {
                link.classList.remove('sms_w_active_item');
                link.classList.add('sms_w_item_deactive');
            });

            // Add active class to the clicked nav-link
            this.classList.remove('sms_w_item_deactive');
            this.classList.add('sms_w_active_item');

            // Store the active tab in localStorage
            var href = this.getAttribute('href');
            localStorage.setItem('activeTab', href);
        });
    });
});


</script>
<script>
              window.addEventListener('load', function() {
        document.getElementById('loader').style.display = 'none';
    });

        </script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-combination'), {
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
                data: [3000, 4300, 1900, 2200, 2400, 4300, 2200]
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
                        // Function to get query parameters from the URL
                        function getQueryParams() {
                            const params = {};
                            window.location.search.substring(1).split("&").forEach(param => {
                                const [key, value] = param.split("=");
                                params[decodeURIComponent(key)] = decodeURIComponent(value);
                            });
                            return params;
                        }

                        // Get query parameters
                        const queryParams = getQueryParams();

                        if (queryParams.query === 'last_week') {
                            // Add the .filter_tab_active class to the element with the ID 'last_week'
                            const elements = document.querySelectorAll('.last_week');
                            elements.forEach(element => {
                                element.classList.add('filter_tab_active');
                            });
                        }
                        else if (queryParams.query === 'last_month') {
                            // Add the .filter_tab_active class to the element with the ID 'current_month'

                            const elements = document.querySelectorAll('.last_month');
                            elements.forEach(element => {
                                element.classList.add('filter_tab_active');
                            });
                        }
                        else if (queryParams.query === 'last_year') {
                            // Add the .filter_tab_active class to the element with the ID 'last_year'
                            const elements = document.querySelectorAll('.last_year');
                            elements.forEach(element => {
                                element.classList.add('filter_tab_active');
                            });
                        }


                    </script>

                    
                    
<?php
require_once __DIR__ . '/../partials/footer.php';

?>