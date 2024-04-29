<?php
                    require_once __DIR__ . '/../partials/header.php';

?>
<style>
    .form-switch .form-check-input{
        background-size: 26px;
        height: 26px !important;
        width: 45px !important;
    }
    .form-check-input{
        cursor: pointer !important;
    }
</style>
<div class=" bg-white position-relative mt-5 p-3">
    <div class="mt-5 p-2">
        <h2>General inventory settings</h2>
        <div class="row mt-5">
            <div class="rounded-3 d-flex  py-3 justify-content-between align-items-center col-sm-4"
                style="background-color: #EAEAEA">
                <div>
                    <p class="fs-3 p-0 m-0 align-items-center fw-bold">Enabling inventory management</p>
                </div>
                <div class="form-check form-switch m-0">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault2">
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 d-flex gap-2 py-3 rounded-3 justify-content-between  mt-4"
                style="background-color: #EAEAEA">
                <p class="fs-3 m-0 p-0 fw-semibold">Activating an alert when stock is low</p>
                <div class="form-check form-switch m-0">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault2">
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex gap-2 py-3 px-2 rounded-3 justify-content-between  mt-4"
                    style="background-color: #EAEAEA">
                    <p class="fs-3 m-0 p-0  fw-semibold">Activate out of stock alert</p>
                    <div class="form-check form-switch m-0">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault3">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <h2>Email address to receive notifications..</h2>
            <div class="row">
                <input class="col-lg-12 border-0 rounded-3 py-3 m-0 p-3 form-control" style="background-color: #EAEAEA"
                    type="text" placeholder="Email Adress">
            </div>
        </div>
        <div class="row mt-5 gap-0">
            <div class="col-md-6">
                <h2>Threshold quantity for low stock</h2>
                <input class="border-0 rounded-2 py-3 m-0 p-3 form-control" style="background-color: #EAEAEA"
                   type="number" placeholder="10">
            </div>
            <div class="col-md-6">
                <h2 class="">Threshold quantity out of stock</h2>
                <input class="border-0 rounded-2 py-3 m-0 p-3 form-control" style="background-color: #EAEAEA"
                    type="number" placeholder="10">
            </div>
        </div>
        <div class="row mt-5 justify-content-end ">
            <div type="submit"
                class="rounded-3 rounded-4 d-flex gap-2 border-0  justify-content-center align-items-center last w-auto"
                style="background: rgba(73, 135, 216, 0.44);">
                <p class="fs-2 py-3 m-0 align-items-center fw-bold">Updating and saving inventory settings →</p>
                </div>

        </div>
    </div>
</div>

<?php
                    require_once __DIR__ . '/../partials/footer.php';

?>