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
                  <h3>Admin Login</h3>
  
                  @if(session('error'))
                      <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif
  
                  <!-- Show Validation Errors -->
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
  
                  <form method="POST" action="{{ route('admin.login') }}">
                      @csrf
  
                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                      </div>
  
                      <div class="form-group">
                          <label>Password</label>
                          <input id="password-field" type="password" name="password" placeholder="Password" required>
                      </div>
  
                      <div class="form-group">
                          <div class="field-outer">
                              <div class="input-group checkboxes square">
                                  {{-- <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                  <label for="remember" class="remember">
                                      <span class="custom-checkbox"></span> Remember me
                                  </label> --}}
                              </div>
                              <a href="{{ url('/forgot-password') }}" class="pwd">Forgot password?</a>
                          </div>
                      </div>
  
                      <div class="form-group">
                          <button class="theme-btn btn-style-one" type="submit">Log In</button>
                      </div>
                  </form>
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
</body>

</html>