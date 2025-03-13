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
                            <input type="text" name="otp" id="otp" class="form-control @error('otp') is-invalid @enderror" required placeholder="Enter OTP">
                            @error('otp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <div class="position-relative">
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required placeholder="Enter New Password">
                                <span class="eye-toggle" onclick="togglePassword('password')">
                                    <i class="la la-eye"></i>
                                </span>
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <div class="position-relative">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required placeholder="Confirm Password">
                                <span class="eye-toggle" onclick="togglePassword('password_confirmation')">
                                    <i class="la la-eye"></i>
                                </span>
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
  </script>
</body>
</html>
