<?php

// require_once __DIR__ . '/../partials/header.php';

// var_dump($customer_data);
// $jsontransactionData = json_encode($transactions, JSON_UNESCAPED_UNICODE);

// echo $jsontransactionData;
?>
<script>
  // const transactionsdata = document.getElementById('transactionData');

  // const jsontransactionData = transactionsdata.value;
  // const transactionsArray = JSON.parse(jsontransactionData);
  // console.log(transactionsArray); // Output: "apple"
</script>

<style>
  @media only screen and (max-width:1000px) {
    .sms_mu_table {
      width: 900px !important;
      border: 0 !important;
    }
  }

  /* .s {
    background-color: #F2F2F2 !important;
  } */
  .sms_transaction_w_status.sms_transaction_w_cancelled {
    background-color: #B50E0E;
    border-radius: 25px;
    color: white;
    padding: 15px;
  }

  .overflow_div {
    height: 100vh;
    overflow: scroll;
  }

  .Sms_mu_popoup_admin {
    display: none;
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    width: 100%;
    z-index: 2000;
    background-color: white !important;
  }

  .sms_transaction_w_status.sms_transaction_w_approved {

    background-color: #4987D8;
    border-radius: 25px;
    color: white;
    padding: 15px;

  }

  .sms_mu_table {
    border-spacing: 0 50px !important;
    width: 100%;
    /* margin: 0 2% !important; */
  }

  .sms_m_form_select {
    border: none;
    border-radius: 0.8rem;
    background-color: #F0F0F0;
    min-width: 250px !important;
  }

  .sms_mu_thead,
  .sms_mu_tr,
  .sms_mu_td {
    text-align: center;
  }

  .sms_mu_tr {
    background-color: white !important;
    height: 70px;
    border-radius: 20px !important;
    overflow: hidden;
    margin: 0 20px;
    /* border-bottom: 10px solid #F2F2F2 !important; */
  }

  .sms_mu_spacing_div {
    height: 10px;
    background-color: #F2F2F2;
    width: inherit;
  }

  svg {
    cursor: pointer;
  }

  .sms_mu_th {
    background-color: #a8c3e7 !important;
    height: 50px;
  }

  td:first-child {
    /* border-left-style: solid; */
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
  }

  td:last-child {
    /* border-right-style: solid; */
    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
  }

  th:first-child {
    /* border-left-style: solid; */
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
  }

  th:last-child {
    /* border-right-style: solid; */
    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
  }

  .table-spacing {
    border-spacing: 5px;
  }

  .notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 14px;
    background: green;
    /* Gradient background */
    color: #fff;
    display: none;
    z-index: 9999;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    /* Adding shadow for depth */
  }

  .notification.error {
    background-color: #c0392b;
    /* Red color for error */
  }
</style>
<div class="sms_transaction_w  p-0">
  <div id="notification" class="notification"></div>
  <div class=" col-12 mt-5">
    <div class="row row-cards justify-content-sm-between gap-sm-3 gap-2 gap-lg-0 bg-white p-3 m-0 rounded-3">
      <div class="col-sm-5 col-lg-12 m-0 d-flex flex-column flex-sm-row justify-content-between ">
        <div class="card-body-rounded sms_m_search_input mb-3 mb-sm-0">
          <div>
            <form id="sms_customers_w_search_form" action="./" method="get" autocomplete="off" novalidate>
              <div class="input-icon border-bottom border-black">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                  </svg>
                </span>
                <input type="text" id="sms_transaction_w_search_input" value="" class="form-control border-0 "
                  placeholder="Order search" aria-label="Search in website">
              </div>
            </form>
          </div>
        </div>

        <div class="d-flex">
          <label for="statusSelect" class="form-label"></label>
          <button class="btn" id="sign-up-btn">Sign up</button>
        </div>
      </div>

    </div>
    <div class="card-x mt-3">
      <div style="overflow-x: auto">
        <div class="table-responsive">
          <table class="sms_mu_table" id='sms_transaction_w_transaction_table'>
            <tr class="sms_mu_th">
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.order_no">Name</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.customer_name">Email</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.status">Phone</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.order_date">Business Name</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.sum">X Code</th>
              <th></th>
            </tr>

            <?php
            foreach ($customer_data['data'] as $customer) {
              ?>
              <tr class="sms_mu_spacing_div"></tr>

              <tr class="sms_mu_tr">
                <td><?php echo $customer['name']; ?></td>

                <td><?php echo $customer['email']; ?></td>

                <td><?php foreach ($customer_data['users_phone'] as $customer_phone) {
                  if ($customer_phone['user_id'] == $customer['id']) {
                    echo $customer_phone['meta_value'];
                  }
                } ?></td>

                <td><?php foreach ($customer_data['business_name'] as $business_name) {
                  if ($business_name['user_id'] == $customer['id']) {
                    echo $business_name['meta_value'];
                  }
                } ?></td>


                <?php foreach ($customer_data['users_x_code'] as $users_x_code) {
                  if ($users_x_code['user_id'] == $customer['id']) {
                    $user_x_code = $users_x_code['meta_value'];
                  }
                } ?>


                <td>

                  <svg fill="none" id="<?php echo $user_x_code; ?>" onclick="copyId(this.id)" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <clipPath id="clip0_17_17330">
                      <path d="m0 0h24v24h-24z" />
                    </clipPath>
                    <g clip-path="url(#clip0_17_17330)">
                      <path
                        d="m15 1h-11c-1.1 0-2 .9-2 2v13c0 .55.45 1 1 1s1-.45 1-1v-12c0-.55.45-1 1-1h10c.55 0 1-.45 1-1s-.45-1-1-1zm4 4h-11c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2v-14c0-1.1-.9-2-2-2zm-1 16h-9c-.55 0-1-.45-1-1v-12c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1z"
                        fill="#000" />
                    </g>
                  </svg>

                  
                </td>
              </tr>
              <tr class="sms_mu_spacing_div"></tr>

              <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div>

  <script>
    function copyId(id) {
      // Create a temporary input element
      var tempInput = document.createElement("input");
      // Set the input value to the id
      tempInput.value = id;
      // Append the input to the body
      document.body.appendChild(tempInput);
      // Select the input value
      tempInput.select();
      // Copy the selected text to clipboard
      document.execCommand("copy");
      // Remove the input from the body
      document.body.removeChild(tempInput);
      // Alert the copied id (optional)
      alert("Copied ID: " + id);
    }
  </script>

  <!-- <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #4987D870">
                <div class="py-1 rounded-top text-center">
                    <h3 class="card-title text-black fs-2 fw-bold m-0">Order details #<span id="order_id"></span></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           
        </div>
    </div> -->
  <div id="edit-modal-full-width" class="Sms_mu_popoup_admin">
    <div class="overflow_div">
      <?php include ('signup.php'); ?>
      <button type="button" id="sign_up_btn_close" class="btn-close position-absolute top-0 end-0 m-3"
        data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
  </div>
</div>
<script>
  document.getElementById('sign-up-btn').addEventListener('click', function () {
    document.getElementById('edit-modal-full-width').style.display = "block"
  });
  document.getElementById('sign_up_btn_close').addEventListener('click', function () {
    document.getElementById('edit-modal-full-width').style.display = "none"
  });
</script>