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
                                    <input type="text" class="form-control rounded-3 p-3 fw-bold" style="background-color: #EAEAEA"
                                        placeholder=""  id='sms_The_edit_coupon_code'>
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
                                       style="background-color: #EAEAEA"
                                        placeholder="" id="sms_edit_amount_of_the_discount" >
                                </div>
                            </div>
                            <!-- Adding terms to the feature -->
                            <div class="row gx-3 ">
                                <div class="col-md-6 mb-3">
                                    <label for="example-date-input" class="form-label fs-4 fw-bold">Coupon expiration
                                        date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control rounded-3 p-3 fw-bold"
                                        id="sms_edit_Coupon_expiration" style="background-color: #EAEAEA">
                                    </div>
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="">

                    <form action="" method="post" class="card-body">
                        <!-- header -->
                        <div class="row gx-3 ">
                            <div class="col-md-4 mb-3">
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">The coupon
                                    code</label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold" id="coupons_code"
                                    style="background-color: #EAEAEA" placeholder="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="example-select fs-3 fw-bold" class="form-label fw-bold">Discount type
                                    (amount/percentage)
                                </label>
                                <div>
                                    <select style="background-color:#EAEAEA" id="discount_type" class="form-control p-3">
                                        <option value="amount">Amount</option>
                                        <option value="percent">Percentage</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">The amount
                                    of the discount </label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold" id="discount_amount"
                                    style="background-color: #EAEAEA" placeholder="">
                            </div>
                        </div>
                        <!-- Adding terms to the feature -->
                        <div class="row gx-3 ">
                            <div class="col-md-6 mb-3">
                                <label for="example-date-input" class="form-label fs-4 fw-bold">Coupon expiration
                                    date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control rounded-3 p-3 fw-bold" id="expiration_date"
                                        style="background-color: #EAEAEA">
                                </div>
                            </div>


                                <div class="col-md-6 mb-3">
                                    <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">Usage limit
                                        (leave blank without limit) </label>
                                    <input type="text" class="form-control rounded-3 p-3 fw-bold"
                                        style="background-color: #EAEAEA"
                                        placeholder="key chain" id="sms_edit_Usage_limit">
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">Usage limit
                                    (leave blank without limit) </label>
                                <input type="text" class="form-control rounded-3 p-3 fw-bold" id="usage_limit"
                                    style="background-color: #EAEAEA" placeholder="key chain">
                            </div>

                            </div>
                            <div class="text-center mt-5  ">
                                <button type="button" 
                                    class="btn btn-primary col-12 col-md-12 rounded-4 py-3" onclick="sms_meh_coupon_edit_data()">To update the coupon click here ←</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>


function sms_meh_coupon_edit_data() {
    var CouponeditData = {
        'coupon_edit_The_coupon_code': document.getElementById('sms_The_edit_coupon_code').value,
        'coupon_edit_Discount_type': document.getElementById('sms_edit_Discount_type').value,
        'edit_amount_of_the_discount': document.getElementById('sms_edit_amount_of_the_discount').value,
        'edit_Coupon_expiration': document.getElementById('sms_edit_Coupon_expiration').value,
        'edit_Usage_limit': document.getElementById('sms_edit_Usage_limit').value,
        
    };
    console.log(CouponeditData);
//     fetch('URL', {
//         method: 'POST',
//         body: JSON.stringify(CouponeditData),
//         headers: {
//             'Content-Type': 'application/json'
//         }
//     })
//     .then(response => {
//         if (!response.ok) {
//             throw new Error('Network response was not ok');
//         }
//         return response.json();
//     })
//     .then(data => {
//         console.log('Form data submitted successfully:', data);
//         // Optionally, you can handle the response data here
//     })
//     .catch(error => {
//         console.error('Error submitting form data:', error);
// });
// }

}
</script> 
                        </div>
                        <div class="text-center mt-5  ">
                            <button type="submit" class="btn btn-primary col-12 col-md-12 rounded-4 py-3">To update the
                                coupon click here ←</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    const buttons = document.querySelectorAll(".get-row-data-edit-coupon");

    buttons.forEach(button => {
        button.addEventListener("click", function () {
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
                discountTypeSelect.value = "amount";
            }

            // You can use the rowData object for further processing
        });
    });
</script>

<!-- </body>
// <script src="./dist/js/tabler.min.js?1684106062" defer>
 // <script src="./dist/js/demo.min.js?1684106062" defer></script>

// </html> -->