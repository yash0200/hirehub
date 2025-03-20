@extends('layouts.dashboard')

@section('title', 'Employer Dashboard')

@section('content')
    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>All Aplicants</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Applicant</h4>

                                <!-- <div class="chosen-outer">
                                    Tabs Box
                                    <select class="chosen-select">
                                        <option>Select Jobs</option>
                                        <option>Last 12 Months</option>
                                        <option>Last 16 Months</option>
                                        <option>Last 24 Months</option>
                                        <option>Last 5 year</option>
                                    </select>

                                    Tabs Box
                                    <select class="chosen-select">
                                        <option>All Status</option>
                                        <option>Last 12 Months</option>
                                        <option>Last 16 Months</option>
                                        <option>Last 24 Months</option>
                                        <option>Last 5 year</option>
                                    </select>
                                </div> -->
                            </div>

                            <div class="widget-content">
                                <div class="tabs-box">
                                    @foreach ($jobs as $job)
                                        <div class="aplicants-upper-bar">
                                            <h6>{{ $job->title }}</h6> <!-- Dynamic Job Title -->
                                            <ul class="aplicantion-status tab-buttons clearfix">
                                                <li class="tab-btn active-btn totals" data-tab="#totals-{{ $job->id }}">
                                                    Total(s): {{ $job->applicants->count() }}
                                                </li>
                                                <li class="tab-btn approved" data-tab="#approved-{{ $job->id }}">
                                                    Approved: {{ $job->applicants->where('status', 'approved')->count() }}
                                                </li>
                                                <li class="tab-btn rejected" data-tab="#rejected-{{ $job->id }}">
                                                    Rejected(s): {{ $job->applicants->where('status', 'rejected')->count() }}
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="tabs-content">
                                            <!--Tab-->
                                            <div class="tab active-tab" id="totals-{{ $job->id }}">
                                                <div class="row">
                                                    <!-- Candidate block three -->
                                                    @foreach ($job->applicants as $applicant)
                                                        <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                                            <div class="inner-box">
                                                                <div class="content">
                                                                    <figure class="image">
                                                                        <!-- Display applicant image (You can add a dynamic image URL) -->
                                                                        <img src="{{ asset('/images/resource/candidate-1.png') }}"
                                                                            alt="">
                                                                    </figure>
                                                                    <h4 class="name">
                                                                        <a href="{{ route('employer.applicant.profile', ['id' => $applicant->candidate_id]) }}">
                                                                            {{ $applicant->candidate->full_name }}
                                                                        </a>
                                                                    </h4>
                                                                    <ul class="candidate-info">
                                                                        <li class="designation">{{ $applicant->resume->job_title }}</li>
                                                                        <li>
                                                                            <span class="icon flaticon-map-locator"></span>
                                                                            {{ optional($applicant->candidate_address)->state ?? 'State not available' }},
                                                                            {{ optional($applicant->candidate_address)->city ?? 'City not available' }}
                                                                        </li>
                                                                        <!-- <li><span class="icon flaticon-money"></span> ${{ $applicant->hourly_rate }} / hour</li> -->
                                                                    </ul>
                                                                    <ul class="post-tags">
                                                                        @foreach ($applicant->resume->skills as $skill)
                                                                            <li><a href="#">{{ $skill }}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <div class="option-box">
                                                                    <ul class="option-list">
                                                                        <!-- Assuming the options are actions for managing applicants -->
                                                                        <li>
                                                                            <a href="{{ route('employer.applicant.view', ['id' => $applicant->id]) }}"
                                                                                data-text="View Application">
                                                                                <span class="la la-eye"></span>
                                                                            </a>
                                                                        </li>
                                                                        @if ($applicant->status === 'Pending')
                                                                            <li>
                                                                                <button data-text="Approve Application"
                                                                                    class="approve-btn"
                                                                                    data-id="{{ $applicant->id }}">
                                                                                    <span class="la la-check"></span>
                                                                                </button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="reject-btn"
                                                                                    data-id="{{ $applicant->id }}"
                                                                                    data-text="Reject Application"><span
                                                                                        class="la la-times-circle"></span>
                                                                                </button>
                                                                            </li>
                                                                        @elseif ($applicant->status === 'approved')
                                                                            <li>
                                                                                <span class="status text-success">Approved</span>
                                                                            </li>
                                                                        @elseif ($applicant->status === 'rejected')
                                                                            <li>
                                                                                <span class="status text-danger">Rejected</span>
                                                                            </li>
                                                                        @endif

                                                                        <!-- <li><button data-text="Delete Application"><span class="la la-trash"></span></button></li> -->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!--Tab-->
                                            <div class="tab" id="approved-{{ $job->id }}">
                                                <div class="row">
                                                    @foreach ($job->applicants->where('status', 'approved') as $applicant)
                                                        @include('partials.applicant_block', ['applicant' => $applicant])
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Tab - Rejected -->
                                            <div class="tab" id="rejected-{{ $job->id }}">
                                                <div class="row">
                                                    @foreach ($job->applicants->where('status', 'rejected') as $applicant)
                                                        <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                                            <div class="inner-box">
                                                                <div class="content">
                                                                    <figure class="image">
                                                                        <img src="{{ asset('/images/resource/candidate-1.png') }}" alt="Applicant Image">
                                                                    </figure>
                                                                    <h4 class="name">
                                                                        <a href="{{ route('employer.applicant.view', ['id' => $applicant->candidate_id]) }}">
                                                                            {{ $applicant->candidate->full_name }}
                                                                        </a>
                                                                    </h4>

                                                                    <ul class="candidate-info">
                                                                        <li class="designation">{{ $applicant->resume->job_title }}</li>
                                                                        <li>
                                                                            <span class="icon flaticon-map-locator"></span>
                                                                            {{ optional($applicant->candidate_address)->state ?? 'State not available' }},
                                                                            {{ optional($applicant->candidate_address)->city ?? 'City not available' }}
                                                                        </li>
                                                                    </ul>

                                                                    <ul class="post-tags">
                                                                        @foreach ($applicant->resume->skills as $skill)
                                                                            <li><a href="#">{{ $skill }}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>

                                                                <div class="option-box">
                                                                    <ul class="option-list">
                                                                        <li>
                                                                            <a href="{{ route('employer.applicant.view', ['id' => $applicant->candidate_id]) }}"
                                                                                data-text="View Applicant Profile">
                                                                                <span class="la la-eye"></span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <button data-text="Approve Application"
                                                                                    class="approve-btn"
                                                                                    data-id="{{ $applicant->id }}">
                                                                                <span class="la la-check"></span>
                                                                            </button>
                                                                        </li>
                                                                        <li>
                                                                            <button data-text="Already Rejected"
                                                                                    class="disabled-btn"
                                                                                    disabled>
                                                                                <span class="la la-times-circle text-danger"></span>
                                                                            </button>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
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
    </section>
    <!-- End Dashboard -->

    <!-- Copyright -->
    <div class="copyright-text">
        <p>© 2025 <a href="{{ url("/") }}">Hirehub</a>. All Right Reserved.</p>
    </div>
@endsection