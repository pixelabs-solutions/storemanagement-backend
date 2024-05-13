
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
                                        <select  id="sms_w_parent_ctg"
                                        class="form-select form-select-md"
                                            style="width: 100%; padding-right: 20px; border: none; background: transparent; height:100%;">
                                            <option value="percent">percentage</option>
                                            <option value="amount">amount</option>
                                        </select>
                                      
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
    var Coupon_manage_Data = {
        'code': document.getElementById('sms_The_coupon_code').value,
        'discount_type': document.getElementById('sms_w_parent_ctg').value,
        'amount': document.getElementById('sms_amount_of_the_discount').value,
        'date_expires': document.getElementById('sms_Coupon_expiration').value,
        'usage_limit': document.getElementById('sms_Usage_limit').value,
        
    };

    fetch('/coupons/add',{
        method: 'POST',
        body: JSON.stringify(Coupon_manage_Data),
        headers: {
            'Content-Type': 'application/json'
        }
    } )
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
