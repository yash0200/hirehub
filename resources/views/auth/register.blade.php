<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register - HireHub</title>

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/hirehub-favicon.svg') }}" type="image/x-icon">
    <!-- <style>
        body {
            overflow: hidden;
            height: 100vh;
        }
    </style> -->

    <style>
        /* Candidate Default */
        .btn-style-seven {
            color: #34A853;
            background-color: #E1F2E5;
            border: none;
            padding: 15px 35px;
            font-size: 16px;
            border-radius: 8px;
            transition: 0.3s;
            cursor: pointer;
        }

        /* Employer Default */
        .btn-style-four {
            color: #34A853;
            background-color: #E1F2E5;
            border: none;
            padding: 15px 35px;
            font-size: 16px;
            border-radius: 8px;
            transition: 0.3s;
            cursor: pointer;
        }

        /* Active Button */
        .active-btn {
            background-color: #34A853 !important;
            color: #E1F2E5 !important;
        }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="page-wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader"></div> -->

        <!-- Main Header -->
        <header class="main-header">
            <div class="container-fluid">
                <div class="main-box">
                    <div class="nav-outer">
                        <div class="logo-box">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img style="height: 55px;width: 152px;" src="{{ asset('images/hirehub-logo-3.svg') }}" alt="Hirehub Logo"></a>
                            </div>
                        </div>
                    </div>
                    <div class="outer-box">
                        <div class="btn-box">
                            <a href="{{ url('/login') }}" class="theme-btn btn-style-three">Login</a>
                            <a href="{{ url('/post-job') }}" class="theme-btn btn-style-one"><span class="btn-title">Job Post</span></a>
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
                <!-- Register Form -->
                <div class="login-form default-form">
                    <div class="form-inner">
                        <h3>Create a Free HireHub Account</h3>

                        <!-- Registration Form -->
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group">
                                <div class="btn-box row">
                                    <div class="col-lg-6 col-md-12">
                                        <button type="button" class="theme-btn btn-style-seven active-btn" id="candidate-btn">
                                            <i class="la la-user"></i> Candidate
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <button type="button" class="theme-btn btn-style-four" id="employer-btn">
                                            <i class="la la-briefcase"></i> Employer
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" placeholder="Last Name" required>
                            </div>
                            <div class="form-group" id="company-field" style="display: none;">
                                <label>Company Name</label>
                                <input type="text" name="company_name" placeholder="Company Name">
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
                <!-- End Register Form -->
            </div>
        </div>
        <!-- End Info Section -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let candidateBtn = document.getElementById("candidate-btn");
            let employerBtn = document.getElementById("employer-btn");
            let companyField = document.getElementById("company-field");

            candidateBtn.addEventListener("click", function () {
                companyField.style.display = "none"; // Hide company name field

                // Apply active class
                candidateBtn.classList.add("active-btn");
                employerBtn.classList.remove("active-btn");
            });

            employerBtn.addEventListener("click", function () {
                companyField.style.display = "block"; // Show company name field

                // Apply active class
                employerBtn.classList.add("active-btn");
                candidateBtn.classList.remove("active-btn");
            });
        });
    </script>

</body>

</html>
