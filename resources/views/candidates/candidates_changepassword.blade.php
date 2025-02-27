@extends('layouts.dashboard')

@section('title', 'Candidate Change Password')
@section('content')
 <!-- Dashboard -->
 <section class="user-dashboard">
      <div class="dashboard-outer">
        <div class="upper-title-box">
          <h3>Change Password</h3>
          <div class="text">Ready to jump back in?</div>
        </div>

        <!-- Ls widget -->
        <div class="ls-widget">
          <div class="widget-title">
            <h4>Change Password</h4>
          </div>

          <div class="widget-content">
            <form class="default-form">
              <div class="row">
                <!-- Input -->
                <div class="form-group col-lg-7 col-md-12">
                  <label>Old Password </label>
                  <input type="password" name="name" placeholder="">
                </div>

                <!-- Input -->
                <div class="form-group col-lg-7 col-md-12">
                  <label>New Password</label>
                  <input type="password" name="name" placeholder="">
                </div>

                <!-- Input -->
                <div class="form-group col-lg-7 col-md-12">
                  <label>Confirm Password</label>
                  <input type="password" name="name" placeholder="">
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
      <p>© 2021 Superio. All Right Reserved.</p>
    </div>
    @endsection