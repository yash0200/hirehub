@extends('layouts.dashboard')

@section('title', 'Employer Dashboard')

@section('content')
  <div class="user-dashboard">
    <div class="dashboard-outer">
    <div class="upper-title-box">
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

      <h3>Howdy, Invision!</h3>
      <div class="text">Ready to jump back in?</div>
    </div>
    <div class="row">
      <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
      <div class="ui-item">
        <div class="left">
        <i class="icon flaticon-briefcase"></i>
        </div>
        <div class="right">
        <h4>{{ $jobCount }}</h4>
        <p>Posted Jobs</p>
        </div>
      </div>
      </div>

      <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
      <div class="ui-item ui-red">
        <div class="left">
        <i class="icon la la-file-invoice"></i>
        </div>
        <div class="right">
        <h4>{{ $applications }}</h4>
        <p>Applications</p>
        </div>
      </div>
      </div>

      <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
      <div class="ui-item ui-yellow">
        <div class="left">
        <i class="icon la la-comment-o"></i>
        </div>
        <div class="right">
        <h4>74</h4>
        <p>Messages</p>
        </div>
      </div>
      </div>
      <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
      <div class="ui-item ui-green">
        <div class="left">
        <i class="icon la la-bookmark-o"></i>
        </div>
        <div class="right">
        <h4>32</h4>
        <p>Shortlist</p>
        </div>
      </div>
      </div>
    </div>

    <div class="row">


      <div class="col-xl-7 col-lg-12">
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

      <div class="col-xl-5 col-lg-12">
      <!-- Notification Widget -->
      <div class="notification-widget ls-widget">
        <div class="widget-title">
        <h4>Notifications</h4>
        </div>
        <div class="widget-content">
        <ul class="notification-list">
          <li><span class="icon flaticon-briefcase"></span> <strong>Wade Warren</strong> applied for a job <span
            class="colored">Web Developer</span></li>
          <li><span class="icon flaticon-briefcase"></span> <strong>Henry Wilson</strong> applied for a job <span
            class="colored">Senior Product Designer</span></li>
          <li class="success"><span class="icon flaticon-briefcase"></span> <strong>Raul Costa</strong> applied for
          a job <span class="colored">Product Manager, Risk</span></li>
          <li><span class="icon flaticon-briefcase"></span> <strong>Jack Milk</strong> applied for a job <span
            class="colored">Technical Architect</span></li>
          <li class="success"><span class="icon flaticon-briefcase"></span> <strong>Michel Arian</strong> applied
          for a job <span class="colored">Software Engineer</span></li>
          <li><span class="icon flaticon-briefcase"></span> <strong>Ali Tufan</strong> applied for a job <span
            class="colored">UI Designer</span></li>
        </ul>
        </div>
      </div>
      </div>


      <div class="col-lg-12">
      <!-- applicants Widget -->
      <div class="applicants-widget ls-widget">
        <div class="widget-title">
        <h4>Recent Applicants</h4>
        </div>
        <div class="widget-content">
        <div class="row">

          <!-- Candidate block three -->
          @foreach($applicants as $applicant)
        <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
        <div class="inner-box">
        <div class="content">
        <figure class="image">
          <img src="{{ asset('/storage/profile_photos/' . $applicant->candidate->profile_photo) }}" alt="{{ $applicant->name }}">
        </figure>
        <h4 class="name"><a href="#">{{ $applicant->candidate->full_name }}</a></h4>
        <ul class="candidate-info">
          <li class="designation">{{ $applicant->resume->job_title }}</li>
          <li><span class="icon flaticon-map-locator"></span> {{ $applicant->candidate_address->city??''}} ,{{ $applicant->candidate_address->state??''}}</li>
          <li><span class="icon flaticon-money"></span> ${{ $applicant->job->salary }}</li>
        </ul>
        <ul class="post-tags">
          <li><a href="#">App</a></li>
          <li><a href="#">Design</a></li>
          <li><a href="#">Digital</a></li>
        </ul>
        </div>
        <div class="option-box">
        <ul class="option-list">
          <li><button data-text="View Application"><span class="la la-eye"></span></button></li>
          <li><button data-text="Approve Application"><span class="la la-check"></span></button></li>
          <li><button data-text="Reject Application"><span class="la la-times-circle"></span></button></li>
          <li><button data-text="Delete Application"><span class="la la-trash"></span></button></li>
        </ul>
        </div>
        </div>
        </div>

        
      @endforeach          
          </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>
  <div class="copyright-text">
    <p>© 2025 Hirehub. All Right Reserved.</p>
  </div>

@endsection