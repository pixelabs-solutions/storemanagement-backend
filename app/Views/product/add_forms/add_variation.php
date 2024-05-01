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

    .sms_a_add_product_variations {
        position: relative;
        /* display: inline-block; */
    }

    .sms_a_add_product_variations input[type="file"] {
        position: absolute;
        left: -9999px;
    }

    .sms_a_add_product_variations label  {
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

                    <form action="" method="post" class="card-body">
                        <!-- header -->
                        <div class="row gx-3">
                            <div class="col-md-6 mb-3">
                                <label for="example-text-input fs-3 fw-bold" class="form-label fw-bold">Product Name</label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold" id="example-text-input"
                                    style="background-color: #EAEAEA" placeholder="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-select fs-3 fw-bold" class="form-label fw-bold">Category
                                </label>
                                <div class="h-70 rounded-3 border-0" style="background-color:#EAEAEA">
                              <select data-placeholder=" " multiple
                                    class="chosen-select rounded-5 col-12 w-100 py-5 bg-white" id="sms_mu_input_bg_select"
                                    name="test">
                                    <option>Image</option>
                                    <option>Color</option>
                                </select>
                              </div>
                            </div>
                        </div>
                        <!-- Upload a product image  -->

                        <div class="row gx-3">
                            <div class="col-md-6 mb-4">
                                <label class="form-label  fw-bold">Upload a product image </label>
                                <div class="sms_a_add_product_variations">
                                    <input type="file" id="single-image-input" accept="image/*"
                                         onchange="sms_a_add_product_variations()">
                                    <label for="single-image-input"><i class="bi bi-image text-black"></i>
                                        <svg width="20" height="20" viewBox="0 0 32 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z"
                                                fill="black" />
                                        </svg>
                                        Choose a picture</label>
                                </div>
                            </div>
                            <!-- Upload a photo gallery -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Upload a photo gallery</label>
                                <div class="sms_a_add_product_variations">
                                    <input type="file" id="multiple-images-input" accept="image/*"
                                        onchange="sms_a_add_product_variation()"
                                        multiple>
                                    <label for="multiple-images-input"><i class="bi bi-image text-black fw-bold"></i>
                                        <svg width="20" height="20" viewBox="0 0 32 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z"
                                                fill="black" />
                                        </svg>
                                        Select images</label>
                                </div>
                            </div>

                        </div>
                        <!-- description -->
                        <div>
                            <label for="example-text-input fs-3  fw-bold" class="form-label fw-bold">A brief
                                description of the product</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px; background-color: #EAEAEA"></textarea>

                            </div>
                        </div>

                        <div class="col-md-12 mt-4 ">
                            <label for="example-select  fw-bold" class="form-label fw-bold">Select an attribute
                                for product variations</label>
                                <div class="h-70 col-12" style="background-color:#EAEAEA">
                              <select data-placeholder="Begin typing a name to filter..." multiple
                                    class="chosen-select col-12 w-100 py-5 bg-white" id="sms_mu_input_bg_select"
                                    name="test">
                                    <option>Image</option>
                                    <option>Color</option>
                                </select>
                              </div>
                        </div>


                        <!-- Added terms for variations -->
                        <div class="rounded-4">
                            <div class="col-12 col-md-12 rounded-2" id="sms_a_add_product_variation">
                                <!-- add some filed to javascit this is important -->

                            </div>
                            <!-- To add another term click here + -->
                            <div class="text-center mt-4  ">
                                <button type="button" onclick="sms_a_add_product_variation_inputs()"
                                    class=" col-12 col-md-12 fs-3 rounded-3 py-3 border-0 fw-bold"
                                    style="background: rgba(73, 135, 216, 0.44);">Adding an additional term to +
                                    variations </button>
                            </div>

                        </div>
                        <!-- submit button -->
                        <div class="text-center mt-4 ">
                            <button type="submit"
                                class=" btn btn-primary col-12 col-md-12 fs-3 rounded-3 py-3 border-0 fw-bold">To
                                add the product click here +</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- input javascript code  -->
<script>
    var inputCount = 0;

    // Function to add input fields
    function sms_a_add_product_variation_inputs() {
        inputCount += 0;
        var container = document.getElementById('sms_a_add_product_variation');
        var newInput = document.createElement('div');
        newInput.classList.add('col-md-12', 'mb-0', 'p-0');
        newInput.innerHTML = `
            <div class="row gx-3">
            <div class="col-md-12 mt-4 py-3">
                                <label for="example-select fs-2 fw-bold" class="form-label fw-bold py-3 px-3 rounded-3"
                                    style="background: rgba(73, 135, 216, 0.44);" onclick="openModal('sms_add_variation_modal_in_add_product')" >Added terms for variations</label>
                            </div>
        <div class="col-md-6 mb-3">
            <label for="example-select" class="form-label fs-3 fw-bold">The name of the term</label>
            <select class="form-select rounded-3 p-3" id="example-select" style="background-color: #EAEAEA">
                <option value="1">Pink</option>
                <option value="2">Color</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="example-text-input" class="form-label fs-3 fw-bold">Term price</label>
            <input type="text" class="form-control rounded-3 p-3 fw-bold" id="example-text-input"
                style="background-color: #EAEAEA" placeholder="250">
        </div>

        <div class="col-md-12 mt-3 ">
            <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">Term inventory</label>
            <input type="text" class="form-control rounded-3 p-3 fw-bold" id="example-text-input"
                style="background-color: #EAEAEA" placeholder="4">
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
    document.addEventListener("DOMContentLoaded", function (event) {
        sms_a_add_product_variation_inputs();
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
  modal.addEventListener('click', function (e) {
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