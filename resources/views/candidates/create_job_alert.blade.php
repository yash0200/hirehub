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
                                    <!-- Job Criteria (JSON) -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="criteria">Job Criteria (Keywords)</label>
                                        <input type="text" id="criteria" name="criteria" class="form-control" value="{{ old('criteria') }}" placeholder="Enter keywords (e.g., Laravel, PHP, Backend)">
                                        <small class="text-muted">Separate multiple criteria with commas.</small>
                                        @error('criteria')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                                                
                                    <!-- Location -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="location">Location</label>
                                        <input type="text" id="location" name="location" class="form-control" value="{{ old('location') }}" required placeholder="Enter job location">
                                        @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                    <!-- Job Category -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Job Category</label>
                                        <select name="category_id" class="chosen-select">
                                            <option>Select</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                            
                                    <!-- Salary Range -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="salary_range">Salary Range</label>
                                        <input type="text" id="salary_range" name="salary_range" class="form-control" value="{{ old('salary_range') }}" placeholder="Enter salary range (e.g., 50,000 - 70,000 INR)">
                                        @error('salary_range')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                    <!-- Job Type -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Job Type</label>
                                        <select name="job_type" class="chosen-select">
                                            <option value="full-time">Full-time</option>
                                            <option value="part-time">Part-time</option>
                                            <option value="remote">Remote</option>
                                            <option value="internship">Internship</option>
                                        </select>
                                        @error('job_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                            
                                    {{-- <!-- Experience Level -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Experience Level</label>
                                        <select name="experience_level" class="chosen-select">
                                            <option value="entry">Entry Level</option>
                                            <option value="mid">Mid Level</option>
                                            <option value="senior">Senior Level</option>
                                        </select>
                                        @error('experience_level')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> --}}
                            
                                    <!-- Submit Button -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <button type="submit" class="theme-btn btn-style-one">Save preferences</button>
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
    <p>© 2025 <a href="{{ url("/") }}">Hirehub</a>. All Right Reserved.</p>
</div>
@endsection