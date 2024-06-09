<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adding a term form</title>
    <link href="./dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/demo.min.css?1684106062" rel="stylesheet" /> -->

<?php
var_dump($attributes);
?>
<style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    .abc .sms_mu_term_eng {
        display: block !important;
    }

    .abc .sms_mu_term_heb {
        display: none;
    }

    .rtl .sms_mu_term_eng {
        display: none;
    }

    .rtl .sms_mu_term_heb {
        display: block;
    }

    .sms_mu_variation_in_combination_input {
        width: 49% !important;
        margin: 10px 0.5%;
        background-color: #eaeaea;
        border: none;
        padding: 15px;
        border-radius: 10px;
    }

    .sms_mu_variation_in_combination_input_two {
        width: 99% !important;
        margin: 10px 2px;
        background-color: #eaeaea;
        border: none;
        padding: 15px;
        border-radius: 10px;
    }

    .sms_mu_variation_in_combination_input_read {
        width: 49% !important;
        margin: 10px 0.5%;
        background-color: #eaeaea;
        border: none;
        padding: 15px;
        border-radius: 10px;
    }

    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }

    #sms_mu_configure {
        display: none;
        text-align: center;
        margin: 10px 0;
    }

    .rtl {
        direction: rtl;
    }

    .rtl .avatar {
        margin-left: 10px;
    }

    .sms_a_add_product_variations {
        position: relative;
        /* display: inline-block; */
    }

    .sms_a_add_product_variations input[type="file"] {
        position: absolute;
        left: -9999px;
    }

    .sms_a_add_product_variations label {
        /* display: inline-block; */
        padding: 17px 16px;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        background-color: #EAEAEA !important;
        text-align: center;
    }

    .sms_a_add_product_variations label i {
        margin-right: 5px;
    }
</style>
<!-- </head>

<body> -->
<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="">
                    <form action="" id="form" method="" class="card-body">
                        <!-- header -->
                        <div class="row gx-3">
                            <div class="col-md-6 mb-3">
                                <label for="example-text-input fs-3 fw-bold" class="form-label fw-bold" data-i18n="popoups.add_new_product_popoup.product_name_input">Product
                                    Name</label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold" id="example-text-input" style="background-color: #EAEAEA" placeholder="Product Name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-select fs-3 fw-bold" class="form-label fw-bold" data-i18n="popoups.add_new_product_popoup.catageory_managment">Category
                                </label>
                                <div style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                                    <div class="col-md-12 rounded-4 bg-transparent h-100 ">
                                        <select id="choices-multiple-remove-button" multiple style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
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
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00006 7.16667L10.0001 3.16667L8.83339 2L6.00006 4.83333L3.16673 2L2.00006 3.16667L6.00006 7.16667Z" fill="#111" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Upload a product image  -->

                            <div class="row gx-3">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label  fw-bold" data-i18n="popoups.add_new_product_popoup.image_upload">Upload a product image
                                    </label>
                                    <div class="sms_a_add_product_variations">
                                        <input type="file" id="single-image-input" accept="image/*" onchange="sms_a_add_product_variations()">
                                        <label for="single-image-input"><i class="bi bi-image text-black"></i>
                                            <svg width="20" height="20" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z" fill="black" />
                                            </svg>
                                            <p data-i18n="popoups.add_new_product_popoup.image_upload_text" class="my-0">Choose a picture</p>
                                        </label>
                                    </div>
                                </div>
                                <!-- Upload a photo gallery -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold" data-i18n="popoups.add_new_product_popoup.gallery_upload">Upload a photo
                                        gallery</label>
                                    <div class="sms_a_add_product_variations">
                                        <input type="file" id="multiple-images-input" accept="image/*" onchange="sms_a_add_product_variation()" multiple>
                                        <label for="multiple-images-input"><i class="bi bi-image text-black fw-bold"></i>
                                            <svg width="20" height="20" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z" fill="black" />
                                            </svg>
                                            <p data-i18n="popoups.add_new_product_popoup.gallery_upload_text" class="my-0"> Select images</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <!-- description -->
                            <div>
                                <label for="example-text-input fs-3  fw-bold" class="form-label fw-bold" data-i18n="popoups.add_new_product_popoup.text_area_text">A brief
                                    description of the product</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; background-color: #EAEAEA"></textarea>

                                </div>
                            </div>

                        </div>
                        <label class="fw-bold mt-5 Sms_mu_for_Eng"> Select Term Attribute</label>
                        <label class="fw-bold mt-5  Sms_mu_for_hebrew">בחר מאפיין מונח</label>
                        <!-- <div 
                            style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                            <div class="col-md-12 rounded-4 bg-transparent h-100 ">
                                <select id="IOP" multiple
                                    style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;"
                                    onchange="fun_save_changes()">
                                    <option value="Ctg">Ctg</option>
                                    <option value="demo">demo</option>
                                </select>

                                <script>
                                    function fun_save_changes() {
                                        var selectedOptions = [];
                                        var selectElement = document.getElementById('IOP');
                                        // Loop through all options
                                        for (var i = 0; i < selectElement.options.length; i++) {
                                            var option = selectElement.options[i];
                                            // Check if the option is selected
                                            if (option.selected) {
                                                selectedOptions.push(option.value);
                                            }
                                        }
                                        console.log(selectedOptions);
                                    }
                                </script>

                                <span
                                    style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%); pointer-events: none;">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.00006 7.16667L10.0001 3.16667L8.83339 2L6.00006 4.83333L3.16673 2L2.00006 3.16667L6.00006 7.16667Z"
                                            fill="#111" />
                                    </svg>
                                </span>
                            </div>
                        </div> -->
                        <!-- Added terms for variations -->
                        <div style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                            <div class="col-md-12 rounded-4 bg-transparent h-100 ">
                                <select id="IOP" multiple style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;" onchange="fun_save_changes()">

                                    <?php
                                    foreach ($attributes as $attribute) {
                                    ?>
                                        <option value="<?php echo $attribute['id']; ?>"><?php echo $attribute['name']; ?>
                                        </option>
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

                        <div id="selectedOptionsDiv"></div>

                        <div class="rounded-4">

                            <h2 class="text-center my-3" id="sms_mu_configure" data-i18n="popoups.add_new_product_popoup.product_name_input">Configure Variations</h2>
                            <div id="inputs-container"></div>

                            <!-- To add another term click here + -->
                            <div class="text-center mt-4 ">
                                <button type="button" id="SMS_MU_ADD_GENERATE_VARIATIONS" onclick="generate_variations()" class=" col-12 col-md-12 fs-3 rounded-3 py-3 border-0 fw-bold" style="background: rgba(73, 135, 216, 0.44); text-align:center !important; padding:0 41%;">Generate
                                    Variations </button>
                            </div>

                        </div>
                        <!-- submit button -->
                        <div class="text-center mt-4 ">
                            <button type="button" onclick="sms_add_variations_submit()" class=" btn btn-primary col-12 col-md-12 fs-3 rounded-3 py-3 border-0 fw-bold" data-i18n="popoups.add_new_product_popoup.adding_btn_variation">To
                                add the product click here +</button>
                        </div>
                </div>
                </form>
                <div class="modal-body text-center py-4 sms_a_add_regular_pop" id="sms_add_variations_success_message" style="display: none;">
                    <!-- Close icon -->

                    <button type="button" class="btn-close" aria-label="Close" onclick="sms_add_variations_close_success_message()"></button>
                    <!-- SVG icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg>
                    <h3>Success</h3>
                    <div class="text-muted">Your add Variation data has been submitted successfully.</div>
                </div>
                <div class="modal-body text-center py-4 sms_a_add_regular_pop" id="sms_add_variations_error_message" style="display: none;">
                    <!-- Close icon -->
                    <button type="button" class="btn-close" aria-label="Close" onclick="sms_add_variations_close_error_message()"></button>
                    <!-- SVG icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-red icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="12" y1="5" x2="12.01" y2="19"></line>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="12" y1="5" x2="12.01" y2="19"></line>
                    </svg>
                    <h3>Error</h3>
                    <div class="text-muted">An error occurred while submitting data. Please try again later.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function sms_add_variations_close_success_message() {
        document.getElementById('sms_add_variations_success_message').style.display = 'none';
    }

    function sms_add_variations_close_error_message() {
        document.getElementById('sms_add_variations_error_message').style.display = 'none';
    }
    let selectElement = document.getElementById('IOP');
    selectElement.addEventListener('change', function() {
        console.log(getSelectedValues('IOP'))
    })

    function sms_add_variations_submit() {
        console.log("hello");

<<<<<<< HEAD
        // Log all the form values
        var formData = {
            'name': document.getElementById('example-text-input').value,
            'type': 'variable',
            'description': document.getElementById('floatingTextarea2').value,
            'manage_stock': true,
            'categories': getSelectedValues('choices-multiple-remove-button'),
            'images': [], // Assuming no images for simplicity
            'regular_price': '10', // Assuming regular_price is always 10 for the main product
            'sale_price': '10', // Assuming sale_price is always 10 for the main product
            'attributes': [],
            'variations': []
=======
    // Log all the form values
    var formData = {
        'name': document.getElementById('example-text-input').value,
        'type': 'variable',
        'description': document.getElementById('floatingTextarea2').value,
        'manage_stock': true,
        'categories': getSelectedValues('choices-multiple-remove-button'),
        'images': [],  // Assuming no images for simplicity
        'regular_price': '10',  // Assuming regular_price is always 10 for the main product
        'sale_price': '10',  // Assuming sale_price is always 10 for the main product
        'attributes': [],
        'variations': []
    };

    // Collecting attribute data from dynamically generated select boxes
    var attributeDivs = document.querySelectorAll('#selectedOptionsDiv .selected-option');
    attributeDivs.forEach(div => {
        let selectBox = div.querySelector('select');
        if (selectBox) {
            let attributeName = div.querySelector('label').textContent.replace('Select ', '').replace(' Attribute', '');
            let options = Array.from(selectBox.options).filter(option => option.selected).map(option => option.textContent);

            if (options.length > 0) {
                var attribute = {
                    'name': attributeName,
                    'options': options,
                    'variation': true
                };
                formData.attributes.push(attribute);
            }
        }
    });

    // Collecting variation data
    var variationInputs = document.querySelectorAll('.sms_mu_variation_in_combination_input');
    var variationInputsTwo = document.querySelectorAll('.sms_mu_variation_in_combination_input_two');
    var variationInputsOne = document.querySelectorAll('.sms_mu_variation_in_combination_input_read');

    variationInputsOne.forEach((input, index) => {
        var variation = {
            'regular_price': variationInputs[index].value,
            'stock_quantity': variationInputsTwo[index].value, 
            'attributes': []
>>>>>>> 22042f144f2dbb963660c739a32d52d8a67f557c
        };

        // Collecting attribute data from dynamically generated select boxes
        var attributeDivs = document.querySelectorAll('#selectedOptionsDiv .selected-option');
        attributeDivs.forEach(div => {
            let selectBox = div.querySelector('select');
            if (selectBox) {
                let attributeName = div.querySelector('label').textContent.replace('Select ', '').replace(' Attribute', '');
                let options = Array.from(selectBox.options).filter(option => option.selected).map(option => option.textContent);

                if (options.length > 0) {
                    var attribute = {
                        'name': attributeName,
                        'options': options,
                        'variation': true
                    };
                    formData.attributes.push(attribute);
                }
            }
        });

        // Collecting variation data
        var variationInputs = document.querySelectorAll('.sms_mu_variation_in_combination_input');
        var variationInputsTwo = document.querySelectorAll('.sms_mu_variation_in_combination_input_two');
        var variationInputsOne = document.querySelectorAll('.sms_mu_variation_in_combination_input_read');

<<<<<<< HEAD
        variationInputsOne.forEach((input, index) => {
            var variation = {
                'regular_price': variationInputs[index].value,
                'attributes': []
            };

            var attributes = input.value.split('-');
            attributes.forEach(attr => {
                var [name, option] = attr.split(':');
                if (name && option) {
                    variation.attributes.push({
                        'name': name.trim(),
                        'option': option.trim()
                    });
                }
            });

            formData.variations.push(variation);
        });

        // Posting form data
        fetch('product/add', {
                method: 'POST',
                body: JSON.stringify(formData),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.status === 200) {
                    // Form submission succeeded, display success message
                    document.getElementById('sms_add_variations_success_message').style.display = 'block';
                    document.getElementById('sms_add_variations_error_message').style.display = 'none';
                    window.location.reload();
                } else {
                    // Form submission failed, display error message
                    document.getElementById('sms_add_variations_error_message').style.display = 'block';
                    document.getElementById('sms_add_variations_success_message').style.display = 'none'; // Hide success message if it was displayed before
                }
            })
            .catch(error => {
                // Network error occurred, display error message
                document.getElementById('sms_add_variations_error_message').style.display = 'block';
                console.error('Error submitting form data:', error);
            });

        console.log(formData);
    }

    function getSelectedValues(selectId) {
        var selectedOptions = [];
        let selectElement = document.getElementById(selectId);
        for (var i = 0; i < selectElement.options.length; i++) {
            var option = selectElement.options[i];
            if (option.selected) {
                selectedOptions.push(option.value);
            }
        }
        return selectedOptions;
    }


    function getSelectedValues(selectId) {
        var selectedOptions = [];
        let selectElement = document.getElementById(selectId);
        for (var i = 0; i < selectElement.options.length; i++) {
            var option = selectElement.options[i];
            if (option.selected) {
                selectedOptions.push(option.value);
            }
        }
        return selectedOptions;
    }

    function fun_save_changes() {
        let parentDiv = document.getElementById('selectedOptionsDiv');
        if (selectElement.length < 1) {
            document.getElementById('SMS_MU_ADD_GENERATE_VARIATIONS').style.display = 'none';
        } else {
            document.getElementById('SMS_MU_ADD_GENERATE_VARIATIONS').style.display = 'flex';
        }

        // Remove existing divs
        parentDiv.innerHTML = '';
=======
 // Collecting single image
 let singleImageInput = document.getElementById('single-image-input');
    let multipleImagesInput = document.getElementById('multiple-images-input');

    let files = [];
    if (singleImageInput.files.length > 0) {
        files.push(singleImageInput.files[0]);
    }
    if (multipleImagesInput.files.length > 0) {
        files.push(...multipleImagesInput.files);
    }

    let base64Array = [];

    function readFileAsBase64(file) {
        return new Promise((resolve, reject) => {
            let reader = new FileReader();
            reader.onload = function(event) {
                resolve(event.target.result);
            };
            reader.onerror = function(error) {
                reject(error);
            };
            reader.readAsDataURL(file);
        });
    }

    Promise.all(files.map(file => file ? readFileAsBase64(file) : Promise.resolve(null)))
        .then(base64Strings => {
            formData.images = base64Strings.filter(base64 => base64 !== null);

            console.log(formData);

            return fetch('product/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData),
            });
        })
        .then(response => {
            if (response.status === 200) {
                // Form submission succeeded, display success message
                document.getElementById('sms_add_variations_success_message').style.display = 'block';
                document.getElementById('sms_add_variations_error_message').style.display = 'none';
                window.location.reload();
            } else {
                // Form submission failed, display error message
                document.getElementById('sms_add_variations_error_message').style.display = 'block';
                document.getElementById('sms_add_variations_success_message').style.display = 'none'; // Hide success message if it was displayed before
            }
        })
        .catch(error => {
            // Network error occurred, display error message
            document.getElementById('sms_add_variations_error_message').style.display = 'block';
            console.error('Error submitting form data:', error);
        });
}
>>>>>>> 22042f144f2dbb963660c739a32d52d8a67f557c

        // Loop through all options
        for (let i = 0; i < selectElement.options.length; i++) {
            let option = selectElement.options[i];
            // Check if the option is selected
            if (option.selected) {
                fetch(`/attributes/${option.value}/terms`)
                    .then(response => response.json())
                    .then(data => {
                        // Create a new div for the selected option
                        let newDiv = document.createElement('div');
                        newDiv.classList.add('selected-option');

                        // Customize the content of the div
                        newDiv.innerHTML = `  
                    <label class="form-label fw-bold mt-5">Select ${option.value} Attribute</label>
                    <div style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                        <div class="col-md-12 rounded-4 bg-transparent h-100 ">
                            <select class='select_box${i}' id='sMS_MU_SET${i}' data-attribute-name='${option.value}' multiple
                                style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
                                
                            </select>
                            <span class="span_div">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.00006 7.16667L10.0001 3.16667L8.83339 2L6.00006 4.83333L3.16673 2L2.00006 3.16667L6.00006 7.16667Z"
                                        fill="#111" />
                                </svg>
                            </span>
                        </div>
                    </div>`;

                        // Append the newDiv to the parent div
                        parentDiv.appendChild(newDiv);

                        // Find the select box inside the new div
                        const selectBox = newDiv.querySelector(`.select_box${i}`);

                        // Clear the loading option
                        selectBox.innerHTML = '';

                        // Populate the select box with the fetched data
                        data.forEach(item => {
                            const optionElement = document.createElement('option');
                            optionElement.value = item.id;
                            optionElement.textContent = item.name;
                            selectBox.appendChild(optionElement);
                        });

                        // Initialize Choices on the newly added select box
                        var multipleCancelButton = new Choices(selectBox, {
                            removeItemButton: true
                        });

                        console.log('Select box options:', selectBox.innerHTML);
                    })
                    .catch(error => {
                        console.error('Error fetching terms:', error);
                        // Optionally handle the error by displaying a message to the user
                        const selectBox = newDiv.querySelector(`.select_box${i}`);
                        selectBox.innerHTML = '<option>Error loading options</option>';
                    });
            }
        }
    }

    function generate_variations() {
        const arrays = [];
        for (let i = 0; i < selectElement.length; i++) {
            const selectBox = document.querySelector(`.select_box${i}`);
            if (selectBox) {
                const values = Array.from(selectBox.options)
                    .filter(option => option.selected)
                    .map(option => ({
                        id: option.value,
                        name: option.textContent,
                        attributeName: selectBox.getAttribute('data-attribute-name')
                    }));
                arrays.push(values);
            }
        }

        const combinations = getCombinations(arrays);

        const container = document.getElementById('inputs-container'); // Assuming there's a container for the inputs in your HTML

        // Clear previous inputs
        container.innerHTML = '';

        // Create inputs for each combination
        combinations.forEach(combination => {
            const readOnlyInput = document.createElement('input');
            readOnlyInput.classList.add('sms_mu_variation_in_combination_input_read');
            readOnlyInput.type = 'text';
            readOnlyInput.readOnly = true;
            readOnlyInput.value = combination.map(c => `${c.attributeName}:${c.name}`).join('-');
            container.appendChild(readOnlyInput);

            const numberInput1 = document.createElement('input');
            numberInput1.text = "Variations";
            numberInput1.placeholder = "Variations Price";
            numberInput1.classList.add('sms_mu_variation_in_combination_input');
            numberInput1.type = 'number';
            container.appendChild(numberInput1);

            const numberInput2 = document.createElement('input');
            numberInput2.classList.add('sms_mu_variation_in_combination_input_two');
            numberInput2.type = 'number';
            numberInput2.placeholder = "Variations Stock";
            container.appendChild(numberInput2);

            container.appendChild(document.createElement('br')); // Add line break
            container.appendChild(document.createElement('hr')); // Add line break
            document.getElementById('sms_mu_configure').style.display = "flex";
        });
    }




    function getCombinations(arrays) {
        function helper(arrays, index, current) {
            if (index === arrays.length) {
                result.push(current);
                return;
            }
            for (let i = 0; i < arrays[index].length; i++) {
                helper(arrays, index + 1, current.concat(arrays[index][i]));
            }
        }

        const result = [];
        helper(arrays, 0, []);
        return result;
    }

    // Example usage:
    const arrays = [
        ['a', 'b', 'c'],
        [1, 2],
        ['x', 'y']
    ];

    const combinations = getCombinations(arrays);
    console.log(combinations);
</script>

<!-- input javascript code  -->
<script>
    var inputCount = 0;
    var variation_index = 0;

    function fun_add_variation() {
        variation_index += 1;
        window.alert('s')
        console.log(variation_index + "as")
    }

    // Function to add input fields
    //     function sms_a_add_product_variation_inputs() {
    //         inputCount += 0;
    //         var container = document.getElementById('sms_a_add_product_variation');
    //         var newInput = document.createElement('div');
    //         newInput.classList.add('col-md-12', 'mb-0', 'p-0');

    //         newInput.innerHTML = `
    //         <div class="row gx-3">
    //             <div class="col-md-12 mt-4 py-3">
    //                 <label for="example-select fs-2 fw-bold" class="form-label fw-bold py-3 px-3 rounded-3"
    //                     style="background: rgba(73, 135, 216, 0.44);" onclick="openModal('sms_add_variation_modal_in_add_product')" >Added terms for variations</label>
    //             </div>
    //             <div class="col-md-6 mb-3">
    //                 <label for="example-select" class="form-label fs-3 fw-bold">The name of the term</label>
    //                 <select class="form-select rounded-3 p-3" id="example-select" style="background-color: #EAEAEA">
    //                     <option value="1">Pink</option>
    //                     <option value="2">Color</option>
    //                 </select>
    //             </div>
    //             <div class="col-md-6">
    //                 <label for="example-text-input" class="form-label fs-3 fw-bold">Term price</label>
    //                 <input type="number" class="form-control rounded-3 p-3 fw-bold" id="example-text-input"
    //                     style="background-color: #EAEAEA" placeholder="250">
    //             </div>

    //             <div class="col-md-12 mt-3 ">
    //                 <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">Term inventory</label>
    //                 <input type="number" class="form-control rounded-3 p-3 fw-bold" id="example-text-input"
    //                     style="background-color: #EAEAEA" placeholder="4">
    //             </div>
    //         </div>
    // `;
    //         container.appendChild(newInput);
    //     }

    // Function to display file name
    function showFileName(input) {
        var label = input.nextElementSibling;
        var fileName = input.files[0].name;
        label.innerHTML = '<i class="bi bi-image text-black"></i> ' + fileName;
    }

    // Add one input field when the page loads
    document.addEventListener("DOMContentLoaded", function(event) {
        if (selectElement.length < 1) {
            document.getElementById('SMS_MU_ADD_GENERATE_VARIATIONS').style.display = 'none'

        } else {
            document.getElementById('SMS_MU_ADD_GENERATE_VARIATIONS').style.display = 'flex'
        }
    });


    function sms_a_add_product_variations() {
        var input = document.getElementById('single-image-input');
        var fileName = input.files[0].name;
        // Update input label or any other relevant element with the file name
        input.nextElementSibling.innerHTML = fileName;
    }

    function sms_a_add_product_variation() {
        var input = document.getElementById('multiple-images-input');
        var fileNames = "";
        for (var i = 0; i < input.files.length; i++) {
            fileNames += input.files[i].name + "<br>";
        }
        // Update input label or any other relevant element with the file names
        input.nextElementSibling.innerHTML = fileNames;
    }
</script>

<!-- add regular product modal  -->
<div class="modal modal-blur fade" id="sms_add_variation_modal_in_add_product" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #4987D870">
                <div class="py-1 rounded-top text-center ">
                    <h3 class="card-title m-0 text-black fs-2 fw-bold">Add variation in product</h3>
                </div>
                <button type="button" class="btn-close sms_modal_cancel_btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                not clear yet
            </div>

        </div>
    </div>
</div>

<script>
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
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Function to close the modal
        function closeModal() {
            modal.style.display = 'none';
            modal.classList.remove('show');
            modal.setAttribute('aria-modal', 'false');
            modal.setAttribute('aria-hidden', 'true');
        }
    }
</script>

<!-- </body>
<script src="./dist/js/tabler.min.js?1684106062" defer></script>
<script src="./dist/js/demo.min.js?1684106062" defer></script>

</html> -->