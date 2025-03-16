@extends('layouts.dashboard')

@section('title', 'View Application')

@section('content')
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Application Details</h3>
            <div class="text">Here are the full details of the application.</div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="widget-title">
                        <h4>Application Information</h4>
                    </div>

                    <div class="widget-content">
                        <div class="job-details">
                            <h4>Job Title: {{ $application->job->title }}</h4>
                            <p><strong>Employer: </strong> {{ $application->job->employer->company_name }}</p>
                            <p><strong>Industry: </strong> {{ $application->job->employer->industry ?? 'Not specified' }}</p>
                            <p><strong>Location: </strong> {{ $application->job->jobAddress->city ?? 'Location not specified' }}</p>
                            <p><strong>Experience Required: </strong> {{ $application->job->experience ?? 'Not specified' }}</p>
                            <p><strong>Salary: </strong> {{ $application->job->salary ?? 'Not specified' }}</p>
                            <p><strong>Application Date: </strong> {{ \Carbon\Carbon::parse($application->created_at)->format('M d, Y') }}</p>
                            <p><strong>Status: </strong> 
                                <span class="badge bg-{{ $application->status === 'approved' ? 'success' : ($application->status === 'rejected' ? 'danger' : 'warning') }}">
                                {{ ucfirst($application->status) }}</span>
                            </p>

                            <hr>

                            <h4>Candidate Details</h4>
                            <p><strong>Name: </strong> {{ $application->candidate->full_name }}</p>
                            <p><strong>Email: </strong> {{ $application->candidate->user->email }}</p>
                            <p><strong>Phone: </strong> {{ $application->candidate->phone ?? 'Not provided' }}</p>
                            <p><strong>Education Level: </strong> {{ $application->candidate->education_levels ?? 'Not specified' }}</p>
                            <p><strong>Languages: </strong> {{ $application->candidate->languages ?? 'Not specified' }}</p>
                            <p><strong>Marital Status: </strong> {{ $application->candidate->marital_status ?? 'Not specified' }}</p>

                            <hr>

                            <h4>Resume Information</h4>
                            <p><strong>Job Title: </strong> {{ $application->resume->job_title ?? 'N/A' }}</p>
                            <p><strong>Skills: </strong> 
                                @if($application->resume->skills)
                                    @foreach($application->resume->skills as $skill)
                                        <span class="badge bg-primary">{{ $skill }}</span>
                                    @endforeach
                                @else
                                    Not specified
                                @endif
                            </p>
                            <p><strong>Degree: </strong> {{ $application->resume->degree_name ?? 'Not specified' }}</p>
                            <p><strong>Employment Type: </strong> {{ $application->resume->employment_type ?? 'Not specified' }}</p>

                            <div class="option-box mt-4">
                                <ul class="option-list">
                                    @if(auth()->user()->user_type === 'employer')
                                        @if($application->status === 'Pending')
                                            <li>
                                                <button class="approve-btn" data-id="{{ $application->id }}">
                                                    <span class="la la-check"></span>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="reject-btn" data-id="{{ $application->id }}">
                                                    <span class="la la-times-circle"></span>
                                                </button>
                                            </li>
                                        @elseif($application->status === 'approved')
                                            <li>
                                                <span class="badge bg-success">Approved</span>
                                            </li>
                                        @elseif($application->status === 'rejected')
                                            <li>
                                                <span class="badge bg-danger">Rejected</span>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
