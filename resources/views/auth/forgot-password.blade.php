@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
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

            </div>
        </div>
    </div>
</div>
@endsection
