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

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="login-section">
        <div class="image-layer" style="background-image: url('{{ asset('images/background/12.jpg') }}');"></div>
        <div class="outer-box">
            <!-- Forgot Password Form -->
            <div class="login-form default-form">
                <div class="form-inner">
                    <h3>Forgot Password</h3>

                    <!-- Display error message -->
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

                    <form method="post" action="{{ route('send.otp') }}">
                    @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter your registered email" required>
                        </div>

                        <div class="form-group">
                            <button class="theme-btn btn-style-one" type="submit">Send OTP</button>
                        </div>
                    </form>
                    <div class="bottom-box">
                        <div class="text">Go back to <a href="{{ route('login') }}">Login?</a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>