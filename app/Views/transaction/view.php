<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />s
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
    .chosen-container-multi .chosen-choices{
        background-color: transparent !important;
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
                  <h1 class="fs-3 fw-bold">Client Information</h1>
                  <div class="">
                    <span class="d-block mb-3 fw-bold ">Client's name: <span class="fw-normal ">Eliyahu
                        Malka</span></span>
                    <span class="d-block mb-3 fw-bold ">Phone number: <span
                        class="fs-4 fw-normal ">054-6268012</span></span>
                    <span class="d-block mb-3 fw-bold ">Email address: <span
                        class="fw-normal ">elikako.m@gmail.com</span></span>
                  </div>
                </div>
                <div class="col-md-5 col-sm-12 mt-md-4">
                  <div class="bg-white py-3 px-4 rounded-4 sms_order_popup_a" style="height: 90%;">
                    <h1 class="fs-3 fw-bold">Shipping Address</h1>
                    <div>
                      <span class="d-block fw-bold">Kibbutz Galuyot 12, apartment 8, floor 10, Bnei Brak,</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 justify-content-center ">
              <label for="statusSelect" class="form-label fs-3 fw-bold">Change order status</label>
              <div class="h-70" style="background-color:#EAEAEA">
                <select data-placeholder="Begin typing a name to filter..." multiple
                  class="chosen-select col-12 w-100 py-5 bg-white" id="sms_mu_input_bg_select" name="test">
                  <option>Image</option>
                  <option>Color</option>
                </select>
              </div>
            </div>
          </div>
          <!-- end header -->

          <!-- order detail start -->
          <div class="row mt-4 container-xl" style="background-color: #F5F5F5;">
            <div class="col-md-8">

              <div class=" col-12">
                <div class="d-flex justify-content-between">
                  <h4 class="mb-3">Order Details</h4>
                  <h4 class="mb-3">Order date: 07/24/2024</h4>
                </div>
                <div class="table-responsive">
                  <table class="table table-vcenter card-table">
                    <tbody class="d-flex flex-column ts-text">
                      <tr class="t-head rounded-4" style="background-color: rgba(73, 135, 216, 0.44);">
                        <th class="sms_order_popups_a">Item name</th>
                        <th class="sms_order_popups_a">Cost</th>
                        <th class="sms_order_popups_a">Amount</th>
                        <th class="sms_order_popups_a">Total</th>
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
                  <h1 class="fs-2 fw-bold text-dark text-start">The total cost of the order</h1>
                  <div>
                    <span class="d-block mb-3 fw-semibold text-dark">Products: NIS 10,450 </span>
                    <span class="d-block mb-3 fw-semibold text-dark">Delivery up to 5 business days: NIS 39.9 </span>
                    <span class="d-block mb-3 fs-2 fw-bold text-dark">Total: NIS 10,499.9 </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- order detail end -->
          <!-- save button -->

          <div class="mt-4 ">
            <button type="submit" style="background-color: rgba(73, 135, 216, 0.44); width: 100%; max-width: 200px;"
              class="btn rounded-4 py-3">Save changes</button>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script>
  $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
  })
</script>