<?php
require_once __DIR__ . '/../partials/header.php';
var_dump($inventory_settings);
// echo $woocommerce_manage_stock_value;



foreach ($inventory_settings as $item) {
    if ($item['id'] === 'woocommerce_manage_stock') {
        $woocommerce_manage_stock_value = $item['value'];
    } else if ($item['id'] === 'woocommerce_notify_low_stock') {
        $woocommerce_notify_low_stock_value = $item['value'];
    } else if ($item['id'] === 'woocommerce_notify_no_stock') {
        $woocommerce_notify_no_stock_value = $item['value'];
    } else if ($item['id'] === 'woocommerce_stock_email_recipient') {
        $woocommerce_stock_email_recipient_value = $item['value'];
    } else if ($item['id'] === 'woocommerce_notify_low_stock_amount') {
        $woocommerce_notify_low_stock_amount_value = $item['value'];
    } else if ($item['id'] === 'woocommerce_notify_no_stock_amount') {
        $woocommerce_notify_no_stock_amount_value = $item['value'];
    }
}

$woocommerce_manage_stock_ischecked = ($woocommerce_manage_stock_value === 'yes') ? 'checked' : '';
$woocommerce_notify_low_stock_value_ischecked = ($woocommerce_notify_low_stock_value === 'yes') ? 'checked' : '';
$woocommerce_notify_no_stock_ischecked = ($woocommerce_notify_no_stock_value === 'yes') ? 'checked' : '';

?>

<style>
    .form-switch .form-check-input {
        background-size: 26px;
        height: 26px !important;
        width: 45px !important;
    }

    .form-check-input {
        cursor: pointer !important;
    }

    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 10px 20px;
        border-radius: 5px;
        background: green !important;;
        color: #fff;
        display: none;
        z-index: 9999;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        font-size: 14px;
        /* Adding shadow for depth */
    }

    .notification.error {
        background-color: #c0392b;
        /* Red color for error */
    }
</style>
<div class=" bg-white position-relative mt-5 p-3">
    <div id="notification" class="notification"></div>
    <form action="" id="form">

        <div class="mt-5 p-2">
            <h2 data-i18n="inventtory_setting.main_heading.h1">General inventory settings</h2>
            <div class="row mt-5">
                <div class="rounded-3 d-flex  py-3 justify-content-between align-items-center col-sm-4"
                    style="background-color: #EAEAEA">
                    <div>
                        <p class="fs-3 p-0 m-0 align-items-center fw-bold"
                            data-i18n="inventtory_setting.first_row_with_check_box.managment">Enabling inventory
                            management</p>
                    </div>
                    <div class="form-check form-switch m-0">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php echo $woocommerce_manage_stock_ischecked; ?>>
                    </div> 
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 d-flex gap-2 py-3 rounded-3 justify-content-between  mt-4"
                    style="background-color: #EAEAEA">
                    <p class="fs-3 m-0 p-0 fw-semibold"
                        data-i18n="inventtory_setting.second_row_with_check_box.stock_alert_low">Activating an alert
                        when stock is low</p>
                    <div class="form-check form-switch m-0">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault2" <?php echo $woocommerce_notify_low_stock_value_ischecked; ?>>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex gap-2 py-3 px-2 rounded-3 justify-content-between  mt-4"
                        style="background-color: #EAEAEA">
                        <p class="fs-3 m-0 p-0  fw-semibold"
                            data-i18n="inventtory_setting.third_row_with_check_box.stock_alert_out">Activate out of
                            stock alert</p>
                        <div class="form-check form-switch m-0">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault3" <?php echo $woocommerce_notify_no_stock_ischecked; ?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <h2 data-i18n="inventtory_setting.fourth_row_with_check_box.email_label">Email address to receive
                    notifications..</h2>
                <div class="row">
                    <input class="col-lg-12 border-0 rounded-3 py-3 m-0 p-3 form-control"
                        style="background-color: #EAEAEA" type="text" value="<?php echo $woocommerce_stock_email_recipient_value; ?>" id="emailAddress" placeholder="Email Adress">
                </div>
            </div>
            <div class="row mt-5 gap-0">
                <div class="col-md-6">
                    <h2 >Threshold quantity for low stock
                    </h2>
                    <input class="border-0 rounded-2 py-3 m-0 p-3 form-control" style="background-color: #EAEAEA"
                        type="number" value="<?php echo $woocommerce_notify_low_stock_amount_value; ?>" id="lowStockThreshold" placeholder="10">
                </div>
                <div class="col-md-6">
                    <h2 >Threshold quantity out of stock
                    </h2>
                    <input class="border-0 rounded-2 py-3 m-0 p-3 form-control" style="background-color: #EAEAEA"
                        type="number" value="<?php echo $woocommerce_notify_no_stock_amount_value; ?>" id="outOfStockThreshold" placeholder="10">
                </div>
            </div>
            <div class="row mt-5 justify-content-end ">
             

            </div>
        </div>
    </form>
    <div type="button" onclick="sms_inventory_submit_Form()"
                    class="rounded-3 rounded-4 d-flex gap-2 border-0  justify-content-center align-items-center last w-auto"
                    style="background: rgba(73, 135, 216, 0.44);">
                    <p class="fs-2 py-3 m-0 align-items-center fw-bold"
                        >Updating and saving inventory
                        settings →</p>
                </div>
</div>


<script>
   
   function showNotification(message, isError = false) {
    var notificationElement = document.getElementById("notification");
    notificationElement.textContent = message;

    if (isError) {
        notificationElement.classList.add("error");
    } else {
        notificationElement.classList.remove("error");
    }

    notificationElement.style.display = "block";
    setTimeout(function () {
        notificationElement.style.display = "none";
    }, 3000); // Hide notification after 3 seconds
}

function sms_inventory_submit_Form() {
    var formData = {
        'woocommerce_manage_stock': document.getElementById('flexSwitchCheckDefault').checked,
        'woocommerce_notify_low_stock': document.getElementById('flexSwitchCheckDefault2').checked,
        'woocommerce_notify_no_stock': document.getElementById('flexSwitchCheckDefault3').checked,
        'woocommerce_stock_email_recipient': document.getElementById('emailAddress').value,
        'woocommerce_notify_low_stock_amount': document.getElementById('lowStockThreshold').value,
        'woocommerce_notify_no_stock_amount': document.getElementById('outOfStockThreshold').value
    };

    // Log form data to console
    console.log(formData);

    // Make fetch request
    fetch('/inventory/update', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(response => {
        if (response.ok) {
            // Form submission succeeded, display success message
            showNotification("Inventory Setting  Submitted successfully");
            // window.location.reload();
        } else {
            // Form submission failed, display error message
            showNotification("Inventory Setting  submission failed", true);
        }
    })
    .catch(error => {
        // Network error occurred, display error message
        showNotification("Error submitting form data: " + error, true);
        console.error('Error submitting form data:', error);
    });
}
</script>


<?php
require_once __DIR__ . '/../partials/footer.php';

?>