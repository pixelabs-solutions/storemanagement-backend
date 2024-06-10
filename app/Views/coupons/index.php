<?php
require_once __DIR__ . '/../partials/header.php';
// var_dump($coupons);


?>
<style>
  @media only screen and (max-width:1000px) {
    .sms_mu_table {
      width: 900px !important;
      border: 0 !important;
    }
  }

  svg {
    cursor: pointer;
  }

  .sms_customers_m,
  .sms_mu_table {
    background-color: #F2F2F2 !important;
  }

  /* body {
            background-color: #f2f2f2;
        } */
  .sms_mu_table {
    border-spacing: 0 10px !important;
    width: 100%;
    /* margin: 0 2% !important; */
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

  #sms_delete_notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 20px 20px;
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
    display: none;
  }

  #sms_delete_notification.show {
    display: block;
    animation: slideIn 0.5s forwards, fadeOut 2s 1s forwards;
  }

  @keyframes slideIn {
    from {
      transform: translateX(100%);
    }

    to {
      transform: translateX(0);
    }
  }

  @keyframes fadeOut {
    from {
      opacity: 1;
    }

    to {
      opacity: 0;
    }
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
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

#loader h1 {
    font-size: 1.5em;
    margin: 0;
    padding: 0;
}
</style>
<div class="sms_coupons_m  p-0">
<div id="loader">
    <div class="spinner"></div>
    <h1>Loading, please wait...</h1>
</div>
  <div id="sms_delete_notification"></div>

  <div class=" col-12 mt-5">
    <div class="row row-cards justify-content-sm-between gap-sm-3 gap-2 gap-lg-0 bg-white p-3 m-0 rounded-3">
      <div class=" col-lg-12 m-0 d-flex flex-column flex-sm-row justify-content-between ">
        <div class="card-body-rounded mb-3 mb-sm-0">
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
                <input type="text" id="sms_coupons_m_search_input" value="" class="form-control border-0 " placeholder="Coupon search" aria-label="Search in website">
              </div>
            </form>
          </div>

        </div>
        <div class="d-flex"><button class="rounded-4 border-0 p-2 sms_m_transaction_new_category" style="background-color:#4987D870; " data-bs-toggle="modal" data-bs-target="#add-modal-full-width" data-i18n="cupons_and_benifit.search_bar.add_new_coupon_btn">
            Added a new coupon +</button>
        </div>
      </div>
    </div>
    <div class="card-x mt-3">
      <div style="overflow-x: auto">
        <div class="table-responsive">
          <table class="sms_mu_table " id='sms_coupon_m_coupon_table'>
            <thead>
              <tr class="sms_mu_th">
                <th class="sms_mu_td" data-i18n="cupons_and_benifit.coupons_th.Coupon_Code_in_th">Coupon Code</th>
                <th class="sms_mu_td" data-i18n="cupons_and_benifit.coupons_th.coupon_type_in_th">coupon type</th>
                <th class="sms_mu_td" data-i18n="cupons_and_benifit.coupons_th.Discount_amount_in_th">Discount amount</th>
                <th class="sms_mu_td" data-i18n="cupons_and_benifit.coupons_th.Use_restriction_in_th">Use/restriction</th>
                <th class="sms_mu_td" data-i18n="cupons_and_benifit.coupons_th.Expiry_Date_in_th">Expiry Date</th>
                <th class="sms_mu_td" data-i18n="cupons_and_benifit.coupons_th.action_in_th">action</th>
              </tr>
              <tr class="sms_mu_spacing_div"></tr>

            </thead>
            <tbody>
              <?php
              if ($coupons !== null) {
                foreach ($coupons as $item) {
                  $expiry_date_string = $item['date_expires'];
                  $expiry_date_timestamp = strtotime($expiry_date_string);
                  $expiry_formatted_date = date("Y-m-d", $expiry_date_timestamp);

              ?>

                  <tr class="sms_mu_tr">
                    <td class="t_oravg_m">
                      <?php echo $item['code']; ?>
                    </td>
                    <td> <?php echo $item['discount_type']; ?></td>

                    <td><?php echo $item['amount']; ?></td>

                    <td><?php echo $item['usage_count'] . "/" . $item['usage_limit']; ?></td>

                    <td><?php echo $expiry_formatted_date; ?></td>

                    <!-- <td>#1152</td> -->
                    <td>
                      <div class="d-flex justify-content-center gap-4 w-auto">


                        <span class="" id="delete_coupon"  onclick="deleteCouponsParent(<?php echo $item['id']; ?>)" coupon_id="<?php echo $item['id']; ?>">
                          <svg width="24" height="24" viewBox="0 0 28 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.45 1.10625C8.7875 0.425 9.48125 0 10.2375 0H17.7625C18.5188 0 19.2125 0.425 19.55 1.10625L20 2H26C27.1063 2 28 2.89375 28 4C28 5.10625 27.1063 6 26 6H2C0.89375 6 0 5.10625 0 4C0 2.89375 0.89375 2 2 2H8L8.45 1.10625ZM2 8H26V28C26 30.2062 24.2062 32 22 32H6C3.79375 32 2 30.2062 2 28V8ZM8 12C7.45 12 7 12.45 7 13V27C7 27.55 7.45 28 8 28C8.55 28 9 27.55 9 27V13C9 12.45 8.55 12 8 12ZM14 12C13.45 12 13 12.45 13 13V27C13 27.55 13.45 28 14 28C14.55 28 15 27.55 15 27V13C15 12.45 14.55 12 14 12ZM20 12C19.45 12 19 12.45 19 13V27C19 27.55 19.45 28 20 28C20.55 28 21 27.55 21 27V13C21 12.45 20.55 12 20 12Z" fill="#A30505" />
                          </svg>
                        </span>
                        <span data-bs-toggle="modal" class="get-row-data-edit-coupon" id="edit_coupon" data-bs-target="#edit-modal-full-width" coupon_id="<?php echo $item['id']; ?>">
                          <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.475 1.35627C28.1063 -0.0124756 25.8937 -0.0124756 24.525 1.35627L22.6437 3.23127L28.7625 9.35003L30.6437 7.46877C32.0125 6.10002 32.0125 3.88752 30.6437 2.51877L29.475 1.35627ZM10.775 15.1063C10.3937 15.4875 10.1 15.9563 9.93125 16.475L8.08125 22.025C7.9 22.5625 8.04375 23.1563 8.44375 23.5625C8.84375 23.9688 9.4375 24.1063 9.98125 23.925L15.5312 22.075C16.0438 21.9063 16.5125 21.6125 16.9 21.2313L27.3563 10.7688L21.2313 4.64377L10.775 15.1063ZM6 4.00002C2.6875 4.00002 0 6.68752 0 10V26C0 29.3125 2.6875 32 6 32H22C25.3125 32 28 29.3125 28 26V20C28 18.8938 27.1063 18 26 18C24.8937 18 24 18.8938 24 20V26C24 27.1063 23.1063 28 22 28H6C4.89375 28 4 27.1063 4 26V10C4 8.89377 4.89375 8.00002 6 8.00002H12C13.1062 8.00002 14 7.10627 14 6.00002C14 4.89377 13.1062 4.00002 12 4.00002H6Z" fill="#4987D8" />
                          </svg>
                        </span>
                      </div>
                  </tr>
                  <tr class="sms_mu_spacing_div"></tr>

              <?php
                }
              }
              ?>
            </tbody>
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

<div class="modal modal-blur fade m-0" id="add-modal-full-width" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header col-12 justify-content-center" style="background-color: #4987D870">
        <div class="py-1 rounded-top text-center">
          <h3 class="card-title m-0 text-black fs-2 fw-bold" data-i18n="popoups.added_new_cupons.heading">Added a new coupon </h3>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        include('manage.php');
        ?>
      </div>

    </div>
  </div>
</div>


<!-- modadls start here  -->
<div class="modal modal-blur fade m-0" id="edit-modal-full-width" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header col-12 justify-content-center" style="background-color: #4987D870">
        <div class="py-1 rounded-top text-center col-10 ">
          <h3 class="card-title m-0 text-black fs-2 fw-bold" data-i18n="popoups.added_new_cupons.heading_edit">Editing an existing coupon</h3>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        include('edit.php');
        ?>
      </div>

    </div>
  </div>
</div>

<!-- edit Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content p-3 ">

      <div class="modal-body text-center">
        <p>Are you sure you want to delete the coupon?</p>
      </div>
      <div class="d-flex justify-content-between col-6 m-auto">
        <button type="button" class="btn  cancel-btn" data-dismiss="modal" style="background-color:#afcaee">Cancel</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>


<!--delete modal  -->
<div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->

      <div class="modal-body text-center py-3">
        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg> -->
        <h3 class="Sms_mu_for_Eng">Are you sure you want to delete the coupon?</h3>
        <h3 class="Sms_mu_for_hebrew">האם אתה בטוח שברצונך למחוק את הקופון?</h3>
        <!-- <div class="text-muted">Do you really want to remove 84 files? What you've done cannot be undone.</div> -->
      </div>
      <div class="p-3">
        <div class="w-100">
          <div class="row ">
            <div class="col Sms_mu_for_Eng"><a href="#" class="btn w-100" data-bs-dismiss="modal" style="background-color:#afcaee;">
                Cancel
              </a>
            </div>
            <div onclick="deleteCoupon('<?php echo $item['id']; ?>')" class="col Sms_mu_for_Eng"><a href="#" class="btn btn-danger w-100 " data-bs-dismiss="modal">
                Delete
              </a>
            </div>
            <div class="col Sms_mu_for_hebrew"><a href="#" class="btn w-100" data-bs-dismiss="modal" style="background-color:#afcaee;">
                לְבַטֵל
              </a>
            </div>
            <div onclick="deleteCoupon('<?php echo $item['id']; ?>')" class="col Sms_mu_for_hebrew"><a href="#" class="btn btn-danger w-100 " data-bs-dismiss="modal">
                לִמְחוֹק
              </a>
            </div>
        </div>
          </div>
        
      </div>
    </div>
  </div>
</div>

<script>

  function deleteCouponsParent(couponId) {
    fetch("/coupons/" + couponId, {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          id: couponId
        })
      })
      .then(response => {
        if (response.ok) {
          show_sms_delete_Notification("Coupon deleted successfully");
          window.location.reload(); // Reload the page after successful deletion
        } else {
          show_sms_delete_Notification("Failed to delete coupon", true);
        }
      })
      .catch(error => {
        show_sms_delete_Notification("Error occurred: " + error, true);
      });

    function show_sms_delete_Notification(message, isError = false) {
      const sms_delete_notification = document.getElementById("sms_delete_notification");
      sms_delete_notification.textContent = message;
      sms_delete_notification.className = isError ? "error show" : "show";
    }
  }
</script>

<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Select the trigger button
      var triggerButton = document.querySelector('.trigger-btn');

      // Select the modal
      var modal = document.getElementById('confirmModal');

      // Show the modal when trigger button is clicked
      triggerButton.addEventListener('click', function() {
        modal.style.display = 'block';
        modal.classList.add('show');
        modal.setAttribute('aria-modal', 'true');
        modal.setAttribute('aria-hidden', 'false');
      });

      // Hide the modal when the cancel button or close button is clicked
      var cancelButton = modal.querySelector('.cancel-btn');
      var closeButton = modal.querySelector('.close');

      cancelButton.addEventListener('click', closeModal);
      closeButton.addEventListener('click', closeModal);

      // Hide the modal when outside the modal is clicked
      modal.addEventListener('click', function(e) {
        if (e.target === modal) {
          closeModal();
        }
      });

      // Function to close the modal
      function closeModal() {
        modal.style.display = 'none';
        modal.classList.remove('show');
        modal.setAttribute('aria-modal', 'false');
        modal.setAttribute('aria-hidden', 'true');
      }
    });
  </script> -->

<script>
  // Function to set the color of status dynamically
  function setStatusColor() {
    // Get all elements with class 'status'
    let statuses = document.querySelectorAll('.sms_coupons_m_status');

    // Loop through each status element
    statuses.forEach(function(status) {
      // Get the text content of the status
      let statusText = status.textContent.trim().toLowerCase();

      // Set the color based on the status
      if (statusText === 'cancelled') {
        status.classList.add('sms_coupons_m_cancelled');
      } else if (statusText === 'completed') {
        status.classList.add('sms_coupons_m_approved');
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
      rowCheckbox.classList.add("sms_coupons_m_row_checkbox");

      var container = document.createElement("div");
      container.classList.add("sms_coupons_m_row_container");
      container.appendChild(row);
      container.appendChild(rowCheckbox);

      rowContainer.appendChild(container);
    });
  }

  // Call the function to add checkboxes after each row container
  // addCheckboxAfterRows();


  document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('sms_customers_w_search_form');
    const searchInput = document.getElementById('sms_coupons_m_search_input');
    const couponTable = document.getElementById('sms_coupon_m_coupon_table');

    searchForm.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form submission
      filterCustomers();
    });

    searchInput.addEventListener('input', function() {
      filterCustomers();
    });

    function filterCustomers() {
      const searchValue = searchInput.value.toLowerCase();
      const rows = couponTable.querySelectorAll('tbody tr:not(.sms_w_table_head)'); // Exclude the table header row

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
              window.addEventListener('load', function() {
        document.getElementById('loader').style.display = 'none';
    });

        </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script>
  $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
  })
</script>
<?php
require_once __DIR__ . '/../partials/footer.php';

?>