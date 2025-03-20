@extends('layouts.app')

@section('title', $job->title)

@section('content')

<body>

  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!-- Job Detail Section -->
    <section class="job-detail-section">
      <div class="job-detail-outer">
        <div class="auto-container">
          <div class="row">
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
              <div class="job-block-outer">
                <!-- Job Block -->
                <div class="job-block-seven style-two">
                  <div class="inner-box">
                    <div class="content">
                      <h4><a href="{{ url('#') }}">{{ $job->title }}</a></h4>
                      <ul class="job-info">
                        <li><span class="icon flaticon-briefcase"></span> {{ $job->jobCategory->name ?? 'N/A' }}</li>
                        <li><span class="icon flaticon-map-locator"></span>
                          {{ $job->jobAddress->city ?? 'Unknown' }}, {{ $job->jobAddress->country ?? '' }}
                        </li>
                        <li><span class="icon flaticon-clock-3"></span> {{ $job->created_at->diffForHumans() }}</li>
                        <li><span class="icon flaticon-money"></span>
                          {{ $job->salary ?? 'Not Specified' }}
                        </li>
                      </ul>

                      <ul class="job-other-info">
                        <li class="time">Full Time</li>
                        <li class="privacy">Private</li>
                        <li class="required">Urgent</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="job-overview-two">
                <h4>Job Description</h4>
                <ul>
                  <li>
                    <i class="icon icon-calendar"></i>
                    <h5>Date Posted:</h5>
                    <span>Posted {{ $job->created_at->diffForHumans() }}</span>
                  </li>
                  <li>
                    <i class="icon icon-expiry"></i>
                    <h5>Expiration Date:</h5>
                    <span>{{ $job->deadline ? \Carbon\Carbon::parse($job->deadline)->format('F d, Y') : 'Not Specified' }}</span>
                  </li>
                  <li>
                    <i class="icon icon-location"></i>
                    <h5>Location:</h5>
                    <span>{{ $job->jobAddress->city ?? 'Unknown' }}, {{ $job->jobAddress->country ?? '' }}</span>
                  </li>
                  <li>
                    <i class="icon icon-user-2"></i>
                    <h5>Job Title:</h5>
                    <span>{{ $job->title }}</span>
                  </li>
                  {{-- <li>
                          <i class="icon icon-clock"></i>
                          <h5>Hours:</h5>
                          <span>{{ $job->working_hours ?? 'Not Specified' }}</span>
                  </li>
                  <li>
                    <i class="icon icon-rate"></i>
                    <h5>Rate:</h5>
                    <span>{{ $job->hourly_rate ? '$' . $job->hourly_rate . ' / hour' : 'Not Specified' }}</span>
                  </li> --}}
                  <li>
                    <i class="icon icon-salary"></i>
                    <h5>Salary:</h5>
                    <span>{{ $job->salary ?? 'Not Specified' }}</span>
                  </li>
                </ul>
              </div>

              <div class="job-detail">
                <h4>Job Description</h4>
                <p>{{ $job->description ?? 'No job description available.' }}</p>

                @if(!empty($job->responsibilities))
                <h4>Key Responsibilities</h4>
                <ul class="list-style-three">
                  @foreach(explode("\n", $job->responsibilities) as $responsibility)
                  <li>{{ $responsibility }}</li>
                  @endforeach
                </ul>
                @endif

                @if(!empty($job->skills))
                <h4>Skill & Experience</h4>
                <ul class="list-style-three">
                  @foreach(explode("\n", $job->skills) as $skill)
                  <li>{{ $skill }}</li>
                  @endforeach
                </ul>
                @endif
              </div>

              <!-- Other Options -->
              <div class="other-options">
                <div class="social-share">
                  <h5>Share this job</h5>
                  <a href="{{ $job->employer->user->socialNetwork->facebook??''}}" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                  <a href="{{ $job->employer->user->socialNetwork->twitter??''}}" class="twitter"><i class="fab fa-twitter"></i> Twitter</a>
                  <a href="{{ $job->employer->user->socialNetwork->linkedin??''}}" class="google"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                </div>
              </div>
            </div>

            <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">
                <div class="btn-box">
                  @php
                  $user = auth()->user();
                  $candidate = $user && $user->user_type === 'candidate' ? $user->candidate : null;
                  $hasApplied = $candidate ? $candidate->applications()->where('job_id', $job->id)->exists() : false;
                  $isProfileComplete = $candidate ? $candidate->isProfileCompleted() : false;
                  $isResumeUpdated = $candidate ? optional($candidate->resume)->isResumeUpdated() : false;
                  @endphp


                  @if(!$user)
                  {{-- Guest User --}}
                  <a href="{{ route('login') }}" class="theme-btn btn-style-one">Login to Apply</a>
                  @elseif($user->user_type === 'candidate')
                  {{-- Candidate User --}}
                  @if($hasApplied)
                  <button class="theme-btn btn-style-one disabled" disabled>Already Applied</button>
                  @elseif(!$isProfileComplete)
                  <a href="{{ route('candidate.profile') }}" class="theme-btn btn-style-one">Complete Profile to Apply</a>
                  @elseif(!$isResumeUpdated)
                  <a href="{{ route('candidate.resumes') }}" class="theme-btn btn-style-one">Update Resume to Apply</a>
                  @else
                  <form action="{{ route('job.apply', $job->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="theme-btn btn-style-one">Apply for Job</button>
                  </form>
                  @endif
                  @elseif($user->user_type === 'employer')
                  {{-- Employer User --}}
                  <button class="theme-btn btn-style-one disabled" disabled>Employers cannot apply for jobs</button>
                  @elseif($user->user_type === 'admin')
                  {{-- Admin User --}}
                  <button class="theme-btn btn-style-one disabled" disabled>Admins cannot apply for jobs</button>
                  @endif
                  @php
                  $user = auth()->user();
                  $candidate = $user ? $user->candidate : null;
                  $isShortlisted = false;

                  if ($candidate) {
                  $isShortlisted = \App\Models\ShortlistedJob::where('candidate_id', $candidate->id)
                  ->where('job_id', $job->id)
                  ->exists();
                  }
                  @endphp
                  @if($user->user_type === 'candidate')
                    <button type="button" 
                      class="bookmark-btn {{ $isShortlisted ? 'active' : '' }}" 
                      data-job-id="{{ $job->id }}" 
                      onclick="toggleBookmark(this, {{ $user ? 'true' : 'false' }})">
                      <i class="flaticon-bookmark"></i>
                    </button>
              @endif
                  <button type="button"
                    class="bookmark-btn {{ $isShortlisted ? 'active' : '' }}"
                    data-job-id="{{ $job->id }}"
                    onclick="toggleBookmark(this, {{ $user ? 'true' : 'false' }})">
                    <i class="flaticon-bookmark"></i>
                  </button>

                </div>
                <div class="sidebar-widget company-widget">
                  <div class="widget-content">
                    <div class="company-title">
                      <div class="company-logo">
                        <img src="{{ asset('storage/logos/'.$job->employer->logo ?? 'images/default-company.png') }}" alt="Company Logo">
                      </div>
                      <h5 class="company-name">{{ $job->employer->company_name ?? 'Unknown' }}</h5>
                      <a href="{{ route('employers.details', $job->employer->id) }}" class="profile-link">View company profile</a>
                    </div>

                    <ul class="company-info">
                      <li>Primary industry: <span>{{ $job->employer->industry ?? 'N/A' }}</span></li>
                      <li>Company size: <span>{{ $job->employer->company_size ?? 'N/A' }}</span></li>
                      <li>Founded in: <span>{{ $job->employer->established_year ?? 'N/A' }}</span></li>
                      <li>Phone: <span>{{ $job->employer->phone ?? 'N/A' }}</span></li>
                      <li>Email: <span>{{ $job->email ?? 'N/A' }}</span></li>
                      <li>Location: <span>{{ $job->jobAddress->state ?? 'N/A' }},{{ $job->jobAddress->country }}</span></li>
                      <li>Social media:
                        <div class="social-links">
                          <a href="{{ $job->employer->user->socialNetwork->facebook??''}}"><i class="fab fa-facebook-f"></i></a>
                          <a href="{{ $job->employer->user->socialNetwork->twitter??''}}"><i class="fab fa-twitter"></i></a>
                          {{-- <a href="{{ url("#") }}"><i class="fab fa-instagram"></i></a> --}}
                          <a href="{{ $job->employer->user->socialNetwork->linkedin??''}}"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                      </li>
                    </ul>

                    <div class="btn-box"><a target="_blank" href="{{ $job->employer->website ?? '#' }}" class="theme-btn btn-style-three">{{ $job->employer->website ?? 'N/A' }}</a></div>
                  </div>
                </div>
              </aside>
            </div>
          </div>

          <!-- Related Jobs -->
          <div class="related-jobs">
            <div class="title-box">
              <h3>Related Jobs</h3>
              <div class="text">{{ \App\Models\Jobs::count() }} jobs live - {{ \App\Models\Jobs::whereDate('created_at', today())->count() }} added today.</div>
            </div>
            <div class="row">
              @foreach($relatedJobs as $relatedJob)
              <div class="job-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                  <ul class="job-other-info">
                    <li class="time">{{ $relatedJob->job_type }}</li>
                  </ul>
                  <span class="company-logo">
                    <img src="{{ asset('storage/logos/'.$relatedJob->employer->logo ?? '/images/default-company.png') }}" alt="">
                  </span>
                  <span class="company-name">{{ $relatedJob->employer->company_name ?? 'Unknown' }}</span>
                  <h4><a href="{{ route('jobs.details', $relatedJob->id) }}">{{ $relatedJob->title }}</a></h4>
                  <div class="location"><span class="icon flaticon-map-locator"></span>
                    {{ $relatedJob->jobAddress->state ?? 'Location Not Specified' }},{{ $relatedJob->jobAddress->country ?? 'Location Not Specified' }}
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- End Job Detail Section -->


  </div><!-- End Page Wrapper -->
</body>
@endsection