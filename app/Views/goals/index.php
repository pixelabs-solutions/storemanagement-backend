<?php
require_once __DIR__ . '/../partials/header.php';

// var_dump($goals_data['status']);

?>

<style>
    .task_completed .card {
        background-color: #a9c4e8;
    }

    .task_completed .sms_m_ribbon {
        display: flex !important;
        justify-content: center;
    }

    .sms_m_ribbon {
        position: absolute;
        top: 25px;
        right: 0px;
        width: 100px;
        height: 40px;
        border-radius: 20px;
        background: #fff;
        transform: rotate(40deg);
        z-index: 1;
        text-align: center;
        line-height: 40px;
        /* font-weight: bold; */
        border: none;
    }

    .card {
        cursor: pointer;
    }
</style>

<?php

$total_sales_left = $goals_data["orders"]['target'] - $goals_data["orders"]['sales'];
$total_sales_left_percentage = 0;
if($goals_data["orders"]['target'] != 0){
    $total_sales_left_percentage = $goals_data["orders"]['sales'] / $goals_data["orders"]['target'] * 100;
}


$new_customers_left = $goals_data["new_customers"]['target'] - $goals_data["new_customers"]['customers_count'];
$new_customers_left_percentage = 0;
if($goals_data["new_customers"]['target'] != 0){
    $new_customers_left_percentage = $goals_data["new_customers"]['customers_count'] / $goals_data["new_customers"]['target'] * 100;
}

$new_sales_left = $goals_data["new_orders"]['target'] - $goals_data["new_orders"]['orders_count'];
$new_sales_left_percentage = 0;
if($goals_data["new_orders"]['target'] != 0){
    $new_sales_left_percentage = $goals_data["new_orders"]['orders_count'] / $goals_data["new_orders"]['target'] * 100;
}


$new_products_left = $goals_data["new_products"]['target'] - $goals_data["new_products"]['products_count'];
$new_products_left_percentage = 0;
if($goals_data["new_products"]['target'] != 0){
    $new_products_left_percentage = $goals_data["new_products"]['products_count'] / $goals_data["new_products"]['target'] * 100;
}


$avg_order_items_increase_left = $goals_data["avg_order_items_increase"]['target'] - $goals_data["avg_order_items_increase"]['rasie_in_average_items'];
$avg_order_items_increase_left_percentage = 0.0;
if($goals_data["avg_order_items_increase"]['target'] != 0.0){
    $avg_order_items_increase_left_percentage = $goals_data["avg_order_items_increase"]['rasie_in_average_items'] / $goals_data["avg_order_items_increase"]['target'] * 100;
}

$avg_order_value_increase_left = $goals_data["avg_order_value_increase"]['target'] - $goals_data["avg_order_value_increase"]['rasie_in_average_price'];
$avg_order_value_increase_left_percentage = 0.0;
if($goals_data["avg_order_value_increase"]['target'] != 0){
    $avg_order_value_increase_left_percentage = $goals_data["avg_order_value_increase"]['rasie_in_average_price'] / $goals_data["avg_order_value_increase"]['target'] * 100;
}


// Using round
$total_sales_left_percentage = round($total_sales_left_percentage, 2);
$new_customers_left_percentage = round($new_customers_left_percentage, 2);
$new_sales_left_percentage = round($new_sales_left_percentage, 2);
$new_products_left_percentage = round($new_products_left_percentage, 2);
$avg_order_items_increase_left_percentage = round($avg_order_items_increase_left_percentage, 2);
$avg_order_value_increase_left_percentage = round($avg_order_value_increase_left_percentage, 2);


$total_sales_left_percentage_status = false;
$new_customers_left_percentage_status = false;
$new_sales_left_percentage_status = false;
$new_products_left_percentage_status = false;
$avg_order_items_increase_left_percentage_status = false;
$avg_order_value_increase_left_percentage_status = false;

if ($total_sales_left_percentage >= 100) {
    $total_sales_left_percentage = 100;
    $total_sales_left_percentage_status = true;
}

if ($new_customers_left_percentage >= 100) {
    $new_customers_left_percentage = 100;
    $new_customers_left_percentage_status = true;
}

if ($new_sales_left_percentage >= 100) {
    $new_sales_left_percentage = 100;
    $new_sales_left_percentage_status = true;
}

if ($new_products_left_percentage >= 100) {
    $new_products_left_percentage = 100;
    $new_products_left_percentage_status = true;
}

if ($avg_order_items_increase_left_percentage >= 100) {
    $avg_order_items_increase_left_percentage = 100;
    $avg_order_items_increase_left_percentage_status = true;
}

if ($avg_order_value_increase_left_percentage >= 100) {
    $avg_order_value_increase_left_percentage = 100;
    $avg_order_value_increase_left_percentage_status = true;
}



?>
<!-- Page header Start-->
<div class="page-header">
    <div>
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h1 style="color:#4987d8" data-i18n="objective.top_section_like_nav.text_hading">
                    Business Goals and Objectives
                </h1>
                <p style="margin-top:-10px;" data-i18n="objective.top_section_like_nav.text_hading">You should set
                    goals, it's challenging and addicting and causes sales to
                    increase.</p>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto" data-bs-toggle="modal" data-bs-target="#add-modal-full-width">
                <div class="btn-list">
                    <a href="#" class="btn btn-pill" aria-label="Goal Setting" style="background-color:#A8C3E7;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-brand-react">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M6.306 8.711c-2.602 .723 -4.306 1.926 -4.306 3.289c0 2.21 4.477 4 10 4c.773 0 1.526 -.035 2.248 -.102" />
                            <path
                                d="M17.692 15.289c2.603 -.722 4.308 -1.926 4.308 -3.289c0 -2.21 -4.477 -4 -10 -4c-.773 0 -1.526 .035 -2.25 .102" />
                            <path
                                d="M6.305 15.287c-.676 2.615 -.485 4.693 .695 5.373c1.913 1.105 5.703 -1.877 8.464 -6.66c.387 -.67 .733 -1.339 1.036 -2" />
                            <path
                                d="M17.694 8.716c.677 -2.616 .487 -4.696 -.694 -5.376c-1.913 -1.105 -5.703 1.877 -8.464 6.66c-.387 .67 -.733 1.34 -1.037 2" />
                            <path
                                d="M12 5.424c-1.925 -1.892 -3.82 -2.766 -5 -2.084c-1.913 1.104 -1.226 5.877 1.536 10.66c.386 .67 .793 1.304 1.212 1.896" />
                            <path
                                d="M12 18.574c1.926 1.893 3.821 2.768 5 2.086c1.913 -1.104 1.226 -5.877 -1.536 -10.66c-.375 -.65 -.78 -1.283 -1.212 -1.897" />
                            <path d="M11.5 12.866a1 1 0 1 0 1 -1.732a1 1 0 0 0 -1 1.732z" />
                        </svg>
                        <b data-i18n="objective.top_section_like_nav.button">Goal Setting</b>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page header End-->

<!-- Cards Start -->

<div class="row mt-5 mb-5">

    <?php
    if ($total_sales_left_percentage_status == true) {
        ?> <!-- Bring in NIS Card Start -->
        <div class="task_completed col-lg-4 col-md-4 col-sm-12 mb-2">
            <?php
    } else {
        ?> <!-- Bring in NIS Card Start -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                <?php
    }
    ?>

            <div class="card pt-2 pb-2" style=" border-radius:20px;">
                <!-- Ribbon Start -->
                <div class="sms_m_ribbon  bg-light text-dark" style="display: none;">Well done</div>
                <!-- Ribbon End -->
                <div class="card-body">
                    <div class="text-center">
                        <svg width="44" height="36" viewBox="0 0 44 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.88889 0.888672C2.19236 0.888672 0 3.08103 0 5.77756V8.222H44V5.77756C44 3.08103 41.8076 0.888672 39.1111 0.888672H4.88889ZM44 15.5553H0V30.222C0 32.9185 2.19236 35.1109 4.88889 35.1109H39.1111C41.8076 35.1109 44 32.9185 44 30.222V15.5553ZM8.55556 25.3331H13.4444C14.1167 25.3331 14.6667 25.8831 14.6667 26.5553C14.6667 27.2276 14.1167 27.7776 13.4444 27.7776H8.55556C7.88333 27.7776 7.33333 27.2276 7.33333 26.5553C7.33333 25.8831 7.88333 25.3331 8.55556 25.3331ZM17.1111 26.5553C17.1111 25.8831 17.6611 25.3331 18.3333 25.3331H28.1111C28.7833 25.3331 29.3333 25.8831 29.3333 26.5553C29.3333 27.2276 28.7833 27.7776 28.1111 27.7776H18.3333C17.6611 27.7776 17.1111 27.2276 17.1111 26.5553Z"
                                fill="#4987D8" />
                        </svg>
                        <h3 class="mt-3 text-nowrap">Bring in NIS <?php echo $goals_data["orders"]['target']; ?> in sales </h3>
                        <div class="row">
                            <div class="col-6">
                                <p class="text-start text-nowrap">NIS <?php echo $goals_data["orders"]['sales']; ?> was received</p>
                            </div>
                            <div class="col-6">
                                <p class="ms-auto text-end text-nowrap">NIS <?php echo $total_sales_left; ?> left</p>
                            </div>
                        </div>
                        <div class="progress mb-2 text-nowrap" style="height:20px; border-radius:10px;">
                            <div class="progress-bar"
                                style="width: <?php echo $total_sales_left_percentage; ?>%; border-radius:10px;"
                                role="progressbar" aria-valuenow="<?php echo $total_sales_left_percentage; ?>"
                                aria-valuemin="0" aria-valuemax="100"
                                aria-label="<?php echo $total_sales_left_percentage; ?>% Complete">
                                <span><?php echo $total_sales_left_percentage; ?>%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bring in NIS Card End -->

        <!-- Recruit Card Start -->
        <?php
        if ($new_customers_left_percentage_status == true) {
            ?> <!-- Bring in NIS Card Start -->
            <div class="task_completed col-lg-4 col-md-4 col-sm-12 mb-2">
                <?php
        } else {
            ?> <!-- Bring in NIS Card Start -->
                <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                    <?php
        }
        ?>

                    <div class="card pt-2 pb-2" style=" border-radius:20px;">
                        <!-- Ribbon Start -->
                        <div class="sms_m_ribbon  bg-light text-dark" style="display: none;">Well done</div>
                        <!-- Ribbon End -->
                        <div class="card-body">
                            <div class="text-center">
                                <svg width="44" height="36" viewBox="0 0 44 36" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.6 9.20039C6.6 6.86649 7.52714 4.62817 9.17746 2.97785C10.8278 1.32753 13.0661 0.400391 15.4 0.400391C17.7339 0.400391 19.9722 1.32753 21.6225 2.97785C23.2729 4.62817 24.2 6.86649 24.2 9.20039C24.2 11.5343 23.2729 13.7726 21.6225 15.4229C19.9722 17.0733 17.7339 18.0004 15.4 18.0004C13.0661 18.0004 10.8278 17.0733 9.17746 15.4229C7.52714 13.7726 6.6 11.5343 6.6 9.20039ZM0 33.5585C0 26.7866 5.48625 21.3004 12.2581 21.3004H18.5419C25.3138 21.3004 30.8 26.7866 30.8 33.5585C30.8 34.686 29.8856 35.6004 28.7581 35.6004H2.04188C0.914375 35.6004 0 34.686 0 33.5585ZM42.9688 12.5691L34.1688 21.3691C33.5225 22.0154 32.4775 22.0154 31.8381 21.3691L27.4381 16.9691C26.7919 16.3229 26.7919 15.2779 27.4381 14.6385C28.0844 13.9991 29.1294 13.9923 29.7688 14.6385L33 17.8698L40.6313 10.2316C41.2775 9.58539 42.3225 9.58539 42.9619 10.2316C43.6013 10.8779 43.6081 11.9229 42.9619 12.5623L42.9688 12.5691Z"
                                        fill="#4987D8" />
                                </svg>
                                <h3 class="mt-3 text-nowrap">Recruit <?php echo $goals_data["new_customers"]['target']; ?> new
                                    customers
                                </h3>
                                <div class="row">
                                    <div class="col-7">
                                        <p class="text-start text-nowrap">
                                            <?php echo $goals_data["new_customers"]['customers_count']; ?>
                                            <span data-i18n="objective.card_two_in_objective.card_title">
                                            customers were recruited
                                            </span>
                                       
                                        </p>
                                    </div>
                                    <div class="col-5">
                                        <p class="ms-auto text-end text-nowrap"><?php echo $new_customers_left; ?> customers left
                                        </p>
                                    </div>
                                </div>
                                <div class="progress mb-2" style="height:20px; border-radius:10px;">
                                    <div class="progress-bar text-nowrap"
                                        style="width: <?php echo $new_customers_left_percentage; ?>%; border-radius:10px;"
                                        role="progressbar" aria-valuenow="<?php echo $new_customers_left_percentage; ?>"
                                        aria-valuemin="0" aria-valuemax="100"
                                        aria-label="<?php echo $new_customers_left_percentage; ?>% Complete">
                                        <span><?php echo $new_customers_left_percentage; ?>%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Recruit Card End -->

                <?php
                if ($new_sales_left_percentage_status == true) {
                    ?> <!-- Bring in NIS Card Start -->
                    <div class="task_completed col-lg-4 col-md-4 col-sm-12 mb-2">
                        <?php
                } else {
                    ?> <!-- Bring in NIS Card Start -->
                        <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                            <?php
                }
                ?>
                        <div class="card pt-2 pb-2" style=" border-radius:20px;">
                            <!-- Ribbon Start -->
                            <div class="sms_m_ribbon text-nowrap  bg-light text-dark" style="display: none;"
                                data-i18n="objective.card_four_in_objective.well_done">Well done</div>
                            <!-- Ribbon End -->
                            <div class="card-body">
                                <div class="text-center">
                                    <svg width="44" height="40" viewBox="0 0 44 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.83333 0.443359C0.817361 0.443359 0 1.26072 0 2.27669C0 3.29267 0.817361 4.11003 1.83333 4.11003H5.30903C5.59931 4.11003 5.85139 4.31628 5.9125 4.60655L9.85417 25.3079C10.3507 27.9052 12.6194 29.7767 15.2549 29.7767H37.2778C38.2938 29.7767 39.1111 28.9593 39.1111 27.9434C39.1111 26.9274 38.2938 26.11 37.2778 26.11H15.2549C14.3764 26.11 13.6201 25.4836 13.4521 24.6204L13.0396 22.4434H35.0778C37.5681 22.4434 39.7451 20.7781 40.3868 18.3718L43.5187 6.7378C44.0458 4.79753 42.5792 2.8878 40.5701 2.8878H27.5V10.6871L29.2569 8.93016C29.975 8.21211 31.1361 8.21211 31.8465 8.93016C32.5569 9.64822 32.5646 10.8093 31.8465 11.5197L26.9576 16.4086C26.2396 17.1267 25.0785 17.1267 24.3681 16.4086L19.4792 11.5197C18.7611 10.8017 18.7611 9.64058 19.4792 8.93016C20.1972 8.21975 21.3583 8.21211 22.0687 8.93016L23.8257 10.6871V2.8878H9.1743C8.47917 1.42114 6.99722 0.443359 5.30903 0.443359H1.83333ZM13.4444 39.5545C14.4169 39.5545 15.3495 39.1682 16.0372 38.4805C16.7248 37.7929 17.1111 36.8603 17.1111 35.8878C17.1111 34.9153 16.7248 33.9827 16.0372 33.2951C15.3495 32.6074 14.4169 32.2211 13.4444 32.2211C12.472 32.2211 11.5394 32.6074 10.8517 33.2951C10.1641 33.9827 9.77778 34.9153 9.77778 35.8878C9.77778 36.8603 10.1641 37.7929 10.8517 38.4805C11.5394 39.1682 12.472 39.5545 13.4444 39.5545ZM39.1111 35.8878C39.1111 34.9153 38.7248 33.9827 38.0372 33.2951C37.3495 32.6074 36.4169 32.2211 35.4444 32.2211C34.472 32.2211 33.5394 32.6074 32.8517 33.2951C32.1641 33.9827 31.7778 34.9153 31.7778 35.8878C31.7778 36.8603 32.1641 37.7929 32.8517 38.4805C33.5394 39.1682 34.472 39.5545 35.4444 39.5545C36.4169 39.5545 37.3495 39.1682 38.0372 38.4805C38.7248 37.7929 39.1111 36.8603 39.1111 35.8878Z"
                                            fill="#4987D8" />
                                    </svg>
                                    <h3 class="mt-3 text-nowrap"> <?php echo $goals_data["new_orders"]['target']; ?> new orders
                                    </h3>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="text-start text-nowrap">
                                                <?php echo $goals_data["new_orders"]['orders_count']; ?>
                                                were
                                                accepted
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="ms-auto text-end text-nowrap"><?php echo $new_sales_left; ?> left</p>
                                        </div>
                                    </div>
                                    <div class="progress mb-2 text-nowrap" style="height:20px; border-radius:10px;">
                                        <div class="progress-bar"
                                            style="width: <?php echo $new_sales_left_percentage; ?>%; border-radius:10px;"
                                            role="progressbar" aria-valuenow="<?php echo $new_sales_left_percentage; ?>"
                                            aria-valuemin="0" aria-valuemax="100"
                                            aria-label="<?php echo $new_sales_left_percentage; ?>% Complete">
                                            <span><?php echo $new_sales_left_percentage; ?>%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- New Order Card End -->


                    <!-- Page View Card Start -->
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                        <div class="card pt-2 pb-2" style=" border-radius:20px;">
                            <!-- Ribbon Start -->
                            <div class="sms_m_ribbon  bg-light text-dark" style="display: none;">Well done</div>
                            <!-- Ribbon End -->
                            <div class="card-body">
                                <div class="text-center">
                                    <svg width="44" height="36" viewBox="0 0 44 36" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.03156 1.43098C1.67781 0.791602 2.72281 0.791602 3.36906 1.43098L7.70031 5.76223V3.14973C7.70031 2.23535 8.43594 1.49973 9.35031 1.49973C10.2647 1.49973 11.0003 2.23535 11.0003 3.14973V9.74973C11.0003 10.6641 10.2647 11.3997 9.35031 11.3997H2.75031C1.83594 11.3997 1.10031 10.6641 1.10031 9.74973C1.10031 8.83535 1.83594 8.09973 2.75031 8.09973H5.36969L1.03156 3.76848C0.392187 3.12223 0.392187 2.07723 1.03156 1.43098ZM9.17844 17.1679C10.9041 13.7097 15.3109 8.09973 22.0003 8.09973C28.6897 8.09973 33.0966 13.7097 34.8222 17.1679C35.0834 17.6904 35.0834 18.3022 34.8222 18.8316C33.0966 22.2897 28.6897 27.8997 22.0003 27.8997C15.3109 27.8997 10.9041 22.2897 9.17844 18.8316C8.91719 18.3091 8.91719 17.6972 9.17844 17.1679ZM22.0003 22.3997C23.1673 22.3997 24.2864 21.9362 25.1116 21.111C25.9367 20.2858 26.4003 19.1667 26.4003 17.9997C26.4003 16.8328 25.9367 15.7136 25.1116 14.8885C24.2864 14.0633 23.1673 13.5997 22.0003 13.5997C20.8334 13.5997 19.7142 14.0633 18.889 14.8885C18.0639 15.7136 17.6003 16.8328 17.6003 17.9997C17.6003 19.1667 18.0639 20.2858 18.889 21.111C19.7142 21.9362 20.8334 22.3997 22.0003 22.3997ZM40.6316 1.43098C41.2778 0.784727 42.3228 0.784727 42.9622 1.43098C43.6016 2.07723 43.6084 3.12223 42.9622 3.7616L38.6309 8.09285H41.2503C42.1647 8.09285 42.9003 8.82848 42.9003 9.74285C42.9003 10.6572 42.1647 11.3929 41.2503 11.3929H34.6503C33.7359 11.3929 33.0003 10.6572 33.0003 9.74285V3.14973C33.0003 2.23535 33.7359 1.49973 34.6503 1.49973C35.5647 1.49973 36.3003 2.23535 36.3003 3.14973V5.7691L40.6316 1.43785V1.43098ZM1.03156 34.5685C0.385312 33.9222 0.385312 32.8772 1.03156 32.2379L5.36281 27.9066H2.75031C1.83594 27.9066 1.10031 27.171 1.10031 26.2566C1.10031 25.3422 1.83594 24.6066 2.75031 24.6066H9.35031C10.2647 24.6066 11.0003 25.3422 11.0003 26.2566V32.8566C11.0003 33.771 10.2647 34.5066 9.35031 34.5066C8.43594 34.5066 7.70031 33.771 7.70031 32.8566V30.2304L3.36906 34.5685C2.72281 35.2147 1.67781 35.2147 1.03844 34.5685H1.03156ZM40.6316 34.5685L36.3003 30.2372V32.8497C36.3003 33.7641 35.5647 34.4997 34.6503 34.4997C33.7359 34.4997 33.0003 33.7641 33.0003 32.8497V26.2497C33.0003 25.3354 33.7359 24.5997 34.6503 24.5997H41.2503C42.1647 24.5997 42.9003 25.3354 42.9003 26.2497C42.9003 27.1641 42.1647 27.8997 41.2503 27.8997H38.6309L42.9622 32.231C43.6084 32.8772 43.6084 33.9222 42.9622 34.5616C42.3159 35.201 41.2709 35.2079 40.6316 34.5616V34.5685Z"
                                            fill="#4987D8" />
                                    </svg>
                                    <h3 class="mt-3 text-nowrap"> <?php echo $goals_data["page_views"]['target']; ?> page views</h3>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="text-start text-nowrap">450 were accepted</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="ms-auto text-end text-nowrap">0 left</p>
                                        </div>
                                    </div>
                                    <div class="progress mb-2" style="height:20px; border-radius:10px;">
                                        <div class="progress-bar nowrap" style="width: 90%; border-radius:10px;"
                                            role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
                                            aria-label="90% Complete">
                                            <span>90%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page View Card End -->

                    <!-- positions on Google Card Start -->
                    <div class="col-lg-4  col-md-4 col-sm-12 mb-2">
                        <div class="card pt-2 pb-2" style=" border-radius:20px;">
                            <!-- Ribbon Start -->
                            <div class="sms_m_ribbon  bg-light text-dark text-nowrap" style="display: none;">Well done</div>
                            <!-- Ribbon End -->
                            <div class="card-body">
                                <div class="text-center">
                                    <svg width="42" height="44" viewBox="0 0 42 44" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M41.9688 22.4984C41.9688 34.6586 33.6414 43.3125 21.3438 43.3125C9.55313 43.3125 0.03125 33.7906 0.03125 22C0.03125 10.2094 9.55313 0.6875 21.3438 0.6875C27.0844 0.6875 31.9141 2.79297 35.6352 6.26484L29.8344 11.8422C22.2461 4.52031 8.13516 10.0203 8.13516 22C8.13516 29.4336 14.0734 35.4578 21.3438 35.4578C29.7828 35.4578 32.9453 29.4078 33.4437 26.2711H21.3438V18.9406H41.6336C41.8312 20.032 41.9688 21.0805 41.9688 22.4984Z"
                                            fill="#4987D8" />
                                    </svg>
                                    <h3 class="mt-3 text-nowrap">Advance <?php echo $goals_data["google_rankings"]['target']; ?>
                                        positions on
                                        Google
                                    </h3>
                                    <div class="row">
                                        <div class="col-7 "> 
                                            <p class="text-start text-nowrap">You advanced 8 positions</p>
                                        </div>
                                        <div class="col-5">
                                            <p class="ms-auto text-end text-nowrap">7  locations left</p>
                                        </div>
                                    </div>
                                    <div class="progress mb-2" style="height:20px; border-radius:10px;">
                                        <div class="progress-bar text-nowrap" style="width: 93%; border-radius:10px;"
                                            role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"
                                            aria-label="38% Complete">
                                            <span>93%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- positions on Google Card End -->

                    <!-- keywords on Google Card Start -->
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                        <div class="card pt-2 pb-2" style=" border-radius:20px;">
                            <!-- Ribbon Start -->
                            <div class="sms_m_ribbon  bg-light text-dark" style="display: none;">Well done</div>
                            <!-- Ribbon End -->
                            <div class="card-body">
                                <div class="text-center">
                                    <svg width="42" height="44" viewBox="0 0 42 44" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M41.9688 22.4984C41.9688 34.6586 33.6414 43.3125 21.3438 43.3125C9.55313 43.3125 0.03125 33.7906 0.03125 22C0.03125 10.2094 9.55313 0.6875 21.3438 0.6875C27.0844 0.6875 31.9141 2.79297 35.6352 6.26484L29.8344 11.8422C22.2461 4.52031 8.13516 10.0203 8.13516 22C8.13516 29.4336 14.0734 35.4578 21.3438 35.4578C29.7828 35.4578 32.9453 29.4078 33.4437 26.2711H21.3438V18.9406H41.6336C41.8312 20.032 41.9688 21.0805 41.9688 22.4984Z"
                                            fill="#4987D8" />
                                    </svg>
                                    <h3 class="mt-3 text-nowrap">Added <?php echo $goals_data["keywords"]['target']; ?> new keywords
                                    </h3>
                                    <div class="row">
                                         <div class="col-7">
                                            <p class="text-start text-nowrap">Added 8 keywords </p>
                                        </div>
                                        <div class="col-5">
                                            <p class="ms-auto text-end text-nowrap ">7  keywords left</p>
                                        </div>
                                    </div>
                                    <div class="progress mb-2" style="height:20px; border-radius:10px;">
                                        <div class="progress-bar" style="width: 50%; border-radius:10px;"
                                            role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"
                                            aria-label="38% Complete text-nowrap">
                                            <span>50%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- keywords on Google Card End -->

                    <!-- New Product Card Start -->
                    <?php
                    if ($new_products_left_percentage_status == true) {
                        ?> <!-- Bring in NIS Card Start -->
                        <div class="task_completed col-lg-4 col-md-4 col-sm-12 mb-2">
                            <?php
                    } else {
                        ?> <!-- Bring in NIS Card Start -->
                            <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                                <?php
                    }
                    ?>
                            <div class="card pt-2 pb-2" style=" border-radius:20px;">
                                <!-- Ribbon Start -->
                                <div class="sms_m_ribbon  bg-light text-dark " style="display: none;">Well done</div>
                                <!-- Ribbon End -->
                                <div class="card-body">
                                    <div class="text-center">
                                        <svg width="44" height="40" viewBox="0 0 44 40" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.83333 0.443359C0.817361 0.443359 0 1.26072 0 2.27669C0 3.29267 0.817361 4.11003 1.83333 4.11003H5.30903C5.59931 4.11003 5.85139 4.31628 5.9125 4.60655L9.85417 25.3079C10.3507 27.9052 12.6194 29.7767 15.2549 29.7767H37.2778C38.2938 29.7767 39.1111 28.9593 39.1111 27.9434C39.1111 26.9274 38.2938 26.11 37.2778 26.11H15.2549C14.3764 26.11 13.6201 25.4836 13.4521 24.6204L13.0396 22.4434H35.0778C37.5681 22.4434 39.7451 20.7781 40.3868 18.3718L43.5187 6.7378C44.0458 4.79753 42.5792 2.8878 40.5701 2.8878H27.5V10.6871L29.2569 8.93016C29.975 8.21211 31.1361 8.21211 31.8465 8.93016C32.5569 9.64822 32.5646 10.8093 31.8465 11.5197L26.9576 16.4086C26.2396 17.1267 25.0785 17.1267 24.3681 16.4086L19.4792 11.5197C18.7611 10.8017 18.7611 9.64058 19.4792 8.93016C20.1972 8.21975 21.3583 8.21211 22.0687 8.93016L23.8257 10.6871V2.8878H9.1743C8.47917 1.42114 6.99722 0.443359 5.30903 0.443359H1.83333ZM13.4444 39.5545C14.4169 39.5545 15.3495 39.1682 16.0372 38.4805C16.7248 37.7929 17.1111 36.8603 17.1111 35.8878C17.1111 34.9153 16.7248 33.9827 16.0372 33.2951C15.3495 32.6074 14.4169 32.2211 13.4444 32.2211C12.472 32.2211 11.5394 32.6074 10.8517 33.2951C10.1641 33.9827 9.77778 34.9153 9.77778 35.8878C9.77778 36.8603 10.1641 37.7929 10.8517 38.4805C11.5394 39.1682 12.472 39.5545 13.4444 39.5545ZM39.1111 35.8878C39.1111 34.9153 38.7248 33.9827 38.0372 33.2951C37.3495 32.6074 36.4169 32.2211 35.4444 32.2211C34.472 32.2211 33.5394 32.6074 32.8517 33.2951C32.1641 33.9827 31.7778 34.9153 31.7778 35.8878C31.7778 36.8603 32.1641 37.7929 32.8517 38.4805C33.5394 39.1682 34.472 39.5545 35.4444 39.5545C36.4169 39.5545 37.3495 39.1682 38.0372 38.4805C38.7248 37.7929 39.1111 36.8603 39.1111 35.8878Z"
                                                fill="#4987D8" />
                                        </svg>
                                        <h3 class="mt-3 text-nowrap">Add <?php echo $goals_data["new_products"]['target']; ?> new
                                            products
                                        </h3>
                                        <div class="row">
                                            <div class="col-8">
                                                <p class="text-start text-nowrap">
                                                    <?php echo $goals_data["new_products"]['products_count']; ?>
                                                    products
                                                    have been added
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <p class="ms-auto text-end text-nowrap"><?php echo $new_products_left; ?> products
                                                    left
                                                </p>
                                            </div>
                                        </div>
                                        <div class="progress mb-2" style="height:20px; border-radius:10px;">
                                            <div class="progress-bar"
                                                style="width: <?php echo $new_products_left_percentage; ?>%; border-radius:10px;"
                                                role="progressbar"
                                                aria-valuenow="<?php echo $new_products_left_percentage; ?>"
                                                aria-valuemin="0" aria-valuemax="100"
                                                aria-label="<?php echo $new_products_left_percentage; ?>% Complete">
                                                <span><?php echo $new_products_left_percentage; ?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New Product Card End -->

                        <!-- average items Card Start -->

                        <?php
                        if ($avg_order_items_increase_left_percentage_status == true) {
                            ?> <!-- Bring in NIS Card Start -->
                            <div class="task_completed col-lg-4 col-md-4 col-sm-12 mb-2">
                                <?php
                        } else {
                            ?> <!-- Bring in NIS Card Start -->
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                                    <?php
                        }
                        ?>
                                <div class="card pt-2 pb-2" style=" border-radius:20px;">
                                    <!-- Ribbon Start -->
                                    <div class="sms_m_ribbon  bg-light text-dark" style="display: none;">Well done</div>
                                    <!-- Ribbon End -->
                                    <div class="card-body">
                                        <div class="text-center">
                                            <svg width="44" height="32" viewBox="0 0 44 32" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M29.1019 28.6982C29.1019 30.4376 27.7063 31.8332 25.9669 31.8332C24.2275 31.8332 22.8181 30.4376 22.8181 28.6982C22.8181 26.9589 24.2344 25.5495 25.9669 25.5495C27.7131 25.5495 29.1019 26.9589 29.1019 28.6982ZM11.6462 25.5495C9.90687 25.5495 8.51125 26.9657 8.51125 28.6982C8.51125 30.4307 9.90687 31.8332 11.6462 31.8332C13.3856 31.8332 14.795 30.4376 14.795 28.6982C14.795 26.9589 13.3856 25.5495 11.6462 25.5495ZM31.7006 6.98699C10.9244 6.98699 5.63063 6.10699 0 0.166992C2.365 3.72137 3.66438 10.4039 25.6506 10.0807C48.565 9.73699 34.5881 16.0001 30.5181 23.0676C43.3538 11.607 52.4769 6.98699 31.7006 6.98699Z"
                                                    fill="#4987D8" />
                                            </svg>
                                            <h3 class="mt-3">
                                                <?php echo $goals_data["avg_order_items_increase"]['target']; ?>%
                                                increase in
                                                average items
                                            </h3>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="text-start text-nowrap">rose by
                                                        <?php echo $goals_data["avg_order_items_increase"]['rasie_in_average_items']; ?>%
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="ms-auto text-end text-nowrap">
                                                        <?php echo $avg_order_items_increase_left; ?>%
                                                        left
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="progress mb-2" style="height:20px; border-radius:10px;">
                                                <div class="progress-bar"
                                                    style="width: <?php echo $avg_order_items_increase_left_percentage; ?>%; border-radius:10px;"
                                                    role="progressbar"
                                                    aria-valuenow="<?php echo $avg_order_items_increase_left_percentage; ?>"
                                                    aria-valuemin="0" aria-valuemax="100"
                                                    aria-label="<?php echo $avg_order_items_increase_left_percentage; ?>% Complete">
                                                    <span><?php echo $avg_order_items_increase_left_percentage; ?>%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- average items Card End -->

                            <!-- average order Card Start -->
                            <?php
                            if ($avg_order_value_increase_left_percentage_status == true) {
                                ?> <!-- Bring in NIS Card Start -->
                                <div class="task_completed col-lg-4 col-md-4 col-sm-12 mb-2">
                                    <?php
                            } else {
                                ?> <!-- Bring in NIS Card Start -->
                                    <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                                        <?php
                            }
                            ?>
                                    <div class="card pt-2 pb-2" style=" border-radius:20px;">
                                        <!-- Ribbon Start -->
                                        <div class="sms_m_ribbon  bg-light text-dark text-nowrap" style="display: none; ">Well done
                                        </div>
                                        <!-- Ribbon End -->
                                        <div class="card-body">
                                            <div class="text-center">
                                                <svg width="44" height="40" viewBox="0 0 44 40" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M1.83333 0.443359C0.817361 0.443359 0 1.26072 0 2.27669C0 3.29267 0.817361 4.11003 1.83333 4.11003H5.30903C5.59931 4.11003 5.85139 4.31628 5.9125 4.60655L9.85417 25.3079C10.3507 27.9052 12.6194 29.7767 15.2549 29.7767H37.2778C38.2938 29.7767 39.1111 28.9593 39.1111 27.9434C39.1111 26.9274 38.2938 26.11 37.2778 26.11H15.2549C14.3764 26.11 13.6201 25.4836 13.4521 24.6204L13.0396 22.4434H35.0778C37.5681 22.4434 39.7451 20.7781 40.3868 18.3718L43.5187 6.7378C44.0458 4.79753 42.5792 2.8878 40.5701 2.8878H27.5V10.6871L29.2569 8.93016C29.975 8.21211 31.1361 8.21211 31.8465 8.93016C32.5569 9.64822 32.5646 10.8093 31.8465 11.5197L26.9576 16.4086C26.2396 17.1267 25.0785 17.1267 24.3681 16.4086L19.4792 11.5197C18.7611 10.8017 18.7611 9.64058 19.4792 8.93016C20.1972 8.21975 21.3583 8.21211 22.0687 8.93016L23.8257 10.6871V2.8878H9.1743C8.47917 1.42114 6.99722 0.443359 5.30903 0.443359H1.83333ZM13.4444 39.5545C14.4169 39.5545 15.3495 39.1682 16.0372 38.4805C16.7248 37.7929 17.1111 36.8603 17.1111 35.8878C17.1111 34.9153 16.7248 33.9827 16.0372 33.2951C15.3495 32.6074 14.4169 32.2211 13.4444 32.2211C12.472 32.2211 11.5394 32.6074 10.8517 33.2951C10.1641 33.9827 9.77778 34.9153 9.77778 35.8878C9.77778 36.8603 10.1641 37.7929 10.8517 38.4805C11.5394 39.1682 12.472 39.5545 13.4444 39.5545ZM39.1111 35.8878C39.1111 34.9153 38.7248 33.9827 38.0372 33.2951C37.3495 32.6074 36.4169 32.2211 35.4444 32.2211C34.472 32.2211 33.5394 32.6074 32.8517 33.2951C32.1641 33.9827 31.7778 34.9153 31.7778 35.8878C31.7778 36.8603 32.1641 37.7929 32.8517 38.4805C33.5394 39.1682 34.472 39.5545 35.4444 39.5545C36.4169 39.5545 37.3495 39.1682 38.0372 38.4805C38.7248 37.7929 39.1111 36.8603 39.1111 35.8878Z"
                                                        fill="#4987D8" />
                                                </svg>
                                                <h3 class="mt-3 text-nowrap">An increase of NIS
                                                    <?php echo $goals_data["avg_order_value_increase"]['target']; ?>
                                                    in the average order
                                                </h3>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="text-start text-nowrap">rose by
                                                            <?php echo $goals_data["avg_order_value_increase"]['rasie_in_average_price']; ?>
                                                            NIS
                                                        </p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="ms-auto text-end text-nowrap">
                                                            <?php echo $avg_order_value_increase_left; ?>
                                                            NIS
                                                            left
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="progress mb-2 " style="height:20px; border-radius:10px;">
                                                    <div class="progress-bar text-nowrap"
                                                        style="width: <?php echo $avg_order_value_increase_left_percentage; ?>%; border-radius:10px;"
                                                        role="progressbar"
                                                        aria-valuenow="<?php echo $avg_order_value_increase_left_percentage; ?>"
                                                        aria-valuemin="0" aria-valuemax="100"
                                                        aria-label="<?php echo $avg_order_value_increase_left_percentage; ?>% Complete">
                                                        <span><?php echo $avg_order_value_increase_left_percentage; ?>%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- average order Card End -->


                            </div>

                            <!-- Cards End -->
                            <div class="modal modal-blur fade m-0" id="add-modal-full-width" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #4987D870">
                                            <div class="py-1 rounded-top text-center">
                                                <h3 class="card-title m-0 text-black fs-2 fw-bold text-nowrap">Definitions of goals
                                                    and
                                                    objectives
                                                </h3>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            include ('set.php');
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                            require_once __DIR__ . '/../partials/footer.php';
                            ?>