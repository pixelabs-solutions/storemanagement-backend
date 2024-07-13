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

    .my_div {
        background-color: #afacac;
        opacity: 0.5;
        width: 100%;
        position: absolute;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: none;
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
    .chosen-container-multi .chosen-choices {
        background-color: transparent !important;
    }

    .sms_manage_pop {
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
        z-index: 2000000;
        text-align: center;
        box-shadow: 100vh 100vh 100vh 300vh #00000059;
    }

    .sms_manage_pop svg {
        fill: green;
        width: 64px;
        height: 64px;
        margin-bottom: 20px;
    }

    .sms_manage_pop h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .sms_manage_pop .text-muted {
        color: #6c757d;
        font-size: 1rem;
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
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold"
                                    data-i18n="popoups.added_new_cupons.cupon_code">The coupon
                                    code</label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold"
                                    style="background-color: #EAEAEA" placeholder="Coupon Code"
                                    id='sms_The_coupon_code'>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="example-select" class="form-label fs-3 fw-bold"
                                    data-i18n="popoups.added_new_cupons.discount_type">Discount type
                                    (amount/percentage)</label>
                                <div
                                    style="background-color: #eaeaea; position: relative; border-radius: 12px; height: 55px;">
                                    <div class="col-md-12 rounded-4 bg-transparent h-100">
                                        <select id="sms_w_parent_ctg" class="form-select form-select-md"
                                            style="width: 100%; padding-right: 20px; border: none; background: transparent; height: 100%;"
                                            onchange="updateInputType()">
                                            <option value="percent">percentage</option>
                                            <option value="fixed_cart">amount</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="sms_amount_of_the_discount" class="form-label fs-2 fw-bold"
                                    data-i18n="popoups.added_new_cupons.amounth_discount">The amount of the
                                    discount</label>
                                <input type="number" class="form-control rounded-3 p-3 fw-bold"
                                    style="background-color: #EAEAEA" placeholder="Amount of Discount"
                                    id="sms_amount_of_the_discount">
                            </div>
                        </div>
                        <!-- Adding terms to the feature -->
                        <div class="row gx-3 ">
                            <div class="col-md-6 mb-3">
                                <label for="example-date-input" class="form-label fs-4 fw-bold"
                                    data-i18n="popoups.added_new_cupons.expiry_date">Coupon expiration
                                    date</label>
                                <div class="input-group">
                                    <!-- <input type="date" class="form-control rounded-3 p-3 fw-bold" style="background-color: #EAEAEA" id="sms_Coupon_expiration" placeholder="Expiry Date"> -->
                                    <input type="date" id="sms_Coupon_expiration"
                                        class="form-control rounded-3 p-3 fw-bold" style="background-color: #EAEAEA"
                                        placeholder="Expiry date" min="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold"
                                    data-i18n="popoups.added_new_cupons.limit">Usage limit
                                    (leave blank without limit) </label>
                                <input type="number" class="form-control rounded-3 p-3 fw-bold" id="sms_Usage_limit"
                                    style="background-color: #EAEAEA" placeholder="Usage Limit">
                            </div>

                        </div>

                </div>
                </form>
                <div class="modal-body text-center py-4 sms_manage_pop" id="sms_add_coupons_success-message"
                    style="display: none;">
                    <!-- Close icon -->

                    <!-- <button type="button" class="btn-close" aria-label="Close" onclick="sms_add_coupons_close_success_message()"></button> -->
                    <!-- SVG icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg>
                    <h3>Success</h3>
                    <div class="text-muted">Your coupon data has been submitted successfully.</div>
                </div>
                <div class="modal-body text-center py-4 sms_manage_pop" id="sms_add_coupons_error-message"
                    style="display: none;">
                    <!-- Close icon -->
                    <button type="button" class="btn-close" aria-label="Close"
                        onclick="sms_add_coupous_close_error_message()"></button>
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
                <div class="text-center mt-5  ">
                    <button type="button" id="sms_mu_manage_submit"
                        class="btn btn-primary col-12 col-md-12 rounded-4 py-3" onclick="sms_meh_couponmanage_data()"
                        data-i18n="popoups.added_new_cupons.last_btn_cat">
                        Add Coupon</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

function updateInputType() {
        var select = document.getElementById("sms_w_parent_ctg");
        var input = document.getElementById("sms_amount_of_the_discount");

        if (select.value === "percent") {
            input.value = 100; // Set default value to 100 when "percentage" is selected
            

            input.setAttribute("max", 100); // Set maximum allowed value to 100 for percentage
            input.removeAttribute("min"); // Remove minimum attribute
        } else if (select.value === "fixed_cart") {
            input.setAttribute("min", 0); // Set minimum allowed value to 0 for amount
            input.removeAttribute(0); // Remove maximum attribute
        }
    }

    // Event listener to validate input when typing (for real-time feedback)
    document.getElementById("sms_amount_of_the_discount").addEventListener("input", function() {
        var select = document.getElementById("sms_w_parent_ctg");
        var input = document.getElementById("sms_amount_of_the_discount");

        if (select.value === "percent" && input.value > 100) {
            input.value = 100; // Reset the value to 100 if it exceeds when "percentage" is selected
        }
    });

    function sms_meh_couponmanage_data() {
        document.getElementById('sms_mu_manage_submit').disabled = true;
        var Coupon_manage_Data = {
            'code': document.getElementById('sms_The_coupon_code').value,
            'discount_type': document.getElementById('sms_w_parent_ctg').value,
            'amount': document.getElementById('sms_amount_of_the_discount').value,
            'date_expires': document.getElementById('sms_Coupon_expiration').value,
            'usage_limit': document.getElementById('sms_Usage_limit').value,
        };

        document.getElementById('ajaxloadingIndicator').style.display = 'flex';
    document.body.style.overflow = "hidden";

        fetch('/coupons/add', {
            method: 'POST',
            body: JSON.stringify(Coupon_manage_Data),
            headers: {
                'Content-Type': 'application/json'
            }
        })
            .then(response => {
                console.log(response);
                if (response.status === 201 || response.ok) {
                    // Form submission succeeded, display success message
                    document.getElementById('ajaxloadingIndicator').style.display = 'none';

                    document.getElementById('sms_add_coupons_success-message').style.display = 'block';
                    document.getElementById('sms_add_coupons_error-message').style.display = 'none';

                    window.location.reload();
                } else {
                    document.getElementById('ajaxloadingIndicator').style.display = 'none';

                    // Form submission failed, display error message
                    document.getElementById('sms_add_coupons_error-message').style.display = 'block';
                    document.getElementById('sms_add_coupons_error-message').style.display = 'block';
                    document.getElementById('sms_mu_manage_submit').disabled = false;
                }
            })
            .catch(error => {
                document.getElementById('ajaxloadingIndicator').style.display = 'none';

                // Network error occurred, display error message
                document.getElementById('sms_add_coupons_error-message').style.display = 'block';
                document.getElementById('sms_mu_manage_submit').disabled = false;
                console.error('Error submitting form data:', error);
            });
    }

    function sms_add_coupons_close_success_message() {
        document.getElementById('sms_add_coupons_success-message').style.display = 'none';
    }

    function sms_add_coupous_close_error_message() {
        document.getElementById('sms_add_coupons_error-message').style.display = 'none';
    }
</script>