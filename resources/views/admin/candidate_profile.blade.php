@extends('layouts.admin_dashboard')

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
                            @if(!empty($user->candidate->profile_photo))
                                <img src="{{ asset('storage/profile_photos/' . $user->candidate->profile_photo) }}" alt="{{ $user->candidate->full_name }}">
                            @else
                                <img src="{{ asset('/images/resource/default-profile.png') }}" alt="Default Profile">
                            @endif
                        </figure>
                        <h4 class="name"><a href="{{ url('#') }}">{{ $user->full_name }}</a></h4>
                        <ul class="candidate-info">
                            <li class="designation">
                                {{ $user->candidate->resume->job_title ?? 'N/A' }} 
                                at {{ $user->candidate->resume->company_name ?? 'N/A' }}
                            </li>
                            <li>
                                <span class="icon flaticon-map-locator"></span>
                                {{ $user->address->state ?? 'N/A' }}, 
                                {{ $user->address->city ?? 'N/A' }}
                            </li>
                            <li><span class="icon flaticon-money"></span> {{$user->candidate->resume->current_salary??'Not Provided'}}</li>
                            <li>
                                <span class="icon flaticon-clock"></span>
                                Member Since, {{ $user->created_at->format('M d, Y') ?? 'N/A' }}
                            </li>
                        </ul>
                    </div>
                    <div class="btn-box">
                        <a href="{{ $user->candidate->resume->resume_file ? asset('storage/resumes/' . $user->candidate->resume->resume_file) : '#' }}" 
                            class="theme-btn btn-style-one" 
                            {{ $user->candidate->resume->resume_file ? 'download' : 'onclick=alert("CV not available")' }}>
                             Download CV
                         </a>
                         
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
                        <h4>Candidates About</h4>
                        <p>
                            {{ $user->description ?? 'No information available.' }}
                        </p>

                        <!-- Resume / Education -->
                        <div class="resume-outer">
                            <div class="upper-title">
                                <h4>Education</h4>
                            </div>
                            <!-- Resume BLock -->
                            <div class="resume-block">
                                <div class="inner">
                                    <!-- <span class="name">{{ strtoupper(substr($user->candidate->resume->degree_name, 0, 1)) }}</span> -->
                                    <div class="title-box">
                                        <div class="info-box">
                                            <h3>{{ $user->candidate->resume->degree_name ?? 'N/A' }}</h3>
                                            <span>{{ $user->candidate->resume->institution_name ?? 'Institution Not Available' }}</span>
                                        </div>
                                        <div class="edit-box">
                                            <span class="year">{{ $user->candidate->resume->start_year ?? 'N/A' }} - {{ $user->candidate->resume->end_year ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    <div class="text">{{ $user->candidate->resume->description ?? 'No description provided.' }}</div>
                                </div>
                            </div>

                            {{-- <!-- Resume BLock -->
                            <!-- <div class="resume-block">
                                <div class="inner">
                                    <span class="name">H</span>
                                    <div class="title-box">
                                        <div class="info-box">
                                            <h3>{{ $user->candidate->resume->start_year }}-{{ $user->candidate->resume->end_year }}</h3>
                                            <span>{{ $user->candidate->resume->field_of_study }}</span>
                                        </div>
                                        <div class="edit-box">
                                            <span class="year">2008 - 2012</span>
                                        </div>
                                    </div>
                                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                                </div>
                            </div>
                        </div> --> --}}

                        <!-- Resume / Work & Experience -->
                        <div class="resume-outer theme-blue" style="margin-top:30px">
                            <div class="upper-title">
                                <h4>Work & Experience</h4>
                            </div>
                            <!-- Resume BLock -->
                            <div class="resume-block">
                                <div class="inner">
                                    <!-- <span class="name">{{ strtoupper(substr($user->job_title ?? 'N/A', 0, 1)) }}</span> -->
                                    <div class="title-box">
                                        <div class="info-box">
                                            <h3>{{ $user->candidate->resume->job_title ?? 'Position Not Available' }}</h3>
                                            <span>{{ $user->candidate->resume->company_name ?? 'Company Not Available' }}</span>
                                        </div>
                                        <div class="edit-box">
                                            <span class="year">
                                                {{ $user->candidate->resume->start_year ?? 'N/A' }} - 
                                                {{ $user->candidate->resume->end_year ?? 'Present' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text">
                                        {{ $user->description ?? 'No description provided.' }}
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
                                                <span>{{$user->age_range}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-rate"></i>
                                                <h5>Current Salary:</h5>
                                                <span>{{$user->candidate->resume->current_salary}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-salary"></i>
                                                <h5>Expected Salary:</h5>
                                                <span>{{$user->candidate->resume->expected_salary}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-user-2"></i>
                                                <h5>Gender:</h5>
                                                <span>{{$user->gender}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-language"></i>
                                                <h5>Language:</h5>
                                                <span>{{$user->languages}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-degree"></i>
                                                <h5>Education Level:</h5>
                                                <span>{{$user->education_levels}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="sidebar-widget social-media-widget">
                                    <h4 class="widget-title">Social media</h4>
                                    <div class="widget-content">
                                        <div class="social-links">
                                            @if($user->socialNetworks)
                                                @if($user->socialNetworks->facebook)
                                                    <a href="{{ $user->socialNetworks->facebook }}" target="_blank">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                @endif

                                                @if($user->socialNetworks->twitter)
                                                    <a href="{{ $user->socialNetworks->twitter }}" target="_blank">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                @endif

                                                @if($user->socialNetworks->linkedin)
                                                    <a href="{{ $user->socialNetworks->linkedin }}" target="_blank">
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
                                            @if(!empty($user->candidate->resume->skills))
                                                @foreach($user->candidate->resume->skills as $skill)
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