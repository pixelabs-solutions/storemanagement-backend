<!-- 
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
  .sms_mu_table {
    border-spacing: 0 10px !important;
    width: 96%;
    margin: 0 2% !important;
  }

  .sms_mu_thead,
  .sms_mu_tr,
  .sms_mu_td {
    text-align: center;
  }

  .sms_mu_tr{
    background-color: white !important;
    height: 50px;
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

  .sms_mu_th{
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
</style> -->
<div class="sms_customers_m  p-2 col-12">
  <div class=" col-12 sms_customers_m_main_box ">
    <div class="row row-cards justify-content-sm-between gap-sm-3 gap-2 gap-lg-0 bg-white p-3 m-0 rounded-3">
      <div class=" col-lg-12 m-0 d-flex flex-md-row flex-column gap-md-0 gap-2 justify-content-between ">
        <div class="card-body-rounded ">
          <div>
            <form action="./" method="get" autocomplete="off" novalidate id="sms_customers_w_search_form">
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
                <input type="text" id="sms_coupons_m_search_input" value="" class="form-control border-0 " placeholder="Category search"
                  aria-label="Search in website">
              </div>
            </form>
          </div>

        </div>
     
          <button class="rounded-4 border-0 p-2" style="background-color:#4987D870; "  onclick="openModal('sms_category_w_add_modal')"  data-i18n="popoups.add_new_catageory.catageory_btn">Added a new category +</button>
        
      </div>
    </div>
    <div class="card-x mt-3">
      <div style="overflow-x: auto ">
        <!-- <div class="table-responsive sms_customers_m_table_box">
          <table class="table table-vcenter card-table">



              <tr class="t-head">
                <th> action</th>
                <th>Quantity of products</th>
                <th>Parent category </th>
                <th>The name of the category</th>
                <th>Image</th>

              </tr>
        



              <tbody class="sms_customers_m_table_body">

              <tr>
                <td>
                  <div class="d-flex gap-2 w-auto">

                    <a href="editing_category.php">
                      <span class="">

                        <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M29.475 1.35627C28.1063 -0.0124756 25.8937 -0.0124756 24.525 1.35627L22.6437 3.23127L28.7625 9.35003L30.6437 7.46877C32.0125 6.10002 32.0125 3.88752 30.6437 2.51877L29.475 1.35627ZM10.775 15.1063C10.3937 15.4875 10.1 15.9563 9.93125 16.475L8.08125 22.025C7.9 22.5625 8.04375 23.1563 8.44375 23.5625C8.84375 23.9688 9.4375 24.1063 9.98125 23.925L15.5312 22.075C16.0438 21.9063 16.5125 21.6125 16.9 21.2313L27.3563 10.7688L21.2313 4.64377L10.775 15.1063ZM6 4.00002C2.6875 4.00002 0 6.68752 0 10V26C0 29.3125 2.6875 32 6 32H22C25.3125 32 28 29.3125 28 26V20C28 18.8938 27.1063 18 26 18C24.8937 18 24 18.8938 24 20V26C24 27.1063 23.1063 28 22 28H6C4.89375 28 4 27.1063 4 26V10C4 8.89377 4.89375 8.00002 6 8.00002H12C13.1062 8.00002 14 7.10627 14 6.00002C14 4.89377 13.1062 4.00002 12 4.00002H6Z"
                            fill="#4987D8" />
                        </svg>
                      </span>
                    </a>
                    <span class="trigger-btn">


                      <svg width="24" height="24" viewBox="0 0 28 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M8.45 1.10625C8.7875 0.425 9.48125 0 10.2375 0H17.7625C18.5188 0 19.2125 0.425 19.55 1.10625L20 2H26C27.1063 2 28 2.89375 28 4C28 5.10625 27.1063 6 26 6H2C0.89375 6 0 5.10625 0 4C0 2.89375 0.89375 2 2 2H8L8.45 1.10625ZM2 8H26V28C26 30.2062 24.2062 32 22 32H6C3.79375 32 2 30.2062 2 28V8ZM8 12C7.45 12 7 12.45 7 13V27C7 27.55 7.45 28 8 28C8.55 28 9 27.55 9 27V13C9 12.45 8.55 12 8 12ZM14 12C13.45 12 13 12.45 13 13V27C13 27.55 13.45 28 14 28C14.55 28 15 27.55 15 27V13C15 12.45 14.55 12 14 12ZM20 12C19.45 12 19 12.45 19 13V27C19 27.55 19.45 28 20 28C20.55 28 21 27.55 21 27V13C21 12.45 20.55 12 20 12Z"
                          fill="#A30505" />
                      </svg>
                    </span>
                  </div>

                </td>
                <td>Eliyahu Malka</td>
                <td>24/07/2024</td>
                <td>
                  <span class=" sms_customers_m_status">
                    Cancelled

                  </span>

                </td>

                <td class="t_oravg_m">
                  <img src="dist/img/test_img.png" alt="" height="30px" width="30px">
                </td>
              </tr>


            </tbody>
          </table>
      

      
          <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
              <div class="modal-content p-3 ">

                <div class="modal-body text-center">
                  <p>Are you sure you want to delete the coupon?</p>
                </div>
                <div class="d-flex justify-content-between col-6 m-auto">
                  <button type="button" class="btn  cancel-btn" data-dismiss="modal"
                    style="background-color:#afcaee">Cancel</button>
                  <button type="button" class="btn btn-danger">Delete</button>
                </div>
              </div>
            </div>
          </div>

        </div> -->
        <table class="sms_mu_table" id="sms_category_m_category_table">
          <thead>
            <tr class="sms_mu_th">
              <th data-i18n="popoups.add_new_catageory.th_in_catageory.th_img" class="sms_mu_td">image</th>
              <th class="sms_mu_td"data-i18n="popoups.add_new_catageory.th_in_catageory.th_catageory">The name of the category</th>
              <th class="sms_mu_td"data-i18n="popoups.add_new_catageory.th_in_catageory.th_parent">Parent category</th>
              <th class="sms_mu_td"data-i18n="popoups.add_new_catageory.th_in_catageory.th_quantity">Quantity of products</th>
              <th class="sms_mu_td"data-i18n="popoups.add_new_catageory.th_in_catageory.th_img"></th>

              <!-- <th>source</th> -->

            </tr>
            <tr class="sms_mu_spacing_div"></tr>

          </thead>
          <tbody>
            <tr class="sms_mu_tr">
              <td class="t_oravg_m">
                <img src="assets/dist/img/test_img.png" alt="" height="30px" width="30px">
              </td>
              <td>nooob chain</td>
              <td>special designs</td>
              <td>45</td>
              <!-- <td>#1152</td> -->
              <td>
                <div class="d-flex justify-content-center gap-2 w-auto">

                  <!-- <a href="editing_category.php"> -->
                    <span  onclick="openModal('sms_category_w_edit_modal')">

                      <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M29.475 1.35627C28.1063 -0.0124756 25.8937 -0.0124756 24.525 1.35627L22.6437 3.23127L28.7625 9.35003L30.6437 7.46877C32.0125 6.10002 32.0125 3.88752 30.6437 2.51877L29.475 1.35627ZM10.775 15.1063C10.3937 15.4875 10.1 15.9563 9.93125 16.475L8.08125 22.025C7.9 22.5625 8.04375 23.1563 8.44375 23.5625C8.84375 23.9688 9.4375 24.1063 9.98125 23.925L15.5312 22.075C16.0438 21.9063 16.5125 21.6125 16.9 21.2313L27.3563 10.7688L21.2313 4.64377L10.775 15.1063ZM6 4.00002C2.6875 4.00002 0 6.68752 0 10V26C0 29.3125 2.6875 32 6 32H22C25.3125 32 28 29.3125 28 26V20C28 18.8938 27.1063 18 26 18C24.8937 18 24 18.8938 24 20V26C24 27.1063 23.1063 28 22 28H6C4.89375 28 4 27.1063 4 26V10C4 8.89377 4.89375 8.00002 6 8.00002H12C13.1062 8.00002 14 7.10627 14 6.00002C14 4.89377 13.1062 4.00002 12 4.00002H6Z"
                          fill="#4987D8" />
                      </svg>
                    </span>
                  <!-- </a> -->
                  <span   onclick="openModal('sms_category_w_delete_modal')">


                    <svg width="24" height="24" viewBox="0 0 28 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M8.45 1.10625C8.7875 0.425 9.48125 0 10.2375 0H17.7625C18.5188 0 19.2125 0.425 19.55 1.10625L20 2H26C27.1063 2 28 2.89375 28 4C28 5.10625 27.1063 6 26 6H2C0.89375 6 0 5.10625 0 4C0 2.89375 0.89375 2 2 2H8L8.45 1.10625ZM2 8H26V28C26 30.2062 24.2062 32 22 32H6C3.79375 32 2 30.2062 2 28V8ZM8 12C7.45 12 7 12.45 7 13V27C7 27.55 7.45 28 8 28C8.55 28 9 27.55 9 27V13C9 12.45 8.55 12 8 12ZM14 12C13.45 12 13 12.45 13 13V27C13 27.55 13.45 28 14 28C14.55 28 15 27.55 15 27V13C15 12.45 14.55 12 14 12ZM20 12C19.45 12 19 12.45 19 13V27C19 27.55 19.45 28 20 28C20.55 28 21 27.55 21 27V13C21 12.45 20.55 12 20 12Z"
                        fill="#A30505" />
                    </svg>
                  </span>
                </div>

              </td>
            </tr>
            <tr class="sms_mu_spacing_div"></tr>
         
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- edit modal  -->
<div class="modal modal-blur fade" id="sms_category_w_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content ">
        <div class="modal-header col-12 justify-content-center" style="background-color: #4987D870">
        <div class="py-1 rounded-top text-center col-10 ">
          <h3 class="card-title m-0 text-black fs-2 fw-bold">Editing a category</h3>
        </div>
        <button type="button" class="btn-close sms_modal_cancel_btn" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
                <?php
                include ('edit.php');
                ?>
            </div>

        </div>
    </div>
</div>

<!-- add modal  -->
<div class="modal modal-blur fade" id="sms_category_w_add_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content ">
        <div class="modal-header col-12 justify-content-center" style="background-color: #4987D870">
        <div class="py-1 rounded-top text-center">
          <h3 class="card-title m-0 text-black fs-2 fw-bold">Added a new category</h3>
        </div>
        <button type="button" class="btn-close sms_modal_cancel_btn" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
                <?php
                include ('add.php');
                ?>
            </div>

        </div>
    </div>
</div>

<!--delete modal  -->
<div class="modal modal-blur fade" id="sms_category_w_delete_modal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
              <div class="modal-content p-3 ">

                <div class="modal-body text-center">
                  <p>Are you sure you want to delete the category?</p>
                </div>
                <div class="d-flex justify-content-between col-6 m-auto">
                  <button type="button" class="btn  cancel-btn sms_modal_cancel_btn" data-dismiss="modal"
                    style="background-color:#afcaee">Cancel</button>
                  <button type="button" class="btn btn-danger">Delete</button>
                </div>
              </div>
            </div>
          </div>
<!-- </body> -->


<script>

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
    console.log("Modal closed")
    modal.style.display = 'none';
    modal.classList.remove('show');
    modal.setAttribute('aria-modal', 'false');
    modal.setAttribute('aria-hidden', 'true');
  }
}



// filter rows 

document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.getElementById('sms_customers_w_search_form');
    const searchInput = document.getElementById('sms_coupons_m_search_input');
    const couponTable = document.getElementById('sms_category_m_category_table');

    searchForm.addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent form submission
      filterCustomers();
    });

    searchInput.addEventListener('input', function () {
      filterCustomers();
    });

    function filterCustomers() {
      const searchValue = searchInput.value.toLowerCase();
      const rows = couponTable.querySelectorAll('tbody tr:not(.sms_mu_th)'); // Exclude the table header row

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





<!-- <script src="./dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>
    <script src="./dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062" defer></script>
    <script src="./dist/libs/jsvectormap/dist/maps/world.js?1684106062" defer></script>
    <script src="./dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062" defer></script> -->
<!-- Tabler Core -->
<!-- <script src="./dist/js/tabler.min.js?1684106062" defer></script>
    <script src="./dist/js/demo.min.js?1684106062" defer></script>
</html> -->