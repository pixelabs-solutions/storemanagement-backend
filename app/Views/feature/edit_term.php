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
        padding: 12px 16px;
        border: 1px solid #ced4da;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        background-color: #EAEAEA;
        text-align: center;
    }

    .sms_a_custom_file_input label i {
        margin-right: 5px;
    }

    .abc .for_eng {
        display: block;
    }

    .abc .for_heb {
        display: none;
    }

    .rtl .for_eng {
        display: none;
    }

    .rtl .for_heb {
        display: block;
    }
</style>
<!-- </head>

        <body> -->

<div class="container-xl">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <div class="">

                <!-- form start -->
                <form action="" method="post" class="card-body">
                    <!-- header -->
                    <div class="row gx-3">
                        <div class="col-md-6 mb-3">
                            <label for="example-text-input fs-2 fw-bold" class="form-label for_eng fw-bold">Name of the
                                Variation</label>
                            <label for="example-text-input fs-2 fw-bold" class="form-label for_heb fw-bold">שם
                                הווריאציה</label>
                            <input type="text" class="form-control rounded-3 p-3" id="e_name_term"
                                style="background-color: #EAEAEA" placeholder="Name Of Variation">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="example-select fs-3 fw-bold" class="form-label for_eng fw-bold">Associated
                                feature
                            </label>
                            <label for="example-select fs-3 fw-bold" class="form-label for_heb fw-bold">תכונה
                                קשורה</label>
                            <select class="form-select rounded-3 p-3" id="sms_mu_select_name_term"
                                style="background-color: #EAEAEA">
                                <?php foreach ($attributes as $attribute) { ?>
                                    <option id="<?php echo $attribute['id']; ?>"><?php echo $attribute['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!-- Adding terms to the feature -->
                    <!-- <div class="rounded-4">
                                    <div class="col-12 col-md-12" id="sms_a_edit_term_dynamic-input-container">
                                        <div class=" rounded">
                                            <h3 class="card-title text-black fs-4 fw-bold">Color change </h3>
                                        </div>
                                        <div class="p-2">
                                            <div class="col-md-12 mb-3">
                                                <label for="example-text-input" class="form-label">The name of the
                                                    term</label>
                                                <input type="color" class="form-control text-dark w-50 " id="-text-input" placeholder="Pink">

                                            </div> -->
                    <!-- <div class="col-md-12 mb-3">
                                                    <label class="form-label">
                                                        <label class="form-label">Selecting an image to display the term</label>
                                                        <div class="sms_a_custom_file_input">
                                                            <input type="file" id="image-input" accept="image/*"
                                                                style="background-color:#FFFFFF;" onchange="showFileName()">
                                                            <label for="image-input"><i class="bi bi-image text-black"></i> <svg
                                                                    width="20" height="20" viewBox="0 0 32 26" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z"
                                                                        fill="black" />
                                                                </svg>
                                                                Selecting an image </label>
                                                        </div>
                                                    </label>
                                                </div> -->

                    <!-- </div> -->
                    <!-- <div class='gx-3'>
                                                <div class="">
                                                    <div class="mb-3 p-2 col-12 rounded-3 d-flex align-items-center justify-content-between "
                                                        style="background-color: #EAEAEA">
                                                        <label class="form-label"></label>
                                                        <label class="form-label">Color change</label>
                                                        <input type="color" class="form-control p-0 form-control-color"
                                                        id="sms_mu_color_name_term"value="#206bc4"
                                                            title="Choose your color">
                                                    </div>
                                                </div>
                                            </div> -->

                    <!-- </div> -->
                    <!-- To update the term click here+ -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <div class='gx-3' id="colorPickerDiv__edit">
                        <div class="">
                            <div class="mb-3 p-2 col-12 rounded-3 d-flex align-items-center justify-content-between "
                                style="background-color: #EAEAEA">
                                <label class="form-label"></label>
                                <label class="form-label for_eng fw-bold">Color change</label>
                                <label class="form-label for_heb fw-bold">שינוי צבע</label>
                                <input type="color" class="form-control p-0 form-control-color"
                                    id="sms_mu_color_name_term__edit" value="#206bc4" title="Choose your color">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-body text-center py-4 sms_a_add_category_pop"
                    id="sms_addForm_category_success_message" style="display: none;">
                    <!-- Close icon -->

                    <!-- <button type="button" class="btn-close" aria-label="Close" onclick="sms_term_success_message()"></button> -->
                    <!-- SVG icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg>
                    <h3>Success</h3>
                    <div class="text-muted">Your add Category data has been submitted successfully.</div>
                </div>
                <div class="modal-body text-center py-4 sms_a_add_category_pop" id="Sms_mu_close_add_term_errors"
                    style="display: none;">
                    <!-- Close icon -->
                    <button type="button" class="btn-close" aria-label="Close"
                        onclick="Sms_mu_close_add_term_error()"></button>
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
                <div class="text-center mt-2 p-2  ">
                    <button type="submit" id="edit_term" class="btn btn-primary col-12 col-md-12 rounded-4 py-3 for_eng"
                        onclick="fun_etid_term()">To update
                        the term click here
                        +</button>
                    <button type="submit" id="edit_term" class="btn btn-primary col-12 col-md-12 rounded-4 py-3 for_heb"
                        onclick="fun_etid_term()">לעדכון המונח לחץ כאן
                        +</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the color input element
        var colorInput = document.getElementById("sms_mu_color_name_term__edit");
        // Get the div to trigger color selection
        var colorPickerDiv = document.getElementById("colorPickerDiv__edit");

        // Function to open color selection when the div is clicked
        colorPickerDiv.addEventListener("click", function () {
            colorInput.click();
        });
    });

    function fun_etid_term() {

                   // Show the loading indicator
    document.getElementById('ajaxloadingIndicator').style.display = 'flex';
    document.body.style.overflow = "hidden";
    document.getElementById('modal-large').style.overflow = 'hidden';


        let data_form_exsist = {
            'nameOfTerm': document.getElementById('e_name_term').value,
            'select_value': document.getElementById('sms_mu_select_name_term').value,
            'Color_value': document.getElementById('sms_mu_color_name_term__edit').value,
        }
        console.log(data_form_exsist)
        fetch(`/categories/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(form_data)
        })
            .then(response => {
                if (response.status === 200) {
                    document.getElementById('ajaxloadingIndicator').style.display = 'none';

                    // Form submission succeeded, display success message
                    document.getElementById('sms_editForm_success_message').style.display = 'block';
                    document.getElementById('sms_add_editForm_error_message').style.display = 'none';
                    document.getElementById("edit_term").disabled = true;

                    window.location.reload();
                } else {

                    document.getElementById('ajaxloadingIndicator').style.display = 'none';


                    // Form submission failed, display error message
                    document.getElementById('sms_add_editForm_error_message').style.display = 'block';
                    document.getElementById('sms_editForm_success_message').style.display = 'none';
                    document.getElementById("edit_term").disabled = false;

                }
            })
            .catch(error => {
                document.getElementById('ajaxloadingIndicator').style.display = 'none';

                document.getElementById('sms_add_editForm_error_message').style.display = 'block';
                console.error('Error submitting form data:', error);
            });
    }
    function sms_term_success_message() {
        document.getElementById('sms_addForm_category_success_message').style.display = 'none';
    }

    function Sms_mu_close_add_term_error() {
        document.getElementById('Sms_mu_close_add_term_errors').style.display = 'none';
    }
</script>