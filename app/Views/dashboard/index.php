<?php
include('../app/Views/partials/header.php');
require_once __DIR__ . '/../partials/header.php';

var_dump($dashboard_data);
?>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Map Css -->
<style>
    /* CSS for the map container */
    #map {
        height: 300px;
        width: 100%;
    }

    /* CSS for the tooltip */
    .tooltip {
        position: absolute;
        background-color: white;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        pointer-events: none;
        display: none;
    }

    .abc .sms_mu_we_en {
        display: block !important;
    }

    .rtl .sms_mu_we_en {
        display: none !important;
    }

    .abc .sms_mu_we_heb {
        display: none !important;
    }

    .rtl .sms_mu_we_heb {
        display: block !important;
    }
</style>
<!-- Map Css End -->
<!-- Header Start -->


<div class="row g-2 mt-5 mb-5 align-items-center sms_mu_for_rtl">
    <!-- Stats header Buttons -->
    <div class="col-auto btn-list">
        <a href="?query=24_hours" id="24_hours" class="shadow-none  outline-none bg-transparent btn btn-light tab-pane sms_w_date" data-i18n="dashboard.tabs.first_tab"> 24 Hours</a>
        <a href="?query=last_week" id="last_week" class=" shadow-none btn border-none outline-none  bg-transparent btn-light tab-pane sms_w_date" data-i18n="dashboard.tabs.second_tab"> Last Week
        </a>
        <a href="?query=current_month" id="current_month" class=" shadow-none  outline-none bg-transparent btn btn-light tab-pane sms_w_date" data-i18n="dashboard.tabs.third_tab "> Last Month
        </a>
        <a href="?query=last_year" id="last_year" class="btn  btn-pill shadow-none  btn-light  outline-none tab-pane sms_w_date" data-i18n="dashboard.tabs.fourth_tab" style="background-color:#A8C3E7;"> Last Year
        </a>
    </div>
    <!-- Date Range Button  Start-->
    <div class="col-auto ms-auto">
        <a href="#" class="btn btn-pill" data-bs-toggle="modal" data-bs-target="#modal-team" style="background-color:#A8C3E7; border:none;" data-i18n="statististics.tabs_in_select_range.button">
            Select a Date Range
        </a>
    </div>
    <!-- Date Range Button End -->
</div>

<!-- Header End -->
<!--  -->


<!-- Card Start -->
<div>
    <div class="row g-2 mb-5 flex-row-reverse sms_mu_for_rtl_row_cards">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card pt-2 h-100 " style="border-radius:20px;">
                <div class="card-body">
                    <div class="row g-2  sms_mu_for_rtl_row_cards">
                        <div class=" col-8 ">
                            <h3 class=" text-muted" data-i18n="dashboard.card_product.card_title"> New Products </h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <svg width="40" height="40" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g filter="url(#filter0_d_272_20)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_20)" shape-rendering="crispEdges" />
                                    <circle cx="29" cy="25" r="25" fill="#F51975" fill-opacity="0.29" shape-rendering="crispEdges" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_272_20" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_272_20" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_20" result="shape" />
                                    </filter>
                                    <pattern id="pattern0_272_20" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_272_20" transform="scale(0.03125)" />
                                    </pattern>
                                    <image id="image0_272_20" width="32" height="32" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAe9JREFUWIXtlrFuE0EQhr85Ow6yBOEspUuBeAGQ0pqOB0B+AipT7XGu0lBYokljGeFz43dIHVFAgZSSFlIFJYIO2VFoLNu7Q3FnyYV15zs7pvEvbbP6Z/ebmd29g512+s+SooHGmEPgBUClUvna6XT+FFnHKxIUBMFbEbkWkTMROZtOpzdBEJitABhjGsAH4LNzru6cq4vIF+BjGIav7h1ARE6A7+PxuBFF0UUURRe+7zeAS+fcyb0DAM+AT4PBYDqfaLfbE+AceL4NgH3gbsn8HfAg72KZt8AYc+R53jtVnXubwLdkLOo4GQMAEVHP8953u93faeuXMwlFjlX1DfALmABXgA+8XGK/SuYrqnpkrT0H1gMAagDW2nq/379ewU8Yhk+ccz9V1c/yZp4BEakBeJ43WmVzAGvtcDF2LYAki1mv1/u7KkDinYnI+hUg7vctoKsCJN7bjbSA+AwMc2w+12iTLVi5/4sAmzqERQGGxO1bD0BVC7VAREYkV3gtgKIVUNURG6iAAAdJNrkkIkPgMRnPfSpAs9l8BJSTbHIpiSkbYx6m+VKf4mq16jvnUNW9Vqv1NA/AbDbbExFKpVKN5V/PbADiEiIip9ba0zwAInHlrbUHab5UAGvtDxF5TfwPkFuqOgEui8TutNPW9A9LS7Dauv/KAgAAAABJRU5ErkJggg==" />
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="row g-2  sms_mu_for_rtl_row_cards mt-2">
                        <div class=" col-8 ">
                            <h3> <?php echo $dashboard_data["statistics"]["new_products"]; ?> </h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <!-- <svg width="40" height="40" viewBox="0 0 58 58" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g filter="url(#filter0_d_272_20)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_20)"
                                        shape-rendering="crispEdges" />
                                    <circle cx="29" cy="25" r="25" fill="#F51975" fill-opacity="0.29"
                                        shape-rendering="crispEdges" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_272_20" x="0" y="0" width="58" height="58"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_272_20" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_20"
                                            result="shape" />
                                    </filter>
                                    <pattern id="pattern0_272_20" patternContentUnits="objectBoundingBox" width="1"
                                        height="1">
                                        <use xlink:href="#image0_272_20" transform="scale(0.03125)" />
                                    </pattern>
                                    <image id="image0_272_20" width="32" height="32"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAe9JREFUWIXtlrFuE0EQhr85Ow6yBOEspUuBeAGQ0pqOB0B+AipT7XGu0lBYokljGeFz43dIHVFAgZSSFlIFJYIO2VFoLNu7Q3FnyYV15zs7pvEvbbP6Z/ebmd29g512+s+SooHGmEPgBUClUvna6XT+FFnHKxIUBMFbEbkWkTMROZtOpzdBEJitABhjGsAH4LNzru6cq4vIF+BjGIav7h1ARE6A7+PxuBFF0UUURRe+7zeAS+fcyb0DAM+AT4PBYDqfaLfbE+AceL4NgH3gbsn8HfAg72KZt8AYc+R53jtVnXubwLdkLOo4GQMAEVHP8953u93faeuXMwlFjlX1DfALmABXgA+8XGK/SuYrqnpkrT0H1gMAagDW2nq/379ewU8Yhk+ccz9V1c/yZp4BEakBeJ43WmVzAGvtcDF2LYAki1mv1/u7KkDinYnI+hUg7vctoKsCJN7bjbSA+AwMc2w+12iTLVi5/4sAmzqERQGGxO1bD0BVC7VAREYkV3gtgKIVUNURG6iAAAdJNrkkIkPgMRnPfSpAs9l8BJSTbHIpiSkbYx6m+VKf4mq16jvnUNW9Vqv1NA/AbDbbExFKpVKN5V/PbADiEiIip9ba0zwAInHlrbUHab5UAGvtDxF5TfwPkFuqOgEui8TutNPW9A9LS7Dauv/KAgAAAABJRU5ErkJggg==" />
                                </defs>
                            </svg> -->
                            <span style="color:#40A826"> 10% </span>
                            <svg width="18" height="18" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.35621 0.521719C3.53976 0.38134 2.7641 0.929399 2.62372 1.74585L0.336094 15.0506C0.195717 15.8671 0.743774 16.6427 1.56022 16.7831C2.37667 16.9235 3.15233 16.3754 3.29271 15.559L5.32616 3.73252L17.1526 5.76596C17.9691 5.90634 18.7447 5.35828 18.8851 4.54183C19.0255 3.72539 18.4774 2.94973 17.661 2.80935L4.35621 0.521719ZM33.5991 24.3221C24.9338 20.5471 19.9658 18.8874 17.0744 18.0973C15.6206 17.7001 14.7023 17.5257 14.1339 17.4159C13.8253 17.3564 13.7208 17.3334 13.6734 17.3188C13.6399 17.3085 13.8963 17.3753 14.1163 17.6511C14.3093 17.8931 14.3274 18.124 14.3063 18.0066C14.2987 17.9647 14.291 17.9118 14.2751 17.804C14.2606 17.7055 14.2418 17.5803 14.2165 17.4349C14.1115 16.8312 13.9091 15.9738 13.4063 14.7066C12.4134 12.2045 10.2447 8.09426 5.32708 1.13444L2.87698 2.86561C7.73256 9.73765 9.75025 13.6268 10.6178 15.8131C11.0451 16.89 11.1913 17.5491 11.261 17.9492C11.2793 18.0548 11.2934 18.1485 11.3072 18.2418C11.3196 18.3258 11.3356 18.4376 11.3538 18.5382C11.3839 18.7059 11.4608 19.133 11.771 19.5219C12.1083 19.9446 12.5402 20.109 12.7918 20.1863C13.0293 20.2594 13.319 20.314 13.5651 20.3615C14.106 20.466 14.9382 20.6236 16.2836 20.9912C18.9908 21.7309 23.8165 23.3327 32.4009 27.0724L33.5991 24.3221Z" fill="#40A826" />
                            </svg>
                            <p style="font-size:10px;">last 7 days </p>
                        </div>
                    </div>
                    <!-- <div class="row g-2 mt-2">
                        <div class="col-6">
                          
                        </div>
                        <div class="col-auto ms-auto">
                           
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card pt-2 h-100" style="border-radius:20px;">
                <div class="card-body">
                    <div class="row g-2 sms_mu_for_rtl_row_cards">
                        <div class="col-8">
                            <h3 class="text-muted" data-i18n="dashboard.card_arrivals.card_title"> New Arivals </h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <svg width="40" height="40" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g filter="url(#filter0_d_272_30)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_30)" shape-rendering="crispEdges" />
                                    <circle cx="29" cy="25" r="25" fill="#D9D9D9" fill-opacity="0.08" shape-rendering="crispEdges" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_272_30" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_272_30" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_30" result="shape" />
                                    </filter>
                                    <pattern id="pattern0_272_30" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_272_30" transform="scale(0.03125)" />
                                    </pattern>
                                    <image id="image0_272_30" width="32" height="32" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAA05JREFUWIW9lk9oJFUQh7/3uo1ZMOAOgv8FFfWgIGvMzYOuisriwYviIoJkMXuYns4cJCt4aFjiKijDzEvUBCEKC95lES8romtcUU9eRE+CrLqHzBriJhPz+ufBJHbGyfRLNKnTdNWrel9XVVeNYZ/EOfegpFngGuCNWq32KoDdLwDgNHAHcBCYbDabw/sGkGXZgKRrizpr7Y37CbAq6eOC6vuVlZWzAPF+ALRarUPAQ8BxYHF5efnMxMTEHwAmJECWZbZSqZwAnpD09eDg4CtjY2OXQ3ynp6ev8t5/I+n9NE1PdduDMlCpVEaBSQBjzAOrq6seeCnE13vvgJ/b7fbrveyhJRgpPki6P8Sp1Wo9Cxzx3t+bZVne60xoE/7W9Xz31NTUo/0cGo3GbcDbwAv1ev2X7c6V9oBz7jlJbwEngZuMMV9JGgCakt5Z74c/iz4zMzNXdDqdc8B8rVar94vftwTOuaOSpiU9labp2aKt0Wh8GkXRB51OZ77ZbB5N0/THDVun0zkJHBgaGnq57AW3zUCz2TxmjHkzz/Mnx8fHP+t1JsuygUqlcgoYBWaBR4DfgfustSPVavWHXQE4545Les0YcyRJki/KgjjnRiW9W1D9lCTJrcYYlfnGAHNzc4NLS0u1PM/vtNa2JR0DHk+S5HxZAABJF7tUN8/Ozh4ASmdFDLC4uDhljBk1xiAJSc+naRp0OYD3/vMoii4AN6yrPgwdVBbAGLPlk7LWXh96OUC9Xr9kjBkBTgAvLiwsPBPqu/EVnAduWf+tPM/ndwIAkCTJBaDntANwzr0n6Z6CarFWqx2OAbz3Y1EU/QrcLul0mqbndgpQJpLuAoYLqjasZ6Ber18C0v/70jKmTYAyaTQaV1trny7qoij6rlqtfrnTCwtiggHiOL5O0kxR571vAJsAzrnDkjZ3i6R2mqbflsYOAegl3UNG0kfAlQX7J8DDfUIIAreh9750ovHvFAfZgwDiOA4B2JXEAM65xyRNFg3W2qxarZ6BvzNgzNa1Ial7j3T/4Siz/wOQ5/lBY8zwltN5XulHHrBogrK2UYKedBsSWIJdlckCWGv7Ou95E0rasyYrk41tuOcZ2O4lgzKw5z1QBrC2tvafAbbL8l9Ss2eLdNsaugAAAABJRU5ErkJggg==" />
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="row g-2 sms_mu_for_rtl_row_cards mt-2">
                        <div class="col-8">
                            <h3> 1457 </h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <span style="color:#40A826"> 10 % </span>
                            <svg width="18" height="18" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.35621 0.521719C3.53976 0.38134 2.7641 0.929399 2.62372 1.74585L0.336094 15.0506C0.195717 15.8671 0.743774 16.6427 1.56022 16.7831C2.37667 16.9235 3.15233 16.3754 3.29271 15.559L5.32616 3.73252L17.1526 5.76596C17.9691 5.90634 18.7447 5.35828 18.8851 4.54183C19.0255 3.72539 18.4774 2.94973 17.661 2.80935L4.35621 0.521719ZM33.5991 24.3221C24.9338 20.5471 19.9658 18.8874 17.0744 18.0973C15.6206 17.7001 14.7023 17.5257 14.1339 17.4159C13.8253 17.3564 13.7208 17.3334 13.6734 17.3188C13.6399 17.3085 13.8963 17.3753 14.1163 17.6511C14.3093 17.8931 14.3274 18.124 14.3063 18.0066C14.2987 17.9647 14.291 17.9118 14.2751 17.804C14.2606 17.7055 14.2418 17.5803 14.2165 17.4349C14.1115 16.8312 13.9091 15.9738 13.4063 14.7066C12.4134 12.2045 10.2447 8.09426 5.32708 1.13444L2.87698 2.86561C7.73256 9.73765 9.75025 13.6268 10.6178 15.8131C11.0451 16.89 11.1913 17.5491 11.261 17.9492C11.2793 18.0548 11.2934 18.1485 11.3072 18.2418C11.3196 18.3258 11.3356 18.4376 11.3538 18.5382C11.3839 18.7059 11.4608 19.133 11.771 19.5219C12.1083 19.9446 12.5402 20.109 12.7918 20.1863C13.0293 20.2594 13.319 20.314 13.5651 20.3615C14.106 20.466 14.9382 20.6236 16.2836 20.9912C18.9908 21.7309 23.8165 23.3327 32.4009 27.0724L33.5991 24.3221Z" fill="#40A826" />
                            </svg>
                            <p style="font-size:10px;">last 7 days </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card pt-2 h-100" style="border-radius:20px;">
                <div class="card-body">
                    <div class="row g-2 sms_mu_for_rtl_row_cards ">
                        <div class="col-8 ">
                            <h3 class="text-muted" data-i18n="dashboard.card_customers.card_title">New Customers </h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <svg width="40" height="40" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g filter="url(#filter0_d_272_40)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_40)" shape-rendering="crispEdges" />
                                    <circle cx="29" cy="25" r="25" fill="#56AEEE" fill-opacity="0.2" shape-rendering="crispEdges" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_272_40" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_272_40" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_40" result="shape" />
                                    </filter>
                                    <pattern id="pattern0_272_40" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_272_40" transform="scale(0.03125)" />
                                    </pattern>
                                    <image id="image0_272_40" width="32" height="32" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAABSRJREFUWIW1l22IXFcZx3//c++6SZsE9sWF2kKU1MbGYkISMAURbKl9oZaCaEvF1n5oCiZzbiadpsFWM5EWUwuZnTPjQjCSD1WKa/IhGj/kQynJBwttYhtLXyDal2gkzctu0inUXWfO44e9i7OTrLtrdx+4zDnP+T/3+d1nzj3nHtFhIYQNwHPAGklnzWzfyMjIrnK53OzUzoe59k6lUrkGOAhUgf4Y4x1mdltfX9/WhUgOkLZ3kiS5Fzjkvd+fu06GELaY2a+Bny8EwJQKSLpW0vvtvlar9R5w3UIkvwwgxngqxnhDB9RKYArUggGY2UFJdw4ODq4EKJfLzjm3XdILCwWgTkcI4UHgWWA/sBqIwO3e+7EFAwghLDOz+yXdliddAXwCXA2MACeAY8BvvPcn5hPAhRBWA39xzn1D0v4kSe4aGRnp9t4v8d4L+JKkpyU1gEPVarU8nwAKIbxsZkNZlj0/k7her/fFGI/FGL+7ZcuWV+cDwAHrR0dHfzsb8ebNmy8Ah51z6yd9+/btWzSd/n+NtQOk5XJ5fDYAuY0BXeVyOQ0hvNhoNEaq1er3O0UhBN9oNC6GEA6Y2WWTvR1gMmBVrVb79pVE9Xq9r1ar/bDd19PT8yhgkrY65+7qjDGzu83sB8DyEMJ9MwIA683sniuJzOwLZvbwZF9Sj6QfS9puZqUY497LbuzcLyVtizFulfTsnj17rpoJYNZmZt7MDpjZrcAbWZa92KkpFAq/M7OGc26lpD+Nj48/Pm8AgJIkGQJKZrZtOlGMMQN+KulpM9tcr9eXzwfATWa2I8ZYMrO9WZadnE5YLBZfB/4QY3xYUt3Mdn0qgFqtdo+ka8zsFeB2ST+bKaarq+sp4MFms3nQzDYMDg5+vX1cIYSzSZJ8pdVqfRO41Xv/ULugUqmsSZLkO8D3gH8DLwM3Av80sz/OBlzSfUACXABWmNkQgHPuaAq80Gq1fiHpqJlNCQwhdAMvAfslHW4b+nN+43WzAQD+2tY+L2ldjLHLzHamS5cufaLRaDxnZs8AB9qjms3m1WmaRu/9I7NMNCcLIfx3hcq34Sl/wfDwcHLmzJl3mShdnOf8XYDS6UYrlcqN586d+3ur1VrtnPuWpL0xxq9J+lQgzjmZ2VHgziRJjk/7FqRp+kyM8ZZisXjRzN4BPmNmH2dZdlzSckk7JH0yOjr6mqRHJW1btmzZmzHGv0na4Zy7P9cmQFlST5Zlx2OMl4APvfdHNm3a9PG0APkGMmU8TdPJSbfVzBYBvre393PAvcD1jUbjq0mS3AIsNbPC7t27FwOPS1oEFPIKrCWfxHQmmMnMbF3++4GkD4Avd3d3N/LqvAd8VtJA3laxWPwXEwvXpB4m9pxjcwJIksQAAyYr8FZeoVUbN278CLgK+MjMemOMPZIMuLhz584uYLmkLjN7O4df65ybWwVarZaAk8Ca4eHhRNLbkvqBWK1WB4CLAM65Xudcr5lJ0oX+/v4vAqeY+MachF47NjZ2/P+pwCXgw9OnT99gZm/k1WikaXotcJaJFW6xmS2WdH2M8ZyZXQeMA6vGx8ffHBoaWgFcKpVK5+cEkJuAV9M03ZBl2UlJNUkHBgYGTjjntgOnzOxXkurAPyT9ZMmSJUeAI8CTpVLpfLPZvBmY8i057TpwRQLpeTOr1mq1Y4VCof2seCi/Ju2BtnYBoFqt3iTpSeCxzqcCoF6v3x1j/D1XOKzkdth7f0cI4RHgR8Dn5wLPxPFul/d+T7vzP0SLQX5uXo/WAAAAAElFTkSuQmCC" />
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="row g-2 sms_mu_for_rtl_row_cards mt-2">
                        <div class="col-8">
                            <h3> <?php echo $dashboard_data["statistics"]["new_customers"]; ?> </h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <span style="color:#B50E0E"> 10% </span>
                            <svg width="18" height="18" viewBox="0 0 34 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.34266 26.723C3.52496 26.8559 2.75435 26.3008 2.62146 25.4831L0.455822 12.1579C0.322929 11.3402 0.878071 10.5696 1.69577 10.4367C2.51347 10.3038 3.28408 10.8589 3.41697 11.6766L5.34198 23.5212L17.1866 21.5962C18.0043 21.4633 18.7749 22.0185 18.9078 22.8362C19.0407 23.6539 18.4855 24.4245 17.6678 24.5574L4.34266 26.723ZM33.5894 3.37936C24.9245 7.08173 19.9574 8.70925 17.0673 9.48379C15.6143 9.87318 14.6967 10.0441 14.1286 10.1517C13.8205 10.21 13.7145 10.2328 13.6656 10.2475C13.6281 10.2588 13.8847 10.1945 14.1074 9.92073C14.306 9.67649 14.326 9.44074 14.3054 9.55321C14.298 9.59317 14.2904 9.64396 14.2745 9.7502C14.2599 9.84685 14.2411 9.97026 14.2157 10.1136C14.11 10.7095 13.9065 11.5538 13.4025 12.7997C12.4079 15.2583 10.2371 19.2924 5.3191 26.1192L2.88496 24.3657C7.74014 17.6261 9.75583 13.8143 10.6215 11.6746C11.0476 10.6212 11.1929 9.9782 11.2618 9.58951C11.2801 9.48673 11.2941 9.39542 11.3078 9.30394C11.3201 9.22206 11.3364 9.1113 11.3547 9.01149C11.3854 8.84441 11.4641 8.41616 11.78 8.02782C12.1198 7.60993 12.552 7.44991 12.7995 7.37529C13.0356 7.30411 13.3239 7.25074 13.5704 7.20405C14.1115 7.10157 14.9444 6.94686 16.2907 6.58605C18.9992 5.86016 23.8259 4.28874 32.4106 0.620639L33.5894 3.37936Z" fill="#B50E0E" />
                            </svg>
                            <p style="font-size:10px;">last 7 days </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card pt-2 h-100" style="border-radius:20px;">
                <div class="card-body">
                    <div class="row g-2 sms_mu_for_rtl_row_cards">
                        <div class="col-8 ">
                            <h3 class="text-muted" data-i18n="dashboard.card_transaction.card_title"> Total Transiction
                            </h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <svg width="40" height="40" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g filter="url(#filter0_d_272_50)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_50)" shape-rendering="crispEdges" />
                                    <circle cx="29" cy="25" r="25" fill="#EE5656" fill-opacity="0.2" shape-rendering="crispEdges" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_272_50" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_272_50" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_50" result="shape" />
                                    </filter>
                                    <pattern id="pattern0_272_50" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_272_50" transform="scale(0.03125)" />
                                    </pattern>
                                    <image id="image0_272_50" width="32" height="32" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAABflJREFUWIXtVm1sHFcVPWdm/ZGPRXidgh0+FKqURlCBVLVAFUjSgFQ1aRKapEaqlCZOFIztzJu4JbUEBeYHH3Uhu96ZXUd2AJeSlrJRUVPRCAohCUloaZWIj7YUlNIWIXkD8hbVqe21Pe/wx4uM8TYOAgmk3l+jd++559x7R/c94E37X7bBwcH6fD6/+L/JwWqOIAgSqVTqxwCutNZu2rt372/mmzQIAqexsfGAtbamubl5d0tLS1wt1qnmaGxsTAO4SPJux3GeCMNw83zIJbGxsfGApOUk31EsFh/q7++vuSwBURTtkvRxANs8zzsM4CYA38hms5+/FHkURaGk9wO4M5lMbgKwqFwuF4IgqJ2XgCiKVkr6suu6m4wxrwGAMebXJCOS2yVVHVsYhncBuLGurm49gIcuXrxoSqXSZgBIpVI/GBwcrH9DAfl8/l0Avu84zh2dnZ3nK+e5XO4GSfdYa7eSVDUBJE8DeFu5XF4Vx/EnAOxYsmTJ6rq6uhYAr4+MjBxJp9ML/glT+Uin0wsSicQpkg96npepnPf29n7AcZwfAagn+SSAp0nm9uzZMzzdsRWS2gFcB0DTOa8jebukH5ZKpckgCGyhUHCLxeJ3ACwtl8sb9u3b9/o/BEhiGIaHHMeZrK2t3T06Orqoq6vrb9lstpNkN8n9kp6UtIjkbQBaAPgAGgB8AUDWWvsTkpbkx0h+VtLbJW3zff/hSjGFQsEdGho6SPIqAOuNMa9xenbdJG9dvHjxmpGRkW8DeJHkaUm5OI5XdXV1Dc1sWxRFayT9FMCzkjb6vv+nmf5MJtOcSCSOSXovgJ3GmAcqviAInFQq1Qfgg3Ec38woim6SdJDkR6y1t5DsALAKwFlJrb7vn55FvlTSowCeSyaT7Tt27ChHUeRJOuP7/tkZcVsk3Q3gnZK+5Pv+N2d2olgsPkey35GUBFAr6X0knyG5juTNAM7PJu/v76+RdFxSwRjTOjo6mgjD8DCAu0g+FkXR0kqstXYhgOettWtJ3htFUUdl3BcuXOiT9Ozw8HBUGcFqAA9L+qq19nHXdZ+W9Dnf9wdmVb9C0hPGmHdnMpllruseAfDS2NjYtvr6+ntIriW5F8AVkrIAPmWMeSoMw4MAdgG4E8B7ACyrq6vb2tbWNukAgDHmZBzHN5Dc5bruWQBvIfkrzLLa2toXAbwahuEp13XPSTpSKpU2d3d3j/i+303ysKSTAHKSdhpjnpqGvgDgEQBtAK4C0NLW1jYJzNgDXV1dL5fL5ZUA7pgGTM4W0NbWNjk2NvZRkr3W2jW+738xCAJb8Xuedx+AGyXFJD85Y/EskPTHqampa5uamjYYY8oVzJxbLQzDY5L2+75/dC7/payvr69hampqAMDVkm4neZ+k+33fL8yOTcyVgOQvJa0GcDSbzd5KcgDA+Zqamk3t7e1/uZSAjo6OVwHcFobhbpInAExMTEw8PldstdvweyR3ZrPZbSS/JWk7gFcmJibunc/7IJfLNUqiMeYgyU4Aw5XN9y/FVksShmEBwDpr7TrHcX4H4GcAJgDUJpPJ61tbW8ffAPuApKZEIrErjuNxAC8bYxbNFVv1PQDg9wCyNTU1fwBwHMChUql0PYDkyMjIgTAMr5gNyGaz1+Tz+eVNTU2tJE/EcXxWUlrSmWokVQXEcfwIgNY4jl8AUCiVSl9vaGgYAPBnSeMADs3GuK67LI7jXxSLxXbP875GMiC5wXXdrmo8VUcAAD09PcmFCxf+XFJW0iqSy13XXWet3SjpuwDOANgiyXMc55zneY9mMpkrXde9X5JIrgCw1Rhz6t8SAABhGH4IQB+AZtd1r7bWrpU0QHKLpE9LeonkUQAPAjgtaT/JfQBWktzueV7V9s9LAACk0+lUIpF4HsBjADZKWu84zpCkEwDOkTwh6RoAnwHwV5KD4+PjX6n251+2AADI5XLXWmuzJE9OTU3lXdc9LukZkhMARiW94jjOb4eHh48FQTA137zzFgAAvb29H3Yc5+g0rscY03M5+P+IZTKZt868dt+0/3v7O4Iz4EjJ7vnKAAAAAElFTkSuQmCC" />
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="row g-2 sms_mu_for_rtl_row_cards mt-2">
                        <div class="col-8">
                            <h3> <?php echo $dashboard_data["statistics"]["total_transactions"]; ?></h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <span style="color:#40A826"> 10 % </span>
                            <svg width="18" height="18" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.35621 0.521719C3.53976 0.38134 2.7641 0.929399 2.62372 1.74585L0.336094 15.0506C0.195717 15.8671 0.743774 16.6427 1.56022 16.7831C2.37667 16.9235 3.15233 16.3754 3.29271 15.559L5.32616 3.73252L17.1526 5.76596C17.9691 5.90634 18.7447 5.35828 18.8851 4.54183C19.0255 3.72539 18.4774 2.94973 17.661 2.80935L4.35621 0.521719ZM33.5991 24.3221C24.9338 20.5471 19.9658 18.8874 17.0744 18.0973C15.6206 17.7001 14.7023 17.5257 14.1339 17.4159C13.8253 17.3564 13.7208 17.3334 13.6734 17.3188C13.6399 17.3085 13.8963 17.3753 14.1163 17.6511C14.3093 17.8931 14.3274 18.124 14.3063 18.0066C14.2987 17.9647 14.291 17.9118 14.2751 17.804C14.2606 17.7055 14.2418 17.5803 14.2165 17.4349C14.1115 16.8312 13.9091 15.9738 13.4063 14.7066C12.4134 12.2045 10.2447 8.09426 5.32708 1.13444L2.87698 2.86561C7.73256 9.73765 9.75025 13.6268 10.6178 15.8131C11.0451 16.89 11.1913 17.5491 11.261 17.9492C11.2793 18.0548 11.2934 18.1485 11.3072 18.2418C11.3196 18.3258 11.3356 18.4376 11.3538 18.5382C11.3839 18.7059 11.4608 19.133 11.771 19.5219C12.1083 19.9446 12.5402 20.109 12.7918 20.1863C13.0293 20.2594 13.319 20.314 13.5651 20.3615C14.106 20.466 14.9382 20.6236 16.2836 20.9912C18.9908 21.7309 23.8165 23.3327 32.4009 27.0724L33.5991 24.3221Z" fill="#40A826" />
                            </svg>
                            <p style="font-size:10px;">last 7 days </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card End -->

    <!-- Graph and Map Start -->
    <div class="row mb-5">
        <!-- Graph Start -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
            <div class="card h-100" style="border-radius:20px;">
                <div class="">
                    <div class="row card-body d-flex justify-content-end sms_mu_for_rtl_row_cards">
                        <div class="col-2 d-flex flex-column justify-content-center">
                            <p class="bg-primary p-3"></p>
                            <h6 class="text-center sms_mu_we_en">Website</h6>
                            <h6 class="text-center sms_mu_we_heb">אתר אינטרנט</h6>
                            <p class="bg-info p-3"> </p>
                            <h6 class="text-center text-nowrap sms_mu_we_heb">יישום</h6>
                            <h6 class="text-center text-nowrap sms_mu_we_en ">Application</h6>
                        </div>
                        <div class="col-10">
                            <div id="chart-completion-tasks-8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Graph End -->
        <!-- Map Start -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
            <div class="card h-100" style="border-radius:20px;">
                <div class="card-body">
                    <!-- Start header -->
                    <div class="row g-2 align-items-center sms_mu_margin">
                        <div class="col-auto ">
                            <h4 class="text-primary sms_mu_we_en">Customer Location</h4>
                            <h4 class="text-primary sms_mu_we_heb">מיקום_לקוחd</h4>
                        </div>
                        <div class="col-auto ms-auto ">
                            <div class="mb-3">
                                <select type="text" class="form-select dropdown-tom-select-style with-input" placeholder="Filter by city" name="city" multiple id="select_city">
                                    <?php foreach ($dashboard_data["customers_location"] as $statist) : ?>
                                        <?php $city_value = $statist['city']; ?>
                                        <option value="<?php echo $city_value; ?>"><?php echo $city_value; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- <script>
                        document.getElementById('select_city').addEventListener('change', function() {
                            let selectedCities = Array.from(this.selectedOptions).map(option => option.value);
                            let cityRows = document.querySelectorAll('.city-row');

                            if (selectedCities.length === 0) {
                                // If no option is selected, display all city rows
                                cityRows.forEach(row => {
                                    row.style.display = 'flex';
                                });
                            } else {
                                // If options are selected, display only selected city rows
                                cityRows.forEach(row => {
                                    let cityName = row.dataset.city;
                                    if (selectedCities.includes(cityName)) {
                                        row.style.display = 'flex';
                                    } else {
                                        row.style.display = 'none';
                                    }
                                });
                            }
                        });
                    </script> -->

                    <!-- End Header -->
                    <!-- Map and City Data Start -->
                    <div class="row g-2 align-items-center">
                        <!-- Map Data Start -->
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <div id="map" style="border-radius:20px;"></div>
                            <div id="tooltip" class="tooltip"></div>
                        </div>
                        <!-- Map Data End -->
                        <!-- Filter City Data Start  -->
                        <div class="col-lg-4 col-md-3 col-sm-12">
                            <!-- City name with progress bar start -->
                            <?php foreach ($dashboard_data["customers_location"] as $statist) : ?>
                                <?php $city_name = $statist['city']; ?>
                                <?php $city_value = $statist['percentage_of_customers']; ?>
                                <div class="row g-2 city-row" data-city="<?php echo $city_name; ?>">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <p class="text-end sms_city_name" ><?php echo $city_name; ?></p>
                                        <div class="progress mb-2" style="height:15px; border-radius:10px; margin-top:-10px;">
                                            <div class="progress-bar" style="width: <?php echo $city_value; ?>; border-radius:10px;" role="progressbar" aria-valuenow="<?php echo $city_value; ?>" aria-valuemin="0" aria-valuemax="100" aria-label="<?php echo $city_value; ?>% Complete">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <br>
                                        <h4><?php echo $city_value; ?></h4>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- City name with progress bar end -->
                        </div>
                        <!-- Filter City Data End -->

                    </div>
                    <!-- Map and City Data End -->
                </div>
            </div>
        </div>
        <!-- Map End -->
    </div>
    <!-- Graph and Map End -->

    <!-- Card Start -->
    <div class="row mb-5">
        <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
            <div class="card h-100" style="border-radius:20px; background: rgb(48,61,129); background: linear-gradient(270deg, rgba(48,61,129,1) 0%, rgba(46,148,176,1) 53%);">
                <div class="card-body p-5 mb-4 mt-4">
                    <h1 class="text-start text-light" data-i18n="dashboard.img_like_blue_bg_data.text">Tell us what
                        additional data you would like to have on your desktop</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
            <div class="card h-100" style="border-radius:20px;">
                <div class="card-body">
                    <!-- Stats header -->
                    <div class="row g-2 align-items-center  sms_mu_for_rtl_demo">
                        <div class="col-5">
                            <h4 class="text-primary sms_mu_we_en">For All
                                Products</h4>
                            <h4 class="text-primary sms_mu_we_heb">לכל המוצרים</h4>
                        </div>
                        <div class="col-7 ms-auto text-end">
                            <h4 class="text-muted" data-i18n="dashboard.grid_images_in_last.row_right_data">The best
                                selling
                                products</h4>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Images Start -->
                    <div class="row g-2 align-items-center sms_mu_for_rtl_row_cards">
                        <?php
                        $top_products = array_reverse($dashboard_data["top_products"]); // Reverse the array to get the latest orders first

                        $count = 0; // Counter variable

                        foreach ($top_products as $statist) :
                            $product_name = $statist['product_name'];
                            $image_url = $statist['image_url'];
                        ?>
                            <div class="col-4">
                                <img src="<?php echo $image_url; ?>">
                                <p class="text-center"><?php echo $product_name; ?></p>
                            </div>
                        <?php
                            $count++; // Increment counter
                            if ($count >= 3)
                                break; // Break out of the loop when counter reaches 3
                        endforeach;
                        ?>
                    </div>
                    <!-- End Images -->
                </div>
            </div>
        </div>
        <!-- Table Start -->
        <div class="col-lg-5 col-md-5 col-sm-12 mb-2">
            <div class="card h-100" style="border-radius:20px;">
                <div class="card-body">
                    <!-- Start header -->
                    <div class="row g-2 align-items-center sms_mu_for_rtl_demo">
                        <div class="col-auto">
                            <h4 class="text-primary sms_mu_we_en">For All
                                Orders</h4>
                            <h4 class="text-primary sms_mu_we_heb">לכל ההזמנות</h4>
                        </div>
                        <div class="col-auto ms-auto">
                            <h4 class="text-muted" data-i18n="dashboard.last_table_data.table_data_one_on_right">Last
                                Orders
                            </h4>
                        </div>
                    </div>
                    <!-- End Header -->
                    <!-- Table Start -->
                    <div class="card-table table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                                <tr>
                                    <th data-i18n="dashboard.last_table_tr_first.td_one">order no</th>
                                    <th data-i18n="dashboard.last_table_tr_first.td_two">client</th>
                                    <th data-i18n="dashboard.last_table_tr_first.td_three">date</th>
                                    <th colspan="2" data-i18n="dashboard.last_table_tr_first.td_four">sum</th>
                                </tr>
                            </thead>
                            <?php
                            $latest_orders = array_reverse($dashboard_data["latest_orders"]); // Reverse the array to get the latest orders first

                            $count = 0; // Counter variable

                            foreach ($latest_orders as $statist) :
                                $order_id = $statist['order_id'];
                                $order_sum = $statist['sum'];
                                $order_date = $statist['date'];
                                $order_client = $statist['client'];
                            ?>

                                <tr>
                                    <td class="text-muted"><?php echo $order_id; ?></td>
                                    <td class="text-muted"><?php echo $order_client; ?></td>
                                    <td class="text-muted"><?php echo $order_date; ?></td>
                                    <td><?php echo $order_sum; ?></td>
                                </tr>

                            <?php
                                $count++; // Increment counter
                                if ($count >= 4)
                                    break; // Break out of the loop when counter reaches 3
                            endforeach;
                            ?>
                        </table>
                        <!-- <button class="sms_ma_index_to_order_button">click</button> -->
                    </div>
                    <!-- Table End -->
                </div>
            </div>
        </div>
        <!-- Table End -->
    </div>
    <!-- Card End -->
    <div class="modal modal-blur fade" id="modal-team" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" data-i18n="popoups.static_popoup.date_range.date_heading">Select a Date
                        Range</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="GET">
                    <div class="modal-body">
                        <div class="row mb-3 align-items-end">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <!-- <label class="form-label">From Date</label> -->
                                <label for="startDate" data-i18n="popoups.static_popoup.date_range.start_date">Start
                                    Date</label>
                                <input id="startDate" name="date_from" class="form-control" type="date" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="startDate" data-i18n="popoups.static_popoup.date_range.To_date">To
                                    Date</label>
                                <input id="startDate" name="date_to" class="form-control" type="date" />
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-pill btn-info" data-bs-dismiss="modal" data-i18n="popoups.static_popoup.date_range.search">Search</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        var map = L.map('map').setView([31.0461, 34.8516], 7); // Set center to Israel
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var allCities = <?php echo json_encode(array_column($dashboard_data["customers_location"], 'city')); ?>;
        var cityCoordinates = {};
        var markers = [];

        // Fetch coordinates for all cities initially and store them
        function fetchAllCoordinates() {
            let fetchPromises = allCities.map(city => 
                fetch(`https://nominatim.openstreetmap.org/search?q=${city}&format=json`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            cityCoordinates[city] = [data[0].lat, data[0].lon];
                        }
                    })
                    .catch(error => console.error('Error fetching coordinates:', error))
            );

            return Promise.all(fetchPromises);
        }

        // Function to add markers based on city list
        function addMarkers(cities) {
            markers.forEach(marker => map.removeLayer(marker)); // Clear existing markers
            markers = [];

            cities.forEach(city => {
                if (cityCoordinates[city]) {
                    let [lat, lon] = cityCoordinates[city];
                    let marker = L.marker([lat, lon])
                        .addTo(map)
                        .bindTooltip(city);

                    marker.on('mouseover', function(e) {
                        var tooltip = document.getElementById('tooltip');
                        tooltip.innerHTML = city;
                        tooltip.style.left = (e.originalEvent.pageX + 10) + 'px';
                        tooltip.style.top = (e.originalEvent.pageY + 10) + 'px';
                        tooltip.style.display = 'block';
                    });

                    marker.on('mouseout', function() {
                        document.getElementById('tooltip').style.display = 'none';
                    });

                    markers.push(marker);
                }
            });
        }

        // Initially fetch all coordinates and add markers for all cities
        fetchAllCoordinates().then(() => {
            addMarkers(allCities);

            document.getElementById('select_city').addEventListener('change', function() {
                let selectedCities = Array.from(this.selectedOptions).map(option => option.value);
                let cityRows = document.querySelectorAll('.city-row');

                if (selectedCities.length === 0) {
                    cityRows.forEach(row => {
                        row.style.display = 'flex';
                    });
                    addMarkers(allCities); // Show all markers
                } else {
                    cityRows.forEach(row => {
                        let cityName = row.dataset.city;
                        if (selectedCities.includes(cityName)) {
                            row.style.display = 'flex';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    addMarkers(selectedCities); // Show selected markers
                }
            });
        });
    </script>

    <script>
        // document.addEventListener("DOMContentLoaded", function () {
        //     // Get all buttons within the div with class 'col-auto btn-list'
        //     var buttons = document.querySelectorAll('.sms_w_date');

        //     // Loop through each button
        //     buttons.forEach(function (button) {
        //         // Attach onclick event handler
        //         button.addEventListener('click', function (event) {
        //             // Prevent default action of the anchor tag
        //             event.preventDefault();

        //             // Remove active class from all buttons
        //             buttons.forEach(function (btn) {
        //                 btn.classList.remove('sms_w_date_active');
        //             });

        //             // Add active class to the clicked button
        //             this.classList.add('sms_w_date_active');
        //         });
        //     });
        // });
    </script>
    <script>
        // Function to get query parameters from the URL
        document.getElementById('24_hours').onclick = funClickHour;
        document.getElementById('last_week').onclick = funClickWeek;
        document.getElementById('current_month').onclick = funClickMonth;
        document.getElementById('last_year').onclick = funClickYear;

        function funClickHour() {
            document.getElementById('24_hours').style.backgroundColor = "#A8C3E7";
            document.getElementById('last_week').style.backgroundColor = "transparent";
            document.getElementById('current_month').style.backgroundColor = "transparent";
            document.getElementById('last_year').style.backgroundColor = "transparent";
        }

        function funClickWeek() {
            document.getElementById('24_hours').style.backgroundColor = "transparent";
            document.getElementById('last_week').style.backgroundColor = "#A8C3E7";
            document.getElementById('current_month').style.backgroundColor = "transparent";
            document.getElementById('last_year').style.backgroundColor = "transparent";
        }

        function funClickMonth() {
            document.getElementById('24_hours').style.backgroundColor = "transparent";
            document.getElementById('last_week').style.backgroundColor = "transparent";
            document.getElementById('current_month').style.backgroundColor = "#A8C3E7";
            document.getElementById('last_year').style.backgroundColor = "transparent";
        }

        function funClickYear() {
            document.getElementById('24_hours').style.backgroundColor = "transparent";
            document.getElementById('last_week').style.backgroundColor = "transparent";
            document.getElementById('current_month').style.backgroundColor = "transparent";
            document.getElementById('last_year').style.backgroundColor = "#A8C3E7";
        }


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

        if (queryParams.query === '24_hours') {
            // Add the .sms_w_date_active class to the element with the ID '24_hours'
            document.getElementById('24_hours').classList.add('sms_w_date_active');
        } else if (queryParams.query === 'last_week') {
            // Add the .sms_w_date_active class to the element with the ID 'last_week'
            document.getElementById('last_week').classList.add('sms_w_date_active');
        } else if (queryParams.query === 'current_month') {
            // Add the .sms_w_date_active class to the element with the ID 'current_month'
            document.getElementById('current_month').classList.add('sms_w_date_active');
        } else if (queryParams.query === 'last_year') {
            // Add the .sms_w_date_active class to the element with the ID 'last_year'
            document.getElementById('last_year').classList.add('sms_w_date_active');
        }
    </script>

    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-completion-tasks-8'), {
                chart: {
                    type: "bar",
                    fontFamily: 'inherit',
                    height: 370,
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
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: [{
                    name: "Website",
                    data: [155, 65, 465, 265, 225, 325, 80]
                }, {
                    name: "Application",
                    data: [113, 42, 65, 54, 76, 65, 35]
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
                    type: 'text',
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                labels: [
                    'First', 'Second', 'Third', 'Fourth', 'Fifth', 'sixth', 'Seventh'
                ],
                colors: [tabler.getColor("primary"), tabler.getColor("info")],
                legend: {
                    show: false,
                },
            })).render();
        });
        // @formatter:on
    </script>
    <!-- Include the Google Maps JavaScript API -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4g53Qe1VW1Aq3rLeMZq79ltsBR6YExaE
&callback=initMap">
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdowns = document.querySelectorAll('.dropdown-tom-select-style');
            dropdowns.forEach(function(el) {
                var withInput = el.classList.contains('with-input');
                if (window.TomSelect) {
                    new TomSelect(el, {
                        copyClassesToDropdown: false,
                        dropdownParent: 'body',
                        controlInput: withInput ? '<input>' : false,
                        render: {
                            item: function(data, escape) {
                                if (data.customProperties) {
                                    return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                                }
                                return '<div>' + escape(data.text) + '</div>';
                            },
                            option: function(data, escape) {
                                if (data.customProperties) {
                                    return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                                }
                                return '<div>' + escape(data.text) + '</div>';
                            },
                        },
                    });
                    if (!withInput) {
                        el.style.width = '100%'; // Set width to 100% for dropdowns without the 'with-input' class
                    }
                    el.classList.add('dropdown-tom-select-style');
                }
            });
        });
    </script>
    <!-- Libs JS -->
    <script src="assets/dist/libs/nouislider/dist/nouislider.min.js?1695847769" defer></script>
    <script src="assets/dist/libs/litepicker/dist/litepicker.js?1695847769" defer></script>
    <script src="assets/dist/libs/tom-select/dist/js/tom-select.base.min.js?1695847769" defer></script>
    <?php
    require_once __DIR__ . '/../partials/footer.php';


    ?>