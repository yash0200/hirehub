@extends('layouts.dashboard')

@section('title', 'Employer Dashboard')

@section('content')

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3 class="dark-color">{{ isset($job) ? 'Edit Job' : 'Post a New Job!' }}</h3>
                <p class="text-color">Ready to {{ isset($job) ? 'update' : 'create' }} your job listing?</p>
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
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4 class="dark-color">{{ isset($job) ? 'Edit Job' : 'Post Job' }}</h4>
                            </div>

                            <div class="widget-content">
                                <div class="post-job-steps">
                                    <div class="step"><span class="icon flaticon-briefcase"></span>
                                        <h5>Job Detail</h5>
                                    </div>
                                    <!-- <div class="step"><span class="icon flaticon-money"></span>
                                        <h5>Package & Payments</h5>
                                    </div> -->
                                    <div class="step"><span class="icon flaticon-checked"></span>
                                        <h5>Confirmation</h5>
                                    </div>
                                </div>

                                <form class="default-form" method="POST" action="{{ isset($job) ? route('jobs.update', $job->id) : route('jobs.store') }}">
                                    @csrf
                                    @if(isset($job))
                                        @method('PATCH') <!-- Use PATCH when editing -->
                                    @endif
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Job Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Title"
                                            value="{{ old('title', $job->title ?? '') }}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Job Description</label>
                                            <textarea class="form-control" name="description"
                                                placeholder="Enter job details...">{{ old('description', $job->description ?? '') }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Skills </label>
                                            <input type="text" name="skills" class="form-control"
                                                placeholder="Enter required Skills" value="{{ old('skills', $job->skills ?? '') }}">
                                            @error('skills')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Job Category</label>
                                            <select name="category_id" class="chosen-select">
                                                <option>Select</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id', $job->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Offered Salary (INR Per Annum)</label>
                                            <select name="salary" class="chosen-select form-control">
                                                <option>Select</option>
                                                <option value="₹3,00,000 - ₹5,00,000" {{ old('salary', $job->salary ?? '') == '₹3,00,000 - ₹5,00,000' ? 'selected' : '' }}>₹3,00,000 - ₹5,00,000</option>
                                            <option value="₹5,00,000 - ₹7,00,000" {{ old('salary', $job->salary ?? '') == '₹5,00,000 - ₹7,00,000' ? 'selected' : '' }}>₹5,00,000 - ₹7,00,000</option>
                                            <option value="₹7,00,000 - ₹10,00,000" {{ old('salary', $job->salary ?? '') == '₹7,00,000 - ₹10,00,000' ? 'selected' : '' }}>₹7,00,000 - ₹10,00,000</option>
                                            <option value="₹10,00,000 - ₹15,00,000" {{ old('salary', $job->salary ?? '') == '₹10,00,000 - ₹15,00,000' ? 'selected' : '' }}>₹10,00,000 - ₹15,00,000</option>
                                            <option value="₹15,00,000 - ₹20,00,000" {{ old('salary', $job->salary ?? '') == '₹15,00,000 - ₹20,00,000' ? 'selected' : '' }}>₹15,00,000 - ₹20,00,000</option>
                                            </select>
                                            @error('salary')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>E-Mail</label>
                                            <input type="email" name="email" class="form-control" placeholder="E-Mail"
                                            value="{{ old('email', $job->email ?? '') }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Application Deadline Date</label>
                                            <input type="date" name="deadline" class="form-control"
                                            value="{{ old('deadline', isset($job) ? $job->deadline?->format('Y-m-d') : '') }}">
                                            @error('deadline')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Experience</label>
                                            <select name="experience" class="chosen-select form-control">
                                                @php
                                                    $experiences = [
                                                        'Fresher (0-1 years)', '1-3 years', '3-5 years', '5-7 years', 
                                                        '7-10 years', '10+ years', 'Senior Management (15+ years)', 'Executive Level'
                                                    ];
                                                @endphp
                                                @foreach ($experiences as $experience)
                                                    <option value="{{ $experience }}" {{ old('experience', $job->experience ?? '') == $experience ? 'selected' : '' }}>
                                                        {{ $experience }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('experience')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Qualification</label>
                                            <select name="qualification" class="chosen-select form-control">
                                                @php
                                                    $qualifications = ['Graduate', "Bachelor's Degree", 'Postgraduate', 'Other Qualifications'];
                                                @endphp
                                                @foreach ($qualifications as $qualification)
                                                    <option value="{{ $qualification }}" {{ old('qualification', $job->qualification ?? '') == $qualification ? 'selected' : '' }}>
                                                        {{ $qualification }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('qualification')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Job Type</label>
                                            <select name="job_type" class="chosen-select form-control">
                                                @php
                                                    $jobTypes = ['Full-Time', 'Part-Time', 'Fresher', 'Internship','Remote'];
                                                @endphp
                                                @foreach ($jobTypes as $jobType)
                                                    <option value="{{ $jobType }}" {{ old('job_type', $job->job_type ?? '') == $jobType ? 'selected' : '' }}>
                                                        {{ $jobType }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('job_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                
                                        @php
                                            $jobAddress = isset($job) ? optional($job->jobAddresses->first()) : null;
                                        @endphp

                                        <div class="form-group col-lg-6">
                                            <label>Country</label>
                                            <input type="text" name="country" class="form-control"
                                                placeholder="Enter Country" value="{{ old('country', $jobAddress?->country ?? '') }}">
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>State</label>
                                            <input type="text" name="state" class="form-control" placeholder="Enter State"
                                                value="{{ old('state', $jobAddress?->state ?? '') }}">
                                            @error('state')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control" placeholder="Enter City"
                                                value="{{ old('city', $jobAddress?->city ?? '') }}">
                                            @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Postcode</label>
                                            <input type="text" name="postcode" class="form-control"
                                                placeholder="Enter Postcode" value="{{ old('postcode', $jobAddress?->postcode ?? '') }}">
                                            @error('postcode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Complete Address</label>
                                            <input type="text" name="address" class="form-control"
                                                placeholder="123 Main Street" value="{{ old('address', $jobAddress?->complete_address ?? '') }}">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 text-right">
                                            <button class="theme-btn btn-style-one" type="submit"> {{ isset($job) ? 'Update Job' : 'Submit' }}</button>
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
    <!-- Copyright -->
    <div class="copyright-text text-center">
        <p>© 2025 <a href="{{ url("/") }}">Hirehub</a>. All Right Reserved.</p>
    </div>
@endsection