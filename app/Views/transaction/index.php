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

  .sms_transaction_w_status.sms_transaction_w_approved {

    background-color: #4987D8;
    border-radius: 25px;
    color: white;
    padding: 15px;

  }

  .sms_transaction_w_pending {
    background-color: #198754;
    border-radius: 25px;
    color: white;
    padding: 15px 20px;
  }

  .sms_mu_table {
    border-collapse: separate;
    /* table-layout: fixed; */
    width: 100%;
    border-spacing: 0 14px !important;
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

  /* Add this in the style tag or a separate CSS file */
  #loader {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-family: 'Arial', sans-serif;
    color: #333;
    text-align: center;
  }

  #loader .spinner {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #3498db;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    animation: spin 2s linear infinite;
    margin-bottom: 20px;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  #loader h1 {
    font-size: 1.5em;
    margin: 0;
    padding: 0;
  }
</style>
<div class="sms_transaction_w  p-0">
  <div id="loader">
    <div class="spinner"></div>
    <h1>Loading, please wait...</h1>
  </div>
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
        <!-- <button class="rounded-4 border-0 p-2 sms_m_transaction_new_category" style="background-color:#F0F0F0; ">
        

         Group status change</button> -->
        <div class="d-flex">
          <label for="statusSelect" class="form-label"></label>
          <select class="sms_m_form_select form-select dropdown-tom-select-style" id="sms_m_form_select">
            <option value="Group status change"  data-i18n="transction_page.status_tr.changed" disabled selected>Group status change</option>
            <option value="completed" data-i18n="transction_page.status_tr.Complete">Completed</option>
            <option value="cancelled" data-i18n="transction_page.status_tr.Cancelled">Cancelled</option>
            <option value="pending" data-i18n="transction_page.status_tr.In_Treatment">In Treatment</option>
          </select>
        </div>
        <!-- <svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M14.5873 21.4123C15.3686 22.1936 16.6373 22.1936 17.4186 21.4123L27.4186 11.4123C28.1998 10.6311 28.1998 9.3623 27.4186 8.58105C26.6373 7.7998 25.3686 7.7998 24.5873 8.58105L15.9998 17.1686L7.4123 8.5873C6.63105 7.80605 5.3623 7.80605 4.58105 8.5873C3.7998 9.36855 3.7998 10.6373 4.58105 11.4186L14.5811 21.4186L14.5873 21.4123Z" fill="black"/>
        </svg>   -->
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
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.order_date">Order Date </th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.status">Status</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.sum">Sum</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.source">Source</th>
              <th></th>
            </tr>
            <!-- <tr class="sms_mu_spacing_div"></tr> -->

            <?php
             $utmSource = 'Not Available';
            foreach ($transactions as $item) {

              foreach ($item['meta_data'] as $metaItem) {
                if ($metaItem['key'] === '_wc_order_attribution_utm_source') {
                  $utmSource = $metaItem['value'];
                } 
              }


              $date_created_date_string = $item['date_created'];
              $date_created_timestamp = strtotime($date_created_date_string);
              $date_created_formatted_date = date("Y-m-d", $date_created_timestamp);

            ?>

              <tr class="sms_mu_tr">
                <td>
                  <span class="form-check-label"></span>
                  <input class="form-check-input mx-2" type="checkbox" value="<?php $item['id']; ?> ">
                  </label>
                </td>
                <td id="transaction_id"><?php echo "#" . $item['id']; ?> </td>

                <td><?php echo $item['billing']['first_name'] . " " . $item['billing']['last_name']; ?></td>
                <td><?php echo $date_created_formatted_date; ?></td>

                <td><span class="sms_transaction_w_status"> <?php echo $item['status']; ?> </span></td>

                <td><?php echo $item['total']; echo " "; echo $currency[0]['symbol']; ?> </td>

                <!-- <td>#1152</td> -->

                <td><?php echo $utmSource; ?></td>
                <td>
                  <span class="view_order_details" data-transaction-id="<?php echo $item['id']; ?>" data-bs-toggle="modal" data-bs-target="#edit-modal-full-width">


                    <svg width="24" height="24" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.9996 0.555664C11.5107 0.555664 7.91625 2.60011 5.29959 5.03344C2.69959 7.44455 0.960699 10.3334 0.138477 12.3168C-0.0448568 12.7557 -0.0448568 13.2446 0.138477 13.6834C0.960699 15.6668 2.69959 18.5557 5.29959 20.9668C7.91625 23.4001 11.5107 25.4446 15.9996 25.4446C20.4885 25.4446 24.0829 23.4001 26.6996 20.9668C29.2996 18.5501 31.0385 15.6668 31.8663 13.6834C32.0496 13.2446 32.0496 12.7557 31.8663 12.3168C31.0385 10.3334 29.2996 7.44455 26.6996 5.03344C24.0829 2.60011 20.4885 0.555664 15.9996 0.555664ZM7.99959 13.0001C7.99959 10.8784 8.84244 8.84354 10.3427 7.34325C11.843 5.84296 13.8779 5.00011 15.9996 5.00011C18.1213 5.00011 20.1562 5.84296 21.6564 7.34325C23.1567 8.84354 23.9996 10.8784 23.9996 13.0001C23.9996 15.1218 23.1567 17.1567 21.6564 18.657C20.1562 20.1573 18.1213 21.0001 15.9996 21.0001C13.8779 21.0001 11.843 20.1573 10.3427 18.657C8.84244 17.1567 7.99959 15.1218 7.99959 13.0001ZM15.9996 9.44455C15.9996 11.4057 14.4051 13.0001 12.444 13.0001C12.0496 13.0001 11.6718 12.9334 11.3163 12.8168C11.0107 12.7168 10.6551 12.9057 10.6663 13.2279C10.6829 13.6112 10.7385 13.9946 10.844 14.3779C11.6051 17.2223 14.5329 18.9112 17.3774 18.1501C20.2218 17.389 21.9107 14.4612 21.1496 11.6168C20.5329 9.31122 18.494 7.76122 16.2274 7.66678C15.9051 7.65566 15.7163 8.00566 15.8163 8.31677C15.9329 8.67233 15.9996 9.05011 15.9996 9.44455Z" fill="black" />
                    </svg>
                  </span>
                </td>
              </tr>
              <!-- <tr class="sms_mu_spacing_div"></tr> -->
              <!-- <tr class="sms_mu_tr">
                <td>
                  <span class="form-check-label"></span>
                  <input class="form-check-input mx-2" type="checkbox">
                  </label>
                </td>
                <td>#1152</td>
                <td>atif Malka </td>
                <td><span class="sms_transaction_w_status"> afw </span></td>
                <td>24/07/2024</td>
               <td>#1152</td> 
                <td>NIS 1,370 </td>
                <td>Google Organic </td>
                <td>
                  <span data-bs-toggle="modal" data-bs-target="#edit-modal-full-width">
                    <svg width="24" height="24" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M15.9996 0.555664C11.5107 0.555664 7.91625 2.60011 5.29959 5.03344C2.69959 7.44455 0.960699 10.3334 0.138477 12.3168C-0.0448568 12.7557 -0.0448568 13.2446 0.138477 13.6834C0.960699 15.6668 2.69959 18.5557 5.29959 20.9668C7.91625 23.4001 11.5107 25.4446 15.9996 25.4446C20.4885 25.4446 24.0829 23.4001 26.6996 20.9668C29.2996 18.5501 31.0385 15.6668 31.8663 13.6834C32.0496 13.2446 32.0496 12.7557 31.8663 12.3168C31.0385 10.3334 29.2996 7.44455 26.6996 5.03344C24.0829 2.60011 20.4885 0.555664 15.9996 0.555664ZM7.99959 13.0001C7.99959 10.8784 8.84244 8.84354 10.3427 7.34325C11.843 5.84296 13.8779 5.00011 15.9996 5.00011C18.1213 5.00011 20.1562 5.84296 21.6564 7.34325C23.1567 8.84354 23.9996 10.8784 23.9996 13.0001C23.9996 15.1218 23.1567 17.1567 21.6564 18.657C20.1562 20.1573 18.1213 21.0001 15.9996 21.0001C13.8779 21.0001 11.843 20.1573 10.3427 18.657C8.84244 17.1567 7.99959 15.1218 7.99959 13.0001ZM15.9996 9.44455C15.9996 11.4057 14.4051 13.0001 12.444 13.0001C12.0496 13.0001 11.6718 12.9334 11.3163 12.8168C11.0107 12.7168 10.6551 12.9057 10.6663 13.2279C10.6829 13.6112 10.7385 13.9946 10.844 14.3779C11.6051 17.2223 14.5329 18.9112 17.3774 18.1501C20.2218 17.389 21.9107 14.4612 21.1496 11.6168C20.5329 9.31122 18.494 7.76122 16.2274 7.66678C15.9051 7.65566 15.7163 8.00566 15.8163 8.31677C15.9329 8.67233 15.9996 9.05011 15.9996 9.44455Z"
                        fill="black" />
                    </svg>
                  </span>
                </td>
              </tr> -->

            <?php

            }
            ?>
            <!-- <tr class="sms_mu_spacing_div"></tr> -->

          </table>
          <div class="sm-mu-buttons d-flex mb-4 justify-content-end">
            <?php
            $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $next_page = $current_page + 1;
            $prev_page = $current_page > 1 ? $current_page - 1 : 1;
            ?>
            <input type="radio" class="btn-check" name="btn-radio-dropdown" id="btn-radio-dropdown-1" autocomplete="off" onclick="window.location.href='?page=<?php echo $prev_page; ?>'">
            <label for="btn-radio-dropdown-1" type="button" class="btn">

              Back
            </label>
            <input type="radio" class="btn-check" name="btn-radio-dropdown" id="btn-radio-dropdown-2" autocomplete="off" onclick="window.location.href='?page=<?php echo $next_page; ?>'">
            <label for="btn-radio-dropdown-2" type="button" class="btn">

              Next
            </label>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade m-0" id="edit-modal-full-width" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4987D870">
        <div class="py-1 rounded-top text-center w-100">
          <span class="card-title text-black fs-2 fw-bold text-center d-flex justify-content-center m-0"><span class="m-0 card-title text-black fs-2 fw-bold text-center" data-i18n="popoups.transction_pop_popuop.order_detail.Order_detail">Order details</span> #<span id="order_id"></span></span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        include('view.php');
        ?>
      </div>

    </div>
  </div>
</div>
<script>
  window.addEventListener('load', function() {
    document.getElementById('loader').style.display = 'none';
  });
</script>
<script>
  const viewOrderDetailsButtons = document.querySelectorAll('.view_order_details');

  viewOrderDetailsButtons.forEach(button => {
    button.addEventListener('click', handleOrderDetailsClick);
  });

  function handleOrderDetailsClick(event) {
    const clickedButton = event.currentTarget; // Get the clicked element
    const transactionId = clickedButton.dataset.transactionId; // Access data attribute

    // Make an AJAX request to fetch data for the transaction ID
    fetch(`/transactions/${transactionId}`)
      .then(response => {
        if (response.ok) {
          return response.json(); // Parse response body as JSON
        } else {
          throw new Error('Failed to fetch order details');
        }
      })
      .then(data => {
        // Handle the retrieved data
        showtransactionData(data);
        // You can now use the data to populate a modal or display it in some way
      })
      .catch(error => {
        // Handle errors
        console.error('Error fetching order details:', error);
      });
  }
  // Function to set the color of status dynamically
  function setStatusColor() {
    // Get all elements with class 'status'
    let statuses = document.querySelectorAll('.sms_transaction_w_status');

    // Loop through each status element
    statuses.forEach(function(status) {
      // Get the text content of the status
      let statusText = status.textContent.trim().toLowerCase();

      // Set the color based on the status
      if (statusText === 'cancelled') {
        status.classList.add('sms_transaction_w_cancelled');
      } else if (statusText === 'completed') {
        status.classList.add('sms_transaction_w_approved');
      } else if (statusText === 'pending') {
        status.classList.add('sms_transaction_w_pending');
      }
    });
  }

  // Call the function to set status colors
  setStatusColor();


  // Function to add checkbox after each row container
  function addCheckboxAfterRows() {
    var rows = document.querySelectorAll(".table-responsive tbody tr");

    // Exclude the first row
    var firstRow = rows[0];
    var remainingRows = Array.from(rows).slice(1);

    remainingRows.forEach(function(row) {
      var rowContainer = row.parentElement;
      var rowCheckbox = document.createElement("input");
      rowCheckbox.type = "checkbox";
      rowCheckbox.classList.add("sms_transaction_w_row_checkbox");

      var container = document.createElement("div");
      container.classList.add("sms_transaction_w_row_container");
      container.appendChild(row);
      container.appendChild(rowCheckbox);

      rowContainer.appendChild(container);
    });
  }

  // Call the function to add checkboxes after each row container
  // addCheckboxAfterRows();


  document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('sms_customers_w_search_form');
    const searchInput = document.getElementById('sms_transaction_w_search_input');
    const transactionTable = document.getElementById('sms_transaction_w_transaction_table');

    searchForm.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form submission
      filterCustomers();
    });

    searchInput.addEventListener('input', function() {
      filterCustomers();
    });

    function filterCustomers() {
      const searchValue = searchInput.value.toLowerCase();
      const rows = transactionTable.querySelectorAll('tbody tr:not(.sms_mu_th)'); // Exclude the table header row

      rows.forEach(row => {
        let rowTextContent = row.textContent.toLowerCase();
        if (rowTextContent.includes(searchValue)) {
          row.style.display = ''; // Show the row
        } else {
          row.style.display = 'none'; // Hide the row
        }
      });
    }
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var dropdowns = document.querySelectorAll('.dropdown-tom-select-style');
    dropdowns.forEach(function(el) {
      var withInput = el.classList.contains('with-input');
      if (window.TomSelect) {
        new TomSelect(el, {
          copyClassesToDropdown: false,
          dropdownParent: 'body',
          controlInput: withInput ? '<input>' : false,
          render: {
            item: function(data, escape) {
              if (data.customProperties) {
                return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
              }
              return '<div>' + escape(data.text) + '</div>';
            },
            option: function(data, escape) {
              if (data.customProperties) {
                return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
              }
              return '<div>' + escape(data.text) + '</div>';
            },
          },
        });
        if (!withInput) {
          el.style.width = '100%'; // Set width to 100% for dropdowns without the 'with-input' class
          el.style.maxWidth = '100%'; // Set max-width to 100% for dropdowns without the 'with-input' class
        }
        el.classList.add('dropdown-tom-select-style');
      }
    });
  });
</script>
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
    setTimeout(function() {
      notificationElement.style.display = "none";
    }, 3000); // Hide notification after 3 seconds
  }
  $(document).ready(function() {
    // Event listener for checkbox changes
    $('input[type="checkbox"]').change(function() {
      // Handle checkbox change event here
      // You can track which rows are selected and perform actions accordingly
    });

    // Event listener for select changes
    $('#sms_m_form_select').change(function() {
      var selectedStatus = $(this).val();
      var selectedIds = [];

      // Gather IDs of selected rows
      $('input[type="checkbox"]:checked').each(function() {
        var id = $(this).closest('tr').find('#transaction_id').text();
        // Remove '#' from the id
        id = id.replace('#', '');
        selectedIds.push(id);
      });

      console.log(selectedIds);

      // Prepare data for POST request
      var data = {
        id: selectedIds,
        status: selectedStatus
      };

      // Make fetch request
      fetch('/transactions/update_bulk_status', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        })
        .then(response => {
          if (response.status === 200) {
            showNotification("Bulk status updated successfully");
            window.location.reload(); // Reload the page after successful update
          } else {
            showNotification("Failed to update bulk status", true);
          }
        })
        .catch(error => {
          // Handle error
          showNotification("Error occurred: " + error, true);
        });
    });
  });
</script>

<!-- Libs JS -->
<script src="./dist/libs/nouislider/dist/nouislider.min.js?1695847769" defer></script>
<script src="./dist/libs/litepicker/dist/litepicker.js?1695847769" defer></script>
<script src="./dist/libs/tom-select/dist/js/tom-select.base.min.js?1695847769" defer></script>
<?php
require_once __DIR__ . '/../partials/footer.php';

?>