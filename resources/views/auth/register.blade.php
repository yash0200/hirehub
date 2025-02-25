<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Register-HireHub')</title>

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
                    <div class="outer-box">
                        <!-- Login/Register -->
                        <div class="btn-box">
                            <a href="{{ url('/login') }}" class="theme-btn btn-style-three">Login</a>
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
                <!-- Register Form -->
                <div class="login-form default-form">
                    <div class="form-inner">
                        <h3>Create a Free Hirehub Account</h3>

                        <!-- Registration Form -->
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group">
                                <div class="btn-box row">
                                    <div class="col-lg-6 col-md-12">
                                        <a href="#" class="theme-btn btn-style-seven"><i class="la la-user"></i> Candidate </a>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <a href="#" class="theme-btn btn-style-four"><i class="la la-briefcase"></i> Employer </a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input id="password-field" type="password" name="password" placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-one" type="submit">Register</button>
                            </div>
                        </form>

                        <div class="bottom-box">
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
                <!--End Register Form -->
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