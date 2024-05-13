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
          @media only screen and (max-width:1366px ) {
        .row .col-lg-4{
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
    </style>

    <div class="container mt-5  ">
        <!-- <div class="sms_mu_file125_popoup_header rounded-top  ">
            <h1>Definitions of goals and objectives</h1>
        </div> -->
        <div class="bg-white h-auto">
            <form  class="p-4">
                <div class="row  mt-5">
                    <div class="col-lg-4 d-block">
                        <label class="fs-3 fw-bold">Target sales revenue</label>
                        <input class="sms_objective_add_form_input" type="text" id='sms_target_sales_revenue'>
                    </div>
                    <div class="col-lg-4">
                        <label for="" class="fs-3 fw-bold">Target recruitment of new customers</label>
                        <input class="sms_objective_add_form_input" type="text" id='sms_Target_recruitment_of_new_customers'>
                    </div>
                    <div class="col-lg-4">
                        <label for=" " class="fs-3 fw-bold">Destination of new orders</label>
                        <input class="sms_objective_add_form_input" type="text" id='sms_Destination_of_new_orders'>
                    </div>
                </div>
                <div class="row mt-5 ">
                    <div class="col-lg-4">
                        <label for="" class="fs-3 fw-bold">Target page views</label>
                        <input class="sms_objective_add_form_input" type="text" id='sms_Target_page_views'>
                    </div>
                    <div class="col-lg-4">
                        <label for="" class="fs-3 fw-bold">Target progress in Google locations</label>
                        <input class="sms_objective_add_form_input" type="text" id='sms_Target_progress_in_Google_locations'>
                    </div>
                    <div class="col-lg-4">
                        <label for="" class="fs-3 fw-bold">Target page views</label>
                        <input class="sms_objective_add_form_input" type="text" id='sms_Target_page_views'>
                    </div>
                </div>
                <div class="row  mt-5 align-items-end">
                    <div class="col-lg-4">
                        <label for="" class="fs-3 fw-bold">Target new products</label>
                        <input class="sms_objective_add_form_input" type="text" id='sms_Target_new_products'>
                    </div>
                    <div class="col-lg-4">
                        <label for="" class="fs-4 fw-bold">Target to increase the average number of items per order
                            (%)</label>
                        <input class="sms_objective_add_form_input" type="text" id='sms_Target_to_increase_the_average_number_of_items_per_order'>
                    </div>
                    <div class="col-lg-4">
                        <label for="" class="fs-3 fw-bold">Goal of raising the average income from the order</label>
                        <input class="sms_objective_add_form_input" type="text" id='sms_Goal_of_raising_the_average_income_from_the_order'>
                    </div>
                </div>
            
            </form>
            <div class="row mt-2 justify-content-end">
                    <input type="button" value="update" onclick="sms_meh_update_goal_data()" class="p-2 px-4 sms_mu_file125_popoup_last_btn w-auto h-5 d-flex align-items-center rounded-3 border-0   mt-5  text-center">
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
    var goalData = {
        'sales_revenue': document.getElementById('sms_target_sales_revenue').value,
        'recruitment_of_new_customers': document.getElementById('sms_Target_recruitment_of_new_customers').value,
        'Destination_of_new_orders': document.getElementById('sms_Destination_of_new_orders').value,
        'page_view': document.getElementById('sms_Target_page_views').value,
        'progress_in_Google_locations': document.getElementById('sms_Target_progress_in_Google_locations').value,
        'page_views': document.getElementById('sms_Target_page_views').value,
        'new_products': document.getElementById('sms_Target_new_products').value,
        'to_increase_the_average_number_of_items_per_order': document.getElementById('sms_Target_to_increase_the_average_number_of_items_per_order').value,
        'Goal_of_raising_the_average_income_from_the_order': document.getElementById('sms_Goal_of_raising_the_average_income_from_the_order').value,
    };
    console.log(goalData);
    fetch('/goals/add', {
        method: 'POST',
        body: JSON.stringify(goalData),
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

  
</body>
