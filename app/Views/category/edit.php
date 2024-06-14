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

    .sms_a_edit_category {
        position: relative;
        /* display: inline-block; */
    }

    .sms_a_edit_category input[type="file"] {
        position: absolute;
        left: -9999px;
    }

    .sms_a_edit_category label {
        /* display: inline-block; */
        padding: 12px 16px;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        background-color: #EAEAEA !important;
        text-align: center;
        ;
    }

    .sms_a_edit_category label i {
        margin-right: 5px;
    }

    .abc .sms_mu_ctg_eng {
        display: block;
    }

    .abc .sms_mu_ctg_heb {
        display: none;
    }

    .rtl .sms_mu_ctg_eng {
        display: none;
    }

    .rtl .sms_mu_ctg_heb {
        display: block;
    }
</style>
<!-- </head>

<body> -->

<div class="container-xl">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <div class="">

                <form action="" method="post" class="card-body">
                    <!-- header -->
                    <div class="row gx-3">
                        <div class="col-md-6 mb-3">
                            <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold" data-i18n="popoups.add_new_catageory.popoup_in_catagory.heading">The name of
                                the
                                category</label>
                            <input type="text" class="form-control rounded-3 p-3 fw-bold" id="sms_mu_key_category" style="background-color: #EAEAEA" placeholder="Name Of Category">

                            <input type="hidden" id="sms_mu_id_category">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="example-select fs-3 fw-bold" class="form-label fw-bold" data-i18n="popoups.add_new_catageory.popoup_in_catagory.label_parent_ct">Parent category
                            </label>
                            <div style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                                <div class="col-md-12 rounded-4 bg-transparent h-100 ">
                                    <select id="sms_mu_select_category_pop" class="form-select" style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
                                        <option value="">Select</option>

                                        <?php

                                        foreach ($categories as $category) {
                                            // Access the "name" property of each category object
                                        ?>
                                            <option value="<?php echo $category['id'] ?>"><?php echo $category['name']; ?></option>
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
                        <!-- Adding terms to the feature -->
                        <div class="rounded-4">
                            <div class="col-12 col-md-12" id="dynamic-input-container">
                                <div class=" rounded">
                                    <h3 class="card-title text-black fs-4 fw-bold sms_mu_ctg_eng">
                                        Image Name </h3>
                                    <h3 class="card-title text-black fs-4 fw-bold sms_mu_ctg_heb">
                                        שם תמונה</h3>
                                </div>

                                <div class='gx-3'>
                                    <div class="mb-3 p-2 col-12 rounded-3 d-flex align-items-center justify-content-between " style="background-color: #EAEAEA">
                                        <label class="form-label"></label>
                                        <div class="sms_a_edit_category">
                                            <input type="file" id="sms_img_ctg" accept="image/*" onchange="showFileName(this)">
                                            <label for="sms_img_ctg">
                                                <i class="bi bi-image text-black"></i>
                                                <svg width="20" height="20" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z" fill="black" />
                                                </svg>
                                                <span class="fs-4 text-dark fw-bold sms_mu_ctg_eng"> Change image</span>
                                                <span class="fs-4 text-dark fw-bold  sms_mu_ctg_heb">שנה שם</span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <span class="avatar avatar-md">
                                                <img src="https://via.placeholder.com/100" alt="Avatar Image" id="edit_category_image_placeholder">
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- To update the term click here+ -->
                        </div>
                    </div>
                    <div class="modal-body text-center py-4 sms_a_add_regular_pop" id="sms_editForm_success_message" style="display: none;">
                        <!-- Close icon -->

                        <!-- <button type="button" class="btn-close" aria-label="Close" onclick="Sms_mu_close_scucess()"></button> -->
                        <!-- SVG icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M9 12l2 2l4 -4"></path>
                        </svg>
                        <h3>Success</h3>
                        <div class="text-muted">Your Category data has been Updated successfully.</div>
                    </div>
                    <div class="modal-body text-center py-4 sms_a_add_regular_pop" id="sms_add_editForm_error_message" style="display: none;">
                        <!-- Close icon -->
                        <button type="button" class="btn-close" aria-label="Close" onclick="Sms_mu_close_error()"></button>
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
                </form>
                <div class="text-center mt-2 p-2  ">
                    <button type="button" class="btn btn-primary col-12 col-md-12 rounded-4 py-3" id="submit_for_edit" data-i18n="popoups.add_new_catageory.popoup_in_catagory.catageory_btn2" onclick="submit_edit_ctg_form()">To Update the Category click here +</button>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
        $('.EditPopoup').click(function() {
            // Get the row
            var $row = $(this).closest('tr');

            // Get values from the row
            var id = $row.attr('id');
            console.log("gkg")
            console.log(id)
            var catID = id.replace(/\D/g, '');

            var imageSrc = $row.find('td.t_oravg_m img').attr('src');
            var categoryName = $row.find('td.category-name').text();
            var parentCategoryName = $row.find('td:nth-child(3)').text();
            var parentCategoryID = $row.find('td:nth-child(3)').attr('parent-id');
            var count = $row.find('td:nth-child(4)').text();

            // Now you can use these values as needed
            // console.log('ID:', id);
            // console.log('Image Source:', imageSrc);
            // console.log('Category Name:', categoryName);
            // console.log('Parent Category Name:', parentCategoryName);
            // console.log('Parent Category ID:', parentCategoryID);
            // console.log('Count:', count);


            // You can now use these values to populate your edit form or any other action

            document.getElementById("sms_mu_id_category").value = catID;
            document.getElementById("sms_mu_key_category").value = categoryName;
            document.getElementById("sms_img_ctg").src = imageSrc;
            document.getElementById("edit_category_image_placeholder").src = imageSrc;
            document.getElementById("sms_mu_select_category_pop").value = parentCategoryID;



        });
    });
</script>



<script>
function submit_edit_ctg_form() {
    // Get the select element and category ID
    let id = document.getElementById("sms_mu_id_category").value;

    // Get image input elements
    const imageInputs = document.querySelectorAll("#sms_img_ctg");

    // Check if any images are selected
    if (!imageInputs.length) {
        console.log("No images selected for update.");
        // Submit the form without image data (optional: display a message)
        // Show success message
        document.getElementById('sms_editForm_success_message').style.display = 'block';
        // Reload window after a delay
        setTimeout(function(){
            location.reload();
        }, 2000); // Reload after 2 seconds (adjust as needed)
        return;
    }

    // Function to convert image to base64 (remains the same)
    function readFileAsBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = function(event) {
                resolve(event.target.result);
            };
            reader.onerror = function(error) {
                reject(error);
            };
            reader.readAsDataURL(file);
        });
    }

    // Convert selected images to base64 asynchronously (Promise.all)
    Promise.all(
        Array.from(imageInputs).map(input => input.files[0] ? readFileAsBase64(input.files[0]) : Promise.resolve(null)) // Handle cases where no file is selected
    )
    .then(base64Strings => {
        // Filter out any null values (no image selected for an input)
        const filteredBase64Strings = base64Strings.filter(base64String => base64String !== null);

        const form_data = {
            "name": document.getElementById("sms_mu_key_category").value,
            "parent": document.getElementById("sms_mu_select_category_pop").value,
            "image": filteredBase64Strings, // Now containing an array of base64 strings
        };

       
        
        console.log("Form data:", form_data);
        const apiUrl = `/categories/${id}`;
        fetch(apiUrl, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(form_data)
        })
        .then(response => {
            if (response.ok) {
                    // Show success message
            document.getElementById('sms_editForm_success_message').style.display = 'block';
            

            // Reload window after a delay
            setTimeout(function(){
                location.reload();
            }, 2000); // Reload after 2 seconds (adjust as needed)
            // ... (rest of the code for handling response remains the same)
            }
            else{
                  // Show error message
            document.getElementById('sms_add_editForm_error_message').style.display = 'block';
            document.getElementById("submit_for_edit").disabled = false;
            }
        
        })
        .catch(error => {
          
            // Show error message
            document.getElementById('sms_add_editForm_error_message').style.display = 'block';
            document.getElementById("submit_for_edit").disabled = false;

            // Reload window after a delay
            setTimeout(function(){
                location.reload();
            }, 2000); // Reload after 2 seconds (adjust as needed)
            // ... (rest of the code for handling response remains the same)
        });
    })
    .catch(error => {
        console.error("Error converting image(s) to base64:", error);
        // Handle error converting image (optional: display error message)
    });
}

  
  
  
    //   function showFileName(input) {
    //       var label = input.nextElementSibling;
    //       var fileName = input.files[0].name;
    //       label.innerHTML = '<i class="bi bi-image text-black"></i> ' + fileName;
    //   }




    // function Sms_mu_close_scucess() {
    //     document.getElementById('sms_editForm_success_message').style.display = 'none';
    // }

    // function Sms_mu_close_error() {
    //     document.getElementById('sms_add_editForm_error_message').style.display = 'none';
    // }


    function showFileName(input) {
            var label = input.nextElementSibling;
            var file = input.files[0];
            
            if (file) {
                // Create a URL for the selected file and set it as the src of the image element
                var imgSrc = URL.createObjectURL(file);
                document.getElementById("edit_category_image_placeholder").src = imgSrc;

                // Set the label text to the file name
                var fileName = file.name;
                label.innerHTML = '<i class="bi bi-image text-black"></i> ' + fileName;
            }
        }
</script>