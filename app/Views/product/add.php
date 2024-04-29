
    <style>
  .sms_select_produc_card{
    height: 200px !important;; 
    width:450px !important; 
    text-align:center;  
    border-radius: 20px !important;
    cursor: pointer;
  }
  @media screen and (max-width: 775px) {
        .sms_select_produc_card {
          width: 100% !important;
        }
        }
</style>
<div class="sms_customers_m container p-0 col-12">
  <div class="card border-0">
  <div class="card-body-rounded ">
    <div class="d-flex flex-column ">
        <h1 class="text-center">Choose the type of product</h1>
        <div class="d-flex justify-content-center gap-4 flex-md-row flex-column">
            <span onclick="openModal('sms_product_variation_modal')"  class="card  w-md-25 d-flex justify-content-center align-items-center sms_select_produc_card" style=" background-color:#4987D8; " >
            <div>
           <h2> A product with variations</h2>
            </div>
            </span>
            <span  onclick="openModal('sms_product_regular_modal')"  class="card  w-md-25  d-flex justify-content-center align-items-center sms_select_produc_card" style=" background-color:#afcaee; " >
        
            <div >
           <h2> normal product</h2>
            </div>
        </span>
         
        </div>
    </div>
  </div>
  </div>
</div>


<!-- add veriation product modal  -->
<div class="modal modal-blur fade" id="sms_product_variation_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header col-12 justify-content-center" style="background-color: #4987D870">
        <div class="py-1 rounded-top text-center">
          <h3 class="card-title m-0 text-black fs-2 fw-bold">Adding a new product and variations </h3>
        </div>
        <button type="button" class="btn-close sms_modal_cancel_btn" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
                <?php
                include ('add_forms/add_variation.php');
                ?>
            </div>

        </div>
    </div>
</div>



<!-- add regular product modal  -->
<div class="modal modal-blur fade" id="sms_product_regular_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header col-12 justify-content-center" style="background-color: #4987D870">
        <div class="py-1 rounded-top text-center col-10 ">
          <h3 class="card-title m-0 text-black fs-2 fw-bold">Adding a new regular product</h3>
        </div>
        <button type="button" class="btn-close sms_modal_cancel_btn" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
                <?php
                include ('add_forms/add_regular.php');
                ?>
            </div>

        </div>
    </div>
</div>

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
    modal.style.display = 'none';
    modal.classList.remove('show');
    modal.setAttribute('aria-modal', 'false');
    modal.setAttribute('aria-hidden', 'true');
  }
}

</script>
