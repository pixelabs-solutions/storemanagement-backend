<?php
require_once __DIR__ . '/../partials/header.php';

$customers = $customers['data'];

//  var_dump($customers);

//  echo $transactions;

?>
<!-- <style>
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
    height: 50px;
  }
  .rtl td:first-child {
    /* border-left-style: solid; */
    border-top-right-radius: 20px !important;
    border-top-left-radius: 20px !important;
    border-bottom-right-radius: 20px !important;
  }
   .rtl rtl td:last-child {
    /* border-right-style: solid; */
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;
  }

   .rtl th:first-child {
    /* border-left-style: solid; */
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
  }

   .rtl th:last-child {
    /* border-right-style: solid; */
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;
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
    border-collapse: separate;
    /* table-layout: fixed; */
    width: 100%;
    border-spacing: 0 14px !important;
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


  .sms_mu_th {
    background-color: #a8c3e7 !important;
    height: 50px;
  }

  tbody,
  td,
  tfoot,
  th,
  thead,
  tr {
    border-color: inherit;
    border-style: none !important;
    border-width: 0;
  }

  td:first-child {
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
  }

  td:last-child {
    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
  }

  th:first-child {
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
  }

  th:last-child {
    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
  }


  .table-spacing {
    border-spacing: 5px;
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
<div class="sms_customers_m  p-0">
<div id="loader">
    <div class="spinner"></div>
    <h1>Loading, please wait...</h1>
</div>
  <div class=" col-12 mt-5">
    <div class="row row-cards justify-content-sm-between gap-sm-3 gap-2 gap-lg-0 bg-white p-3 m-0 rounded-3">
      <div class="col-sm-5 col-lg-3 m-0 ">
        <div class="card-body-rounded">
          <div>
            <form id="sms_customers_m_search_form" action="./" method="get" autocomplete="off" novalidate>
              <div class="input-icon border-bottom border-black">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                  </svg>
                </span>
                <input type="text" id="sms_customers_m_search_input" value="" class="form-control border-0 " placeholder="Customer search" aria-label="Search in website">
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
    <div class="card-x mt-3">
      <div style="overflow-x: auto overflow-y-scroll" style="height: 570px;">

        <table class="sms_mu_table sms_customers_m_customer_table">
          <thead>
            <tr class="sms_mu_th">
              <th data-i18n="customer_page.customer_th.customer_name" class="sms_mu_td">Customer's name </th>
              <th data-i18n="customer_page.customer_th.dates_name" class="sms_mu_td">Date of last order </th>
              <th data-i18n="customer_page.customer_th.mails_name" class="sms_mu_td">mail address</th>
              <th data-i18n="customer_page.customer_th.number_name" class="sms_mu_td">Number of orders </th>
              <th data-i18n="customer_page.customer_th.total_name" class="sms_mu_td">Total</th>
              <th data-i18n="customer_page.customer_th.order_name" class="sms_mu_td">Order average</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($customers as $item) {
            ?>
              <tr class="sms_mu_tr">

                <td class="t_oravg_m">
                  <?php if (!isset($item['customer_name']) || trim($item['customer_name']) == "") {
                    echo "Customer Name is not Set";
                  } else {
                    echo htmlspecialchars($item['customer_name'], ENT_QUOTES, 'UTF-8');
                  }  ?>

                </td>
                <td><?php if (!isset($item['date_of_last_order']) || trim($item['date_of_last_order']) == "") {
                      echo "No order placed by this Customer";
                    } else {
                      echo $item['date_of_last_order'];
                    }  ?> </td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['number_of_orders']; ?></td>
                <td>
                  <?php echo $item['total_amount']; ?> <?php echo CURRENT_CURRENCY; ?> 
                </td>
                <td><?php echo $item['average_order_cost']; ?> <?php echo CURRENT_CURRENCY; ?></td>
              </tr>


            <?php
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
                              <label for="btn-radio-dropdown-1" type="button" class="btn fs-2">
                              &#60;
                              </label>
                              <input type="radio" class="btn-check " name="btn-radio-dropdown" id="btn-radio-dropdown-2" autocomplete="off" onclick="window.location.href='?page=<?php echo $next_page; ?>'">
                              <label for="btn-radio-dropdown-2" type="button" class="btn fs-2">
                              &#62;
                              </label>
</div>



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
  // document.addEventListener('DOMContentLoaded', function() {
  //   const searchForm = document.getElementById('sms_customers_m_search_form');
  //   const searchInput = document.getElementById('sms_customers_m_search_input');
  //   const customerTable = document.getElementById('sms_customers_m_customer_table');

  //   searchForm.addEventListener('submit', function(event) {
  //     event.preventDefault(); // Prevent form submission
  //     filterCustomers();
  //   });

  //   searchInput.addEventListener('input', function() {
  //     filterCustomers();
  //   });

  //   function filterCustomers() {
  //     const searchValue = searchInput.value.toLowerCase();
  //     const rows = customerTable.querySelectorAll('tbody tr:not(.sms_mu_table)'); // Exclude the table header row

  //     rows.forEach(row => {
  //       let rowTextContent = row.textContent.toLowerCase();
  //       if (rowTextContent.includes(searchValue)) {
  //         row.style.display = ''; // Show the row
  //       } else {
  //         row.style.display = 'none'; // Hide the row
  //       }
  //     });
  //   }
  // });

document.getElementById('sms_customers_m_search_input').addEventListener('keyup', function() {
  var filterValue = this.value.toLowerCase();
  var rows = document.querySelectorAll('tbody tr');
  var anyVisible = false;

  rows.forEach(function(row) {
    var customerNameCell = row.querySelector('td:nth-child(1)');
    var customerName = customerNameCell ? customerNameCell.textContent.toLowerCase() : '';

    if (customerName.includes(filterValue)) {
      row.style.display = '';
      anyVisible = true;
    } else {
      row.style.display = 'none';
    }
  });

  if (!anyVisible) {
    rows.forEach(function(row) {
      row.style.display = 'none';
    });
  }
});
</script>


<?php
require_once __DIR__ . '/../partials/footer.php';
?>