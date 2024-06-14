<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Sign in - Store Management System</title>
  <!-- CSS files -->
  <link href="../assets/dist/css/tabler.min.css?1695847769" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-flags.min.css?1695847769" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-payments.min.css?1695847769" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-vendors.min.css?1695847769" rel="stylesheet" />
  <link href="../assets/dist/css/demo.min.css?1695847769" rel="stylesheet" />


  <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
      font-feature-settings: "cv03", "cv04", "cv11";
    }

    @media only screen and (max-width:1000px) {
      .sms_mu_table {
        width: 900px !important;
        border: 0 !important;
      }
    }

    .btn-close {
      position: absolute;
      right: 2%;
      top: 3%;
    }

    .dropdown_logout {
      position: absolute;
      top: 49px;
      margin-left: 15px;
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

    .sms_a_add_regular_pop {
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
</head>

<body class="sms_mu_testing ">
  <header class="navbar navbar-expand-md d-print-none sticky-top">
    <div class="row w-100 px-5 py-2" style="align-items: center;">
      <h1 class="col-6 m-0">
        <a href="">
          <img src="../assets/static/storemanagementlogo.png" height="40" alt="Store Management">
        </a>
      </h1>
      <div class=" col-6 ">
        <div class="nav-item dropdown">
          <a href="#" class="nav-link  d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu" style="float: right;">
            <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
            <div class="d-none d-xl-block ps-2">
              <div>
                <?php 
              $user_id = Pixelabs\StoreManagement\Models\Authentication::getUserIdFromToken(); 
              $data = Pixelabs\StoreManagement\Models\Authentication::get_user_by_id($user_id);
              echo $data;
              ?></div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow mt-5">
            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changepassword">Change Password</a>
            <p class="dropdown-item" onclick="LogoutDisconecting()">logout</p>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="p-3">
    <div class="sms_transaction_w  p-0">
      <div id="notification" class="notification"></div>
      <div class=" col-12 px-4">
        <div class="row g-2 align-items-center">
          <div class="col-8">
            <!-- Page pre-title -->
            <div class="page-pretitle">
              Overview
            </div>
            <h2 class="page-title">
              Admin Page
            </h2>
          </div>
          <!-- Page title actions -->
          <div class="col-4  d-print-none">
            <div class="btn-list justify-content-end ">
              <!-- <span class="d-none d-sm-inline">
                <a href="#" class="btn" id="change-password-btn">
                 Change Password
                </a>
              </span> -->
              <p href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#RegisterForm" >
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 5l0 14" />
                  <path d="M5 12l14 0" />
                </svg>
                Add New User
              </p>
              <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#RegisterForm">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 5l0 14" />
                  <path d="M5 12l14 0" />
                </svg>
              </a>
            </div>
          </div>
        </div>
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
            <th class="sms_mu_td" data-i18n="transction_page.transaction_th.order_date">Registered Since</th>
            <th class="sms_mu_td" data-i18n="transction_page.transaction_th.sum">X Code</th>
            <th class="sms_mu_td" data-i18n="transction_page.transaction_th.sum">Actions</th>
            <th></th>
          </tr>

          <?php
          
          //  var_dump($customer_data);
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
                  } ?>

              </td>
              <td><?php

                  // Create a DateTime object
                  $datetime = new DateTime($customer['created_at']);

                  // Format the DateTime object to get only the date part
                  $dateOnly = $datetime->format('Y-m-d');
                  echo $dateOnly;
                  ?></td>
              <td><?php foreach ($customer_data['users_configuration_status'] as $users_configuration_status) {
                    // echo json_encode($customer['id']); 
                    if ($customer['id'] == $users_configuration_status['user_id']) {
                      echo "API Connected";
                    }
                  } ?></td>

              <?php foreach ($customer_data['users_x_code'] as $users_x_code) {
                if ($users_x_code['user_id'] == $customer['id']) {
                  $user_x_code = $users_x_code['meta_value'];
                }
              } ?>


              <td>

                <svg fill="none" id="<?php echo $user_x_code; ?>" onclick="copyId(this.id)" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <clipPath id="clip0_17_17330">
                    <path d="m0 0h24v24h-24z" />
                  </clipPath>
                  <g clip-path="url(#clip0_17_17330)">
                    <path d="m15 1h-11c-1.1 0-2 .9-2 2v13c0 .55.45 1 1 1s1-.45 1-1v-12c0-.55.45-1 1-1h10c.55 0 1-.45 1-1s-.45-1-1-1zm4 4h-11c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2v-14c0-1.1-.9-2-2-2zm-1 16h-9c-.55 0-1-.45-1-1v-12c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1z" fill="#000" />
                  </g>
                </svg>


              </td>
              <td>

                <svg width="28" height="32" viewBox="0 0 28 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.45 1.10625C8.7875 0.425 9.48125 0 10.2375 0H17.7625C18.5188 0 19.2125 0.425 19.55 1.10625L20 2H26C27.1063 2 28 2.89375 28 4C28 5.10625 27.1063 6 26 6H2C0.89375 6 0 5.10625 0 4C0 2.89375 0.89375 2 2 2H8L8.45 1.10625ZM2 8H26V28C26 30.2062 24.2062 32 22 32H6C3.79375 32 2 30.2062 2 28V8ZM8 12C7.45 12 7 12.45 7 13V27C7 27.55 7.45 28 8 28C8.55 28 9 27.55 9 27V13C9 12.45 8.55 12 8 12ZM14 12C13.45 12 13 12.45 13 13V27C13 27.55 13.45 28 14 28C14.55 28 15 27.55 15 27V13C15 12.45 14.55 12 14 12ZM20 12C19.45 12 19 12.45 19 13V27C19 27.55 19.45 28 20 28C20.55 28 21 27.55 21 27V13C21 12.45 20.55 12 20 12Z" fill="#A30505" />
                </svg>



              </td>
            </tr>
            <!-- <tr class="sms_mu_spacing_div"></tr> -->

          <?php
          }
          ?>
        </table>
      </div>
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
    <div id="edit-modal-full-width" class="Sms_mu_popoup_admin">
      <div class="overflow_div">
        <?php include('signup.php'); ?>
        <button type="button" id="sign_up_btn_close" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    </div>
  </div>

  <!-- /// modal password  -->
  <div class="modal-body text-center py-4  sms_a_add_regular_pop" id="Sms_mu_change_password" style="display: none;">
    <!-- Close icon -->
    <!-- <button type="button" class="btn-close" aria-label="Close" onclick="sms_add_regular_close_success_message()"></button> -->
    <!-- SVG icon -->
    <button type="button" class="btn-close" aria-label="Close" id="Sms_mu_close_password"></button>
    <h1>Change Password</h1>
    <label class="form-label" style="text-align: left !important;">Password</label>
    <input type="password" name="password" class="form-control">
    <label class="form-label my-1" style="text-align: left !important;">Confirm Password</label>
    <input type="password" name="password" class="form-control">
    <div class="row" style="margin: 0 1px;">
      <button class="btn btn-info my-3 col-12 text-center justify-content-center ">Change Password</button>
    </div>
  </div>
  <!-- Change Password Popup Start -->
  <div class="modal modal-blur fade" id="changepassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Change Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row mb-3 align-items-end">
            <div class="col">
              <label class="form-label">Password</label>
              <input type="text" class="form-control" />
            </div>
            <div class="col">
              <label class="form-label">Confirm Password</label>
              <input type="text" class="form-control" />
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Change Password Popup End -->
  <!-- Change Password Popup Start -->
  <div class="modal modal-blur fade" id="RegisterForm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Register New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="/authentication/register" method="POST" autocomplete="off" novalidate>
            <div class="mb-3">
              <label class="form-label">First Name</label>
              <input type="text" name="first_name" class="form-control" placeholder="Enter Your Name" autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label">Last Name</label>
              <input type="text" name="last_name" class="form-control" placeholder="Enter Your Last Name" autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label">Phone Number</label>
              <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number" autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="your@email.com" autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label"> Business Name</label>
              <input type="text" name="business_name" class="form-control" placeholder="Enter Your Bussines Name" autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter Your Password" autocomplete="off">
            </div>

            <input type="hidden" name="admin_register_user" value="true">

        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-info btn-pill w-100">Sign in</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Change Password Popup End -->


  <script>
    function FunLogoutProfile() {
      var div = document.getElementById('PopoupLogout');
      if (div.style.display === "none") {
        div.style.display = 'block';
        console.log("Display set to block");
      } else {
        div.style.display = 'none';
        console.log("Display set to none");
      }
    }
    document.getElementById('sign-up-btn').addEventListener('click', function() {
      document.getElementById('edit-modal-full-width').style.display = "block"
    });
    document.getElementById('sign_up_btn_close').addEventListener('click', function() {
      document.getElementById('edit-modal-full-width').style.display = "none"
    });
    document.getElementById('change-password-btn').addEventListener('click', function() {
      document.getElementById('Sms_mu_change_password').style.display = "block"
    });
    document.getElementById('Sms_mu_close_password').addEventListener('click', function() {
      document.getElementById('Sms_mu_change_password').style.display = "none"
    });

    function LogoutDisconecting() {
      fetch('/authentication/logout', {
          method: 'GET',
          headers: {
            'Content-Type': 'application/json'
          },
          credentials: 'same-origin' // Include cookies in the request
        })
        .then(response => {
          if (response.ok) {
            // Handle successful logout, e.g., redirect to login page
            window.location.href = '/authentication/login'; // Change this to your login page
          } else {
            // Handle errors
            console.error('Logout failed:', response.statusText);
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  </script>


  <!-- Tabler Core -->
  <script src="../../../assets/dist/js/tabler.min.js?1684106062" defer></script>
  <script src="../../../assets/dist/js/demo.min.js?1684106062" defer></script>
  <script src="../../../assets/dist/js/translation.js"></script>
</body>

</html>