<style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }

    .rtl {
        direction: rtl;
    }

    .rtl .avatar {
        margin-left: 10px;
    }

    .sms_a_custom_file_input {
        position: relative;
        /* display: inline-block; */
    }

    .sms_a_custom_file_input input[type="file"] {
        position: absolute;
        left: -9999px;
    }

    .sms_a_custom_file_input label {
        /* display: inline-block; */
        padding: 17px 16px;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        background-color: #EAEAEA !important;
        text-align: center;
    }

    .sms_a_custom_file_input label i {
        margin-right: 5px;
    }

    .abc .sms_mu_btn_eng {
        display: none;
    }

    .abc .sms_mu_btn_heb {
        display: block;
    }

    .rtl .sms_mu_btn_eng {
        display: none;
    }

    .rtl .sms_mu_btn_heb {
        display: block;
    }

    input[type="file"] {
        display: none;
    }
</style>
<!-- </head>

<body> -->
<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="">
                    <!-- <div class="py-3 rounded-top text-center mb-4" style="background-color: #4987D870">
                            <h3 class="card-title text-black fs-2 fw-bold">Editing a regular product</h3>
                        </div> -->
                    <form action="" method="post" class="card-body">
                        <!-- header -->
                        <div class="row gx-3">
                            <div class="col-md-6 mb-3">
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold"
                                    data-i18n="popoups.add_new_product_popoup.product_name_input">Product
                                    Name</label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold" id="sms_mu_Ip_one"
                                    style="background-color: #EAEAEA" placeholder="Blue Gucci bag">
                                <input type="hidden" class="form-control rounded-3 p-3 fw-bold"
                                    id="sms_mu_id_regular_product" style="background-color: #EAEAEA"
                                    placeholder="Eg:Blue Gucci bag">
                            </div>
                            <div class="col-md-6    ">
                                <label for="example-select fs-3 fw-bold" class="form-label fw-bold"
                                    data-i18n="popoups.add_new_product_popoup.catageory_managment">Category
                                </label>
                                <div class="-5"
                                    style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                                    <div class="col-md-12 rounded-4 bg-transparent h-100 ">
                                        <select id="edit_regular_category_in_popoupop" multiple
                                            style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
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
                                <label class="form-label fw-bold"
                                    data-i18n="popoups.add_new_product_popoup.image_upload">Upload
                                    a product image </label>
                                <div class="sms_a_custom_file_input">
                                    <input type="file" id="sms_mu_Ip_two" accept="image/*"
                                        style="background-color:#FFFFFF;"
                                        onchange="sms_a_edit_product_variations_image()">
                                    <label for="sms_mu_Ip_two"><i class="bi bi-image text-black"></i>
                                        <svg width="20" height="20" viewBox="0 0 32 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z"
                                                fill="black" />
                                        </svg>
                                        <p data-i18n="popoups.add_new_product_popoup.image_upload_text"> Choose a
                                            picture</p>
                                    </label>
                                </div>
                            </div>
                            <!-- Upload a photo gallery -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"
                                    data-i18n="popoups.add_new_product_popoup.gallery_upload">Upload a photo
                                    gallery</label>
                                <div class="sms_a_custom_file_input">
                                    <input type="file" id="sms_mu_Ip_three" accept="image/*"
                                        style="background-color:#FFFFFF;"
                                        onchange="sms_a_edit_product_variations_images()" multiple>
                                    <label for="sms_mu_Ip_three"><i class="bi bi-image text-black"></i>
                                        <svg width="20" height="20" viewBox="0 0 32 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z"
                                                fill="black" />
                                        </svg>
                                        <p data-i18n="popoups.add_new_product_popoup.gallery_upload_text"> Select images
                                        </p>
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!-- normal and sale price  -->
                        <div class="row gx-3">
                            <div class="col-md-6 mb-3">
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">Normal
                                    price</label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold" id="sms_mu_Ip_four"
                                    style="background-color: #EAEAEA" placeholder="Normal Price">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold"
                                    data-i18n="popoups.add_new_product_popoup.saleprice">Sale price
                                    (optional)</label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold" id="sms_mu_Ip_five"
                                    style="background-color: #EAEAEA" placeholder="Sale Price">
                            </div>
                        </div>
                        <!-- description -->
                        <div>
                            <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold"
                                data-i18n="popoups.add_new_product_popoup.text_area_text">A brief
                                description of the product</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="sms_mu_Ip_six"
                                    style="height: 100px; background-color: #EAEAEA"></textarea>

                            </div>
                        </div>
                        <input type="hidden" name="product_id" id=product_id>
                        <!-- To add another term click here + -->
                        <div class="col-md-12 mt-3 ">
                            <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold"
                                data-i18n="popoups.add_new_product_popoup.unit">Units in
                                Stock</label>
                            <input type="text" class="form-control rounded-3 p-3 fw-bold" id="sms_mu_Ip_seven"
                                style="background-color: #EAEAEA" placeholder="Unit Stock">
                        </div>
                </div>

                </form>
                <div class="d-flex justify-content-center flex-column flex-sm-row gap-3 p-2">
                    <div class="text-center mt-2 col-sm-6 col-md-6 Sms_mu_for_Eng">
                        <button onclick="fun_Np()" class="  btn btn-primary col-12 rounded-4 py-3"
                            id="edit_regular_btn">Update</button>
                    </div>
                    <div class="text-center mt-2 col-sm-6 col-md-6 Sms_mu_for_hebrew">
                        <button onclick="fun_Np()" class="btn btn-primary col-12 rounded-4 py-3"
                            id="edit_regular_btn">לעדכון המוצר ←</button>
                    </div>
                    <div class="text-center mt-2 col-sm-6 col-md-6  Sms_mu_for_Eng">
                        <button type="button" class=" btn btn-danger col-12 rounded-4 py-3"
                            onclick="deleteRegular(this)">Delete</button>
                    </div>
                    <div class="text-center mt-2 col-sm-6 col-md-6 Sms_mu_for_hebrew">
                        <button type="button" class="btn btn-danger col-12 rounded-4 py-3 "
                            onclick="deleteRegular(this)">מחיקת המוצר</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-body text-center py-4 sms_a_add_regular_pop" id="sms_editForm_product_success_message"
    style="display: none;">
    <!-- <button type="button" class="btn-close" aria-label="Close" onclick="Sms_mu_scucess_product()"></button> -->
    <!-- SVG icon -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24"
        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
        <path d="M9 12l2 2l4 -4"></path>
    </svg>
    <h3>Success</h3>
    <div class="text-muted">Your add Regular data has been submitted successfully.</div>
</div>
<div class="modal-body text-center py-4 sms_a_add_regular_pop" id="sms_add_editForm_product_error_message"
    style="display: none;">
    <!-- Close icon -->
    <button type="button" class="btn-close" aria-label="Close" onclick="Sms_mu_close_product()"></button>
    <!-- SVG icon -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-red icon-lg" width="24" height="24"
        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <line x1="12" y1="5" x2="12" y2="19"></line>
        <line x1="12" y1="5" x2="12.01" y2="19"></line>
        <line x1="12" y1="5" x2="12" y2="19"></line>
        <line x1="12" y1="5" x2="12.01" y2="19"></line>
    </svg>
    <h3>Error</h3>
    <div class="text-muted">An error occurred while submitting data. Please try again later.</div>
</div>

<!-- input javascript code  -->
<script>
    // function fun_Np() {
    //     let Name = document.getElementById('sms_mu_Ip_one').value;
    //     let CtgValue = document.getElementById('edit_regular_category_in_popoupop');
    //     let ImgValue = document.getElementById('sms_mu_Ip_two').value;
    //     let ImgVlueTwo = document.getElementById('sms_mu_Ip_three').value;
    //     let NormalPrice = document.getElementById('sms_mu_Ip_four').value;
    //     let SalePrice = document.getElementById('sms_mu_Ip_five').value;
    //     let textareaInp = document.getElementById('sms_mu_Ip_six').value;
    //     let unitInp = document.getElementById('sms_mu_Ip_seven').value;
    //     let Id = document.getElementById('product_id').value;
    //     let selectedCategories = [];

    //     // Collect selected categories
    //     for (let i = 0; i < CtgValue.options.length; i++) {
    //         if (CtgValue.options[i].selected) {
    //             selectedCategories.push(CtgValue.options[i].value);
    //         }
    //     }

    //     let image = [ImgValue, ImgVlueTwo];
    //     let data = {
    //         'name': Name,
    //         'category': selectedCategories,
    //         'images':[image],
    //         'type': 'simple',
    //         'regular_price': NormalPrice,
    //         'sale_price': SalePrice,
    //         'description': textareaInp,
    //         'stock_quantity': unitInp,
    //     };

    //     fetch(`/product/${Id}`, {
    //             method: 'PUT', // Changed from POST to PUT
    //             headers: {
    //                 'Content-Type': 'application/json',
    //             },
    //             body: JSON.stringify(data),
    //         })
    //         .then(response => {
    //             if (!response.ok) {
    //                 throw new Error('Network response was not ok');
    //             }
    //             return response.json();
    //         })
    //         .then(data => {
    //             console.log('Data sent:', data);
    //             // Handle the response data here if needed
    //         })
    //         .catch(error => {
    //             console.error('There was a problem with your fetch operation:', error);
    //             // Provide user feedback if needed
    //         });
    // }

    function readFileAsBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.onerror = reject;
            reader.readAsDataURL(file);
        });
    }

    function Sms_mu_scucess_product() {
        document.getElementById('sms_editForm_product_success_message').style.display = 'none';
    }

    function Sms_mu_close_product() {
        document.getElementById('sms_add_editForm_product_error_message').style.display = 'none';
    }

    function fun_Np() {
        let Name = document.getElementById('sms_mu_Ip_one').value;
        let CtgValue = document.getElementById('edit_regular_category_in_popoupop');
        let ImgValue = document.getElementById('sms_mu_Ip_two').files[0]; // Changed to files[0] to get the file object
        let ImgVlueTwo = document.getElementById('sms_mu_Ip_three').files[0]; // Changed to files[0] to get the file object
        let NormalPrice = document.getElementById('sms_mu_Ip_four').value;
        let SalePrice = document.getElementById('sms_mu_Ip_five').value;
        let textareaInp = document.getElementById('sms_mu_Ip_six').value;
        let unitInp = document.getElementById('sms_mu_Ip_seven').value;
        let Id = document.getElementById('product_id').value;
        let selectedCategories = [];

        // Collect selected categories
        for (let i = 0; i < CtgValue.options.length; i++) {
            if (CtgValue.options[i].selected) {
                selectedCategories.push(CtgValue.options[i].value);
            }
        }

        let files = [ImgValue, ImgVlueTwo];

        // Read files as Base64 strings and send the data
        Promise.all(files.map(file => file ? readFileAsBase64(file) : Promise.resolve(null)))
            .then(base64Strings => {
                let data = {
                    'name': Name,
                    'category': selectedCategories,
                    'images': base64Strings.filter(base64 => base64 !== null), // Filter out null values
                    'type': 'simple',
                    'regular_price': NormalPrice,
                    'sale_price': SalePrice,
                    'description': textareaInp,
                    'stock_quantity': unitInp,
                };
                document.getElementById("edit_regular_btn").disabled = true;
                    document.getElementById('ajaxloadingIndicator').style.display = 'flex';
    document.body.style.overflow = "hidden";
                return fetch(`/product/${Id}`, {
                    method: 'PUT', // Changed from POST to PUT
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                });
            })
            .then(response => {
                if (response.ok) {
                        document.getElementById('ajaxloadingIndicator').style.display = 'none';

                    // Form submission succeeded, display success message
                    document.getElementById('sms_editForm_product_success_message').style.display = 'block';
                    document.getElementById('sms_add_editForm_product_error_message').style.display = 'none';

                    window.location.reload();
                } else {
                        document.getElementById('ajaxloadingIndicator').style.display = 'none';

                    // Form submission failed, display error message
                    document.getElementById('sms_add_editForm_product_error_message').style.display = 'block';
                    document.getElementById('sms_editForm_product_success_message').style.display = 'none';
                    document.getElementById("edit_regular_btn").disabled = false;

                }
            })
            .catch(error => {
                    document.getElementById('ajaxloadingIndicator').style.display = 'none';

                // Network error occurred, display error message
                document.getElementById('sms_add_editForm_product_error_message').style.display = 'block';
                console.error('Error submitting form data:', error);
            });
    }



    function sms_a_edit_product_variations_image() {
        var input = document.getElementById('sms_mu_Ip_two');
        var fileName = input.files[0].name;
        // Update input label or any other relevant element with the file name
        input.nextElementSibling.innerHTML = fileName;
    }

    function sms_a_edit_product_variations_images() {
        var input = document.getElementById('sms_mu_Ip_three');
        var fileNames = "";
        for (var i = 0; i < input.files.length; i++) {
            fileNames += input.files[i].name + "<br>";
        }
        // Update input label or any other relevant element with the file names
        input.nextElementSibling.innerHTML = fileNames;
    }
</script>
<!-- </body>
<script src="./dist/js/tabler.min.js?1684106062" defer></script>
<script src="./dist/js/demo.min.js?1684106062" defer></script>

</html> -->

<!--delete complete product  modal  -->
<div class="modal modal-blur fade" id="sms_edit_product_regular_w_delete_complete_modal" tabindex="-1" role="dialog"
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


<script>
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
                var selectElement = document.getElementById('edit_regular_category_in_popoupop');
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


                let multipleCancelButton = new Choices('#edit_regular_category_in_popoupop', {
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

    function deleteRegular(button) {

        // Find the nearest element with id 'product_id'
        const nearestProductIdElement = button.closest('.row').querySelector('#product_id');

            const productIdValue = nearestProductIdElement.value;
            console.log('Product ID:', productIdValue);
            

            document.getElementById('ajaxloadingIndicator').style.display = 'flex';
    document.body.style.overflow = "hidden";
    
        console.log("Deleting Product with ID: " + productIdValue);
        fetch("/product/" + productIdValue, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json"
            }
        })
            .then(response => {
                if (response.ok) {
                    show_sms_delete_Notification("Product deleted successfully");
                    window.location.reload(); // Reload the page after successful deletion
                } else {
                    show_sms_delete_Notification("Failed to delete Product", true);
                }
            })
            .catch(error => {
                show_sms_delete_Notification("Error occurred: " + error, true);
            });
    }


    // Function to open the modal
    function openDeleteModal(modalId) {
        // Select the modal using the provided ID
        var modal = document.getElementById(modalId);
        console.log(modalId);
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
            // console.log("Modal closed")
            modal.style.display = 'none';
            modal.classList.remove('show');
            modal.setAttribute('aria-modal', 'false');
            modal.setAttribute('aria-hidden', 'true');
        }
    }
</script>