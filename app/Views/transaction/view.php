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

  table {
    /* table-layout: fixed; */
    border-collapse: separate;
    border-spacing: 0 10px;
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
                  <h1 class="fs-3 fw-bold" data-i18n="popoups.transction_pop_popuop.order_detail.client_info">Customer details and shipping address</h1>
                  <div class="">
                    <span class="d-block mb-3 fw-bold "><span data-i18n="transction_page.transaction_tr.customer_name">Client's Name:</span>&nbsp; : &nbsp;<span class="fw-normal " id="client_first_name"></span>
                      <span class="fw-normal" id="client_last_name"></span></span>
                    <span class="d-block mb-3 fw-bold"><span data-i18n="transction_page.transaction_tr.Phone_Number">Phone Number:</span>&nbsp;: &nbsp;<span class="fs-4 fw-normal " id="customer_billing_phone"></span></span>
                    <span class="d-block mb-3 fw-bold "><span data-i18n="transction_page.transaction_tr.Email_address">Email Address:</span>&nbsp;:&nbsp; <span class="fw-normal " id="customer_billing_email"></span></span>
                  </div>
                </div>
                <div class="col-md-5 col-sm-12 mt-md-4">
                  <div class="bg-white py-3 px-4 rounded-4 sms_order_popup_a" style="height: 90%;">
                    <h1 class="fs-3 fw-bold" data-i18n="popoups.transction_pop_popuop.order_detail.card_adress.adress">
                      Shipping Address</h1>
                    <div>
                      <span class="d-block fw-bold" id="customer_billing_address"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 justify-content-center mt-3 ">
              <label for="statusSelect" class="form-label fs-3 fw-bold" data-i18n="popoups.transction_pop_popuop.order_detail.order_status">Change order status</label>
              <select class="form-select form-select-lg h-80" id="sms_mu_order_status" style="background-color:#f5f5f5;">
                <option value="completed" data-i18n="transction_page.status_tr.Complete">Complete</option>
                <option value="pending" data-i18n="transction_page.status_tr.In_Treatment">In Treatment</option>
                <option value="cancelled" data-i18n="transction_page.status_tr.Cancelled">Cancelled</option>

              </select>
            </div>
          </div>
          <!-- end header -->

          <!-- order detail start -->

          <div class="row mt-4 container-xl p-3 rounded-3 " style="background-color: #F5F5F5; flex-direction:row-reverse;">
            <div class="row justify-content-between">
              <div class="col-6 justify-content-end">
                <h4 class="mb-3 fs-3 fw-bold" data-i18n="popoups.transction_pop_popuop.order_detail.Order_detail">Order Details
                </h4>
              </div>
              <div class="d-flex flex-end col-6 justify-content-end">
                <h4 class="mb-3 fs-3 fw-bold" data-i18n="popoups.transction_pop_popuop.order_detail.card_order.total">Order date:
                </h4> &nbsp;
                <p class="mb-3" id="order_date"></p>
              </div>
            </div>
              <div class="col-md-4 rounded-4 bg-white mt-6 sms_order_popup_a">
                <div class="row">
                  <div class="col-md-12 text-end px-4 py-2">
                    <h3 data-i18n="popoups.transction_pop_popuop.order_detail.card_order.total_cost_product"></h3>
                    <!-- <h4 class="fs-2 fw-bold text-dark text-start"></h4> -->
                    <div class="text-end">
                      <!-- <h4 data-i18n="popoups.transction_pop_popuop.order_detail.card_order.product"></h4>
                      <h4 data-i18n="popoups.transction_pop_popuop.order_detail.card_order.delivery"></h4>
                      <h1 class="d-block mb-3 fw-bold text-dark" id="delivery_details"></h1>
                      <span class="d-block mb-3 fw-bold text-dark" id="total_amount" data-i18n="popoups.transction_pop_popuop.order_detail.card_order.total_cost"></span> 
                      -->


                      <h4>Products: <span id="products_cost"></span> <?php echo $currency[0]['symbol']; ?></h4>
                      <!-- <h4 id="delivery_cost"></h4> -->
                      <h4 class="d-block mb-3 fw-bold text-dark">Shipping: <span id="delivery_cost"></span> <?php echo $currency[0]['symbol']; ?></h4>
                      <h4 class="d-block mb-3 fw-bold text-dark"><span id="total_amount"></span> <?php echo $currency[0]['symbol']; ?></h4>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 ">
                <div class=" col-12">
                  <div class="table-responsive">
                    <table id="orderTable" class="table table-vcenter card-table">
                      <thead>
                        <tr class="t-head rounded-4 bg-transparent">
                          <th class="sms_order_popups_a" style="background-color: rgba(73, 135, 216, 0.44);" data-i18n="popoups.transction_pop_popuop.order_detail.th.item_name">Item name</th>
                          <th class="sms_order_popups_a" style="background-color: rgba(73, 135, 216, 0.44);" data-i18n="popoups.transction_pop_popuop.order_detail.th.cst">
                            Cost</th>
                          <th class="sms_order_popups_a" style="background-color: rgba(73, 135, 216, 0.44);" data-i18n="popoups.transction_pop_popuop.order_detail.th.amt">
                            Amount</th>
                          <th class="sms_order_popups_a" style="background-color: rgba(73, 135, 216, 0.44);" data-i18n="popoups.transction_pop_popuop.order_detail.th.total">
                            Total</th>
                        </tr>
                      </thead>
                      <tbody id="orderTable">

                        <!-- More rows can be dynamically added here -->
                        <!-- <tr class="mt-2 rounded-4" style="background-color: #EAEAEA">
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
                        </tr> -->
                        <!-- More rows can be dynamically added here -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>

          <!-- order detail end -->
          <!-- save button -->

          <div class="mt-4 ">
            <button type="button" style="background-color: rgba(73, 135, 216, 0.44); width: 100%; max-width: 200px;" id="set_order_detail" class="btn rounded-4 py-3 sms_mu_for_save_changes" data-i18n="popoups.transction_pop_popuop.order_detail.last_btn">Save
              changes</button>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
</div>


<script>
  function showtransactionData(transactionData) {

    transactions = transactionData.data;

    const order_status_select = document.getElementById("sms_mu_order_status");

    if (transactions.status == "completed") {
      order_status_select.value = "completed";
    } else if (transactions.status == "cancelled") {
      order_status_select.value = "cancelled";
    } else if (transactions.status == "processing") {
      order_status_select.value = "pending";
    } else if (transactions.status == "pending") {
      order_status_select.value = "pending";
    }


    // console.log("Order Details:", transactionData);


    // console.log(transactions.billing.first_name);


    document.getElementById("order_id").innerHTML = transactions.id;
    document.getElementById("client_first_name").innerHTML = transactions.billing.first_name;
    document.getElementById("client_last_name").innerHTML = transactions.billing.last_name;
    document.getElementById("customer_billing_phone").innerHTML = transactions.billing.phone;
    document.getElementById("customer_billing_email").innerHTML = transactions.billing.email;
    document.getElementById("customer_billing_address").innerHTML = transactions.billing.city + transactions.billing.address_1;
    document.getElementById("delivery_cost").innerHTML = transactions.shipping_total;

    // Using split method
    const datetimeStr = transactions.date_created;
    const dateStr = datetimeStr.split('T')[0];
    document.getElementById("order_date").innerHTML = dateStr;
    subTotal = transactions.total - transactions.shipping_total;
    // console.log(transactions.shipping_total);
    document.getElementById("total_amount").innerHTML = "Total Cost: " + transactions.total;


    const tableBody = document.getElementById('orderTable').querySelector('tbody');

    const orderProductsArray = transactions.line_items;
    // Clear existing rows if necessary
    tableBody.innerHTML = '';
    var ProductsPrice = 0;
    // Loop through each item and create a row
    orderProductsArray.forEach(item => {
      ProductsPrice = ProductsPrice + parseFloat(item.total);
      const row = document.createElement('tr');
      row.className = 'mt-2 rounded-4';
      row.style.backgroundColor = '#EAEAEA';

      row.innerHTML = `
      <td class="sms_order_popups_a bg-white">${item.name}</td>
      <td class="sms_order_popups_a bg-white">${item.price}</td>
      <td class="sms_order_popups_a bg-white">${item.total}</td>
      <td class="sms_order_popups_a bg-white">${item.quantity}</td>
    `;

      tableBody.appendChild(row);
    });

    document.getElementById("products_cost").innerHTML = ProductsPrice;


    // Extract shipping details from transaction data
    const shippingDetails = transactions.shipping_lines;

    // Get the element where delivery details will be appended
    const deliveryDetailsBody = document.getElementById("delivery_details");

    // Clear existing content if necessary
    deliveryDetailsBody.innerHTML = '';

    // Iterate over each shipping detail and create a span for each
    shippingDetails.forEach(item => {
      const deliveryRow = document.createElement('span');

      // Set the innerHTML of the span to the shipping method and total cost
      deliveryRow.innerHTML = `
    ${item.method_title}: NIS ${item.total}
  `;

      // Append the span to the delivery details container
      deliveryDetailsBody.appendChild(deliveryRow);
    });


  }
  $('.sms_mu_for_save_changes').click(function() {
    // var selectedStatus = $(this).val();
    var selectedStatus = document.getElementById("sms_mu_order_status").value;;
    var data = {
      status: selectedStatus
    };
    document.getElementById('ajaxloadingIndicator').style.display = 'flex';
    document.body.style.overflow = "hidden";
    // Make fetch request
    fetch('/transactions/update_status/' + transactions.id, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      })
      .then(response => {
        if (response.status === 200) {
          showNotification("Status updated successfully");
          window.location.reload(); // Reload the page after successful update
        } else {
          showNotification("Failed to update Status", true);
        }
      })
      .catch(error => {
        // Handle error
        showNotification("Error occurred: " + error, true);
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
    $('#set_order_detail').click(function() {

      let id = document.getElementById("order_id").innerHTML;
      let selectedStatus = document.getElementById("order_status_view").value;


      console.log(id);

      // Prepare data for POST request
      var data = {
        id: id,
        status: selectedStatus
      };
      document.getElementById('ajaxloadingIndicator').style.display = 'flex';
      document.body.style.overflow = "hidden";
      // Make fetch request
      fetch(`/transactions/update_status/${id}`, {
          method: 'PUT',
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script>
  $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
  })
</script>