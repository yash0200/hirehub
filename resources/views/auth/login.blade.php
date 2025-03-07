<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>@yield('title', 'Login-HireHub')</title>

  <!-- Stylesheets -->
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('images/hirehub-favicon.svg') }}" type="image/x-icon">
  <style>
        body {
            overflow: hidden;
            height: 100vh;
        }
      .position-relative {
        position: relative;
      }
    
      .eye-toggle {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #777;
      }
    
      .eye-toggle:hover {
        color: #333;
      }
    
    </style>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    <header class="main-header">
    <div class="container-fluid">
                <!-- Main box -->
                <div class="main-box">
                    <!--Nav Outer -->
                    <div class="nav-outer">
                        <div class="logo-box">
                            <div class="logo"><a href="{{ url('/') }}"><img style="height: 55px;width: 152px;" src="{{ asset('images/hirehub-logo-3.svg') }}" alt="Hirehub Logo"></a></div>
                        </div>
                    </div>
                    <div class="outer-box">
                        <!-- Login/Register -->
                        <div class="btn-box">
                            <a href="{{ url('/register') }}" class="theme-btn btn-style-three">Register</a>
                            <a href="{{ url('/post-job') }}" class="theme-btn btn-style-one"><span class="btn-title">Job Post</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Header -->
            <div class="mobile-header">
                <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('images/logo.svg') }}" alt="Hirehub Logo"></a></div>

                <!--Nav Box-->
                <div class="nav-outer clearfix">
                    <div class="outer-box">
                        <!-- Login/Register -->
                        <div class="login-box">
                            <a href="{{ url('/login') }}" class="call-modal"><span class="icon-user"></span></a>
                        </div>
                        <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
                    </div>
                </div>
            </div>

      <!-- Mobile Nav -->
      <div id="nav-mobile"></div>
    </header>
    <!--End Main Header -->

    <!-- Info Section -->
    <div class="login-section">
      <div class="image-layer" style="background-image: url('{{ asset('images/background/12.jpg') }}');"></div>
      <div class="outer-box">
        <!-- Login Form -->
        <div class="login-form default-form">
          <div class="form-inner">
            <h3>Login to Hirehub</h3>

            <!-- Display error message here -->
            @if (session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
             @endif
             @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!--Login Form-->
            <form method="post" action="{{ route('login') }}">
              @csrf
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" required>
              </div>

              <div class="form-group">
                <label>Password</label>
                <div class="position-relative">
                <input type="password" name="password" id="password" class="form-control"
                  placeholder="Enter New Password">
                <span class="eye-toggle" onclick="togglePassword('password')">
                  <i class="la la-eye"></i>
                </span>
                </div>
              </div>

              <div class="form-group">
                <div class="field-outer">
                  <div class="input-group checkboxes square">
                    <input type="checkbox" name="remember-me" id="remember">
                    <label for="remember" class="remember"><span class="custom-checkbox"></span> Remember me</label>
                  </div>
                  <a href="{{ url('/forgot-password') }}" class="pwd">Forgot password?</a>
                </div>
              </div>

              <div class="form-group">
                <button class="theme-btn btn-style-one" type="submit">Log In</button>
              </div>
            </form>

            <div class="bottom-box">
              <div class="text">Don't have an account? <a href="{{ url('/register') }}">Signup</a></div>
              <div class="divider"><span>or</span></div>
              <div class="btn-box row">
                <div class="col-lg-6 col-md-12">
                  <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> Log In via Facebook</a>
                </div>
                <div class="col-lg-6 col-md-12">
                  <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via Gmail</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--End Login Form -->
      </div>
    </div>
    <!-- End Info Section -->

  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/chosen.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/jquery.modal.min.js') }}"></script>
    <script src="{{ asset('js/mmenu.polyfills.js') }}"></script>
    <script src="{{ asset('js/mmenu.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/anm.min.js') }}"></script>
    <script src="{{ asset('js/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('js/rellax.min.js') }}"></script>
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
      function togglePassword(fieldId) {
        let inputField = document.getElementById(fieldId);
        let eyeIcon = inputField.nextElementSibling.querySelector('i');

        if (inputField.type === "password") {
          inputField.type = "text";
          eyeIcon.classList.remove("la-eye");
          eyeIcon.classList.add("la-eye-slash");
        } else {
          inputField.type = "password";
          eyeIcon.classList.remove("la-eye-slash");
          eyeIcon.classList.add("la-eye");
        }
      }
          setTimeout(function() {
              document.querySelectorAll('.alert').forEach(alert => alert.style.display = 'none');
          }, 5000);
    </script>
</body>

</html>