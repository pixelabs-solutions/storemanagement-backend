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
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
    <style>
        .chosen-container-multi {
        width: 100% !important;
        /* padding: 3%; */
        height: 20% !important;
        /* background-color: #fff; */
    }

    .chosen-choices {
        background-color: none !important;
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
    /* .chosen-container-multi .chosen-choices */
    .chosen-container-multi .chosen-choices{
        background-color: transparent !important;
    }
    </style>
<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <div class="">

                    <form action="" method="post" class="card-body">
                        <!-- header -->
                        <div class="row gx-3 ">
                            <div class="col-md-4 mb-3">
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">The coupon
                                    code</label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold"
                                    style="background-color: #EAEAEA" placeholder="" id='sms_The_coupon_code'>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="example-select fs-3 fw-bold" class="form-label fw-bold">Discount type
                                    (amount/percentage)
                                </label>
                                <div
                                    style="background-color: #eaeaea; position: relative; border-radius:12px; height:55px;">
                                    <div class="col-md-12 rounded-4 bg-transparent h-100 ">
                                        <select  id="sms_mu_parent_ctg"multiple
                                            style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
                                            <option value="NOSQL">Ctg</option>
                                            <option value="NodeJS">demo</option>
                                        </select>
                                        <span
                                        class="span_div">
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
                            <div class="col-md-4 mb-3">
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">The amount
                                    of the discount </label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold"
                                    style="background-color: #EAEAEA" placeholder="" id="sms_amount_of_the_discount">
                            </div>
                        </div>
                        <!-- Adding terms to the feature -->
                        <div class="row gx-3 ">
                            <div class="col-md-6 mb-3">
                                <label for="example-date-input" class="form-label fs-4 fw-bold">Coupon expiration
                                    date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control rounded-3 p-3 fw-bold"
                                         style="background-color: #EAEAEA" id="sms_Coupon_expiration">
                                </div>
                            </div>



                            <div class="col-md-6 mb-3">
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">Usage limit
                                    (leave blank without limit) </label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold" id="sms_Usage_limit"
                                    style="background-color: #EAEAEA" placeholder="key chain">
                            </div>

                        </div>

                     
                </div>
                </form>
                <div class="text-center mt-5  ">
                            <button type="button" class="btn btn-primary col-12 col-md-12 rounded-4 py-3" onclick="sms_meh_couponmanage_data()">
                            To add the category click here +</button>
                        </div>
            </div>
        </div>
    </div>
</div>
<script>


function sms_meh_couponmanage_data() {
    var CouponmanageData = {
        'code': document.getElementById('sms_The_coupon_code').value,
        'mu_input_bg_select': document.getElementById('sms_mu_input_bg_select').value,
        'amount_of_the_discount': document.getElementById('sms_amount_of_the_discount').value,
        'Coupon_expiration': document.getElementById('sms_Coupon_expiration').value,
        'Usage_limit': document.getElementById('sms_Usage_limit').value,
        
    };
    console.log(CouponmanageData);
    fetch('/coupons/add', {
        method: 'POST',
        body: JSON.stringify(CouponmanageData),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Form data submitted successfully:', data);
        // Optionally, you can handle the response data here
    })
    .catch(error => {
        console.error('Error submitting form data:', error);
});
}


</script> 
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
         <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
         <script>
            $(".chosen-select").chosen({
               no_results_text: "Oops, nothing found!"
            }) -->

<!-- //  </body>
// <script src="./dist/js/tabler.min.js?1684106062" defer></script> -->
<!-- // <script src="./dist/js/demo.min.js?1684106062" defer></script>

// </html> -->