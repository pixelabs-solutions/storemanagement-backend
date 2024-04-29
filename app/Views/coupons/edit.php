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
    <link href="./dist/css/demo.min.css?1684106062" rel="stylesheet" />
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
    </style>
</head>

<body> -->
<div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="">
                      
                        <form action="" method="post" class="card-body">
                            <!-- header -->
                            <div class="row gx-3 ">
                                <div class="col-md-4 mb-3">
                                    <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">The coupon code</label>
                                    <input type="text" class="form-control rounded-3 p-3 fw-bold"
                                        id="example-text-input" style="background-color: #EAEAEA"
                                        placeholder="">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="example-select fs-3 fw-bold" class="form-label fw-bold">Discount type
                                        (amount/percentage)
                                    </label>
                                    <div class="h-70" style="background-color:#EAEAEA">
                              <select data-placeholder="Begin typing a name to filter..." multiple
                                    class="chosen-select col-12 w-100 py-5 bg-white" id="sms_mu_input_bg_select"
                                    name="test">
                                    <option>Image</option>
                                    <option>Color</option>
                                </select>
                              </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">The amount
                                        of the discount </label>
                                    <input type="text" class="form-control rounded-3 p-3 fw-bold"
                                        id="example-text-input" style="background-color: #EAEAEA"
                                        placeholder="">
                                </div>
                            </div>
                            <!-- Adding terms to the feature -->
                            <div class="row gx-3 ">
                                <div class="col-md-6 mb-3">
                                    <label for="example-date-input" class="form-label fs-4 fw-bold">Coupon expiration
                                        date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control rounded-3 p-3 fw-bold"
                                            id="example-date-input" style="background-color: #EAEAEA">
                                    </div>
                                </div>



                                <div class="col-md-6 mb-3">
                                    <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">Usage limit
                                        (leave blank without limit) </label>
                                    <input type="text" class="form-control rounded-3 p-3 fw-bold"
                                        id="example-text-input" style="background-color: #EAEAEA"
                                        placeholder="key chain">
                                </div>

                            </div>
                            <div class="text-center mt-5  ">
                                <button type="submit" 
                                    class="btn btn-primary col-12 col-md-12 rounded-4 py-3">To update the coupon click here ←</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- </body>
// <script src="./dist/js/tabler.min.js?1684106062" defer>
 // <script src="./dist/js/demo.min.js?1684106062" defer></script>

// </html> -->