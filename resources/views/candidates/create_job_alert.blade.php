@extends('layouts.dashboard')

@section('title', 'Create Job Alert')

@section('content')
<!-- Dashboard -->
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Create Job Alert</h3>
            <div class="text">Set your job alert preferences below</div>
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

        <div class="row">
            <div class="col-lg-12">
                <!-- Job Alert Widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Create Your Job Alert</h4>
                        </div>

                        <div class="widget-content">
                            <form class="default-form" action="{{ route('candidate.jobalert.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <!-- Keywords field (optional) -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="keywords">Keywords (Optional)</label>
                                        <input type="text" id="keywords" name="keywords" class="form-control" value="{{ old('keywords') }}" placeholder="Enter job keywords (e.g., Developer, Designer)">
                                        @error('keywords')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Location field -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="location">Location</label>
                                        <input type="text" id="location" name="location" class="form-control" value="{{ old('location') }}" required placeholder="Enter job location">
                                        @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Category field -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Job Category</label>
                                        <select name="category" class="chosen-select">
                                            <option>Select</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>

                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <button type="submit" class="theme-btn btn-style-one">Create Job Alert</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Job Alert Widget -->
            </div>
        </div>
    </div>
</section>
<!-- End Dashboard -->

<!-- Copyright -->
<div class="copyright-text">
    <p>© 2025 Hirehub. All Right Reserved.</p>
</div>
@endsection