@extends('layouts.dashboard')

@section('title', 'Candidate Applied Jobs')
@section('content')
<!-- Dashboard -->
<section class="user-dashboard">
  <div class="dashboard-outer">
    <div class="upper-title-box">
      <h3>Applied Jobs</h3>
      <div class="text">Ready to jump back in?</div>
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
        <!-- Ls widget -->
        <div class="ls-widget">
          <div class="tabs-box">
            <div class="widget-title">
              <h4>My Applied Jobs</h4>

              <div class="chosen-outer">
                <!--Tabs Box-->
                <!-- <select class="chosen-select">
                  <option>Ascending</option>
                  <option>Descending</option>
                 
                </select> -->
              </div>
            </div>

            <div class="widget-content">
              <div class="table-outer">
                <table class="default-table manage-job-table">
                  <thead>
                    <tr>
                      <th>Job Title</th>
                      <th>Date Applied</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($appliedJobs as $job)
                    <tr>
                      <td>
                        <!-- Job Block -->
                        <div class="job-block">
                          <div class="inner-box">
                            <div class="content">
                              <span class="company-logo">

                                <!-- Use the dynamic company logo -->
                                <img src="{{ asset('storage/logos/' . $job->job->employer->logo ?? '/public/images/resource/company-logo/default-logo.png') }}" alt="">
                              </span>
                              <h4>
                                <!-- Dynamically set the job title -->
                                <a href="{{ url('#') }}">{{ $job->job->title }}</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>{{ \Carbon\Carbon::parse($job->created_at)->format('M d, Y') }}</td>
                      <td class="status">{{ ucfirst($job->status) }}</td>
                      <td>
                        <div class="option-box">
                            <ul class="option-list">
                                <li>
                                  <a href="{{ route('candidate.application.view', ['id' => $job->id]) }}"
                                    data-text="View Application">
                                    <span class="la la-eye"></span>
                                  </a>
                                </li>
                    
                                @if($job->status === 'Pending')
                                    <li>
                                        <button data-text="Delete Application"
                                                class="delete-btn"
                                                data-id="{{ $job->id }}">
                                            <span class="la la-trash"></span>
                                        </button>
                                    </li>
                                @elseif($job->status === 'approved')
                                    <li>
                                        <button data-text="Accept Offer"
                                                class="accept-offer-btn"
                                                data-id="{{ $job->id }}">
                                            <span class="la la-handshake"></span>
                                        </button>
                                    </li>
                                @elseif($job->status === 'rejected')
                                    <li>
                                        <button data-text="Delete Application"
                                                class="delete-btn"
                                                data-id="{{ $job->id }}">
                                            <span class="la la-trash"></span>
                                        </button>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </td>
                    
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
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