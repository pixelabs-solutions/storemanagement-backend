
  <div class="page page-center  ">
    <div class="container container-tight">
      <div class="text-center mb-2">
        <img src="../assets/static/logo_image.svg" alt="Store Management System">
      </div>
      <div class="row sms_mu_testing shadow" style="border-radius:20px;">
        <div class="col-12 bg-white shadow p-5 rounded-3" >
          <h2 class="h2 text-center mb-4">Register New User</h2>
          <form action="/authentication/register" method="POST" autocomplete="off" novalidate>
            <div class="mb-3">
              <label class="form-label">First Name</label>
              <input type="text" name="first_name" class="form-control" placeholder="Enter Your Name" autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label">Last Name</label>
              <input type="text" name="last_name" class="form-control" placeholder="Enter Your Last Name" autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label">Phone Number</label>
              <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number" autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="your@email.com" autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label"> Business Name</label>
              <input type="text" name="business_name" class="form-control" placeholder="Enter Your Bussines Name" autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter Your Password" autocomplete="off">
            </div>

            <input type="hidden" name="admin_register_user" value="true">
            <div class="form-footer">
              <button type="submit" class="btn btn-info btn-pill w-100">Sign in</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Libs JS -->
