
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign in - Store Management System</title>
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

        .error {
            color: red;
        }
    
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-2">
        <img src="../assets/static/logo_image.svg"  alt="Store Management System" >
        </div>
        <div class="card card-md" style="border-radius:20px;">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <p id="error-message" class="error"></p>

            <form action="/authentication/login" method="POST" autocomplete="off" novalidate>
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="your@email.com" autocomplete="off" tabindex="1">
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Password
                </label>
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
                <div class="input-group input-group-flat" id="password_div">
                    <input type="password" autocomplete="off" name="password" class="form-control" placeholder="Password - at least 6 characters" value="" id="password"  tabindex="2">
                    <span class="input-group-text">
                        <a class="link-secondary text-info" title="Show password" data-bs-toggle="tooltip" tabindex="3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                        </a>
                    </span>
                </div>
              </div>
              
              <div class="form-footer">
                <button type="submit" class="btn btn-info btn-pill w-100" tabindex="4">Sign in</button>
              </div>
            </form>
          </div>
        </div>
        <!-- <div class="text-center text-secondary mt-3">
          Don't have account yet? <a href="register" tabindex="-1">Sign up</a>
        </div> -->
      </div>
    </div>
    <script>
        // Function to get URL query parameters
        function getQueryParams() {
            const params = {};
            const queryString = window.location.search.substring(1);
            const queries = queryString.split('&');
            for (let i = 0; i < queries.length; i++) {
                const pair = queries[i].split('=');
                params[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1] || '');
            }
            return params;
        }

        // Function to display the error message
        function displayErrorMessage() {
            const params = getQueryParams();
            if (params.error) {
                const errorMessage = document.getElementById('error-message');
                document.getElementById('email').style.border='1px solid red';
                document.getElementById('password_div').style.border='1px solid red';


                errorMessage.textContent = params.error.replace(/\+/g, ' ');
            }
        }

        // Call the displayErrorMessage function when the page loads
        window.onload = displayErrorMessage;
    </script>
    <!-- Libs JS -->
    <script src="../asseets/dist/js/tabler.min.js?1695847769" defer></script>
    <script src="../asseets/dist/js/demo.min.js?1695847769" defer></script>
  </body>
</html>