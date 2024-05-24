<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign-up - - Store Management System</title>
   <!-- CSS files -->
   <link href="../assets/dist/css/tabler.min.css?1695847769" rel="stylesheet"/>
    <link href="../assets/dist/css/tabler-flags.min.css?1695847769" rel="stylesheet"/>
    <link href="../assets/dist/css/tabler-payments.min.css?1695847769" rel="stylesheet"/>
    <link href="../assets/dist/css/tabler-vendors.min.css?1695847769" rel="stylesheet"/>
    <link href="../assets/dist/css/demo.min.css?1695847769" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1695847769"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
      <div class="text-center mb-2">
        <img src="../assets/static/logo_image.svg"  alt="Store Management System" >
        </div>
        <form class="card card-md" style="border-radius:20px;" action="/authentication/register" method="post" autocomplete="off" novalidate>
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input name="name" type="text" class="form-control" placeholder="Enter name">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input name="email" type="email" class="form-control" placeholder="Enter email">
            </div>
            <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var passwordInput = document.querySelector('input[name="password"]');
                        var eyeIcon = document.querySelector('.input-group-text .icon');
                        eyeIcon.addEventListener('click', function() {
                        if (passwordInput.type === 'password') {
                            passwordInput.type = 'text';
                        } else {
                            passwordInput.type = 'password';
                        }
                        });
                    });
                </script>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control" name="password" placeholder="Password"  autocomplete="off">
                <span class="input-group-text">
                  <a href="#" class="link-secondary text-info" title="Show password" data-bs-toggle="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-check">
                <input type="checkbox" class="form-check-input"/>
                <span class="form-check-label">Agree the <a href="#" tabindex="-1">terms and policy</a>.</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-info btn-pill w-100">Create new account</button>
            </div>
          </div>
        </form>
        <div class="text-center text-secondary mt-3">
          Already have account? <a href="login" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <script src="../asseets/dist/js/tabler.min.js?1695847769" defer></script>
    <script src="../asseets/dist/js/demo.min.js?1695847769" defer></script>
  </body>
</html>