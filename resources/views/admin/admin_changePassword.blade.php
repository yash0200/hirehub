@extends('layouts.admin_dashboard')

@section('title', 'Admin Dashboard')

@section('content')
    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Change Password</h3>
                <div class="text">Ready to jump back in?</div>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif                              

            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="widget-title">
                    <h4>Change Password</h4>
                </div>

                <div class="widget-content">
                    <form class="default-form" method="POST" action="{{ route('admin.password.update') }}">
                        @csrf
                        <div class="row">
                            <!-- Input -->
                            

                            <div class="form-group col-lg-7 col-md-12">
                            <label>Old Password</label>
                            <div class="position-relative">
                            <input type="password" name="old_password" id="old_password" class="form-control"
                                placeholder="Enter Old Password">
                            <span class="eye-toggle" onclick="togglePassword('old_password')">
                                <i class="la la-eye"></i>
                            </span>
                            </div>
                            </div>

                            <div class="form-group col-lg-7 col-md-12">
                            <label>New Password</label>
                            <div class="position-relative">
                            <input type="password" name="new_password" id="new_password" class="form-control"
                                placeholder="Enter New Password">
                            <span class="eye-toggle" onclick="togglePassword('new_password')">
                                <i class="la la-eye"></i>
                            </span>
                            </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group col-lg-7 col-md-12">
                            <label>Confirm Password</label>
                            <div class="position-relative">
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                class="form-control" placeholder="Confirm New Password">
                            <span class="eye-toggle" onclick="togglePassword('new_password_confirmation')">
                                <i class="la la-eye"></i>
                            </span>
                            </div>
                            </div>

                            <!-- Input -->
                            <div class="form-group col-lg-6 col-md-12">
                                <button class="theme-btn btn-style-one">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dashboard -->

    <!-- Copyright -->
    <div class="copyright-text">
        <p>© 2025 <a href="{{ url("/") }}">Hirehub</a>. All Right Reserved.</p>
    </div>
@endsection
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
  
  <!-- CSS for Eye Button -->
  <style>
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