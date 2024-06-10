<style>
    @import url('https://rsms.me/inter/inter.css');



    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }

    .markdown>table thead th,
    .table thead th {
        background: transparent;
        color: white;
    }

    .rtl {
        direction: rtl;
    }

    .rtl .avatar {
        margin-left: 10px;
    }

    .sms_a_edit_product_variations {
        position: relative;
        /* display: inline-block; */
    }

    .sms_a_edit_product_variations input[type="file"] {
        position: absolute;
        left: -9999px;
    }

    .sms_a_edit_product_variations label {
        /* display: inline-block; */
        padding: 17px 16px;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        background-color: #EAEAEA !important;
        text-align: center;
        ;
    }

    .sms_a_edit_product_variations label i {
        margin-right: 5px;
    }

    @media (max-width: 767px) {
        .sms_edit_product_variations_a {
            white-space: nowrap;
        }

        /* .sms_mu_tabl_rese {
            width: 199% !important;
            height: 126px;
        } */


    }

    .sms_mu_tabl_rese {
        height: 126px;
    }

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: inherit;
        border-style: none !important;
        border-width: 0;
        text-align: center !important;
    }
</style>
<!-- </head>

<body> -->
<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <div>
                    <form action="" method="post" class="card-body">
                        <input type="hidden" id="variable_product_id">
                        <!-- header -->
                        <div class="row gx-3">
                            <div class="col-md-6 mb-3">
                                <label for="variation_product_name" class="form-label fw-bold">Product Name</label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold"
                                    id="variation_product_name" style="background-color: #EAEAEA" placeholder="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="variation_category_select" class="form-label fw-bold"
                                    data-i18n="popoups.future_managment.edit_variation_in_product_managment.catageory_managment">Category</label>
                                <div
                                    style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                                    <div class="col-md-12 rounded-4 bg-transparent h-100 ">
                                        <select id="variation_category_select" multiple
                                            style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">

                                            <option value="">Select</option>

                                            <?php

                                            foreach ($categories as $category) {
                                                // Access the "name" property of each category object
                                                ?>
                                                <option value="<?php echo $category['id'] ?>">
                                                    <?php echo $category['name']; ?>
                                                </option>
                                                <?php
                                            }

                                            ?>
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
                            </div>
                        </div>
                        <!-- Upload a product image  -->
                        <div class="row gx-3">
                            <div class="col-md-6 mb-4">
                                <label class="form-label"
                                    data-i18n="popoups.future_managment.edit_variation_in_product_managment.image_upload">Upload
                                    a product image </label>
                                <div class="sms_a_add_product_variations">
                                    <input type="file" id="sms_a_edit_product_variation_single_images" accept="image/*"
                                        onchange="sms_a_edit_product_variation_single()">
                                    <label for="sms_a_edit_product_variation_single_images"><i
                                            class="bi bi-image text-black"></i>
                                        <svg width="20" height="20" viewBox="0 0 32 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z"
                                                fill="black" />
                                        </svg>
                                        <p class="m-0 text-sm p-0"
                                            data-i18n="popoups.future_managment.edit_variation_in_product_managment.image_upload_text">
                                            Choose a picture </p>
                                    </label>
                                </div>
                            </div>
                            <!-- Upload a photo gallery -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label"
                                    data-i18n="popoups.future_managment.edit_variation_in_product_managment.gallery_upload">Upload
                                    a photo gallery</label>
                                <div class="sms_a_add_product_variations">
                                    <input type="file" id="sms_a_edit_product_variation_multiple_image" accept="image/*"
                                        onchange="sms_a_edit_product_variation_multiple_images()" multiple>
                                    <label for="sms_a_edit_product_variation_multiple_image"><i
                                            class="bi bi-image text-black"></i>
                                        <svg width="20" height="20" viewBox="0 0 32 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z"
                                                fill="black" />
                                        </svg>
                                        <p class="m-0 text-sm p-0"
                                            data-i18n="popoups.future_managment.edit_variation_in_product_managment.image_upload_text">
                                            Choose a picture </p>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class=" col-12 mt-5" id="sms_a_edit_product_variation">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table w-100">
                                        <thead style="background-color: #4987d8;">
                                            <tr class="t-head gap-2 rounded-4 py-2"
                                                style="background-color: rgba(73, 135, 216, 0.44);">
                                                <th class="">
                                                    <!-- Image/color -->
                                                </th>
                                                <th class=" sms_edit_product_variations_a"
                                                    data-i18n="popoups.future_managment.edit_variation_in_product_managment.th_in_variation.th_term">
                                                    Variation Name</th>
                                                <th class="sms_edit_product_variations_a"
                                                    data-i18n="popoups.future_managment.edit_variation_in_product_managment.th_in_variation.th_price">
                                                    Variation Price
                                                </th>
                                                <th class="sms_edit_product_variations_a"
                                                    data-i18n="popoups.future_managment.edit_variation_in_product_managment.th_in_variation.th_inventory">
                                                    Variation
                                                    inventory</th>
                                                <th class="sms_edit_product_variations_a px-5"></th>
                                                <!-- <th class="w-25 sms_edit_product_variations_a"></th> -->
                                            </tr>
                                        </thead>

                                        <tbody id="variations_data_table_rows">

                                        </tbody>


                                        <!-- More rows can be dynamically added here -->
                                        <!-- </div>
                                            </div>
                                        </div> -->
                                    </table>
                                </div>
                            </div>
                            <!-- To add another term click here + -->
                            <!-- <div class="text-center mt-2 p-2  ">
                                <button type="button" class=" col-12 col-md-12 fs-3 rounded-4 py-3 border-0 fw-bold" data-i18n="popoups.future_managment.edit_variation_in_product_managment.btn_addiotainal_term" style="background: rgba(73, 135, 216, 0.44);">Adding an additional term to +
                                    variations </button>
                            </div> -->
                            <!-- description -->
                            <div class="mt-4">
                                <label for="variation_description" class="form-label fw-bold"
                                    data-i18n="popoups.future_managment.edit_variation_in_product_managment.text_area_text">A
                                    brief
                                    description of the product</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="variation_description"
                                        style="height: 100px; background-color: #EAEAEA"></textarea>

                                </div>
                            </div>

                       

                        </div>
                    </form>
                         <!-- submit button -->
                         <div class="d-flex justify-content-center flex-column flex-sm-row gap-3 p-2">
                                <div class="text-center mt-2 col-sm-6 col-md-6">
                                    <button type="submit" class="btn btn-primary col-12 rounded-4 py-3"
                                    onclick="logFormValues()"
                                        data-i18n="popoups.future_managment.edit_variation_in_product_managment.update_product_btn">To
                                        update
                                        the product →</button>
                                </div>
                                <div class="text-center mt-2 col-sm-6 col-md-6">
                                    <button type="button" class="btn btn-danger col-12 rounded-4 py-3 "
                                        data-i18n="popoups.future_managment.edit_variation_in_product_managment.delete_product_btn"
                                        onclick="openModal('sms_edit_product_variation_w_delete_complete_modal')">Deletion
                                        of
                                        the product</button>
                                </div>
                            </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>


<!-- input javascript code  -->
<script>
    var inputCount = 0;

    // Function to add input fields
    function sms_a_edit_product_variations() {
        inputCount++;
        var container = document.getElementById('sms_a_edit_product_variation');
        var newInput = document.createElement('div');
        newInput.classList.add('col-md-12', 'mb-0', 'p-0');
        newInput.innerHTML = `
            <div class="card-x mt-3">
                                        <div style="overflow-x: auto">
                                            <div class="table-responsive">
                                                <table class="table table-center card-table">
                                                    <tbody class="d-flex flex-column ts-text">
                                                        <tr class="mt-2 rounded-4  " style="background-color: #EAEAEA">
                                                            <td class="w-25 ">
                                                                <div class="text-start"
                                                                    style="height: 30px; width: 30px; background-color: pink;">
                                                                </div>
                                                            </td>
                                                            <td class="text-center w-25">pink</td>
                                                            <td class="text-center w-25">250 NIS</td>
                                                            <td class="text-center w-25">15</td>

                                                            <td>
                                                                <div class="d-flex justify-content-end gap-2 w-auto">
                                                                    <span class="">
                                                                        <svg width="24" height="24" viewBox="0 0 32 32"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M29.475 1.35627C28.1063 -0.0124756 25.8937 -0.0124756 24.525 1.35627L22.6437 3.23127L28.7625 9.35003L30.6437 7.46877C32.0125 6.10002 32.0125 3.88752 30.6437 2.51877L29.475 1.35627ZM10.775 15.1063C10.3937 15.4875 10.1 15.9563 9.93125 16.475L8.08125 22.025C7.9 22.5625 8.04375 23.1563 8.44375 23.5625C8.84375 23.9688 9.4375 24.1063 9.98125 23.925L15.5312 22.075C16.0438 21.9063 16.5125 21.6125 16.9 21.2313L27.3563 10.7688L21.2313 4.64377L10.775 15.1063ZM6 4.00002C2.6875 4.00002 0 6.68752 0 10V26C0 29.3125 2.6875 32 6 32H22C25.3125 32 28 29.3125 28 26V20C28 18.8938 27.1063 18 26 18C24.8937 18 24 18.8938 24 20V26C24 27.1063 23.1063 28 22 28H6C4.89375 28 4 27.1063 4 26V10C4 8.89377 4.89375 8.00002 6 8.00002H12C13.1062 8.00002 14 7.10627 14 6.00002C14 4.89377 13.1062 4.00002 12 4.00002H6Z"
                                                                                fill="#4987D8" />
                                                                        </svg>
                                                                    </span>
                                                                    <span class="">
                                                                        <svg width="24" height="24" viewBox="0 0 28 32"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M8.45 1.10625C8.7875 0.425 9.48125 0 10.2375 0H17.7625C18.5188 0 19.2125 0.425 19.55 1.10625L20 2H26C27.1063 2 28 2.89375 28 4C28 5.10625 27.1063 6 26 6H2C0.89375 6 0 5.10625 0 4C0 2.89375 0.89375 2 2 2H8L8.45 1.10625ZM2 8H26V28C26 30.2062 24.2062 32 22 32H6C3.79375 32 2 30.2062 2 28V8ZM8 12C7.45 12 7 12.45 7 13V27C7 27.55 7.45 28 8 28C8.55 28 9 27.55 9 27V13C9 12.45 8.55 12 8 12ZM14 12C13.45 12 13 12.45 13 13V27C13 27.55 13.45 28 14 28C14.55 28 15 27.55 15 27V13C15 12.45 14.55 12 14 12ZM20 12C19.45 12 19 12.45 19 13V27C19 27.55 19.45 28 20 28C20.55 28 21 27.55 21 27V13C21 12.45 20.55 12 20 12Z"
                                                                                fill="#A30505" />
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="mt-2 rounded-4  " style="background-color: #EAEAEA">
                                                            <td class="w-25 ">
                                                                <div class="text-start"
                                                                    style="height: 30px; width: 30px; background-color: pink;">
                                                                </div>
                                                            </td>
                                                            <td class="text-center w-25">pink</td>
                                                            <td class="text-center w-25">250 NIS</td>
                                                            <td class="text-center w-25">15</td>

                                                            <td>
                                                                <div class="d-flex justify-content-end gap-2 w-auto">
                                                                    <span class="">
                                                                        <svg width="24" height="24" viewBox="0 0 32 32"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M29.475 1.35627C28.1063 -0.0124756 25.8937 -0.0124756 24.525 1.35627L22.6437 3.23127L28.7625 9.35003L30.6437 7.46877C32.0125 6.10002 32.0125 3.88752 30.6437 2.51877L29.475 1.35627ZM10.775 15.1063C10.3937 15.4875 10.1 15.9563 9.93125 16.475L8.08125 22.025C7.9 22.5625 8.04375 23.1563 8.44375 23.5625C8.84375 23.9688 9.4375 24.1063 9.98125 23.925L15.5312 22.075C16.0438 21.9063 16.5125 21.6125 16.9 21.2313L27.3563 10.7688L21.2313 4.64377L10.775 15.1063ZM6 4.00002C2.6875 4.00002 0 6.68752 0 10V26C0 29.3125 2.6875 32 6 32H22C25.3125 32 28 29.3125 28 26V20C28 18.8938 27.1063 18 26 18C24.8937 18 24 18.8938 24 20V26C24 27.1063 23.1063 28 22 28H6C4.89375 28 4 27.1063 4 26V10C4 8.89377 4.89375 8.00002 6 8.00002H12C13.1062 8.00002 14 7.10627 14 6.00002C14 4.89377 13.1062 4.00002 12 4.00002H6Z"
                                                                                fill="#4987D8" />
                                                                        </svg>
                                                                    </span>
                                                                    <span class="">
                                                                        <svg width="24" height="24" viewBox="0 0 28 32"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M8.45 1.10625C8.7875 0.425 9.48125 0 10.2375 0H17.7625C18.5188 0 19.2125 0.425 19.55 1.10625L20 2H26C27.1063 2 28 2.89375 28 4C28 5.10625 27.1063 6 26 6H2C0.89375 6 0 5.10625 0 4C0 2.89375 0.89375 2 2 2H8L8.45 1.10625ZM2 8H26V28C26 30.2062 24.2062 32 22 32H6C3.79375 32 2 30.2062 2 28V8ZM8 12C7.45 12 7 12.45 7 13V27C7 27.55 7.45 28 8 28C8.55 28 9 27.55 9 27V13C9 12.45 8.55 12 8 12ZM14 12C13.45 12 13 12.45 13 13V27C13 27.55 13.45 28 14 28C14.55 28 15 27.55 15 27V13C15 12.45 14.55 12 14 12ZM20 12C19.45 12 19 12.45 19 13V27C19 27.55 19.45 28 20 28C20.55 28 21 27.55 21 27V13C21 12.45 20.55 12 20 12Z"
                                                                                fill="#A30505" />
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
`;
        container.appendChild(newInput);
    }

    // Function to display file name
    function showFileName(input) {
        var label = input.nextElementSibling;
        var fileName = input.files[0].name;
        label.innerHTML = '<i class="bi bi-image text-black"></i> ' + fileName;
    }

    // Add one input field when the page loads
    // document.addEventListener("DOMContentLoaded", function (event) {
    //     sms_a_edit_product_variations();
    // });

    function sms_a_edit_product_variation_single() {
        var input = document.getElementById('sms_a_edit_product_variation_single_images');
        console.log(input.files); // Check if files are being captured
        if (input.files.length > 0) {
            var fileName = input.files[0].name;
            console.log(fileName); // Check the file name
            // Update input label or any other relevant element with the file name
            input.nextElementSibling.innerHTML = fileName;
        }
    }

    function sms_a_edit_product_variation_multiple_images() {
        var input = document.getElementById('sms_a_edit_product_variation_multiple_image');
        var fileNames = "";
        for (var i = 0; i < input.files.length; i++) {
            fileNames += input.files[i].name + "<br>";
        }
        // Update input label or any other relevant element with the file names
        input.nextElementSibling.innerHTML = fileNames;
    }
</script>


<!--delete modal  -->
<div class="modal modal-blur fade" id="sms_edit_product_variation_w_delete_modal" tabindex="-1" role="dialog"
    aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content p-3 ">

            <div class="modal-body text-center">
                <p>Are you sure you want to delete the term?</p>
            </div>
            <div class="d-flex justify-content-between col-6 m-auto">
                <button type="button" class="btn  cancel-btn sms_modal_cancel_btn" data-dismiss="modal"
                    style="background-color:#afcaee">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
<!--delete complete product  modal  -->
<div class="modal modal-blur fade" id="sms_edit_product_variation_w_delete_complete_modal" tabindex="-1" role="dialog"
    aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content p-3 ">

            <div class="modal-body text-center">
                <p>Are you sure you want to delete the complete product?</p>
            </div>
            <div class="d-flex justify-content-between col-6 m-auto">
                <button type="button" class="btn  cancel-btn sms_modal_cancel_btn" data-dismiss="modal"
                    style="background-color:#afcaee">Cancel</button>
                <a href="product.php"><button type="submit" class="btn btn-danger">Delete</button></a>
            </div>
        </div>
    </div>
</div>

<!-- edit term modal  -->
<div class="modal modal-blur fade" id="sms_edit_product_variation_w_edit_product_modal" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #4987D870">
                <div class="py-1 rounded-top text-center">
                    <h3 class="card-title m-0 text-black fs-2 fw-bold">Edit Variation</h3>
                </div>
                <button type="button" class="btn-close sms_modal_cancel_btn" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                include "edit_variation_popuop.php"
                    ?>
            </div>

        </div>
    </div>
</div>

<script>
    function logFormValues() {
    const productID = document.getElementById('variable_product_id').value;
    const productName = document.getElementById('variation_product_name').value;
    const categorySelect = document.getElementById('variation_category_select');
    const selectedCategories = Array.from(categorySelect.selectedOptions).map(option => option.value);

    // Collect values from the file inputs
    const singleImageInput = document.getElementById('sms_a_edit_product_variation_single_images');
    const singleImageFile = singleImageInput.files[0] ? singleImageInput.files[0].name : 'No file selected';

    const multipleImageInput = document.getElementById('sms_a_edit_product_variation_multiple_image');
    const multipleImageFiles = Array.from(multipleImageInput.files).map(file => file.name);

    console.log('Product ID:', productID);
    console.log('Product Name:', productName);
    console.log('Selected Categories:', selectedCategories);
    console.log('Single Image File:', singleImageFile);
    console.log('Multiple Image Files:', multipleImageFiles);
}

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tableContainer = document.querySelector(".variation_edit_container"); // Replace with the container element for your table
        tableContainer.addEventListener("click", function (event) {
            if (event.target.classList.contains("variation_edit")) {
                // Get the closest table row (tr) element
                const row = this.closest("tr");

                // Create an empty object to store data
                const rowData = {};

                // Loop through all cells (td) in the row
                row.querySelectorAll("td").forEach(cell => {
                    // Get the text content of each cell
                    const cellValue = cell.textContent.trim();

                    // Extract the data based on the cell's position (index) or add custom logic
                    const dataKey = cell.cellIndex; // Access by cell index (0, 1, 2, ...)
                    // You can also use cell.dataset (if you have data-* attributes on cells)
                    rowData[dataKey] = cellValue;
                });

                console.log("Row Data:", rowData);
                // var usageLimit = rowData[3].split('/')[1]; // This will extract "15" from "0/15"
                // document.getElementById('coupons_code').value = rowData[0];
                // document.getElementById('discount_amount').value = rowData[2];
                // document.getElementById('usage_limit').value = usageLimit;
                // document.getElementById('expiration_date').value = rowData[4];


                // You can use the rowData object for further processing
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalElements = document.querySelectorAll('.variation_edit_data');
        modalElements.forEach(function (modalElement) {
            modalElement.addEventListener('click', function () {
                const productJson = modalElement.getAttribute('data-bs-productJson');
                // Parse the JSON if needed
                const productData = JSON.parse(productJson);
                console.log(productData);

                document.getElementById('variation_product_name').value = productData.name;
                document.getElementById('variation_description').value = productData.description;

                document.getElementById('variable_product_id').value = productData.id;
                
                var productId = productData.id;
                let newTablebody = document.getElementById('variations_data_table_rows');
                newTablebody.innerHTML = " ";
                fetch(`/product/${productId}/variations`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(variationsData => {
                        // Process variationsData
                        var variationsDataArray = variationsData.data;
                        variationsDataArray.forEach(function (variationsDataRow) {
                            console.log(variationsDataRow);



                            var newTablerow = document.createElement('tr'); // is a node
                            newTablerow.classList.add('mt-2');
                            newTablerow.classList.add('rounded-4');
                            newTablerow.classList.add('w-100');
                            newTablerow.style.background = "#EAEAEA";
                            newTablerow.style.margin = "8px";

                            let variations_stock_quantity = "";
                            let variations_regular_price = "";
                            if (variationsDataRow.stock_quantity == null) {
                                variations_stock_quantity = "Not Available";
                            } else {
                                variations_stock_quantity = variationsDataRow.stock_quantity;
                            }

                            if (variationsDataRow.regular_price == "") {
                                variations_regular_price = "Not Price Added";
                            } else {
                                variations_regular_price = variationsDataRow.regular_price;
                            }
                            // Customize the content of the div
                            newTablerow.innerHTML = `  
                        <tr class="sms_mu_spacing_diver"></tr>

                        <tr class="mt-2 rounded-4 w-100" style="background-color: #EAEAEA; ">

                            <td class=""></td>
                                <td class="text-center ">${variationsDataRow.name}</td>
                                <td class="text-center ">${variationsDataRow.regular_price}</td>
                                <td class="text-center ">${variations_stock_quantity}</td>
                                <td>
                                    <div class="d-flex justify-content-end gap-1 w-auto ">
                                        <span class="variation_edit_container"
                                            onclick="openModal('sms_edit_product_variation_w_edit_product_modal')">
                                            <svg class="variation_edit" onclick="edit_variation(this)" width="24" height="24" viewBox="0 0 32 32" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M29.475 1.35627C28.1063 -0.0124756 25.8937 -0.0124756 24.525 1.35627L22.6437 3.23127L28.7625 9.35003L30.6437 7.46877C32.0125 6.10002 32.0125 3.88752 30.6437 2.51877L29.475 1.35627ZM10.775 15.1063C10.3937 15.4875 10.1 15.9563 9.93125 16.475L8.08125 22.025C7.9 22.5625 8.04375 23.1563 8.44375 23.5625C8.84375 23.9688 9.4375 24.1063 9.98125 23.925L15.5312 22.075C16.0438 21.9063 16.5125 21.6125 16.9 21.2313L27.3563 10.7688L21.2313 4.64377L10.775 15.1063ZM6 4.00002C2.6875 4.00002 0 6.68752 0 10V26C0 29.3125 2.6875 32 6 32H22C25.3125 32 28 29.3125 28 26V20C28 18.8938 27.1063 18 26 18C24.8937 18 24 18.8938 24 20V26C24 27.1063 23.1063 28 22 28H6C4.89375 28 4 27.1063 4 26V10C4 8.89377 4.89375 8.00002 6 8.00002H12C13.1062 8.00002 14 7.10627 14 6.00002C14 4.89377 13.1062 4.00002 12 4.00002H6Z"
                                                    fill="#4987D8" />
                                            </svg>
                                        </span>
                                        <span class="variation_delete"
                                            onclick="openModal('sms_edit_product_variation_w_delete_modal')">
                                            <svg width="24" height="24" viewBox="0 0 28 32" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.45 1.10625C8.7875 0.425 9.48125 0 10.2375 0H17.7625C18.5188 0 19.2125 0.425 19.55 1.10625L20 2H26C27.1063 2 28 2.89375 28 4C28 5.10625 27.1063 6 26 6H2C0.89375 6 0 5.10625 0 4C0 2.89375 0.89375 2 2 2H8L8.45 1.10625ZM2 8H26V28C26 30.2062 24.2062 32 22 32H6C3.79375 32 2 30.2062 2 28V8ZM8 12C7.45 12 7 12.45 7 13V27C7 27.55 7.45 28 8 28C8.55 28 9 27.55 9 27V13C9 12.45 8.55 12 8 12ZM14 12C13.45 12 13 12.45 13 13V27C13 27.55 13.45 28 14 28C14.55 28 15 27.55 15 27V13C15 12.45 14.55 12 14 12ZM20 12C19.45 12 19 12.45 19 13V27C19 27.55 19.45 28 20 28C20.55 28 21 27.55 21 27V13C21 12.45 20.55 12 20 12Z"
                                                    fill="#A30505" />
                                            </svg>
                                        </span>
                                    </div>
                                </td></tr>
                                `;

                            // Append the newDiv to the parent div
                            newTablebody.appendChild(newTablerow);


                            // variationsDataAttributes = variationsDataRow.attributes;
                            // variationsDataAttributes.forEach(function (variationsDataAttribute) {
                            //     // console.log(variationsDataAttribute.name);



                            // });


                        });
                        // Your code to handle variationsData goes here
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });

                // productData.variations.forEach(function (variation) {
                //     console.log(variation);
                // });
                // Select all elements with the class 'choices__item--selectable'
                var elements = document.querySelectorAll('.choices__item--selectable');

                // Get the select element
                const selectElement = document.getElementById('variation_category_select');


                elements.forEach(function (element) {

                    selectElement.value = null;

                    // Get the value of the data-value attribute
                    var dataValue = element.getAttribute('data-value');

                    // console.log(dataValue);
                    // Check if this value matches any category.id
                    productData.categories.forEach(function (category) {
                        // console.log(category.id);

                        if (dataValue == category.id) {
                            // console.log(dataValue);
                            // console.log(category.id);

                            // Create a new option element
                            var option = document.createElement('option');

                            // Set the value of the option to data-value
                            option.value = dataValue;

                            // Set the inner HTML of the option to the inner HTML of the element
                            option.innerHTML = element.innerHTML;
                            option.selected = true;

                            // Append the option to the select field
                            selectElement.appendChild(option);
                        }
                    });
                });
                // Clear existing selections
                // Loop through the categories array and select the options


                // document.getElementById('sms_mu_Ip_five').value = productData.sale_price;
                // document.getElementById('sms_mu_Ip_seven').value = productData.stock_quantity;
                // document.getElementById('sms_mu_id_regular_product').value = productData.stock_quantity;
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        let count = 0;

        var modal = document.getElementById('edit-regular-modal-full-width');
        modal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var productJson = button.getAttribute('data-bs-productJson'); // Product data passed from the button
            var parentCategoriesData = button.getAttribute('data-bs-categoriesJson'); // Product data passed from the button
            // console.log(productJson)

            try {
                // Convert the JSON string to JavaScript object
                var productData = JSON.parse(productJson);
                // Access the modal content element
                document.getElementById('sms_mu_Ip_one').value = productData.name;
                document.getElementById('product_id').value = productData.id;
                document.getElementById('sms_mu_Ip_four').value = productData.regular_price;
                document.getElementById('sms_mu_Ip_five').value = productData.sale_price;
                document.getElementById('sms_mu_Ip_seven').value = productData.stock_quantity;
                document.getElementById('sms_mu_id_regular_product').value = productData.stock_quantity;
                document.getElementById('sms_mu_Ip_six').value = productData.description.replace(/<[^>]*>/g, '');

                var parentCategories_json = JSON.parse(parentCategoriesData);
                console.log(parentCategories_json);
                var selectElement = document.getElementById('category_in_popoupop');
                selectElement.innerHTML = '';
                var productcategorys = productData.categories;
                console.log(productData.categories);

                parentCategories_json.forEach(function (category) {
                    var option = document.createElement('option');
                    option.value = category.id; // Assuming category.id contains the ID
                    option.text = category.name; // Assuming category.text contains the text
                    productcategorys.forEach(function (productcategory) {
                        if (productcategory['id'] == category.id) {
                            option.selected = true;
                            // console.log("SADSAD");
                        }
                    });
                    selectElement.appendChild(option);
                });

            } catch (error) {
                console.error('Error parsing JSON:', error);
            }


            if (count < 1) {


                let multipleCancelButton = new Choices('#category_in_popoupop', {
                    removeItemButton: true,
                    // maxItemCount: 5,
                    // searchResultLimit: 5,
                    // renderChoiceLimit: 5
                });
                count++;
            }

        });
    });
</script>
<script>

    function edit_variation(clickedButton) {
        console.log("edit_variation working");
        // Get the closest table row (tr) element
        const button = clickedButton;

        const row = button.closest("tr"); // Find the closest table row
        // const row = clickedRow;

        // Create an empty object to store data
        const rowData = {};

        // Loop through all cells (td) in the row
        row.querySelectorAll("td").forEach(cell => {
            // Get the text content of each cell
            const cellValue = cell.textContent.trim();

            // Extract the data based on the cell's position (index) or add custom logic
            const dataKey = cell.cellIndex; // Access by cell index (0, 1, 2, ...)
            // You can also use cell.dataset (if you have data-* attributes on cells)
            rowData[dataKey] = cellValue;
        });

        console.log("Row Data:", rowData);

        document.getElementById('sms_mu_name_variation').value=rowData[1];
        document.getElementById('sms_mu_price_variation').value=rowData[2];
        document.getElementById('sms_mu_inventory_variation').value=rowData[3];

    }
    // Function to open the modal
    function openModal(modalId) {
        // Select the modal using the provided ID
        var modal = document.getElementById(modalId);

        // Show the modal
        modal.style.display = 'block';
        modal.classList.add('show');
        modal.setAttribute('aria-modal', 'true');
        modal.setAttribute('aria-hidden', 'false');

        // Hide the modal when the cancel button or close button is clicked
        var cancelButton = modal.querySelector('.sms_modal_cancel_btn');
        cancelButton.addEventListener('click', closeModal);

        // Hide the modal when outside the modal is clicked
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Function to close the modal
        function closeModal() {
            console.log("Modal closed")
            modal.style.display = 'none';
            modal.classList.remove('show');
            modal.setAttribute('aria-modal', 'false');
            modal.setAttribute('aria-hidden', 'true');
        }
    }
</script>