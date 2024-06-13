<?php
require_once __DIR__ . '/../partials/header.php';

//  var_dump($products);
//  foreach($products as $product){
//     if($product['type'] == "variable"){
//         var_dump($product);
//         echo "<br>";
//     }
//  }
?>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
<style>
    @import url("https://rsms.me/inter/inter.css");

    svg {
        cursor: pointer;
    }

    /* label{
        font-weight: 700 !important;
    } */

    .hidden {
        display: none;
    }

    .sms_mu_spacing_diver {
        height: 20px;
        background-color: white !important;
        width: inherit;
    }

    .sms_product_img img {
        width: 50%;
        padding-left: 10px;
    }

    .sms_mu_table_product {

        border-collapse: separate;
        /* table-layout: fixed; */
        width: 100%;
        border-spacing: 0 14px !important;
        /* margin: 0 2% !important; */

    }


    .sms_mu_table_product td {
        width: 500px;
        text-align: left !important;
    }

    .sms_mu_table_product td:first-child img {
        max-width: 50px !important;
        max-height: 50px !important;

    }

    @media only screen and (max-width:1270px) {
        .sms_mu_table_product {
            width: 960px !important;
            border: 0 !important;
        }

        .sms_product_img img {
            width: 85% !important;
        }

        .sms_mu_tr_product {
            padding-right: 20px !important;
        }

        .sms_mu_btns_filter {
            display: block !important;
            /* flex-direction: coloumn !important; */
            float: left !important;
            padding: 1px 13px !important;
            /* position: fixed; */
            /* top: 0; */
        }

        .sms_mu_main_bg_white {
            /* width: 900px !important; */
            /* overflow: scroll; */
            padding: 0
        }

        button p {
            width: 50% !important;
        }

    }

    @media only screen and (max-width:1000px) {
        .sms_mu_btns_filter {
            display: block !important;
            /* flex-direction: coloumn !important; */
            float: left !important;
            padding: 16px 13px !important;
            /* position: fixed; */
            /* top: 0; */
        }
    }

    .sms_mu_tr_product {
        background-color: #F2F2F2;
        height: 60px;
    }

    /* Button styles */
    .filter-button {
        background-color: #4987D870;
        padding: 10px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        cursor: pointer;
    }

    /* Popup styles */
    .popup {
        display: none;
        top: 35%;
        position: absolute;
        z-index: 10;
        width: 300px;
        background-color: rgba(0, 0, 0, 0.4);
        border-radius: 8px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        right: 4%;
    }

    .rtl .popup {
        left: 5%;
        right: 75%;
    }

    .popup-content {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        border: none;
        position: relative;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .close {
        color: #aaa;
        font-size: 24px;
        font-weight: bold;
        position: absolute;
        top: 1px;
        right: 9px;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    /* Animation only for second click */
    .popup.open {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .close:hover,
    .close:focus {
        color: #ff0000;
        text-decoration: none;
    }

    .popup-content h2 {
        margin-top: 0;
        font-size: 22px;
        color: #333;
    }

    .popup-content p {
        font-size: 16px;
        color: #666;
    }

    .hidden-file-input {
        display: none;
    }

    .abc .Sms_mu_for_Eng {
        display: block;
    }

    .abc .Sms_mu_for_hebrew {
        display: none;
    }

    .rtl .Sms_mu_for_Eng {
        display: none;
    }

    .rtl .Sms_mu_for_hebrew {
        display: block;
    }

    #sms_delete_notification {
        position: fixed;
        top: 10px;
        right: 20px;
        padding: 20px 20px;
        /* background-color: #4CAF50; */
        color: white;
        border-radius: 5px;
        display: none;
    }

    #sms_delete_notification.show {
        display: block;
        animation: slideIn 0.5s forwards, fadeOut 2s 1s forwards;
    }

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
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    #loader h1 {
        font-size: 1.5em;
        margin: 0;
        padding: 0;
    }
</style>
<div class="sms_products_m  p-0 ">
    <div id="loader">
        <div class="spinner"></div>
        <h1>Loading, please wait...</h1>
    </div>

    <div class=" col-12 mt-5" style="overflow-y: hidden; overflow-x:hidden;">
        <div class="row col-12 d-flex justify-content-between bg-white p-3 m-0 overflow-hidden"
            style="border-radius:20px;">
            <div class="col-sm-10 d-flex flex-column flex-md-row gap-2 col-lg-6 m-0 ">
                <button class="rounded-4 border-0 p-2" data-bs-toggle="modal" data-bs-target="#modal-full-width"
                    style="background-color:#4987D870; " data-i18n="product_managment.nav.new_product_btn"></button>
                <button class="rounded-4 border-0 p-2" style="background-color:#4987D870;" data-bs-toggle="modal"
                    data-bs-target="#modal-Category-large"
                    data-i18n="product_managment.nav.category_product_btn"></button>
                <button class="rounded-4 border-0 p-2" style="background-color:#4987D870; " data-bs-toggle="modal"
                    data-bs-target="#modal-large" data-i18n="product_managment.nav.future_product_btn"></button>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-11  mt-3 mt-lg-0">
                <button id="importExportBtn"
                    class="rounded-4 border-0 d-flex align-items-center justify-content-end w-md-auto p-2"
                    style="background-color:#4987D8; color: white; float:left; padding:10px 9px !important"
                    data-bs-toggle="modal" data-bs-target="#modal-simple">
                    <svg width="23" height="23" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M43.0833 4.58336H25.6667V1.83336C25.6666 1.69558 25.6354 1.55959 25.5756 1.4355C25.5157 1.31141 25.4286 1.20242 25.3208 1.11662C25.213 1.03083 25.0872 0.970445 24.9528 0.939958C24.8185 0.909471 24.6789 0.909666 24.5447 0.94053L0.711333 6.44053C0.509269 6.48697 0.328917 6.60054 0.199723 6.7627C0.0705279 6.92486 0.000122157 7.12603 0 7.33336L0 38.5C8.32958e-05 38.7189 0.0785044 38.9306 0.221079 39.0967C0.363654 39.2628 0.560968 39.3724 0.777333 39.4057L24.6107 43.0724C24.7413 43.0928 24.8748 43.0846 25.002 43.0485C25.1292 43.0123 25.247 42.949 25.3474 42.8629C25.4478 42.7768 25.5283 42.67 25.5834 42.5498C25.6385 42.4296 25.6669 42.2989 25.6667 42.1667V39.4167H43.0833C43.3265 39.4167 43.5596 39.3201 43.7315 39.1482C43.9034 38.9763 44 38.7431 44 38.5V5.50003C44 5.25691 43.9034 5.02376 43.7315 4.85185C43.5596 4.67994 43.3265 4.58336 43.0833 4.58336ZM25.6667 17.4167H31.1667V21.0834H25.6667V17.4167ZM7.47267 28.8475L11.4492 22.4859C11.5408 22.3404 11.5895 22.172 11.5895 22C11.5895 21.8281 11.5408 21.6597 11.4492 21.5142L7.4745 15.1525C7.40471 15.0506 7.35625 14.9356 7.33204 14.8144C7.30782 14.6933 7.30834 14.5685 7.33358 14.4475C7.35882 14.3266 7.40824 14.212 7.47889 14.1106C7.54953 14.0092 7.63994 13.9232 7.74468 13.8577C7.84941 13.7921 7.96632 13.7484 8.08837 13.7292C8.21042 13.71 8.33509 13.7157 8.4549 13.7459C8.5747 13.776 8.68717 13.8301 8.78554 13.9049C8.88391 13.9797 8.96616 14.0735 9.02733 14.1809L12.056 19.0264C12.3915 19.5617 13.2752 19.5617 13.6107 19.0264L16.6393 14.1809C16.7028 14.0784 16.7859 13.9896 16.8838 13.9194C16.9818 13.8492 17.0926 13.799 17.21 13.7717C17.3273 13.7445 17.4489 13.7407 17.5678 13.7605C17.6866 13.7804 17.8004 13.8236 17.9025 13.8875C18.0047 13.9512 18.0934 14.0344 18.1635 14.1323C18.2336 14.2302 18.2837 14.341 18.3109 14.4583C18.3381 14.5756 18.342 14.6972 18.3223 14.816C18.3025 14.9348 18.2596 15.0485 18.1958 15.1507L14.2193 21.5124C14.1277 21.6578 14.079 21.8263 14.079 21.9982C14.079 22.1701 14.1277 22.3386 14.2193 22.484L18.194 28.8457C18.2578 28.9478 18.3009 29.0614 18.3208 29.1802C18.3406 29.2989 18.3369 29.4204 18.3099 29.5377C18.2828 29.6549 18.2329 29.7658 18.163 29.8638C18.0931 29.9618 18.0046 30.0451 17.9025 30.1089C17.6945 30.2314 17.4474 30.2693 17.2123 30.2147C16.9771 30.1601 16.772 30.0172 16.6393 29.8155L13.6107 24.97C13.5275 24.8391 13.4125 24.7314 13.2766 24.6568C13.1406 24.5822 12.9879 24.5431 12.8328 24.5433C12.6777 24.5435 12.5252 24.5829 12.3894 24.6578C12.2536 24.7327 12.1389 24.8408 12.056 24.9719L9.02733 29.8174C8.89435 30.0187 8.68923 30.1613 8.45423 30.2159C8.21923 30.2704 7.97225 30.2328 7.76417 30.1107C7.66209 30.0469 7.57357 29.9636 7.50368 29.8656C7.43378 29.7676 7.38387 29.6568 7.35681 29.5395C7.32974 29.4222 7.32604 29.3007 7.34592 29.182C7.3658 29.0633 7.40887 28.9496 7.47267 28.8475ZM25.6667 22.9167H31.1667V26.5834H25.6667V22.9167ZM33 22.9167H42.1667V26.5834H33V22.9167ZM33 21.0834V17.4167H42.1667V21.0834H33ZM33 15.5834V11.9167H42.1667V15.5834H33ZM31.1667 15.5834H25.6667V11.9167H31.1667V15.5834ZM25.6667 28.4167H31.1667V32.0834H25.6667V28.4167ZM33 28.4167H42.1667V32.0834H33V28.4167ZM42.1667 10.0834H33V6.4167H42.1667V10.0834ZM31.1667 6.4167V10.0834H25.6667V6.4167H31.1667ZM25.6667 33.9167H31.1667V37.5834H25.6667V33.9167ZM33 37.5834V33.9167H42.1667V37.5834H33Z"
                            fill="#ffffff" />
                    </svg>
                    <h5 class="m-0" data-i18n="product_managment.nav.excel_product_btn"></h5>
                </button>
            </div>

            <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
                <div id="sms_delete_notification"></div>
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Import/Export From Excel</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="text-center d-grid gap-2 ">
                                <div class="mb-3 col-md-12">
                                    <form id="importForm" enctype="multipart/form-data"
                                        onsubmit="handleFormSubmit(event)">
                                        <div class="d-flex gap-4 justify-content-center col-md-6">
                                            <div class="mb-3 ">
                                                <label for="formFile" class="form-label btn btn-success btn-lg"
                                                    id="fileLabel">Import File</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    onchange="updateFileName()">
                                            </div>
                                        <div class="mb-3"><button type="submit" class="btn  btn-lg btn-primary">Upload</button></div>
                                        </div>
                                    </form>
                                </div>
                                <button id="exportBtn" class="btn btn-success btn-lg"
                                    onclick="exportData()">Export</button>
                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>
        <div class="d-flex flex-column overflow-auto mt-3">
            <div class="sms_mu_btns_filter d-flex w-100 align-items-baseline bg-white  rounded-top-4 fixed"
                style="padding-top: 28px; margin-top:1px;">
                <form id="sms_products_m_search_form" action="./" method="get" autocomplete="off" novalidate>
                    <div class="input-icon border-bottom border-black mx-3">
                        <span class="input-icon-addon">
                            <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                        </span>
                        <input type="text" id="sms_products_m_search_input" value="" class="form-control border-0 "
                            placeholder="Product search" aria-label="Search in website">
                    </div>
                </form>
                <div class="d-flex flex-row gap-3 text-center w-100 justify-content-end px-5" style="margin: 10px 0;">
                    <button onclick="togglePopup()"
                        class="rounded-4 py-2 border-0 align-items-center text-justify-content-center d-flex gap-1 filter-button">
                        <svg width="23" height="23" class="p-0 m-0" viewBox="0 0 33 33" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_272_365)">
                                <path
                                    d="M0.743423 3.93125C1.15592 3.05625 2.03092 2.5 2.99967 2.5H29.9997C30.9684 2.5 31.8434 3.05625 32.2559 3.93125C32.6684 4.80625 32.5434 5.8375 31.9309 6.5875L20.4997 20.5562V28.5C20.4997 29.2563 20.0747 29.95 19.3934 30.2875C18.7122 30.625 17.9059 30.5562 17.2997 30.1L13.2997 27.1C12.7934 26.725 12.4997 26.1313 12.4997 25.5V20.5562L1.06217 6.58125C0.455923 5.8375 0.324673 4.8 0.743423 3.93125Z"
                                    fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_272_365">
                                    <rect width="32" height="32" fill="white" transform="translate(0.5 0.5)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="m-0" data-i18n="product_managment.product_search.filter_inventory_btn">Filter by
                            inventory</p>
                    </button>

                    <!-- The Popup -->
                    <div id="popup" class="popup">
                        <!-- <div class="popup-content">
                                <h3 class="text-center" data-i18n="product_managment.product_search.filter_inventory_btn">Filter By Inventory</h3>
                                <span class="close">&times;</span>
                                <input type="number" id="ctg_Filter_In_mx" class="form-control mt-2" placeholder="Input 1">
                                <input type="number" id="ctg_Filter_In_mn" class="form-control mt-2" placeholder="Input 2">
                                <button id="doneButtonENG" class="btn btn-primary mt-2 Sms_mu_for_Eng" onclick="FilterCtg()">Done</button>
                                <button id="doneButton" class="btn btn-primary mt-2 Sms_mu_for_hebrew">בוצע</button>

                            </div> -->
                        <div class="popup-content">
                            <h3 class="text-center" data-i18n="product_managment.product_search.filter_inventory_btn">
                                Filter By
                                Inventory</h3>
                            <span class="close">&times;</span>
                            <input id="input1" type="number" class="form-control mt-2" placeholder="Minimum Stock">
                            <input id="input2" type="number" class="form-control mt-2" placeholder="Maximum Stock">
                            <div class="d-flex gap-3 justify-content-center">
                                <button id="doneButton" class="btn btn-primary mt-2 Sms_mu_for_Eng"
                                    onclick="filterRows()">Done</button>
                                <button id="doneButton" class="btn btn-primary mt-2 Sms_mu_for_hebrew"
                                    onclick="filterRows()">בוצע</button>
                                <button id="doneButton" class="btn btn-primary mt-2 Sms_mu_for_Eng"
                                    onclick="filterClearBtn()">Clear</button>
                                <button id="doneButton" class="btn btn-primary mt-2 Sms_mu_for_hebrew"
                                    onclick="filterClearBtn()">ברור</button>
                            </div>
                        </div>
                    </div>

                    <button onclick="togglePopups()"
                        class="rounded-4 py-2  border-0  align-items-center text-center justify-content-center  d-flex gap-1 filter-button"
                        style="background-color:#4987D870; ">
                        <svg width="23" height="23" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_272_365)">
                                <path
                                    d="M0.743423 3.93125C1.15592 3.05625 2.03092 2.5 2.99967 2.5H29.9997C30.9684 2.5 31.8434 3.05625 32.2559 3.93125C32.6684 4.80625 32.5434 5.8375 31.9309 6.5875L20.4997 20.5562V28.5C20.4997 29.2563 20.0747 29.95 19.3934 30.2875C18.7122 30.625 17.9059 30.5562 17.2997 30.1L13.2997 27.1C12.7934 26.725 12.4997 26.1313 12.4997 25.5V20.5562L1.06217 6.58125C0.455923 5.8375 0.324673 4.8 0.743423 3.93125Z"
                                    fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_272_365">
                                    <rect width="32" height="32" fill="white" transform="translate(0.5 0.5)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="m-0 p-0 " data-i18n="product_managment.product_search.filter_catageary_btn">Filter
                            by
                            category</p>
                    </button>
                    <!-- The Popup -->
                    <!-- <div id="popups" class="popup">
                            <div class="popup-content">
                                <h3 class="text-center" data-i18n="product_managment.product_search.filter_catageary_btn">Filter By Category</h3>
                                <span class="close">&times;</span>
                                <div class="-5" style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                                    <div class="col-md-12 rounded-4 bg-transparent h-100 text-start">
                                        <select id="category_in_product" multiple style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
                                            <?php

                                            foreach ($categories as $category) {
                                                // Access the "name" property of each category object
                                                ?>
                                                <option value="<?php echo $category['name'] ?>"><?php echo $category['name']; ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                        <span class="span_div">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00006 7.16667L10.0001 3.16667L8.83339 2L6.00006 4.83333L3.16673 2L2.00006 3.16667L6.00006 7.16667Z" fill="#111" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <button id="Sms_MU_doneButton" class="btn btn-primary mt-2 Sms_mu_for_Eng">Done</button>
                                <button id="doneButton" class="btn btn-primary mt-2 Sms_mu_for_hebrew">בוצע</button>

                            </div>
                        </div> -->
                    <div id="popups" class="popup">
                        <div class="popup-content">
                            <h3 class="text-center" data-i18n="product_managment.product_search.filter_catageary_btn">
                            </h3>
                            <span class="close">&times;</span>
                            <div class="mb-3"
                                style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                                <div class="col-md-12 rounded-4 bg-transparent h-100 text-start">
                                    <select id="category_in_product" multiple
                                        style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?php echo $category['name']; ?>">
                                                <?php echo $category['name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <span class="span_div">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6.00006 7.16667L10.0001 3.16667L8.83339 2L6.00006 4.83333L3.16673 2L2.00006 3.16667L6.00006 7.16667Z"
                                                fill="#111" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <!-- <div class="mb-3" style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                                    <div class="col-md-12 rounded-4 bg-transparent h-100 text-start">
                                        <input type="text" id="product_name_input" placeholder="Enter product name" style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
                                    </div>
                                </div> -->
                            <button id="doneButton" class="btn btn-primary mt-2 Sms_mu_for_Eng">Done</button>
                            <button id="doneButton" class="btn btn-primary mt-2 Sms_mu_for_hebrew">בוצע</button>
                        </div>
                    </div>
                    <div id="popups" class="popup">
                        <div class="popup-content">
                            <h3 class="text-center" data-i18n="product_managment.product_search.filter_catageary_btn">
                            </h3>
                            <span class="close">&times;</span>
                            <div class="mb-3"
                                style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                                <div class="col-md-12 rounded-4 bg-transparent h-100 text-start">
                                    <select id="category_in_product" multiple
                                        style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?php echo $category['name']; ?>">
                                                <?php echo $category['name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <span class="span_div">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6.00006 7.16667L10.0001 3.16667L8.83339 2L6.00006 4.83333L3.16673 2L2.00006 3.16667L6.00006 7.16667Z"
                                                fill="#111" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3"
                                style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                                <div class="col-md-12 rounded-4 bg-transparent h-100 text-start">
                                    <input type="text" id="product_name_input" placeholder="Enter product name"
                                        style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
                                </div>
                            </div>
                            <button id="Sms_MU_doneButton" class="btn btn-primary mt-2 Sms_mu_for_Eng">Done</button>
                            <button id="doneButton" class="btn btn-primary mt-2 Sms_mu_for_hebrew">בוצע</button>
                        </div>
                    </div>
                    <div id="popups" class="popup">
                        <div class="popup-content">
                            <h3 class="text-center" data-i18n="product_managment.product_search.filter_catageary_btn">
                                Filter By Product
                                Name</h3>
                            <span class="close">&times;</span>
                            <div class="-5"
                                style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                                <div class="col-md-12 rounded-4 bg-transparent h-100 text-start">
                                    <input type="text" id="product_name_input" placeholder="Enter product name"
                                        style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
                                </div>
                            </div>
                            <button id="doneButton" class="btn btn-primary mt-2 Sms_mu_for_Eng">Done</button>
                            <button id="doneButton" class="btn btn-primary mt-2 Sms_mu_for_hebrew">בוצע</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-x bg-white pt-5 sms_mu_main_bg_white rounded-bottom-4 px-2"
                style="height: 400px; overflow-y:scroll">
                <div class="sms_mu_main_bg_white position-relative  ">

                    <table class="sms_mu_table_product rounded-4" id='sms_products_m_products_table'>
                        <?php
                        $i = 0;
                        foreach ($categories as $category) {
                            $parentCategories_array[$i]['id'] = $category['id'];
                            $parentCategories_array[$i]['name'] = $category['name'];
                            if ($category['parent'] != 0) {
                                $parentCategories_array[$i]['parent'] = $category['parent'];
                            } else {
                                $parentCategories_array[$i]['parent'] = "-";
                            }
                            if (isset($category['image']['src'])) {
                                $parentCategories_array[$i]['src'] = $category['image']['src'];
                            } else {
                                $parentCategories_array[$i]['src'] = "https://placehold.co/400x400?text=No%20Image%20Found";
                            }

                            $parentCategories_json = json_encode($parentCategories_array);
                            $i++;
                        } ?>
                        <?php foreach ($products as $product) {
                            $product_json = json_encode($product);
                            if ($product['type'] == 'simple') {
                                if (isset($product['images'][0]['src'])) {
                                    $prodimage = $product['images'][0]['src'];
                                } else {
                                    $prodimage = "https://placehold.co/400x400?text=No%20Image%20Found";
                                }
                                ?>
                                <tr class="sms_mu_tr_product category_row" data-name="<?php echo $product['name']; ?>"
                                    data-categories="<?php echo implode(',', array_column($product['categories'], 'name')); ?>">
                                    <td>
                                        <img class="sms_product_img" height="100px" width="100px"
                                            src="<?php echo $prodimage; ?>" alt="">
                                    </td>
                                    <td class=""><span style="font-weight:bold">Product name:</span>
                                        <?php echo $product['name']; ?></td>
                                    <!-- <td><span style="font-weight:bold">Category:</span>
                                            <?php
                                            $count = count($product['categories']);
                                            $const = 0;
                                            foreach ($product['categories'] as $key => $category) {
                                                echo $category['name'];
                                                // Check if it's not the last element and there are more than 1 elements
                                                if ($const < $count - 1 && $count > 1) {
                                                    echo ', ';
                                                }
                                                $const++;
                                            }
                                            ?>

                                        </td> -->
                                    <td><span style="font-weight:bold">Category:</span>
                                        <?php echo implode(', ', array_column($product['categories'], 'name')); ?></td>
                                    <td><span style="font-weight:bold">Price:</span>
                                        <?php echo $product['regular_price']; ?>
                                        <?php echo $currency['symbol']; ?>
                                    </td>
                                    <td><span style="font-weight:bold  ">Stock:</span>
                                        <span class="stock_quantity_class">
                                            <?php echo $product['stock_quantity']; ?>
                                        </span>
                                    </td>
                                    <td><span style="font-weight:bold">Number of views:
                                        </span>250
                                    </td>
                                    <td>
                                        <span data-bs-toggle="modal" data-bs-target="#edit-regular-modal-full-width"
                                            data-bs-productJson="<?php echo htmlspecialchars($product_json); ?>"
                                            data-bs-categoriesJson="<?php echo htmlspecialchars($parentCategories_json); ?>">
                                            <svg width="20" height="20" viewBox="0 0 32 32" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M29.475 1.35627C28.1063 -0.0124756 25.8937 -0.0124756 24.525 1.35627L22.6437 3.23127L28.7625 9.35003L30.6437 7.46877C32.0125 6.10002 32.0125 3.88752 30.6437 2.51877L29.475 1.35627ZM10.775 15.1063C10.3937 15.4875 10.1 15.9563 9.93125 16.475L8.08125 22.025C7.9 22.5625 8.04375 23.1563 8.44375 23.5625C8.84375 23.9688 9.4375 24.1063 9.98125 23.925L15.5312 22.075C16.0438 21.9063 16.5125 21.6125 16.9 21.2313L27.3563 10.7688L21.2313 4.64377L10.775 15.1063ZM6 4.00002C2.6875 4.00002 0 6.68752 0 10V26C0 29.3125 2.6875 32 6 32H22C25.3125 32 28 29.3125 28 26V20C28 18.8938 27.1063 18 26 18C24.8937 18 24 18.8938 24 20V26C24 27.1063 23.1063 28 22 28H6C4.89375 28 4 27.1063 4 26V10C4 8.89377 4.89375 8.00002 6 8.00002H12C13.1062 8.00002 14 7.10627 14 6.00002C14 4.89377 13.1062 4.00002 12 4.00002H6Z"
                                                    fill="black" />
                                            </svg>
                                        </span>

                                    </td>
                                </tr>
                            <?php }
                            if ($product['type'] == 'variable') { ?>
                                <tr class="sms_mu_tr_product category_row" data-name="<?php echo $product['name']; ?>"
                                    data-categories="<?php echo implode(',', array_column($product['categories'], 'name')); ?>">
                                    <td>
                                        <img class="sms_product_img" src="/assets/dist/img/products/bag.png" alt="">

                                    </td>
                                    <td class=""><span style="font-weight:bold">Product name:</span>
                                        <?php echo $product['name']; ?></td>
                                    <!-- <td><span style="font-weight:bold">Category:</span> <?php
                                    $count = count($product['categories']);
                                    $const = 0;
                                    foreach ($product['categories'] as $key => $category) {
                                        echo $category['name'];
                                        // Check if it's not the last element and there are more than 1 elements
                                        if ($const < $count - 1 && $count > 1) {
                                            echo ', ';
                                        }
                                        $const++;
                                    }
                                    ?>
                                        </td> -->
                                    <td><span style="font-weight:bold">Category:</span>
                                        <?php echo implode(', ', array_column($product['categories'], 'name')); ?></td>
                                    <td><span style="font-weight:bold">Price:</span>
                                        <?php echo $product['regular_price']; ?>
                                        <?php echo $currency['symbol']; ?>
                                    </td>
                                    <td><span style="font-weight:bold stock_quantity_class"></span> <span
                                            class="stock_quantity_class">
                                            <strong>Stock:</strong> <?php echo $product['stock_quantity']; ?>
                                        </span>

                                    </td>
                                    <td><span style="font-weight:bold">Number of views:
                                        </span>250
                                    </td>
                                    <td>
                                        <span data-bs-toggle="modal" class="variation_edit_data"
                                            data-bs-target="#edit-modal-full-width"
                                            data-bs-productJson="<?php echo htmlspecialchars($product_json); ?>"
                                            data-bs-categoriesJson="<?php echo htmlspecialchars($parentCategories_json); ?>">
                                            <svg width="20" height="20" viewBox="0 0 32 32" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M29.475 1.35627C28.1063 -0.0124756 25.8937 -0.0124756 24.525 1.35627L22.6437 3.23127L28.7625 9.35003L30.6437 7.46877C32.0125 6.10002 32.0125 3.88752 30.6437 2.51877L29.475 1.35627ZM10.775 15.1063C10.3937 15.4875 10.1 15.9563 9.93125 16.475L8.08125 22.025C7.9 22.5625 8.04375 23.1563 8.44375 23.5625C8.84375 23.9688 9.4375 24.1063 9.98125 23.925L15.5312 22.075C16.0438 21.9063 16.5125 21.6125 16.9 21.2313L27.3563 10.7688L21.2313 4.64377L10.775 15.1063ZM6 4.00002C2.6875 4.00002 0 6.68752 0 10V26C0 29.3125 2.6875 32 6 32H22C25.3125 32 28 29.3125 28 26V20C28 18.8938 27.1063 18 26 18C24.8937 18 24 18.8938 24 20V26C24 27.1063 23.1063 28 22 28H6C4.89375 28 4 27.1063 4 26V10C4 8.89377 4.89375 8.00002 6 8.00002H12C13.1062 8.00002 14 7.10627 14 6.00002C14 4.89377 13.1062 4.00002 12 4.00002H6Z"
                                                    fill="black" />
                                            </svg>
                                        </span>

                                    </td>
                                </tr>
                            <?php }
                        } ?>
                    </table>
                </div>
            </div>
            <div class="row g-2">
                <p class="col-auto ms-auto mt-5 mb-5 me-5 Sms_mu_for_Eng"><span class="fw-bold fs-2">Total products
                        on the site:
                    </span><span class="fs-2"> <?php echo $number_of_products; ?></span></p>
                <p class="col-auto ms-auto mt-5 mb-5 me-5 Sms_mu_for_hebrew"><span class="fw-bold fs-2">Total מוצרים
                        באתר:
                    </span><span class="fs-2"> 450</span></p>
            </div>
        </div>

        <div class="modal modal-blur fade m-0" id="modal-full-width" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        include ('add.php');
                        ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal modal-blur fade m-0" id="edit-modal-full-width" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header col-12 justify-content-center" style="background-color: #4987D870">
                        <div class="py-3 rounded-top text-center col-10">
                            <h3 class="card-title text-black fs-2 m-0 fw-bold"
                                data-i18n="popoups.future_managment.edit_variation_in_product_managment.heading">
                                Editing
                                a product with variations</h3>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        include ('edit_variation.php');
                        ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- edit priduct regular  -->
        <div class="modal modal-blur fade m-0" id="edit-regular-modal-full-width" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content" style="height: 576px; overflow-y:auto; overflow-x:hidden;">
                    <div class="modal-header col-12 justify-content-center" style="background-color: #4987D870">
                        <div class="py-3 rounded-top text-center Sms_mu_for_Eng">
                            <h3 class="card-title text-black fs-2 m-0 fw-bold ">Editing a regular product</h3>
                        </div>
                        <div class="py-3 rounded-top text-center Sms_mu_for_hebrew">
                            <h3 class="card-title text-black fs-2 m-0 fw-bold">עריכת מוצר רגיל</h3>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        include ('edit_regular.php');
                        ?>
                    </div>

                </div>
            </div>
        </div>

        <!-- ...  -->
        <div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header border-0 ">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        require_once __DIR__ . '/../feature/index.php';

                        ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-Category-large" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0 ">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        require_once __DIR__ . '/../category/index.php';

                        ?>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

        <script>
            window.addEventListener('load', function () {
                document.getElementById('loader').style.display = 'none';
            });
        </script>
        <!-- <script>
                document.getElementById('category_in_product').addEventListener('change', function() {
                    filterProducts();
                });

                document.getElementById('doneButton').addEventListener('click', function () {
                    filterProductsclose();
                });

                function filterProductsclose() {
                    document.getElementById('popups').style.display = 'none';
                }

                function filterProducts() {

                    // Get selected categories
                    let selectedCategories = Array.from(document.getElementById('category_in_product').selectedOptions).map(option => option.value);

                    // Get product name input
                    let productName = document.getElementById('product_name_input').value.toLowerCase();

                    // Get all product rows
                    let productRows = document.querySelectorAll('#sms_products_m_products_table .category_row');

                    // Filter product rows
                    productRows.forEach(row => {
                        let productNameInRow = row.getAttribute('data-name').toLowerCase();
                        let productCategoriesInRow = row.getAttribute('data-categories').split(',');

                        let nameMatches = productName === '' || productNameInRow.includes(productName);
                        let categoryMatches = selectedCategories.length === 0 || selectedCategories.some(cat => productCategoriesInRow.includes(cat));

                        if (nameMatches && categoryMatches) {
                            row.style.display = '';
                            for (var i = 0; i < elements.length; i++) {
                                elements[i].style.display = "block";
                            }
                        } else {
                            row.style.display = 'none';

                        }
                    });
                }

                // Optional: close popup functionality
                document.querySelector('.popup .close').addEventListener('click', function () {
                    document.getElementById('popups').style.display = 'none';
                });

                // Optional: open popup functionality
                // document.querySelector('.some-open-popup-button').addEventListener('click', function() {
                //     document.getElementById('popups').style.display = 'block';
                // });
            </script> -->
        <script>
            document.getElementById('category_in_product').addEventListener('change', function () {
                filterProducts();
            });

            function filterProducts() {
                // Get selected categories
                let selectedCategories = Array.from(document.getElementById('category_in_product').selectedOptions).map(option => option.value);

                // Get product name input
                let productName = document.getElementById('product_name_input').value.toLowerCase();

                // Get all product rows
                let productRows = document.querySelectorAll('#sms_products_m_products_table .category_row');

                // Filter product rows
                productRows.forEach(row => {
                    let productNameInRow = row.getAttribute('data-name').toLowerCase();
                    let productCategoriesInRow = row.getAttribute('data-categories').split(',');

                    let nameMatches = productName === '' || productNameInRow.includes(productName);
                    let categoryMatches = selectedCategories.length === 0 || selectedCategories.every(cat => productCategoriesInRow.includes(cat));

                    if (nameMatches && categoryMatches) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Optional: close popup functionality
            document.querySelector('.popup .close').addEventListener('click', function () {
                document.getElementById('popups').style.display = 'none';
            });

            // Optional: open popup functionality
            // document.querySelector('.some-open-popup-button').addEventListener('click', function() {
            //     document.getElementById('popups').style.display = 'block';
            // });
        </script>
        <script>
            document.getElementById('category_in_product').addEventListener('change', function () {
                filterProducts();
            });

            function filterProducts() {
                // Get selected categories
                let selectedCategories = Array.from(document.getElementById('category_in_product').selectedOptions).map(option => option.value);

                // Get product name input
                let productName = document.getElementById('product_name_input').value.toLowerCase();

                // Get all product rows
                let productRows = document.querySelectorAll('#sms_products_m_products_table .category_row');

                // Filter product rows
                productRows.forEach(row => {
                    let productNameInRow = row.getAttribute('data-name').toLowerCase();
                    let productCategoriesInRow = row.getAttribute('data-categories').split(',');

                    let nameMatches = productName === '' || productNameInRow.includes(productName);
                    let categoryMatches = selectedCategories.length === 0 || selectedCategories.every(cat => productCategoriesInRow.includes(cat));

                    if (nameMatches && categoryMatches) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Optional: close popup functionality
            document.querySelector('.popup .close').addEventListener('click', function () {
                document.getElementById('popups').style.display = 'none';
            });

            // Optional: open popup functionality
            // document.querySelector('.some-open-popup-button').addEventListener('click', function() {
            //     document.getElementById('popups').style.display = 'block';
            // });
        </script>
        <!-- <script>
                function filterRows() {
                    // Get the minimum and maximum values from input fields
                    let minStock = parseInt(document.getElementById('input1').value);
                    let maxStock = parseInt(document.getElementById('input2').value);

                    // Loop through each category row and apply filtering
                    let categoryRows = document.getElementsByClassName('category_row');
                    for (let i = 0; i < categoryRows.length; i++) {
                        // Get the stock quantity of the current category
                        let stockQuantityElement = categoryRows[i].querySelector('.stock_quantity');
                let stockQuantity = parseInt(stockQuantityElement.textContent || stockQuantityElement.innerText);
                        // Check if the stock quantity is within the specified range
                        if (stockQuantity >= minStock && stockQuantity <= maxStock) {
                            // Show the category row
                            categoryRows[i].style.display = 'table-row';
                        } else {
                            // Hide the category row
                            categoryRows[i].style.display = 'none';
                        }
                    }
                }
            </script> -->
        <script>
            // function filterRows() {
            //     // Get the minimum and maximum values from input fields
            //     let minStock = parseInt(document.getElementById('input1').value);
            //     let maxStock = parseInt(document.getElementById('input2').value);

            //     // Validate input values
            //     if (isNaN(minStock) || isNaN(maxStock)) {
            //         alert("Please enter valid numeric values.");
            //         return; // Exit the function if input values are invalid
            //     }

            //     // Loop through each product row and apply filtering
            //     let productRows = document.querySelectorAll('.sms_mu_table_product .sms_mu_tr_product');
            //     for (let i = 0; i < productRows.length; i++) {
            //         // Get the element containing the stock quantity for this row
            //         let stockQuantityElement = productRows[i].querySelector('.stock_quantity_class');
            //         // Initialize stock quantity to a default value
            //         let stockQuantity = 0;
            //         // Check if the element exists and has valid text content
            //         if (stockQuantityElement && (stockQuantityElement.textContent || stockQuantityElement.innerText)) {
            //             // Parse the stock quantity from the text content
            //             stockQuantity = parseInt(stockQuantityElement.textContent || stockQuantityElement.innerText);
            //         }

            //         // Check if the stock quantity is within the specified range
            //         if (stockQuantity > minStock && stockQuantity < maxStock) {
            //             // Show the product row
            //             productRows[i].style.display = 'table-row';
            //             document.getElementById('sms_mu_spacing_div').style.display="table-row"
            //         } else {
            //             // Hide the product row
            //             productRows[i].style.display = 'none';
            //             document.getElementById('sms_mu_spacing_div').style.display="none"
            //         }
            //     }
            // }
            function filterRows() {
                // Get the minimum and maximum values from input fields
                let minStock = parseInt(document.getElementById('input1').value);
                let maxStock = parseInt(document.getElementById('input2').value);

                // Validate input values
                if (isNaN(minStock) || isNaN(maxStock)) {
                    alert("Please enter valid numeric values.");
                    return; // Exit the function if input values are invalid
                }

                // Loop through each product row and apply filtering
                let productRows = document.querySelectorAll('.sms_mu_table_product .sms_mu_tr_product');
                for (let i = 0; i < productRows.length; i++) {
                    // Get the element containing the stock quantity for this row
                    let stockQuantityElement = productRows[i].querySelector('.stock_quantity_class');
                    // Initialize stock quantity to a default value
                    let stockQuantity = 0;
                    // Check if the element exists and has valid text content
                    if (stockQuantityElement && (stockQuantityElement.textContent || stockQuantityElement.innerText)) {
                        // Parse the stock quantity from the text content
                        stockQuantity = parseInt(stockQuantityElement.textContent || stockQuantityElement.innerText);
                    }

                    // Check if the stock quantity is within the specified range
                    if (stockQuantity >= minStock && stockQuantity <= maxStock) {
                        // Show the product row
                        productRows[i].style.display = 'table-row';
                        // Show the corresponding spacer row
                        productRows[i].nextElementSibling.style.display = 'table-row';
                    } else {
                        // Hide the product row
                        productRows[i].style.display = 'none';
                        // Hide the corresponding spacer row
                        productRows[i].nextElementSibling.style.display = 'none';
                    }
                }
            }

            function filterClearBtn() {
                // Clear the values of the input fields
                document.getElementById('input1').value = "";
                document.getElementById('input2').value = "";

                // Remove the display style property from all product rows and spacer rows
                let productRows = document.querySelectorAll('.sms_mu_table_product .sms_mu_tr_product');
                for (let i = 0; i < productRows.length; i++) {
                    productRows[i].style.display = '';
                    if (productRows[i].nextElementSibling && productRows[i].nextElementSibling.classList.contains('sms_mu_spacing_diver')) {
                        productRows[i].nextElementSibling.style.display = '';
                    }
                }
            }
        </script>

        <script>
            function togglePopup() {
                var inventoryPopup = document.getElementById("popup");
                var categoryPopup = document.getElementById("popups");

                if (inventoryPopup.style.display === "none" || inventoryPopup.style.display === "") {
                    inventoryPopup.style.display = "block";
                    categoryPopup.style.display = "none";
                    // Add event listener to close popup when clicking outside of it
                    window.addEventListener("click", closePopupOnOutsideClick);
                } else {
                    inventoryPopup.style.display = "none";
                    window.removeEventListener("click", closePopupOnOutsideClick);
                }

                // Get the close button inside the popup
                var closeButton = inventoryPopup.querySelector(".close");

                // Add click event listener to the close button
                closeButton.addEventListener("click", function () {
                    inventoryPopup.style.display = "none";
                    window.removeEventListener("click", closePopupOnOutsideClick);
                });
            }

            function togglePopups() {
                var categoryPopup = document.getElementById("popups");
                var inventoryPopup = document.getElementById("popup");

                if (categoryPopup.style.display === "none" || categoryPopup.style.display === "") {
                    categoryPopup.style.display = "block";
                    inventoryPopup.style.display = "none";
                    // Add event listener to close popup when clicking outside of it
                    window.addEventListener("click", closePopupsOnOutsideClick);
                } else {
                    categoryPopup.style.display = "none";
                    window.removeEventListener("click", closePopupsOnOutsideClick);
                }

                // Get the close button inside the popup
                var closeButton = categoryPopup.querySelector(".close");

                // Add click event listener to the close button
                closeButton.addEventListener("click", function () {
                    categoryPopup.style.display = "none";
                    window.removeEventListener("click", closePopupsOnOutsideClick);
                });
            }

            function closePopupOnOutsideClick(event) {
                var popup = document.getElementById("popup");
                if (!popup.contains(event.target) && event.target.closest(".filter-button") === null) {
                    popup.style.display = "none";
                    window.removeEventListener("click", closePopupOnOutsideClick);
                }
            }

            function closePopupsOnOutsideClick(event) {
                var popup = document.getElementById("popups");
                if (!popup.contains(event.target) && event.target.closest(".filter-button") === null) {
                    popup.style.display = "none";
                    window.removeEventListener("click", closePopupsOnOutsideClick);
                }
            }

            // Prevent event propagation inside the popup content
            document.querySelectorAll(".popup-content").forEach(function (popupContent) {
                popupContent.addEventListener("click", function (event) {
                    event.stopPropagation();
                });
            });

            function setStatusColor() {
                // Get all elements with class 'status'
                let statuses = document.querySelectorAll('.sms_transaction_w_status');

                // Loop through each status element
                statuses.forEach(function (status) {
                    // Get the text content of the status
                    let statusText = status.textContent.trim().toLowerCase();

                    // Set the color based on the status
                    if (statusText === 'cancelled') {
                        status.classList.add('sms_transaction_w_cancelled');
                    } else if (statusText === 'completed') {
                        status.classList.add('sms_transaction_w_approved');
                    }
                });
            }

            // Call the function to set status colors
            setStatusColor();



            // Call the function to add checkboxes after each row container
            document.addEventListener('DOMContentLoaded', function () {
                const searchForm = document.getElementById('sms_products_m_search_form');
                const searchInput = document.getElementById('sms_products_m_search_input');
                const productsTable = document.getElementById('sms_products_m_products_table');

                searchForm.addEventListener('submit', function (event) {
                    event.preventDefault(); // Prevent form submission
                    filterCustomers();
                });

                searchInput.addEventListener('input', function () {
                    filterCustomers();
                });

                function filterCustomers() {
                    const searchValue = searchInput.value.toLowerCase();
                    const rows = productsTable.querySelectorAll('tbody tr:not(.sms_m_table_head)'); // Exclude the table header row

                    rows.forEach(row => {
                        let rowTextContent = row.textContent.toLowerCase();
                        if (rowTextContent.includes(searchValue)) {
                            row.style.display = ''; // Show the row
                        } else {
                            row.style.display = 'none'; // Hide the row
                        }
                    });
                }
            });
        </script>
        <script>
            function updateFileName() {
                const fileInput = document.getElementById('formFile');
                const fileLabel = document.getElementById('fileLabel');

                if (fileInput.files.length > 0) {
                    const file = fileInput.files[0];
                    fileLabel.textContent = 'Import File: ' + file.name;
                    console.log('File selected:', file.name);
                } else {
                    fileLabel.textContent = 'Import File';
                    console.log('No file selected');
                }
            }

            function handleFormSubmit(event) {
                event.preventDefault();

                const formData = new FormData();
                const fileInput = document.getElementById('formFile');

                if (fileInput.files.length === 0) {
                    document.getElementById('sms_delete_notification').innerHTML = '<div class="alert alert-danger" role="alert">Please select a file to upload.</div>';
                    return;
                }

                formData.append('csv_file', fileInput.files[0]);

                fetch('/products/import', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(data => {
                        console.log('POST request successful');
                        console.log(data);
                        document.getElementById('sms_delete_notification').innerHTML = '<div class="alert alert-success" role="alert">File uploaded successfully!</div>';
                        setTimeout(() => {
                            document.getElementById('sms_delete_notification').style.display = "block"
                            location.reload();
                        }, 500);
                    })
                    .catch(error => {
                        console.error('There was a problem with your fetch operation:', error);
                        document.getElementById('sms_delete_notification').innerHTML = '<div class="alert alert-danger" role="alert">There was an error uploading the file. Please try again.</div>';
                    });
            }

            // Function to handle export
            // Function to handle export
            function exportData() {
                // Fetch API endpoint for export
                fetch('/products/export')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.blob();
                    })
                    .then(blob => {
                        const url = window.URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.href = url;
                        a.download = 'exported_data.csv';
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);
                        window.URL.revokeObjectURL(url);
                        document.getElementById('sms_delete_notification').innerHTML = '<div class="alert alert-success" role="alert">Data exported successfully!</div>';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        document.getElementById('sms_delete_notification').innerHTML = '<div class="alert alert-danger" role="alert">There was an error exporting the data. Please try again.</div>';
                    });
            }
        </script>
        <?php
        require_once __DIR__ . '/../partials/footer.php';

        ?>