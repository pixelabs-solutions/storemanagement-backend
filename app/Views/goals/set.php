<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/demo.min.css?1684106062" rel="stylesheet" />
</head>

<body> -->
<style>
    @media only screen and (max-width:1366px) {
        .row .col-lg-4 {
            margin-top: 20px;
        }
    }

    .sms_mu_file125_popoup_header {
        width: 100%;
        text-align: center;
        padding: 1px;
        background-color: #4987D870;
    }

    .sms_objective_add_form_input {
        background: #F5F5F5;
        height: 55px !important;
        border: none;
        outline: none;
        width: 100%;
        border-radius: 15px;
        padding: 0px 20px !important;
        margin-top: 10px;
    }

    .sms_mu_file125_popoup_last_btn {
        background: #4987D870;
        height: 50px !important;
    }

    .sms_goal_popup {
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
    }

    .sms_goal_popup svg {
        fill: green;
        width: 64px;
        height: 64px;
        margin-bottom: 20px;
    }

    .sms_goal_popup h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .sms_goal_popup .text-muted {
        color: #6c757d;
        font-size: 1rem;
    }
</style>

<?php
if (
    isset($data[0]['sales_revenue_target']) || isset($data[0]['new_customers_target']) || isset($data[0]['new_orders_target'])
    || isset($data[0]['target_keywords']) || isset($data[0]['google_rankings_target']) || isset($data[0]['page_views_target']) ||
    isset($data[0]['new_products_target']) || isset($data[0]['avg_order_items_increase_target']) || isset($data[0]['avg_order_value_increase_target'])
) {
    $goals_update_or_delete = 'update';
} else {
    $goals_update_or_delete = 'add';
}

?>
<div class="container mt-5  ">
    <!-- <div class="sms_mu_file125_popoup_header rounded-top  ">
            <h1>Definitions of goals and objectives</h1>
        </div> -->
    <div class="bg-white h-auto">
        <form class="p-4">
            <div class="row  mt-5">
                <div class="col-lg-4 d-block">
                    <label class="fs-3 fw-bold">Target sales revenue</label>
                    <input class="sms_objective_add_form_input" value="<?php echo $data[0]['sales_revenue_target']; ?>"
                        type="number" id='sms_target_sales_revenue'>
                </div>
                <div class="col-lg-4">
                    <label for="" class="fs-3 fw-bold">Target recruitment of new customers</label>
                    <input class="sms_objective_add_form_input" value="<?php echo $data[0]['new_customers_target']; ?>"
                        type="number" id='sms_Target_recruitment_of_new_customers'>
                </div>
                <div class="col-lg-4">
                    <label for=" " class="fs-3 fw-bold">Destination of new orders</label>
                    <input class="sms_objective_add_form_input" value="<?php echo $data[0]['new_orders_target']; ?>"
                        type="number" id='sms_Destination_of_new_orders'>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="col-lg-4">
                    <label for="" class="fs-3 fw-bold">Target keywords </label>
                    <input class="sms_objective_add_form_input" value="<?php echo $data[0]['target_keywords']; ?>"
                        type="number" id='sms_Target_page_target'>
                </div>
                <div class="col-lg-4">
                    <label for="" class="fs-3 fw-bold">Target progress in Google locations</label>
                    <input class="sms_objective_add_form_input"
                        value="<?php echo $data[0]['google_rankings_target']; ?>" type="number"
                        id='sms_Target_progress_in_Google_locations'>
                </div>
                <div class="col-lg-4">
                    <label for="" class="fs-3 fw-bold">Target page views</label>
                    <input class="sms_objective_add_form_input" value="<?php echo $data[0]['page_views_target']; ?>"
                        type="number" id='sms_Target_page_views'>
                </div>
            </div>
            <div class="row  mt-5 align-items-end">
                <div class="col-lg-4">
                    <label for="" class="fs-3 fw-bold">Target new products</label>
                    <input class="sms_objective_add_form_input" value="<?php echo $data[0]['new_products_target']; ?>"
                        type="number" id='sms_Target_new_products'>
                </div>
                <div class="col-lg-4">
                    <label for="" class="fs-4 fw-bold">Target to increase the average number of items per order
                        (%)</label>
                    <input class="sms_objective_add_form_input"
                        value="<?php echo $data[0]['avg_order_items_increase_target']; ?>" type="number"
                        id='sms_Target_to_increase_the_average_number_of_items_per_order'>
                </div>
                <div class="col-lg-4">
                    <label for="" class="fs-3 fw-bold">Goal of raising the average income from the order</label>
                    <input class="sms_objective_add_form_input"
                        value="<?php echo $data[0]['avg_order_value_increase_target']; ?>" type="number"
                        id='sms_Goal_of_raising_the_average_income_from_the_order'>
                </div>
            </div>
            <input type="hidden" value="<?php echo $goals_update_or_delete; ?>" id="goals_update_or_delete">

        </form>
        <div class="modal-body text-center py-4 sms_goal_popup" id="sms_goal_success_message" style="display: none;">
            <!-- Close icon -->

            <button type="button" class="btn-close" aria-label="Close"
                            onclick="sms_goal_close_success_message()"></button>
        <!-- SVG icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                <path d="M9 12l2 2l4 -4"></path>
            </svg>
            <h3>Success</h3>
            <div class="text-muted">Your goals and objectives data has been submitted successfully.</div>
        </div>
        <div class="modal-body text-center py-4 sms_goal_popup" id="sms_goal_error_message" style="display: none;">
             <!-- Close icon -->
             <button type="button" class="btn-close" aria-label="Close"
                            onclick="sms_goal_close_error_message()"></button>
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
        <div class="row mt-2 justify-content-end">
            <input type="button" value="update" onclick="sms_meh_update_goal_data()"
                class="p-2 px-4 sms_mu_file125_popoup_last_btn w-auto h-5 d-flex align-items-center rounded-3 border-0   mt-5  text-center">
            <!-- <div type
                        ">
                            <p class=" m-0"> Updating goals and objectives </p>
                        </div> -->
        </div>
    </div>
</div>
<script>


    function sms_meh_update_goal_data() {
        //    let sales_revenue': document.getElementById('sms_target_sales_revenue').value;
        var data = {
            'sales_revenue_target': document.getElementById('sms_target_sales_revenue').value,
            'new_customers_target': document.getElementById('sms_Target_recruitment_of_new_customers').value,
            'new_orders_target': document.getElementById('sms_Destination_of_new_orders').value,
            'target_keywords': document.getElementById('sms_Target_page_target').value,
            'google_rankings_target': document.getElementById('sms_Target_progress_in_Google_locations').value,
            'page_views_target': document.getElementById('sms_Target_page_views').value,
            'new_products_target': document.getElementById('sms_Target_new_products').value,
            'avg_order_items_increase_target': document.getElementById('sms_Target_to_increase_the_average_number_of_items_per_order').value,
            'avg_order_value_increase_target': document.getElementById('sms_Goal_of_raising_the_average_income_from_the_order').value,
        };
        console.log(data);
        let update_goals = document.getElementById('goals_update_or_delete').value;
        let URL = update_goals === 'add' ? '/goals/add' : '/goals/update';
        let requestMethod = update_goals === 'add' ? 'POST' : 'PUT';
        fetch(URL, {
            method: requestMethod,
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        })
            .then(response => {
                if (response.status === 200) {
                    // Form submission succeeded, display success message
                    document.getElementById('sms_goal_success_message').style.display = 'block';
                    document.getElementById('sms_goal_error_message').style.display = 'none';
                    window.location.reload();
                } else {
                    // Form submission failed, display error message
                    document.getElementById('sms_goal_error_message').style.display = 'block';
                    document.getElementById('sms_goal_success_message').style.display = 'none'; // Hide success message if it was displayed before
                }
            })
            .catch(error => {
                // Network error occurred, display error message
                document.getElementById('sms_goal_error_message').style.display = 'block';
                console.error('Error submitting form data:', error);
            });
    }

    function sms_goal_close_success_message() {
            document.getElementById('sms_goal_success_message').style.display = 'none';
        }

        function sms_goal_close_error_message() {
            document.getElementById('sms_goal_error_message').style.display = 'none';
        }
</script>


</body>