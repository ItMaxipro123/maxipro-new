<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <!-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
  <link rel="icon" type="image/png" href="../assets/logo/logo-maxipro.png">
  <title>
    Login | PT. Maxipro Group Indonesia
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <style>
    .input-group-append {
      position: absolute;
      right: 10px;

      /* Sesuaikan jarak dari kanan */
      top: 70%;
      transform: translateY(-50%);
    }
  </style>
</head>

<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
              Login - Maxipro
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <!-- <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Dashboard
                  </a>
                </li> -->
                <!-- <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/profile.html">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Profile
                  </a>
                </li> -->
                <!-- <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-up.html">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Sign Up
                  </a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-in.html">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Login
                  </a>
                </li>
              </ul>
              <!-- <ul class="navbar-nav d-lg-flex d-none">
                <li class="nav-item d-flex align-items-center">
                  <a class="btn btn-outline-primary btn-sm mb-0 me-2" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-material-dashboard">Online Builder</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/product/material-dashboard" class="btn btn-sm mb-0 me-1 bg-gradient-dark">Free download</a>
                </li>
              </ul> -->
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('../assets/logo/bg-login.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-secondary shadow-dark border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                  <div class="row mt-3">
                    <div class="col-12 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <!-- <i></i> -->
                        <img src="../assets/logo/logo_maxipro_text.png" width="170px" height="50px">
                      </a>
                    </div>
                    <!-- <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="card-body">
              <form role="form" method="POST" action="{{ route('proses_login') }}" class="text-start" id="loginForm">
                  @csrf
                  
                  <div class="input-group input-group-outline my-3 position-relative">
                    <label class="form-label" for="username" id="usernameLabel">Username</label>
                    <input type="text" class="form-control" id="username" name="username" oninput="checkInput(this)" onclick="hideLabel('usernameLabel')">
                  </div>

                  <div class="input-group input-group-outline mb-3 position-relative">
                    <label class="form-label" for="password" id="passwordLabel">Password</label>
                    <input type="password" class="form-control" name="password" id="password" oninput="checkInput(this)" onclick="hideLabel('passwordLabel')">
                    <div class="input-group-append" style="padding: 0; margin: 0;">
                      <button class="btn btn-outline-secondary btn-sm" type="button" onclick="togglePasswordVisibility('password')" style="padding: 0.25rem 0.5rem;">
                        <i id="togglePasswordIcon" class="fa fa-eye-slash" style="font-size: 14px;"></i>
                      </button>
                    </div>
                  </div>

                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-secondary shadow-dark w-100 my-4 mb-2">Sign in</button>
                  </div>
            
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="	fas fa-building" aria-hidden="true"></i> by
                <a href="" class="font-weight-bold text-white" target="_blank">Maxipro</a>

              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-white" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-white" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    // Handle form submission
    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault(); // Prevent the form from submitting normally
            
            // Perform AJAX request to submit the form data
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
              
                success: function(response) {
                    // console.log("Response Data:", response);
                    // If login is successful, show success swal fire
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful!',
                        text: 'Halaman akan berpindah.',
                        showConfirmButton: false,
                        timer: 2000
                    }).then((result) => {
                        // Redirect to dashboard or desired page after success
                        // window.location.href = '{{ route('admin.dashboard') }}'; // Change the URL as needed
                        window.location.href = '{{ route('admin.dashboard') }}'; // Change the URL as needed
                      });
                },
                error: function(xhr, status, error) {
                  console.log("Status:", status);

                  Swal.fire({
                  icon: 'error',
                  title: 'Login Failed!',
                  text: 'Username ataupun password salah. coba lagi',
                  showConfirmButton: false,
                  timer: 1500
              });
                }
            });
        });
    });
</script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    function checkInput(input) {
      var label = document.getElementById(input.id + 'Label');
      if (input.value.trim() !== "") {
        label.style.fontSize = '0.75rem';
        label.style.display = "none";
        label.style.color = '#495057';
      } else {
        label.style.fontSize = '';
        label.style.display = 'block';
        label.style.transform = 'translateY(-20%)';
        label.style.color = '#6c757d';
        label.style.left = '15px';
      }
    }

    // function hideLabel(labelId) {
    //   var label = document.getElementById(labelId);
    //   label.style.display = 'none';
    // }

    function hideLabel(idLabel) {
      var label = document.getElementById(idLabel);

      label.style.display = 'none';
    }

    function showLabel(labelId) {
      var label = document.getElementById(labelId);
      label.style.display = 'block';
      label.style.transform = 'translateY(-20%)';
      label.style.left = '15px';
    }

    function togglePasswordVisibility(inputId) {
      var passwordInput = document.getElementById(inputId);
      var togglePasswordIcon = document.getElementById('togglePasswordIcon');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePasswordIcon.className = 'fa fa-eye';
      } else {
        passwordInput.type = 'password';
        togglePasswordIcon.className = 'fa fa-eye-slash';
      }
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>