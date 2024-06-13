<style>
      #sms_delete_notification {
    position: fixed;
    z-index: 2000;
    top: 20px;
    right: 20px;
    padding: 20px 20px;
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
    display: none;
  }

  #sms_delete_notification .show {
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
</style>
<div class="page-body">
  <div id="sms_delete_notification"></div>
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="">

                    <!-- form start -->
                    <form action="" method="post" class="card-body">
                        <!-- header -->
                        <div class="row gx-3">
                            <div class="col-md-6 mb-3">
                                <label for="example-text-input fs-2 fw-bold" class="form-label fw-bold">Name of the
                                    Variation</label>
                                <input type="text" read class="form-control rounded-3 p-3" id="sms_mu_name_variation" style="background-color: #EAEAEA" placeholder="Pink">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-select fs-3 fw-bold" class="form-label fw-bold">Variation Price
                                </label>
                                <input type="number" class="form-control rounded-3 p-3" id="sms_mu_price_variation" style="background-color: #EAEAEA" placeholder="Pink">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="example-select fs-3 fw-bold" class="form-label fw-bold">Variation Inventory
                            </label>
                            <input type="number" class="form-control rounded-3 p-3" id="sms_mu_inventory_variation" style="background-color: #EAEAEA" placeholder="Pink">
                        </div>
                </div>
                </form>
                <div class="text-center mt-2 p-2  ">
                    <button type="submit" class="btn btn-primary col-12 col-md-12 rounded-4 py-3" data-i18n="inventtory_setting.fourth_row_with_check_box.quantity" onclick="fun_edit_variation()">To update
                        the term click here
                        +</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    function show_sms_delete_Notification(message, isError = false) {
      const sms_delete_notification = document.getElementById("sms_delete_notification");
      sms_delete_notification.textContent = message;
      sms_delete_notification.className = isError ? "error show" : "show";
    }

function fun_edit_variation() {
    let name = document.getElementById('sms_mu_name_variation').value;
    let price = document.getElementById('sms_mu_price_variation').value;
    let inventory = document.getElementById('sms_mu_inventory_variation').value;

    let data = {
        "name": name,
        "price": price,
        "inventory": inventory
    };
    
    // console.log(data); 

    const id = '1';
    const term_id = '12';
    const url = `/attributes/${id}/terms/${term_id}`;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (response.ok) {
            show_sms_delete_Notification("Term Edit Successfully");
            
          //will call the function to get latest terms again 
        } else {
            show_sms_delete_Notification("Failed To Edit Term", true);
        }
    })
    .catch(error => {
        show_sms_delete_Notification("Error occurred: " + error, true);
    })
  
}


   
</script>