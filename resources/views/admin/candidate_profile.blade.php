@extends('layouts.admin_dashboard')

@section('title', 'Candidate profile')

@section('content')
<section class="candidate-detail-section">
    <!-- Upper Box -->
    <div class="upper-box">
        <div class="auto-container">
            <div class="candidate-block-five">
                <div class="inner-box">
                    <div class="content">
                        <figure class="image"><img src="{{ asset($candidate->profile_picture ?? '/images/resource/default-user.png') }}" alt=""></figure>
                        <h4 class="name">{{ $candidate->name }}</h4>
                        <ul class="candidate-info">
                            <li class="designation">{{ $candidate->job_title ?? 'Not Provided' }}</li>
                            <li><span class="icon flaticon-map-locator"></span> {{ $candidate->location ?? 'Not Provided' }}</li>
                            <li><span class="icon flaticon-money"></span> ${{ $candidate->current_salary ?? 'N/A' }} / year</li>
                            <li><span class="icon flaticon-clock"></span> Member Since {{ $candidate->created_at->format('M d, Y') }}</li>
                        </ul>
                        <ul class="post-tags">
                            @foreach($candidate->skills ?? [] as $skill)
                                <li><a href="#">{{ $skill }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="btn-box">
                        <a href="{{ asset($candidate->resume ?? '#') }}" class="theme-btn btn-style-one">Download CV</a>
                        <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="candidate-detail-outer">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="job-detail">
                        <h4>About Candidate</h4>
                        <p>{{ $candidate->about ?? 'No details available.' }}</p>

                        <!-- Education -->
                        <div class="resume-outer">
                            <div class="upper-title"><h4>Education</h4></div>
                            @foreach($candidate->education ?? [] as $edu)
                                <div class="resume-block">
                                    <div class="inner">
                                        <span class="name">{{ substr($edu->institution, 0, 1) }}</span>
                                        <div class="title-box">
                                            <div class="info-box">
                                                <h3>{{ $edu->degree }}</h3>
                                                <span>{{ $edu->institution }}</span>
                                            </div>
                                            <div class="edit-box">
                                                <span class="year">{{ $edu->year }}</span>
                                            </div>
                                        </div>
                                        <div class="text">{{ $edu->description }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Work Experience -->
                        <div class="resume-outer theme-blue">
                            <div class="upper-title"><h4>Work & Experience</h4></div>
                            @foreach($candidate->experience ?? [] as $exp)
                                <div class="resume-block">
                                    <div class="inner">
                                        <span class="name">{{ substr($exp->company, 0, 1) }}</span>
                                        <div class="title-box">
                                            <div class="info-box">
                                                <h3>{{ $exp->position }}</h3>
                                                <span>{{ $exp->company }}</span>
                                            </div>
                                            <div class="edit-box">
                                                <span class="year">{{ $exp->years }}</span>
                                            </div>
                                        </div>
                                        <div class="text">{{ $exp->description }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar">
                        <div class="sidebar-widget">
                            <div class="widget-content">
                                <ul class="job-overview">
                                    <li><i class="icon icon-calendar"></i><h5>Experience:</h5><span>{{ $candidate->experience_years ?? 'N/A' }} Years</span></li>
                                    <li><i class="icon icon-expiry"></i><h5>Age:</h5><span>{{ $candidate->age ?? 'N/A' }}</span></li>
                                    <li><i class="icon icon-rate"></i><h5>Current Salary:</h5><span>${{ $candidate->current_salary ?? 'N/A' }}</span></li>
                                    <li><i class="icon icon-salary"></i><h5>Expected Salary:</h5><span>${{ $candidate->expected_salary ?? 'N/A' }}</span></li>
                                    <li><i class="icon icon-user-2"></i><h5>Gender:</h5><span>{{ ucfirst($candidate->gender) }}</span></li>
                                    <li><i class="icon icon-language"></i><h5>Language:</h5><span>{{ implode(', ', $candidate->languages ?? []) }}</span></li>
                                    <li><i class="icon icon-degree"></i><h5>Education Level:</h5><span>{{ $candidate->education_level ?? 'N/A' }}</span></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="sidebar-widget social-media-widget">
                            <h4 class="widget-title">Social media</h4>
                            <div class="widget-content">
                                <div class="social-links">
                                    @if($candidate->facebook) <a href="{{ $candidate->facebook }}"><i class="fab fa-facebook-f"></i></a> @endif
                                    @if($candidate->twitter) <a href="{{ $candidate->twitter }}"><i class="fab fa-twitter"></i></a> @endif
                                    @if($candidate->instagram) <a href="{{ $candidate->instagram }}"><i class="fab fa-instagram"></i></a> @endif
                                    @if($candidate->linkedin) <a href="{{ $candidate->linkedin }}"><i class="fab fa-linkedin-in"></i></a> @endif
                                </div>
                            </div>
                        </div>

                        <!-- Skills -->
                        <div class="sidebar-widget">
                            <h4 class="widget-title">Professional Skills</h4>
                            <div class="widget-content">
                                <ul class="job-skills">
                                    @foreach($candidate->skills ?? [] as $skill)
                                        <li><a href="#">{{ $skill }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
