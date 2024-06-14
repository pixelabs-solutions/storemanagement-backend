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
<style>
    .sms_a_edit_pop {
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

    .sms_a_edit_pop svg {
        fill: green;
        width: 64px;
        height: 64px;
        margin-bottom: 20px;
    }

    .sms_a_edit_pop h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .sms_a_edit_pop .text-muted {
        color: #6c757d;
        font-size: 1rem;
    }
</style>
<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="">

                    <form action="" method="post" class="card-body">

                        <!-- Adding terms to the feature -->
                        <div class="row gx-3 ">

                            <form action="" method="post" class="card-body">
                                <!-- header -->
                                <div class="row gx-3 ">
                                    <div class="col-md-4 mb-3">
                                        <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold" data-i18n="popoups.added_new_cupons.cupon_code">The
                                            coupon
                                            code</label>
                                        <input type="text" class="form-control rounded-3 p-3 fw-bold" id="coupons_code" style="background-color: #EAEAEA" placeholder="Coupon Code">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="example-select fs-3 fw-bold" class="form-label fw-bold" data-i18n="popoups.added_new_cupons.discount_type">Discount
                                            type
                                            (amount/percentage)
                                        </label>
                                        <div>
                                            <select style="background-color:#EAEAEA" id="discount_type" class="form-control p-3">
                                                <option value="fixed_cart">Amount</option>
                                                <option value="percent">Percentage</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold" data-i18n="popoups.added_new_cupons.amounth_discount">The
                                            amount
                                            of the discount </label>
                                        <input type="text" class="form-control rounded-3 p-3 fw-bold" id="discount_amount" style="background-color: #EAEAEA" placeholder=" Amounth of Discount">
                                    </div>
                                </div>
                                <!-- Adding terms to the feature -->
                                <div class="row gx-3 ">
                                    <div class="col-md-6 mb-3">
                                        <label for="example-date-input" class="form-label fs-4 fw-bold" data-i18n="popoups.added_new_cupons.expiry_date">Coupon
                                            expiration
                                            date</label>
                                        <div class="input-group">
                                            <!-- <input type="date" class="form-control rounded-3 p-3 fw-bold" id="expiration_date" style="background-color: #EAEAEA" placeholder="Expiry date"> -->
                                            <input type="date" id="expiration_date" class="form-control rounded-3 p-3 fw-bold" style="background-color: #EAEAEA"   placeholder="Expiry date" min="<?php echo date("Y-m-d"); ?>">
                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold" data-i18n="popoups.added_new_cupons.limit">Usage
                                            limit
                                            (leave blank without limit) </label>
                                        <input type="number" class="form-control rounded-3 p-3 fw-bold" id="usage_limit" style="background-color: #EAEAEA" placeholder="Limit Usage">
                                    </div>

                                </div>
                                <div class="text-center mt-5  ">
                                    <button type="button" class="btn btn-primary col-12 col-md-12 rounded-4 py-3" onclick="sms_meh_coupon_edit_data()" id="Sms_mu_btn_submit" data-i18n="popoups.added_new_cupons.last_btn_coupon">To update the coupon
                                        click here ←</button>
                                </div>
                        </div>
                    </form>
                    <div class="modal-body text-center py-4 sms_a_edit_pop" id="sms_edit_success-message" style="display: none;">
                        <!-- SVG icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M9 12l2 2l4 -4"></path>
                        </svg>
                        <h3>Success</h3>
                        <div class="text-muted">Your coupon data has been updated successfully.</div>
                    </div>
                    <div class="modal-body text-center py-4 sms_a_edit_pop" id="sms_edit_error-message" style="display: none;">
                        <!-- SVG icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-red icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="12" y1="5" x2="12.01" y2="19"></line>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="12" y1="5" x2="12.01" y2="19"></line>
                        </svg>
                        <h3>Error</h3>
                        <div class="text-muted">An error occurred while updating coupon data. Please try again later.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




<script>

    function sms_meh_coupon_edit_data() {
        var CouponeditData = {
            'code': document.getElementById('coupons_code').value,
            'discount_type': document.getElementById('discount_type').value,
            'amount': document.getElementById('discount_amount').value,
            'date_expires': document.getElementById('expiration_date').value,
            'usage_limit': document.getElementById('usage_limit').value,

        };
        let editCouponElement = document.getElementById('edit_coupon');
        let editCouponId = editCouponElement.getAttribute('coupon_id');
        
        const EditCouponsubmitButton= document.getElementById("Sms_mu_btn_submit");
        EditCouponsubmitButton.disabled = true;
        
        console.log(editCouponId);
        fetch(`/coupons/${editCouponId}`, {
                method: 'PUT',
                body: JSON.stringify(CouponeditData),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.status === 200) {
                    // Form submission succeeded, display success message
                    document.getElementById('sms_edit_success-message').style.display = 'block';
                    window.location.reload();
                } else {
                    // Form submission failed, display error message
                    document.getElementById('sms_edit_error-message').style.display = 'block';
                    document.getElementById('sms_edit_success-message').style.display = 'none'; // Hide success message if it was displayed before
                }
            })
            .catch(error => {
                // Network error occurred, display error message
                document.getElementById('sms_edit_error-message').style.display = 'block';
                document.getElementById('Sms_mu_btn_submit').disabled = false;
                console.error('Error submitting form data:', error);
            });
    }
</script>



<script>
    const buttons = document.querySelectorAll(".get-row-data-edit-coupon");

    buttons.forEach(button => {
        button.addEventListener("click", function() {
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
            var usageLimit = rowData[3].split('/')[1]; // This will extract "15" from "0/15"
            document.getElementById('coupons_code').value = rowData[0];
            document.getElementById('discount_amount').value = rowData[2];
            document.getElementById('usage_limit').value = usageLimit;
            document.getElementById('expiration_date').value = rowData[4];


            const discountTypeSelect = document.getElementById("discount_type");

            if (rowData[1].toLowerCase().includes("percent")) {
                discountTypeSelect.value = "percent";
            } else {
                discountTypeSelect.value = "fixed_cart";
            }

            // You can use the rowData object for further processing
        });
    });
</script>

<!-- </body>
// <script src="./dist/js/tabler.min.js?1684106062" defer>
 // <script src="./dist/js/demo.min.js?1684106062" defer></script>

// </html> -->