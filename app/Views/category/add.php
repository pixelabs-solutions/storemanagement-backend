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

    .sms_a_add_new_category {
        position: relative;
        /* display: inline-block; */
    }

    .sms_a_add_new_category input[type="file"] {
        position: absolute;
        left: -9999px;

    }

    .sms_a_add_new_category label {
        /* display: inline-block; */
        padding: 17px 16px;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        background-color: #EAEAEA !important;
        text-align: center;
        ;
    }

    .sms_a_add_new_category label i {
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
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">The name of the
                                    category</label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold" id="example-text-input"
                                    style="background-color: #EAEAEA" placeholder="key chain">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-select fs-3 fw-bold" class="form-label fw-bold">Parent category
                                </label>
                                <div
                                    style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                                    <div class="col-md-12 rounded-4 bg-transparent h-100 ">
                                        <select id="choices-multiple-remove-button" multiple
                                            style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
                                            <option value="NOSQL">Ctg</option>
                                            <option value="NodeJS">demo</option>
                                        </select>
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
                            </div>
                        </div>
                        <!-- Adding terms to the feature -->
                        <div class="rounded-4">
                            <div class="col-12 col-md-12 p-0 " id="sms_a_dynamic-input-container">
                                <div class=" rounded">
                                    <h3 class="card-title text-black fs-4 fw-bold">
                                        Uploading a picture </h3>
                                </div>
                                <div class="p-2">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">
                                            <div class="sms_a_add_new_category">
                                                <input type="file" id="sms_a_add_categorys_image" accept="image/*"
                                                    onchange="sms_a_add_new_categorys()">
                                                <label for="sms_a_add_categorys_image">
                                                    <i class="bi bi-image text-black"></i><svg
                                                            width="20" height="20" viewBox="0 0 32 26" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.88889 0.555542C6.92778 0.555542 5.33333 2.14999 5.33333 4.1111V16.5555C5.33333 18.5167 6.92778 20.1111 8.88889 20.1111H28.4444C30.4056 20.1111 32 18.5167 32 16.5555V4.1111C32 2.14999 30.4056 0.555542 28.4444 0.555542H8.88889ZM22 6.48332L27.3333 14.4833C27.6056 14.8944 27.6333 15.4167 27.4 15.85C27.1667 16.2833 26.7167 16.5555 26.2222 16.5555H18.2222H15.5556H11.1111C10.6 16.5555 10.1333 16.2611 9.91111 15.8C9.68889 15.3389 9.75 14.7889 10.0722 14.3889L13.6278 9.94443C13.8833 9.62776 14.2611 9.44443 14.6667 9.44443C15.0722 9.44443 15.4556 9.62776 15.7056 9.94443L16.6667 11.1444L19.7778 6.47776C20.0278 6.1111 20.4444 5.88888 20.8889 5.88888C21.3333 5.88888 21.75 6.1111 22 6.48332ZM10.6667 5.88888C10.6667 5.41738 10.854 4.96519 11.1874 4.6318C11.5208 4.2984 11.9729 4.1111 12.4444 4.1111C12.9159 4.1111 13.3681 4.2984 13.7015 4.6318C14.0349 4.96519 14.2222 5.41738 14.2222 5.88888C14.2222 6.36037 14.0349 6.81256 13.7015 7.14595C13.3681 7.47935 12.9159 7.66665 12.4444 7.66665C11.9729 7.66665 11.5208 7.47935 11.1874 7.14595C10.854 6.81256 10.6667 6.36037 10.6667 5.88888ZM2.66667 5.44443C2.66667 4.70554 2.07222 4.1111 1.33333 4.1111C0.594444 4.1111 0 4.70554 0 5.44443V17.8889C0 22.0611 3.38333 25.4444 7.55556 25.4444H25.3333C26.0722 25.4444 26.6667 24.85 26.6667 24.1111C26.6667 23.3722 26.0722 22.7778 25.3333 22.7778H7.55556C4.85556 22.7778 2.66667 20.5889 2.66667 17.8889V5.44443Z"
                                                                fill="black" />
                                                        </svg>
                                                    Selecting an image
                                                </label>
                                            </div>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <!-- To update the term click here+ -->
                            <!-- To add another term click here + -->
                            <div class="text-center mt-2 p-2  ">
                                <button type="submit" class="btn btn-primary col-12 col-md-12 rounded-4 py-3">To add the
                                    category click here +</button>
                            </div>

                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- input javascript code  -->
<script>
   function sms_a_add_new_categorys() {
        var input = document.getElementById('sms_a_add_categorys_image');
        console.log(input.files); // Check if files are being captured
        if (input.files.length > 0) {
            var fileName = input.files[0].name;
            console.log(fileName); // Check the file name
            // Update input label or any other relevant element with the file name
            input.nextElementSibling.innerHTML = fileName;
        }
    }
</script>
<!-- </body>
<script src="./dist/js/tabler.min.js?1684106062" defer></script>
<script src="./dist/js/demo.min.js?1684106062" defer></script>

</html> -->