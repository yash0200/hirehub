@extends('layouts.dashboard')

@section('title', 'Candidate Dashboard')

@section('content')

<section class="user-dashboard">
      <div class="dashboard-outer">
        <div class="upper-title-box">
          
              <h3>Welcome, {{auth()->user()->name}}!!</h3>
              <div class="text">Ready to jump back in?</div>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        
        </div>
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item">
                <div class="left">
                    <i class="icon flaticon-briefcase"></i>
                </div>
                <div class="right">
                    <h4>{{ $appliedJobsCount }}</h4>
                    <p>Applied Jobs</p>
                </div>
            </div>
          </div>
    
          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-red">
                <div class="left">
                    <i class="icon la la-file-invoice"></i>
                </div>
                <div class="right">
                    <h4>{{ $jobAlertsCount }}</h4>
                    <p>Preferences Job Alerts</p>
                </div>
            </div>
          </div>
    
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-green">
                <div class="left">
                    <i class="icon la la-bookmark-o"></i>
                </div>
                <div class="right">
                    <h4>{{ $shortlistCount }}</h4>
                    <p>Shortlist</p>
                </div>
            </div>
          </div>
          {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-yellow">
              <div class="left">
                <i class="icon la la-comment-o"></i>
              </div>
              <div class="right">
                <h4>74</h4>
                <p>Messages</p>
              </div>
            </div>
          </div> --}}
          <!-- Profile Completion -->
          <div class="col-xl-6 col-lg-6 col-md-12">
            <div class="skills-percentage">
                <h4>Profile Completion</h4>
                <p>
                    Complete your profile details to increase your completion score to 100%.
                </p>
                <div class="bar">
                    <span class="bar-inner" style="width: {{ $profileCompletion }}%; background-color: #7367F0;"></span>
                </div>
                <p>{{ $profileCompletion }}% Completed</p>
            </div>
          </div>

          <!-- Resume Completion -->
          <div class="col-xl-6 col-lg-6 col-md-12">
              <div class="skills-percentage">
                  <h4>Resume Completion</h4>
                  <p>
                      Complete your resume details to increase your completion score to 100%.
                  </p>
                  <div class="bar">
                      <span class="bar-inner" style="width: {{ $resumeCompletion }}%; background-color: #28C76F;"></span>
                  </div>
                  <p>{{ $resumeCompletion }}% Completed</p>
              </div>
          </div> 
        </div>
      

        <div class="row">


          <div class="col-lg-7">
            <!-- Graph widget -->
            <div class="graph-widget ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>Your Profile Views</h4>
                  <div class="chosen-outer">
                    <!--Tabs Box-->
                    <select class="chosen-select">
                      <option>Last 6 Months</option>
                      <option>Last 12 Months</option>
                      <option>Last 16 Months</option>
                      <option>Last 24 Months</option>
                      <option>Last 5 year</option>
                    </select>
                  </div>
                </div>

                <div class="widget-content">
                  <canvas id="chart" width="100" height="45"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <!-- Notification Widget -->
            <div class="notification-widget ls-widget">
              <div class="widget-title">
                <h4>Notifications</h4>
                <a href="{{url('/candidate/notifications')}}">View all</a>
              </div>
              <div class="widget-content">
                <ul class="notification-list">
                  {{-- <li><span class="icon flaticon-briefcase"></span> <strong>Wade Warren</strong> applied for a job <span class="colored">Web Developer</span></li>
                  <li><span class="icon flaticon-briefcase"></span> <strong>Henry Wilson</strong> applied for a job <span class="colored">Senior Product Designer</span></li>
                  <li class="success"><span class="icon flaticon-briefcase"></span> <strong>Raul Costa</strong> applied for a job <span class="colored">Product Manager, Risk</span></li>
                  <li><span class="icon flaticon-briefcase"></span> <strong>Jack Milk</strong> applied for a job <span class="colored">Technical Architect</span></li>
                  <li class="success"><span class="icon flaticon-briefcase"></span> <strong>Michel Arian</strong> applied for a job <span class="colored">Software Engineer</span></li>
                  <li><span class="icon flaticon-briefcase"></span> <strong>Ali Tufan</strong> applied for a job <span class="colored">UI Designer</span></li> --}}
                  @forelse($notifications as $notification)
                    @php
                      // Fetch the corresponding applicant's status for green and danger
                      $applicant = \App\Models\Applicant::where('id', $notification->candidate_id)->first();
                      $statusClass = $applicant && $applicant->status == 'approved' ? 'success' : 
                                  ($applicant && $applicant->status == 'rejected' ? 'danger' : '');
                    @endphp

                    <li class="{{ $statusClass }}">
                        <span class="icon flaticon-briefcase"></span> 
                        {{ $notification->message }} 
                    </li>
                  @empty
                    <li>No recent notifications available.</li>
                  @endforelse
                </ul>
              </div>
            </div>
          </div>


          <div class="col-lg-12">
            <!-- applicants Widget -->
            <div class="applicants-widget ls-widget">
              <div class="widget-title">
                <h4>Jobs Applied Recently</h4>
              </div>
              <div class="widget-content">
                <div class="row">
                  <!-- Job Block -->
                  @foreach($appliedJobs as $application)
                    <div class="job-block col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <span class="company-logo">
                                    <img src="{{ $application->job->employer->logo 
                                        ? asset('storage/logos/'.$application->job->employer->logo) 
                                        : asset('/images/resource/company-logo/default-logo.png') }}" 
                                        alt="{{ $application->job->employer->company_name ?? 'Company' }}">
                                </span>

                                <h4>
                                    <a href="{{ route('jobs.details', $application->job->id) }}">
                                        {{ $application->job->title }}
                                    </a>
                                </h4>

                                <ul class="job-info">
                                    <li>
                                        <span class="icon flaticon-briefcase"></span>
                                        {{ $application->job->employer->company_name ?? 'N/A' }}
                                    </li>
                                    <li>
                                        <span class="icon flaticon-map-locator"></span>
                                        {{ $application->job->jobAddress->city ?? 'Location not specified' }}
                                    </li>
                                    <li>
                                        <span class="icon flaticon-clock-3"></span>
                                        {{ $application->created_at->diffForHumans() }}
                                    </li>
                                    <li>
                                        <span class="icon flaticon-money"></span>
                                        {{ $application->job->salary ?? 'Not disclosed' }}
                                    </li>
                                </ul>

                                <ul class="job-other-info">
                                    <li class="time">{{ $application->job->job_type ?? 'N/A' }}</li>
                                    @if($application->job->is_urgent)
                                        <li class="required">Urgent</li>
                                    @endif
                                </ul>

                                @php
                                    $user = auth()->user();
                                    $candidate = $user ? $user->candidate : null;
                                    $isShortlisted = false;
                
                                    if ($candidate) {
                                        $isShortlisted = \App\Models\ShortlistedJob::where('candidate_id', $candidate->id)
                                            ->where('job_id', $application->job->id)
                                            ->exists();
                                    }
                                @endphp
                
                                <!-- Bookmark Button -->
                                <button type="button" 
                                    class="bookmark-btn {{ $isShortlisted ? 'active' : '' }}" 
                                    data-job-id="{{ $application->job->id }}" 
                                    onclick="toggleBookmark(this, {{ $user ? 'true' : 'false' }})">
                                    <i class="flaticon-bookmark"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                  @endforeach

                  @if($appliedJobs->isEmpty())
                      <p>No applied jobs yet.</p>
                  @endif

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Copyright -->
    <div class="copyright-text">
      <p>© 2025 <a href="{{ url("/") }}">Hirehub</a>. All Right Reserved.</p>
    </div>
    @endsection