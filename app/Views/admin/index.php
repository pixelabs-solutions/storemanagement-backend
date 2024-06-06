<?php

require_once __DIR__ . '/../partials/header.php';

// var_dump($transactions);
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
.overflow_div{
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
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                  </svg>
                </span>
                <input type="text" id="sms_transaction_w_search_input" value="" class="form-control border-0 " placeholder="Order search" aria-label="Search in website">
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
              <th></th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.order_no">Order No</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.customer_name">Customer's Name</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.status">Status</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.order_date">Order Date </th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.sum">Sum</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.source">Source</th>
              <th></th>
            </tr>
            <tr class="sms_mu_spacing_div"></tr>

            <tr class="sms_mu_tr">
              <td>
                <span class="form-check-label"></span>
                <input class="form-check-input mx-2" type="checkbox">
                </label>
              </td>
              <td id="transaction_id">abc</td>

              <td>abc</td>

              <td>abc</td>

              <td>abc</td>
              <td>abc</td>
              <td>abc</td>
              <td>
                <svg width="24" height="24" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.9996 0.555664C11.5107 0.555664 7.91625 2.60011 5.29959 5.03344C2.69959 7.44455 0.960699 10.3334 0.138477 12.3168C-0.0448568 12.7557 -0.0448568 13.2446 0.138477 13.6834C0.960699 15.6668 2.69959 18.5557 5.29959 20.9668C7.91625 23.4001 11.5107 25.4446 15.9996 25.4446C20.4885 25.4446 24.0829 23.4001 26.6996 20.9668C29.2996 18.5501 31.0385 15.6668 31.8663 13.6834C32.0496 13.2446 32.0496 12.7557 31.8663 12.3168C31.0385 10.3334 29.2996 7.44455 26.6996 5.03344C24.0829 2.60011 20.4885 0.555664 15.9996 0.555664ZM7.99959 13.0001C7.99959 10.8784 8.84244 8.84354 10.3427 7.34325C11.843 5.84296 13.8779 5.00011 15.9996 5.00011C18.1213 5.00011 20.1562 5.84296 21.6564 7.34325C23.1567 8.84354 23.9996 10.8784 23.9996 13.0001C23.9996 15.1218 23.1567 17.1567 21.6564 18.657C20.1562 20.1573 18.1213 21.0001 15.9996 21.0001C13.8779 21.0001 11.843 20.1573 10.3427 18.657C8.84244 17.1567 7.99959 15.1218 7.99959 13.0001ZM15.9996 9.44455C15.9996 11.4057 14.4051 13.0001 12.444 13.0001C12.0496 13.0001 11.6718 12.9334 11.3163 12.8168C11.0107 12.7168 10.6551 12.9057 10.6663 13.2279C10.6829 13.6112 10.7385 13.9946 10.844 14.3779C11.6051 17.2223 14.5329 18.9112 17.3774 18.1501C20.2218 17.389 21.9107 14.4612 21.1496 11.6168C20.5329 9.31122 18.494 7.76122 16.2274 7.66678C15.9051 7.65566 15.7163 8.00566 15.8163 8.31677C15.9329 8.67233 15.9996 9.05011 15.9996 9.44455Z" fill="black" />
                </svg>
              </td>
            </tr>
            <tr class="sms_mu_spacing_div"></tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div>
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
  <div  id="edit-modal-full-width"  class="Sms_mu_popoup_admin">
    <div class="overflow_div">
      <?php include('signup.php');  ?>
      <button type="button" id="sign_up_btn_close" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
  </div>
</div>
<script>
  document.getElementById('sign-up-btn').addEventListener('click', function() {
    document.getElementById('edit-modal-full-width').style.display = "block"
  });
  document.getElementById('sign_up_btn_close').addEventListener('click', function() {
    document.getElementById('edit-modal-full-width').style.display = "none"
  });
</script>