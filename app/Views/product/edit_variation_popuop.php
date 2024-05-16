<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="">

                    <!-- form start -->
                    <form action="" method="post" class="card-body">
                        <!-- header -->
                        <div class="row gx-3">
                            <div class="col-md-6 mb-3">
                                <label for="example-text-input fs-2 fw-bold" class="form-label">Name of the
                                    Variation</label>
                                <input type="text" read class="form-control rounded-3 p-3" id="sms_mu_name_variation" style="background-color: #EAEAEA" placeholder="Pink">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-select fs-3 fw-bold" class="form-label">Variation Price
                                </label>
                                <input type="number" class="form-control rounded-3 p-3" id="sms_mu_price_variation" style="background-color: #EAEAEA" placeholder="Pink">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="example-select fs-3 fw-bold" class="form-label">Variation Inventory
                            </label>
                            <input type="number" class="form-control rounded-3 p-3" id="sms_mu_inventory_variation" style="background-color: #EAEAEA" placeholder="Pink">
                        </div>
                </div>
                </form>
                <div class="text-center mt-2 p-2  ">
                    <button type="submit" class="btn btn-primary col-12 col-md-12 rounded-4 py-3" onclick="fun_edit_variation()">To update
                        the term click here
                        +</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function fun_edit_variation() {
        let name = document.getElementById('sms_mu_name_variation').value;
        let price = document.getElementById('sms_mu_price_variation').value;
        let inventory = document.getElementById('sms_mu_inventory_variation').value;
        let data = {
            "name": name,
            "price": price,
            "inventory": inventory
        }
        console.log(data)
    }
</script>