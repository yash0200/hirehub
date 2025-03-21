@extends('layouts.dashboard')

@section('title', 'Candidate profile')

@section('content')
<section class="candidate-detail-section">
    <!-- Upper Box -->
    <div class="upper-box">
        <div class="auto-container">
            <!-- Candidate block Five -->
            <div class="candidate-block-five">
                <div class="inner-box">
                    <div class="content">
                        <figure class="image">
                            @if(!empty($candidate->profile_photo))
                                <img src="{{ asset('storage/profile_photos/' . $candidate->profile_photo) }}" alt="{{ $candidate->user->name }}">
                            @else
                                <img src="{{ asset('/images/resource/default-profile.png') }}" alt="Default Profile">
                            @endif
                        </figure>
                        <h4 class="name"><a href="{{ url('#') }}">{{ $candidate->full_name }}</a></h4>
                        <ul class="candidate-info">
                            <li class="designation">
                                {{ $candidate->resume->job_title ?? 'N/A' }} 
                                at {{ $candidate->resume->company_name ?? 'N/A' }}
                            </li>
                            <li>
                                <span class="icon flaticon-map-locator"></span>
                                {{ $candidate->address->state ?? 'N/A' }}, 
                                {{ $candidate->address->city ?? 'N/A' }}
                            </li>
                            <li><span class="icon flaticon-money"></span> {{$candidate->resume->current_salary??'Not Provided'}}</li>
                            <li>
                                <span class="icon flaticon-clock"></span>
                                Member Since, {{ $candidate->created_at->format('M d, Y') ?? 'N/A' }}
                            </li>
                        </ul>
                    </div>
                    <div class="btn-box">
                        <a href="{{ $candidate->resume->resume_file ? asset('storage/resumes/' . $candidate->resume->resume_file) : '#' }}" 
                            class="theme-btn btn-style-one" 
                            {{ $candidate->resume->resume_file ? 'download' : 'onclick=alert("CV not available")' }}>
                             Download CV
                         </a>
                         
                        <!-- <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button> -->
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
                        <h4>Candidates About</h4>
                        <p>
                            {{ $candidate->description ?? 'No information available.' }}
                        </p>

                        <!-- Resume / Education -->
                        <div class="resume-outer">
                            <div class="upper-title">
                                <h4>Education</h4>
                            </div>
                            <!-- Resume BLock -->
                            <div class="resume-block">
                                <div class="inner">
                                    <!-- <span class="name">{{ strtoupper(substr($candidate->resume->degree_name, 0, 1)) }}</span> -->
                                    <div class="title-box">
                                        <div class="info-box">
                                            <h3>{{ $candidate->resume->degree_name ?? 'N/A' }}</h3>
                                            <span>{{ $candidate->resume->institution_name ?? 'Institution Not Available' }}</span>
                                        </div>
                                        <div class="edit-box">
                                            <span class="year">{{ $candidate->resume->start_year ?? 'N/A' }} - {{ $candidate->resume->end_year ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    <div class="text">{{ $candidate->resume->description ?? 'No description provided.' }}</div>
                                </div>
                            </div>

                            <!-- Resume BLock -->
                            <!-- <div class="resume-block">
                                <div class="inner">
                                    <span class="name">H</span>
                                    <div class="title-box">
                                        <div class="info-box">
                                            <h3>{{ $candidate->resume->start_year }}-{{ $candidate->resume->end_year }}</h3>
                                            <span>{{ $candidate->resume->field_of_study }}</span>
                                        </div>
                                        <div class="edit-box">
                                            <span class="year">2008 - 2012</span>
                                        </div>
                                    </div>
                                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Resume / Work & Experience -->
                        <div class="resume-outer theme-blue" style="margin-top:30px">
                            <div class="upper-title">
                                <h4>Work & Experience</h4>
                            </div>
                            <!-- Resume BLock -->
                            <div class="resume-block">
                                <div class="inner">
                                    <!-- <span class="name">{{ strtoupper(substr($candidate->job_title ?? 'N/A', 0, 1)) }}</span> -->
                                    <div class="title-box">
                                        <div class="info-box">
                                            <h3>{{ $candidate->resume->job_title ?? 'Position Not Available' }}</h3>
                                            <span>{{ $candidate->resume->company_name ?? 'Company Not Available' }}</span>
                                        </div>
                                        <div class="edit-box">
                                            <span class="year">
                                                {{ $candidate->resume->start_year ?? 'N/A' }} - 
                                                {{ $candidate->resume->end_year ?? 'Present' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text">
                                        {{ $candidate->description ?? 'No description provided.' }}
                                    </div>
                                </div>
                            </div>

                            <!-- Resume BLock -->
                            <!-- <div class="resume-block">
                                <div class="inner">
                                    <span class="name">D</span>
                                    <div class="title-box">
                                        <div class="info-box">
                                            <h3>Sr UX Engineer</h3>
                                            <span>Dropbox Inc.</span>
                                        </div>
                                        <div class="edit-box">
                                            <span class="year">2012 - 2014</span>
                                        </div>
                                    </div>
                                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                                </div>
                            </div>
                        </div> -->

                        <div class="sidebar-column col-lg-4 col-md-12 col-sm-12" style="margin-top:30px">
                            <aside class="sidebar">
                                <div class="sidebar-widget">
                                    <div class="widget-content">
                                        <ul class="job-overview">
                                            <li>
                                                <i class="icon icon-calendar"></i>
                                                <h5>Experience:</h5>
                                                <span>0-2 Years</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-expiry"></i>
                                                <h5>Age:</h5>
                                                <span>{{$candidate->age_range}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-rate"></i>
                                                <h5>Current Salary:</h5>
                                                <span>{{$candidate->resume->current_salary}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-salary"></i>
                                                <h5>Expected Salary:</h5>
                                                <span>{{$candidate->resume->expected_salary}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-user-2"></i>
                                                <h5>Gender:</h5>
                                                <span>{{$candidate->gender}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-language"></i>
                                                <h5>Language:</h5>
                                                <span>{{$candidate->languages}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-degree"></i>
                                                <h5>Education Level:</h5>
                                                <span>{{$candidate->education_levels}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="sidebar-widget social-media-widget">
                                    <h4 class="widget-title">Social media</h4>
                                    <div class="widget-content">
                                        <div class="social-links">
                                            @if($candidate->socialNetworks)
                                                @if($candidate->socialNetworks->facebook)
                                                    <a href="{{ $candidate->socialNetworks->facebook }}" target="_blank">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                @endif

                                                @if($candidate->socialNetworks->twitter)
                                                    <a href="{{ $candidate->socialNetworks->twitter }}" target="_blank">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                @endif

                                                @if($candidate->socialNetworks->linkedin)
                                                    <a href="{{ $candidate->socialNetworks->linkedin }}" target="_blank">
                                                        <i class="fab fa-linkedin-in"></i>
                                                    </a>
                                                @endif
                                            @else
                                                <p>No social media links available.</p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-widget">
                                    <!-- Job Skills -->
                                    <h4 class="widget-title">Professional Skills</h4>
                                    <div class="widget-content">
                                        <ul class="job-skills">
                                            @if(!empty($candidate->resume->skills))
                                                @foreach($candidate->resume->skills as $skill)
                                                    <li><a href="{{ url('#') }}">{{ $skill }}</a></li>
                                                @endforeach
                                            @else
                                                <li>No skills available</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                 </div>
             </div>
        </div>
    </div>
</section>
@endsection