<?php
// var_dump($attributes);

?>
<style>
  @media only screen and (max-width:1000px) {
    .sms_mu_table {
      width: 900px !important;
      border: 0 !important;
    }
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
    height: 40px;
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

</style>



<div class="sms_customers_m  p-2 col-12">
  <div class=" col-12">
    <div class="row row-cards justify-content-sm-between gap-sm-3 gap-2 gap-lg-0 bg-white p-3 m-0 rounded-3">
      <div class="col-sm-12 col-lg-12 m-0 d-flex flex-column flex-sm-row gap-sm-0 gap-2 justify-content-between ">
        <div class="card-body-rounded ">
          <div>
            <form action="./" method="get" autocomplete="off" novalidate id="sms_feature_w_search_form">
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
                <input type="text" id="sms_feature_m_search_input" value="" class="form-control border-0 "
                  placeholder="Search Attribute" aria-label="Search in website">
              </div>
            </form>
          </div>

        </div>
        <div class="d-flex gap-2">
          <!-- <a href="add_feature.php"> -->
          <button class="rounded-4 border-0 p-2 " onclick="openModal('sms_category_w_add_term_modal')"
            style="background-color:#4987D870;" data-i18n="popoups.future_managment.feature_btn">Added new feature
            +</button>
          <!-- </a> -->
          <!-- <a href="add_new_term.php"> -->
          <button class="rounded-4 border-0 p-2" style="background-color:#4987D870; "
            onclick="openModal('sms_category_w_add_feature_modal')" data-i18n="popoups.future_managment.term_btn">Adding
            a new term +</button>
          <!-- </a> -->
        </div>


      </div>
    </div>
    <div class="card-x mt-3">
      <div style="overflow-x: auto">
        <div class="table-responsive">
          <table class="sms_mu_table" id="sms_feature_m_feature_table">
            <thead>
              <tr class="sms_mu_th sms_w_table_head_feature">
                <th class="sms_mu_td" data-i18n="popoups.future_managment.th_in_feture.th_action">action</th>
                <th class="sms_mu_td" data-i18n="popoups.future_managment.th_in_feture.th_type">Name</th>
                <th class=".sms_mu_th" data-i18n="popoups.future_managment.th_in_feture.th_product">Display Type</th>
                <!-- <th class="sms_mu_td" data-i18n="popoups.future_managment.th_in_feture.th_term">associated feature</th>
                <th class="sms_mu_td" data-i18n="popoups.future_managment.th_in_feture.th_name_term">the name of the term </th>
                <th class="sms_mu_td" data-i18n="popoups.future_managment.th_in_feture.th_color">Image/color</th> -->

              </tr>
              <tr class="sms_mu_spacing_div"></tr>

            </thead>
            <tbody>
              <?php

              foreach ($attributes as $attribute) {

                ?>
                <tr class="sms_mu_tr">
                  <td>
                    <div class="d-flex justify-content-center gap-2 w-auto">


                      <span class="edit_attribute" attribute-id=<?php echo $attribute['id']; ?>       onclick="editAttribute(this)">

                        <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M29.475 1.35627C28.1063 -0.0124756 25.8937 -0.0124756 24.525 1.35627L22.6437 3.23127L28.7625 9.35003L30.6437 7.46877C32.0125 6.10002 32.0125 3.88752 30.6437 2.51877L29.475 1.35627ZM10.775 15.1063C10.3937 15.4875 10.1 15.9563 9.93125 16.475L8.08125 22.025C7.9 22.5625 8.04375 23.1563 8.44375 23.5625C8.84375 23.9688 9.4375 24.1063 9.98125 23.925L15.5312 22.075C16.0438 21.9063 16.5125 21.6125 16.9 21.2313L27.3563 10.7688L21.2313 4.64377L10.775 15.1063ZM6 4.00002C2.6875 4.00002 0 6.68752 0 10V26C0 29.3125 2.6875 32 6 32H22C25.3125 32 28 29.3125 28 26V20C28 18.8938 27.1063 18 26 18C24.8937 18 24 18.8938 24 20V26C24 27.1063 23.1063 28 22 28H6C4.89375 28 4 27.1063 4 26V10C4 8.89377 4.89375 8.00002 6 8.00002H12C13.1062 8.00002 14 7.10627 14 6.00002C14 4.89377 13.1062 4.00002 12 4.00002H6Z"
                            fill="#4987D8" />
                        </svg>
                      </span>

                      <span attribute-id=<?php echo $attribute['id']; ?> onclick="delete_attribute(<?php echo $attribute['id']; ?>)">


                        <svg width="24" height="24" viewBox="0 0 28 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M8.45 1.10625C8.7875 0.425 9.48125 0 10.2375 0H17.7625C18.5188 0 19.2125 0.425 19.55 1.10625L20 2H26C27.1063 2 28 2.89375 28 4C28 5.10625 27.1063 6 26 6H2C0.89375 6 0 5.10625 0 4C0 2.89375 0.89375 2 2 2H8L8.45 1.10625ZM2 8H26V28C26 30.2062 24.2062 32 22 32H6C3.79375 32 2 30.2062 2 28V8ZM8 12C7.45 12 7 12.45 7 13V27C7 27.55 7.45 28 8 28C8.55 28 9 27.55 9 27V13C9 12.45 8.55 12 8 12ZM14 12C13.45 12 13 12.45 13 13V27C13 27.55 13.45 28 14 28C14.55 28 15 27.55 15 27V13C15 12.45 14.55 12 14 12ZM20 12C19.45 12 19 12.45 19 13V27C19 27.55 19.45 28 20 28C20.55 28 21 27.55 21 27V13C21 12.45 20.55 12 20 12Z"
                            fill="#A30505" />
                        </svg>
                      </span>
                    </div>

                  </td>
                  <td class="sms_mu_td">
                    <?php echo $attribute['name']; ?>
                  </td>
                  <td> <?php echo $attribute['type']; ?></td>



                </tr>
                <!-- <td>atif colors</td>
                <td>#pink</td>
                <td><svg width="74" height="54" viewBox="0 0 105 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="105" height="57" rx="20" fill="#F51975" />
                  </svg>
                </td> -->
              <?php
              }
              ?>
              <tr class="sms_mu_spacing_div"></tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>


</script>




<!-- add term modal  -->
<div class="modal modal-blur fade" id="sms_category_w_add_term_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header col-12 justify-content-center" style="background-color: #4987D870">
        <div class="py-1 rounded-top text-center col-10 ">
          <h3 class="card-title m-0 text-black fs-2 fw-bold"
            data-i18n="popoups.future_managment.add_new_feature.heading">Added a new feature</h3>
        </div>
        <button type="button" class="btn-close sms_modal_cancel_btn" data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        include ('add_feature.php');
        ?>
      </div>

    </div>
  </div>
</div>



<!-- add feature modal  -->
<div class="modal modal-blur fade" id="sms_category_w_add_feature_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header col-12 justify-content-center" style="background-color: #4987D870">
        <div class="py-1 rounded-top text-center col-10 ">
          <h3 class="card-title m-0 text-black fs-2 fw-bold" data-i18n="popoups.future_managment.add_new_term.heading">
            Adding a new term </h3>
        </div>
        <button type="button" class="btn-close sms_modal_cancel_btn" data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        include ('add_term.php');
        ?>
      </div>

    </div>
  </div>
</div>


<!-- edit modal  -->
<div class="modal modal-blur fade" id="sms_feature_managment_w_edit_modal" tabindex="-1" role="dialog"
  aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header col-12 justify-content-center" style="background-color: #4987D870">
        <div class="py-1 rounded-top text-center col-10 ">
          <h3 class="card-title m-0 text-black fs-2 fw-bold"
            data-i18n="popoups.future_managment.edit_variation_in_product_managment.heading">Editing an Attributes</h3>
        </div>
        <button type="button" class="btn-close sms_modal_cancel_btn" data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        include ('edit_feature.php');
        ?>
      </div>

    </div>
  </div>
</div>



<!--delete modal  -->
<div class="modal modal-blur fade" id="sms_feature_managment_w_delete_modal" tabindex="-1" role="dialog"
  aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content p-3 ">

      <div class="modal-body text-center">
        <p class="Sms_mu_for_Eng">Are you sure you want to delete the term?</p>
        <p class="Sms_mu_for_hebrew">האם אתה בטוח שברצונך למחוק את המונח?</p>
      </div>
      <div class="d-flex justify-content-between col-6 m-auto">
        <button type="button" class="btn Sms_mu_for_Eng  cancel-btn sms_modal_cancel_btn" data-dismiss="modal"
          style="background-color:#afcaee">Cancel</button>
        <button type="button" class="btn Sms_mu_for_hebrew cancel-btn sms_modal_cancel_btn" data-dismiss="modal"
          style="background-color:#afcaee">לְבַטֵל</button>
        <button type="button" class="btn btn-danger Sms_mu_for_Eng">Delete</button>
        <button type="button" class="btn btn-danger Sms_mu_for_hebrew">לִמְחוֹק</button>
      </div>
    </div>
  </div>
</div>


<script>


  function deleteCategory(categoryId) {
    console.log("Deleting category with ID: " + categoryId);
    fetch("/categories/" + categoryId, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        id: categoryId
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
      const sms_delete_notification = document.getElementById("sms_delete_notification_ctg");
      sms_delete_notification.textContent = message;
      sms_delete_notification.className = isError ? "error show" : "show";
    }
  }

  function delete_attribute(AttributeID) {
    alert("Are you sure you want to delete Attribute");
    // Show the loading indicator
    document.getElementById('ajaxloadingIndicator').style.display = 'flex';
    document.body.style.overflow = "hidden";
    document.getElementById('modal-large').style.overflow = 'hidden';

    
    // Define the endpoint URL with the attribute ID
    const url = `/attributes/${AttributeID}`;

    // Send a DELETE request to the server
    fetch(url, {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then(response => {
        if (response.ok) {
          // If response is ok (status is in the range 200-299), parse the JSON
          return response;
        } else {
          // If response is not ok, throw an error to be caught in the catch block
          return response.text().then(text => { throw new Error(text); });
        }
      })
      .then(data => {
        // Handle success response
        console.log(data);
        alert('Attribute Deleted successfully!');
        location.reload()
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }
  // Function to open the modal
  function openModal(modalId) {
    // Select the modal using the provided ID
    var modal = document.getElementById(modalId);

    // Show the modal
    modal.style.display = 'block';
    modal.classList.add('show');
    modal.setAttribute('aria-modal', 'true');
    modal.setAttribute('aria-hidden', 'false');

    // Hide the modal when the cancel button or close button is clicked
    var cancelButton = modal.querySelector('.sms_modal_cancel_btn');
    cancelButton.addEventListener('click', closeModal);

    // Hide the modal when outside the modal is clicked
    modal.addEventListener('click', function (e) {
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
  }


  // filter table 

  document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.getElementById('sms_feature_w_search_form');
    const searchInput = document.getElementById('sms_feature_m_search_input');
    const couponTable = document.getElementById('sms_feature_m_feature_table');

    searchForm.addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent form submission
      filterCustomers();
    });

    searchInput.addEventListener('input', function () {
      filterCustomers();
    });

    function filterCustomers() {
      const searchValue = searchInput.value.toLowerCase();
      const rows = couponTable.querySelectorAll('tbody tr:not(.sms_w_table_head_feature)'); // Exclude the table header row

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