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

    .sms_a_add_term_input {
        position: relative;
        /* display: inline-block; */
    }

    .sms_a_add_term_input input[type="file"] {
        position: absolute;
        left: -9999px;
    }

    .sms_a_add_term_input label {
        /* display: inline-block; */
        padding: 17px 16px;
        border: 1px solid #ced4da;
        border-radius: 8px;
        cursor: pointer;
        background-color: #EAEAEA;
        width: 100%;
        text-align: center;
    }

    .sms_a_add_term_input label i {
        margin-right: 5px;
    }

    .chosen-container-multi {
        width: 100% !important;
        /* padding: 3%; */
        height: 100% !important;
        /* background-color: #fff; */
    }

    .chosen-choices {
        /* border: none !important; */
        /* background-color: none !important; */
        background-image: none !important;
        background-image: none !important;
        padding: 14px 15px !important;
    }

    .chosen-container.chosen-with-drop .chosen-drop {
        margin-top: 10px !important;
        border: none !important;
    }

    .chosen-container.chosen-with-drop .chosen-drop ul li {
        padding: 10px !important;
    }

    .chosen-container-multi ul {
        height: 100% !important;
        border-radius: 5px;
    }

    .sms_mu_bg_div {
        background-color: #EAEAEA !important;
        height: 65%;
    }

    .chosen-container-multi .chosen-choices {
        background-color: none !important;
    }

    .sms_term_pop {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        z-index: 9999;
        text-align: center;
        box-shadow: 100vh 100vh 100vh 300vh #00000059;
    }

    .sms_term_pop svg {
        fill: green;
        width: 64px;
        height: 64px;
        margin-bottom: 20px;
    }

    .sms_term_pop h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .sms_term_pop .text-muted {
        color: #6c757d;
        font-size: 1rem;
    }
</style>
<!-- </head>

<body> -->

<div class="container-xl">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12">
            <div class="card">

                <form class="card-body" id="term_form_data">

                    <!-- header -->
                    <?php //var_dump( $attributes) ?>
                    <div class="row gx-3">
                        <div class="col-md-6 mb-3">
                            <label for="example-text-input" class="form-label fw-bold"
                                data-i18n="popoups.future_managment.add_new_term.name_of_term">The name of the
                                term</label>
                            <input type="text" class="form-control rounded-3 p-3" id="sms_term_name"
                                style="background-color: #EAEAEA" placeholder="Name Of Term" name="name[]">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="example-select" class="form-label fw-bold"
                                data-i18n="popoups.future_managment.add_new_term.feature">Associated feature</label>
                            <div class="sms_mu_bg_div rounded-2">
                                <select class="form-select form-select-md h-100 bg-transparent" name="attribute_id"
                                    id="sms_feature_select">
                                    <option value="">Select</option>
                                    <?php foreach ($attributes as $attribute) { ?>
                                        <option id="<?php echo $attribute['id']; ?>" value="<?php echo $attribute['id']; ?>"
                                            data-content="<?php echo $attribute['type']; ?>">
                                            <?php echo $attribute['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- Adding terms to the feature -->
                        <div class="rounded-4">
                            <div class="col-12 col-md-12 rounded-2" id="sms_a_add_new_term">
                                <div class="rounded">
                                    <label class="card-title text-black my-0 fw-bold"
                                        data-i18n="popoups.future_managment.add_new_term.error_alert">Choosing a color
                                        for the display of the term</label>
                                </div>
                                <div class="p-2" id="dynamic_input_container">
                                    <!-- Dynamic input fields will be added here -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center flex-column flex-sm-row gap-3 p-2">
                        <div class="text-center mt-2 col-sm-6 col-md-6">
                            <button type="button" onclick="sms_a_add_new_term_input()"
                                class="btn btn-primary col-12 col-md-12 rounded-2 py-3"
                                data-i18n="popoups.future_managment.add_new_term.term_end_btn">To add another term click
                                here +</button>
                        </div>
                        <div class="text-center mt-2 col-sm-6 col-md-6">
                            <button type="button" onclick="submit_add_term()" id="term_disable"
                                class="btn btn-info col-12 col-md-12 rounded-2 py-3"
                                data-i18n="popoups.future_managment.add_new_term.term_end_submit_btn">This is submit
                                button</button>
                        </div>
                    </div>
                </form>



                <div class="modal-body text-center py-4 sms_term_pop" id="sms_term_success-message"
                    style="display: none;">
                    <!-- Close icon -->

                    <!-- <button type="button" class="btn-close" aria-label="Close"
                            onclick="sms_term_close_success_message()"></button> -->

                    <!-- SVG icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg>
                    <h3>Success</h3>
                    <div class="text-muted">Your Term data has been submitted successfully.</div>
                </div>
                <div class="modal-body text-center py-4 sms_term_pop" id="sms_term_error-message"
                    style="display: none;">
                    <!-- Close icon -->
                    <button type="button" class="btn-close" aria-label="Close"
                        onclick="sms_term_close_error_message()"></button>
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
            </div>
        </div>
    </div>
</div>


<!-- input javascript code  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script> -->
<script>
    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
</script>
<script>
    var inputCount = 0;

    document.getElementById('sms_feature_select').addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];
        var dataContent = selectedOption.getAttribute('data-content');
        updateDynamicInputContainer(dataContent);
    });

    function updateDynamicInputContainer(contentType) {
        var container = document.getElementById('sms_a_add_new_term');
        container.innerHTML = ''; // Clear the container first

        // Create a base input structure
        var baseInput = document.createElement('div');
        baseInput.classList.add('col-md-12', 'mb-3', 'p-0');

        if (contentType === 'select') {
            baseInput.innerHTML = `
        <div class="gx-3">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">The name of the term</label>
                <input type="text" class="form-control rounded-3 p-3" name="name" style="background-color: #EAEAEA" placeholder="Name Of Term">
            </div>
        </div>
    `;
        }


        // Add specific content based on contentType
        else if (contentType === 'color') {
            baseInput.innerHTML += `
            <div class="rounded">
                <h3 class="card-title text-black fs-4 fw-bold" style="font-size: 35px;">Choosing a color for the display of the term</h3>
            </div>
            <div class="mb-3 p-2 col-12 rounded-3 d-flex align-items-center justify-content-between" style="background-color: #EAEAEA">
                <label class="form-label">Color change</label>
                <input type="color" name="data" class="form-control p-0 form-control-color" value="#206bc4" title="Choose your color">
            </div>
        `;
        } else if (contentType === 'image') {
            var uniqueId = 'sms_term_image' + (document.querySelectorAll('[id^="sms_term_image"]').length + 1);
            baseInput.innerHTML += `
            <div class="rounded">
                <label class="form-label mt-4 fs-3 p-0 fw-bold">Selecting an image to display the term</label>
                <div class="sms_a_add_term_input">
                    <input type="file" id="${uniqueId}" name="data" accept="image/*" style="background-color: #EAEAEA" onchange="sms_a_add_term_showFileName(this)">
                    <label for="${uniqueId}" class="fw-bold">
                        <i class="bi bi-image text-black"></i>
                        <svg width="20" height="20" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.9444 9.54443 14.5222 9.41666 15.0167 9.62221C15.5111 9.82777 15.7778 10.3278 15.7222 10.8611L15.4444 13.5555H19.6667C20.1778 13.5555 20.6444 13.8611 20.8667 14.3222C21.0889 14.7833 21.0278 15.3333 20.7056 15.7333L19.1056 17.8278H25.1056L22 6.48332Z" fill="black"/>
                        </svg>
                    </label>
                </div>
            </div>
        `;
        }

        container.appendChild(baseInput);
    }

    function sms_a_add_new_term_input() {
        var selectedOption = document.getElementById('sms_feature_select').options[document.getElementById('sms_feature_select').selectedIndex];
        var dataContent = selectedOption.getAttribute('data-content');
        inputCount += 1;
        var container = document.getElementById('sms_a_add_new_term');
        var newInput = document.createElement('div');
        var uniqueId = 'sms_term_image' + inputCount; // Generate unique ID
        newInput.classList.add('col-md-12', 'mb-3', 'p-0');

        if (dataContent === 'color') {
            newInput.innerHTML = `
            <div class="gx-3">
                <div class="col-md-6 mb-3">
                    <label for="${inputCount}" class="form-label fw-bold">The name of the term</label>
                    <input type="text" name="name" class="form-control rounded-3 p-3" id="sms_term_names${inputCount}" style="background-color: #EAEAEA" placeholder="Name Of Term">
                </div>
                <div class="rounded">
                    <h3 class="card-title text-black fs-4 fw-bold" style="font-size: 35px;">Choosing a color for the display of the term</h3>
                </div>
                <div class="mb-3 p-2 col-12 rounded-3 d-flex align-items-center justify-content-between" style="background-color: #EAEAEA">
                    <label class="form-label">Color change</label>
                    <input type="color" name='data' class="form-control p-0 form-control-color" id="sms_term_colors${inputCount}" value="#206bc4" title="Choose your color">
                </div>
            </div>
        `;
        } else if (dataContent === 'image') {
            newInput.innerHTML = `
            <div class="gx-3">
                <div class="col-md-6 mb-3">
                    <label for="${inputCount}" class="form-label fw-bold">The name of the term</label>
                    <input type="text" class="form-control rounded-3 p-3" id="sms_term_names${inputCount}" name="name" style="background-color: #EAEAEA" placeholder="Name Of Term">
                </div>
                <label class="form-label mt-4 fs-3 p-0 fw-bold">Selecting an image to display the term</label>
                <div class="sms_a_add_term_input">
                    <input type="file" id="${uniqueId}" accept="image/*" style="background-color: #EAEAEA" name="data" onchange="sms_a_add_term_showFileName(this)">
                    <label for="${uniqueId}" class="fw-bold">
                        <i class="bi bi-image text-black"></i>
                        <svg width="20" height="20" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.9444 9.54443 14.5222 9.41666 15.0167 9.62221C15.5111 9.82777 15.7778 10.3278 15.7222 10.8611L15.4444 13.5555H19.6667C20.1778 13.5555 20.6444 13.8611 20.8667 14.3222C21.0889 14.7833 21.0278 15.3333 20.7056 15.7333L19.1056 17.8278H25.1056L22 6.48332Z" fill="black"/>
                        </svg>
                    </label>
                </div>
            </div>
        `;
        } else if (dataContent === 'select') {
            newInput.innerHTML = `
            <div class="gx-3">
                <div class="col-md-6 mb-3">
                    <label for="${inputCount}" class="form-label fw-bold">The name of the term</label>
                    <input type="text" name="data" class="form-control rounded-3 p-3" id="sms_term_names${inputCount}" style="background-color: #EAEAEA" placeholder="Name Of Term">
                </div>
            </div>
        `;
        }

        container.appendChild(newInput);
    }


    function submit_add_term() {
        // Get the form element
        let form = document.getElementById('term_form_data');
        // Create FormData object from the form
        let formData = new FormData(form);
        console.log('form data ', formData)

        const submitButton = document.getElementById("term_disable");
        submitButton.disabled = true;
        // Send form data with fetch API
        fetch(`/attributes/${formData.get('sms_feature_select')}/terms/add`, {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    // Form submission succeeded, display success message
                    document.getElementById('sms_term_success-message').style.display = 'block';
                    document.getElementById('sms_term_error-message').style.display = 'none';
                    window.location.reload();
                } else {
                    // Form submission failed, display error message
                    document.getElementById('sms_term_error-message').style.display = 'block';
                    document.getElementById('sms_term_success-message').style.display = 'none'; // Hide success message if it was displayed before
                }
            })
            .catch(error => {
                // Network error occurred, display error message
                document.getElementById('sms_term_error-message').style.display = 'block';
                console.error('Error submitting form data:', error);
            });
    }




    function sms_term_close_success_message() {
        document.getElementById('sms_term_success-message').style.display = 'none';
    }

    // Function to display file name
    function sms_a_add_term_showFileName(input) {
        var label = input.nextElementSibling;
        var fileName = input.files[0].name;
        label.innerHTML = '<i class="bi bi-image text-black"></i> ' + fileName;
    }

    // // Add one input field when the page loads
    // document.addEventListener("DOMContentLoaded", function (event) {
    //     sms_a_add_new_term_input();
    // });

    // function submit_add_term() {
    //     // Get the values of the existing inputs
    //     let name = document.getElementById('sms_term_name').value.trim();
    //     let type = document.getElementById('sms_feature_select').value.trim();
    //     let colorInput = document.getElementById('sms_term_color').value.trim();

    //     // Create JSON object to store form data
    //     let jsonData = {
    //         data: name,
    //         content: colorInput,
    //         // colorInput: ,
    //         // dynamicTerms: []  // Prepare an array to store dynamic term data
    //     };

    //     // Get the values of dynamically added inputs
    //     let dynamicnames = document.querySelectorAll('[id^="sms_term_names"]');
    //     let dynamicTermColors = document.querySelectorAll('[id^="sms_term_colors"]');
    //     let dynamicTermImages = document.querySelectorAll('[id^="sms_term_image"]');

    //     // Loop through dynamic data and populate jsonData.dynamicTerms
    //     dynamicnames.forEach((input, index) => {
    //         let name = input.value.trim();
    //         if (name !== '') {
    //             let color = dynamicTermColors[index].value.trim(); // Assuming corresponding color exists
    //             let imageSrc = dynamicTermImages[index].getAttribute('src'); // Get the image source URL
    //             jsonData.dynamicTerms.push({ name: name, color: color, image: imageSrc });
    //         }
    //     });

    //     // Convert JSON data to string
    //     let jsonString = JSON.stringify(jsonData);

    //     // Send JSON data with fetch API
    //     fetch('/attributes/{id}/terms/add', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json'
    //         },
    //         body: jsonString
    //     })
    //         .then(response => {
    //             if (response.status === 201) {
    //                 // Form submission succeeded, display success message
    //                 document.getElementById('sms_term_success-message').style.display = 'block';
    //                 document.getElementById('sms_term_error-message').style.display = 'none';
    //                 window.location.reload();
    //             } else {
    //                 // Form submission failed, display error message
    //                 document.getElementById('sms_term_error-message').style.display = 'block';
    //                 document.getElementById('sms_term_success-message').style.display = 'none'; // Hide success message if it was displayed before
    //             }
    //         })
    //         .catch(error => {
    //             // Network error occurred, display error message
    //             document.getElementById('sms_term_error-message').style.display = 'block';
    //             console.error('Error submitting form data:', error);
    //         });
    // }
    function submit_add_term() {
        // Get the form element
        let form = document.getElementById('term_form_data');
        // Create FormData object from the form
        let formData = new FormData(form);
        console.log('form data ', formData)

        const submitButton = document.getElementById("term_disable");
        submitButton.disabled = true;
        // Send form data with fetch API
        fetch(`/attributes/${formData.get('sms_feature_select')}/terms/add`, {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    // Form submission succeeded, display success message
                    document.getElementById('sms_term_success-message').style.display = 'block';
                    document.getElementById('sms_term_error-message').style.display = 'none';
                    window.location.reload();
                } else {
                    // Form submission failed, display error message
                    document.getElementById('sms_term_error-message').style.display = 'block';
                    document.getElementById('sms_term_success-message').style.display = 'none'; // Hide success message if it was displayed before
                }
            })
            .catch(error => {
                // Network error occurred, display error message
                document.getElementById('sms_term_error-message').style.display = 'block';
                console.error('Error submitting form data:', error);
            });
    }
    function sms_term_close_success_message() {
        document.getElementById('sms_term_success-message').style.display = 'none';
    }

    function sms_term_close_error_message() {
        document.getElementById('sms_term_error-message').style.display = 'none';
    }
</script>