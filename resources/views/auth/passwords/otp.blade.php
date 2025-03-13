{{-- resources/views/auth/passwords/otp.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP - HireHub</title>

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/hirehub-favicon.svg') }}" type="image/x-icon">
</head>
<body>
  <div class="page-wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader"></div> -->

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
    </header>
    <!-- End Main Header -->

    <!-- Info Section -->
    <div class="login-section">
        <div class="image-layer" style="background-image: url('{{ asset('images/background/12.jpg') }}');"></div>
        <div class="outer-box">
            <!-- OTP Form -->
            <div class="login-form default-form">
                <div class="form-inner">
                    <h3>Enter the OTP</h3>

                    <!-- Display error message -->
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- OTP Form -->
                    <form method="POST" action="{{ route('password.reset') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="form-group">
                            <label for="otp">OTP</label>
                            <input type="text" name="otp" id="otp" class="form-control" required placeholder="Enter OTP">
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" id="password" class="form-control" required placeholder="Enter New Password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required placeholder="Confirm Password">
                        </div>

                        <div class="form-group">
                            <button class="theme-btn btn-style-one" type="submit">Reset Password</button>
                        </div>
                    </form>

                    <div class="bottom-box">
                        <div class="text">Go back to <a href="{{ route('password.request') }}">Forgot Password?</a></div>
                    </div>
                </div>
            </div>
            <!-- End OTP Form -->
        </div>
    </div>
    <!-- End Info Section -->

  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script>
      setTimeout(function() {
          document.querySelectorAll('.alert').forEach(alert => alert.style.display = 'none');
      }, 5000);
  </script>
</body>
</html>
