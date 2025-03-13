@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="login-section">
    <div class="image-layer" style="background-image: url('{{ asset('images/background/12.jpg') }}');"></div>
    <div class="outer-box">
        <!-- Reset Password Form -->
        <div class="login-form default-form">
            <div class="form-inner">
                <h3>Reset Password</h3>

                <!-- Display error message -->
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="post" action="{{ route('reset.password') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="otp" value="{{ $otp }}">

                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="password" placeholder="Enter New Password" required>
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm New Password" required>
                    </div>

                    <div class="form-group">
                        <button class="theme-btn btn-style-one" type="submit">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
