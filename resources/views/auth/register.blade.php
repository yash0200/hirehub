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
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="user_type" id="user_type" value="{{ old('user_type', 'candidate') }}">


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

                            <!-- Full Name -->
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" placeholder="Enter your full name"
                                    class="form-control @error('name') is-invalid @enderror" 
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Company Name (For Employer Only) -->
                            <div class="form-group" id="company-field" style="display: none;">
                                <label>Company Name</label>
                                <input type="text" name="company_name" placeholder="Company Name" 
                                    class="form-control @error('company_name') is-invalid @enderror"
                                    value="{{ old('company_name') }}">
                                @error('company_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="position-relative">
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Enter Password" required>
                                    <span class="eye-toggle" onclick="togglePassword('password')">
                                        <i class="la la-eye"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <div class="position-relative">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" required>
                                    <span class="eye-toggle" onclick="togglePassword('password_confirmation')">
                                        <i class="la la-eye"></i>
                                    </span>
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let userType = document.getElementById('user_type').value;
        
                if (userType === 'employer') {
                    document.getElementById('company-field').style.display = 'block';
                    document.getElementById('employer-btn').classList.add('active-btn');
                    document.getElementById('candidate-btn').classList.remove('active-btn');
                } else {
                    document.getElementById('company-field').style.display = 'none';
                    document.getElementById('candidate-btn').classList.add('active-btn');
                    document.getElementById('employer-btn').classList.remove('active-btn');
                }
        
                document.getElementById('candidate-btn').addEventListener('click', function() {
                    document.getElementById('user_type').value = 'candidate';
                    document.getElementById('company-field').style.display = 'none';
                    this.classList.add('active-btn');
                    document.getElementById('employer-btn').classList.remove('active-btn');
                });
        
                document.getElementById('employer-btn').addEventListener('click', function() {
                    document.getElementById('user_type').value = 'employer';
                    document.getElementById('company-field').style.display = 'block';
                    this.classList.add('active-btn');
                    document.getElementById('candidate-btn').classList.remove('active-btn');
                });
            });
        </script>
        


        <!-- End Info Section -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
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
      </script>

</body>

</html>