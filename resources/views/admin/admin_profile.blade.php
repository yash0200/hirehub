@extends('layouts.admin_dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<!-- Dashboard -->
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Admin Profile</h3>
            <div class="text">Manage your account settings here.</div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li><b>{{ $error }}</b></li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <!-- Admin Profile Widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>My Profile</h4>
                        </div>

                        <div class="widget-content">
                            <form class="default-form" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="form_type" value="admin_profile">
                            
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Admin Name</label>
                                        <input type="text" name="admin_name"
                                            value="{{ old('admin_name', $user->name ?? '') }}"
                                            placeholder="Enter Admin Name">
                                    </div>
                            
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Email</label>
                                        <input type="email" name="email"
                                            value="{{ old('email', $user->email ?? '') }}"
                                            placeholder="Enter Email Address">
                                    </div>
                            
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Phone</label>
                                        <input type="text" name="phone"
                                            value="{{ old('phone', $admin->contact ?? '') }}"
                                            placeholder="Enter Phone Number">
                                    </div>
                            
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Profile Picture</label>
                                        <input type="file" name="profile_photo" class="form-control">
                                        
                                            <img src="{{ asset('storage/admin_photos'.$admin->photo ?? 'default.png') }}" alt="Profile Photo" width="100">
                                        
                                    </div>
                            
                                    <div class="form-group col-lg-12 col-md-12">
                                        <button class="theme-btn btn-style-one" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>

                

            </div>
        </div>
    </div>
</section>
<!-- End Dashboard -->

<!-- Copyright -->
<div class="copyright-text">
    <p>© 2025 <a href="{{ url('/') }}">Hirehub</a>. All Rights Reserved.</p>
</div>


@endsection