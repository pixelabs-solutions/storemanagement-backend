<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
<style>
  @import url('https://rsms.me/inter/inter.css');

  :root {
    --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
  }

  body {
    font-feature-settings: "cv03", "cv04", "cv11";
  }

  .rtl {
    direction: rtl;
  }

  .rtl .avatar {
    margin-left: 10px;
  }

  .sms_order_popup_a {
    background-color: #F5F5F5;
    /* height: 200px; */
  }

  .sms_order_popups_a {
    white-space: nowrap;
  }

  .sms_order_popups_a {
    width: 36%;
  }

  .sms_order_popup_a {
    height: 20%;
  }

  /* Mobile-responsive queries */
  @media (max-width: 768px) {
    .sms_order_popups_a {
      width: 100%;
      /* Set full width for smaller screens */
    }
  }

  @media (max-width: 576px) {
    .sms_order_popups_a {
      white-space: nowrap;
    }
  }

  .chosen-container-multi {
    width: 100% !important;
    /* padding: 3%; */
    height: 20% !important;
    /* background-color: #fff; */
  }

  tr {
    padding: 5px 0;
  }

  .chosen-choices {
    background-color: none !important;
    background-image: none !important;
    background-image: none !important;
    padding: 14px 15px !important;
  }

  .chosen-container.chosen-with-drop .chosen-drop {
    margin-top: 10px !important;
    border: none !important;
  }

  .chosen-container.chosen-with-drop .chosen-drop ul li {
    padding: 10px !important;
  }

  .chosen-container-multi ul {
    height: 100% !important;
    border-radius: 5px;
  }

  /* .chosen-container-multi .chosen-choices */
  .chosen-container-multi .chosen-choices {
    background-color: transparent !important;
  }

  tbody,
  td,
  tfoot,
  th,
  thead,
  tr {
    border-color: inherit !important;
    border-style: solid !important;
    border-width: 0 !important;
  }
</style>

<div class="container-lg">
  <div class="row justify-content-center">
    <div class="col-12 col-md-12">
      <div class="">


        <div class="card-body">
          <!-- header start  -->
          <div class="row">
            <div class="col-md-8 rounded-4 sms_order_popup_a">
              <div class="row">
                <div class="col-md-7 rounded-4 ">
                  <h1 class="fs-3 fw-bold" data-i18n="popoups.transction_pop_popuop.order_detail.client_info">Client
                    Information</h1>
                  <div class="">
                    <span class="d-block mb-3 fw-bold "
                      data-i18n="popoups.transction_pop_popuop.order_detail.Cl_name">Client's name: <span
                        class="fw-normal ">Eliyahu
                        Malka</span></span>
                    <span class="d-block mb-3 fw-bold "
                      data-i18n="popoups.transction_pop_popuop.order_detail.Pone">Phone number: <span
                        class="fs-4 fw-normal ">054-6268012</span></span>
                    <span class="d-block mb-3 fw-bold "
                      data-i18n="popoups.transction_pop_popuop.order_detail.mail">Email address: <span
                        class="fw-normal ">elikako.m@gmail.com</span></span>
                  </div>
                </div>
                <div class="col-md-5 col-sm-12 mt-md-4">
                  <div class="bg-white py-3 px-4 rounded-4 sms_order_popup_a" style="height: 90%;">
                    <h1 class="fs-3 fw-bold" data-i18n="popoups.transction_pop_popuop.order_detail.card_adress.adress">
                      Shipping Address</h1>
                    <div>
                      <span class="d-block fw-bold"
                        data-i18n="popoups.transction_pop_popuop.order_detail.card_adress.adress_detail">Kibbutz Galuyot
                        12, apartment 8, floor 10, Bnei Brak,</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 justify-content-center mt-3 ">
              <label for="statusSelect" class="form-label fs-3 fw-bold"
                data-i18n="popoups.transction_pop_popuop.order_detail.order_status">Change order status</label>
              <select class="form-select form-select-lg h-80" style="background-color:#f5f5f5;">
                <option value="HTML">Standard</option>
                <option value="Jquery">Order</option>
              </select>
            </div>
          </div>
          <!-- end header -->

          <!-- order detail start -->
          <div class="row mt-4 container-xl p-3 rounded-md align-items-end" style="background-color: #F5F5F5;">
            <div class="col-md-8">

              <div class=" col-12">
                <div class="d-flex justify-content-between">
                  <h4 class="mb-3" data-i18n="popoups.transction_pop_popuop.order_detail.Order_detail">Order Details
                  </h4>
                  <h4 class="mb-3">Order date: 07/24/2024</h4>
                </div>
                <div class="table-responsive">
                  <table class="table table-vcenter card-table">
                    <tbody class="d-flex flex-column ts-text">
                      <tr class="t-head rounded-4" style="background-color: rgba(73, 135, 216, 0.44);">
                        <th class="sms_order_popups_a"
                          data-i18n="popoups.transction_pop_popuop.order_detail.th.item_name">Item name</th>
                        <th class="sms_order_popups_a" data-i18n="popoups.transction_pop_popuop.order_detail.th.cst">
                          Cost</th>
                        <th class="sms_order_popups_a" data-i18n="popoups.transction_pop_popuop.order_detail.th.amt">
                          >Amount</th>
                        <th class="sms_order_popups_a" data-i18n="popoups.transction_pop_popuop.order_detail.th.total">
                          >Total</th>
                      </tr>
                      <!-- More rows can be dynamically added here -->
                      <tr class="mt-2 rounded-4" style="background-color: #EAEAEA">
                        <td class="sms_order_popups_a">Samsung Galaxy S24</td>
                        <td class="sms_order_popups_a">4,500 NIS</td>
                        <td class="sms_order_popups_a">250 NIS</td>
                        <td class="sms_order_popups_a">15</td>
                      </tr>
                      <tr class="mt-2 rounded-4" style="background-color: #EAEAEA">
                        <td class="sms_order_popups_a">Samsung Galaxy S24</td>
                        <td class="sms_order_popups_a">4,500 NIS</td>
                        <td class="sms_order_popups_a">250 NIS</td>
                        <td class="sms_order_popups_a">15</td>
                      </tr>
                      <tr class="mt-2 rounded-4" style="background-color: #EAEAEA">
                        <td class="sms_order_popups_a">Samsung Galaxy S24</td>
                        <td class="sms_order_popups_a">4,500 NIS</td>
                        <td class="sms_order_popups_a">250 NIS</td>
                        <td class="sms_order_popups_a">15</td>
                      </tr>
                      <tr class="mt-2 rounded-4" style="background-color: #EAEAEA">
                        <td class="sms_order_popups_a">Samsung Galaxy S24</td>
                        <td class="sms_order_popups_a">4,500 NIS</td>
                        <td class="sms_order_popups_a">250 NIS</td>
                        <td class="sms_order_popups_a">15</td>
                      </tr>
                      <!-- More rows can be dynamically added here -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-4 rounded-4 bg-white mt-6 sms_order_popup_a">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="fs-2 fw-bold text-dark text-start"
                    data-i18n="popoups.transction_pop_popuop.order_detail.card_order.total_cost">The total cost of the
                    order</h1>
                  <div>
                    <span class="d-block mb-3 fw-semibold text-dark"
                      data-i18n="popoups.transction_pop_popuop.order_detail.card_order.total_product">Products: NIS
                      10,450 </span>
                    <span class="d-block mb-3 fw-semibold text-dark"
                      data-i18n="popoups.transction_pop_popuop.order_detail.card_order.delivery">Delivery up to 5
                      business days: NIS 39.9 </span>
                    <span class="d-block mb-3 fs-2 fw-bold text-dark"
                      data-i18n="popoups.transction_pop_popuop.order_detail.card_order.total">Total: NIS 10,499.9
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- order detail end -->
          <!-- save button -->

          <div class="mt-4 ">
            <button type="submit" style="background-color: rgba(73, 135, 216, 0.44); width: 100%; max-width: 200px;"
              class="btn rounded-4 py-3" data-i18n="popoups.transction_pop_popuop.order_detail.last_btn">Save
              changes</button>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
</div>


<script>

  // const clickedSpan = document.querySelector('#view_order_details'); // Assuming the span triggers the modal

  // clickedSpan.addEventListener('click', () => {
  //   const clickedSpanId = clickedSpan.dataset.transactionId; // Use data-transaction-id attribute

  //   // Initialize a variable to hold the order data
  //   var selectedOrder = null;

  //   // Iterate through the orders array to find the order with the matching ID
  //   for (var i = 0; i < transaction.length; i++) {
  //     if (transaction[i].id === clickedSpanId) {
  //       selectedOrder = transaction[i];
  //       break; // Exit the loop once the matching order is found
  //     }
  //   }

  //   // Now selectedOrder contains the data of the order with the matching ID
  //   console.log(selectedOrder);
  // });


  // const viewOrderDetailsButton = document.querySelector('.view_order_details');

  // viewOrderDetailsButton.addEventListener('click', handleOrderDetailsClick);

  // function handleOrderDetailsClick(event) {
  //   const clickedButton = event.currentTarget; // Get the clicked element
  //   const transactionId = clickedButton.dataset.transactionId; // Access data attribute

  //   // Use the transactionId value as needed
  //   console.log("Transaction ID:", transactionId);
  //   // You can perform actions like opening a modal or making an AJAX request
  // }


</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script>
  $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
  })
</script>