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

                                <div class="chosen-outer">
                                    <!--Tabs Box-->
                                    <select class="chosen-select">
                                        <option>Select Jobs</option>
                                        <option>Last 12 Months</option>
                                        <option>Last 16 Months</option>
                                        <option>Last 24 Months</option>
                                        <option>Last 5 year</option>
                                    </select>

                                    <!--Tabs Box-->
                                    <select class="chosen-select">
                                        <option>All Status</option>
                                        <option>Last 12 Months</option>
                                        <option>Last 16 Months</option>
                                        <option>Last 24 Months</option>
                                        <option>Last 5 year</option>
                                    </select>
                                </div>
                            </div>

                            <div class="widget-content">

                                <div class="tabs-box">
                                    <div class="aplicants-upper-bar">
                                        <h6>Senior Product Designer</h6>
                                        <ul class="aplicantion-status tab-buttons clearfix">
                                            <li class="tab-btn active-btn totals" data-tab="#totals">Total(s): 6</li>
                                            <li class="tab-btn approved" data-tab="#approved">Approved: 2</li>
                                            <li class="tab-btn rejected" data-tab="#rejected">Rejected(s): 4</li>
                                        </ul>
                                    </div>

                                    <div class="tabs-content">
                                        <!--Tab-->
                                        <div class="tab active-tab" id="totals">
                                            <div class="row">
                                                <!-- Candidate block three -->


                                                @foreach ($applicants as $applicant)
                                                    <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                                        <div class="inner-box">
                                                            <div class="content">
                                                                <figure class="image">
                                                                    <!-- Display applicant image (You can add a dynamic image URL) -->
                                                                    <img src="{{ asset('/images/resource/candidate-1.png') }}"
                                                                        alt="">
                                                                </figure>
                                                                <h4 class="name"><a
                                                                        href="{{ url('#') }}">{{ $applicant->candidate->full_name }}</a>
                                                                </h4>
                                                                <ul class="candidate-info">
                                                                    <li class="designation">{{ $applicant->resume->job_title }}
                                                                    </li>
                                                                    <li><span class="icon flaticon-map-locator"></span>
                                                                        {{ optional($applicant->candidate_address)->state ?? 'State not available' }},
                                                                        {{ optional($applicant->candidate_address)->city ?? 'City not available' }}
                                                                    </li>
                                                                    <!-- <li><span class="icon flaticon-money"></span> ${{ $applicant->hourly_rate }} / hour</li> -->
                                                                </ul>
                                                                <ul class="post-tags">
                                                                    <!-- Assuming you have tags or skills for the applicant -->
                                                                    @foreach ($applicant->resume->skills as $skill)
                                                                        <li><a href="{{ url('#') }}">{{ $skill }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="option-box">
                                                                <ul class="option-list">
                                                                    <!-- Assuming the options are actions for managing applicants -->
                                                                    <li><button data-text="View Application"><span class="la la-eye"></span></button></li>
                                                                    <li>
                                                                        <button data-text="Approve Application"
                                                                            class="approve-btn" data-id="{{ $applicant->id }}">
                                                                            <span class="la la-check"></span>
                                                                        </button>
                                                                    </li>
                                                                    <li><button data-text="Reject Application"><span
                                                                                class="la la-times-circle"></span></button></li>
                                                                    <!-- <li><button data-text="Delete Application"><span class="la la-trash"></span></button></li> -->
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach




                                            </div>
                                        </div>

                                        <!--Tab-->
                                        <div class="tab" id="approved">
                                            <div class="row">
                                                <!-- Candidate block three -->
                                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                                    <div class="inner-box">
                                                        <div class="content">
                                                            <figure class="image"><img
                                                                    src="{{ asset("/images/resource/candidate-1.png") }}"
                                                                    alt=""></figure>
                                                            <h4 class="name"><a href="{{ url("#") }}">Darlene Robertson</a>
                                                            </h4>
                                                            <ul class="candidate-info">
                                                                <li class="designation">UI Designer</li>
                                                                <li><span class="icon flaticon-map-locator"></span> London,
                                                                    UK</li>
                                                                <li><span class="icon flaticon-money"></span> $99 / hour
                                                                </li>
                                                            </ul>
                                                            <ul class="post-tags">
                                                                <li><a href="{{ url("#") }}">App</a></li>
                                                                <li><a href="{{ url("#") }}">Design</a></li>
                                                                <li><a href="{{ url("#") }}">Digital</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="option-box">
                                                            <ul class="option-list">
                                                                <li><button data-text="View Aplication"><span
                                                                            class="la la-eye"></span></button></li>
                                                                <li><button data-text="Approve Aplication"><span
                                                                            class="la la-check"></span></button></li>
                                                                <li><button data-text="Reject Aplication"><span
                                                                            class="la la-times-circle"></span></button></li>
                                                                <li><button data-text="Delete Aplication"><span
                                                                            class="la la-trash"></span></button></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Candidate block three -->
                                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                                    <div class="inner-box">
                                                        <div class="content">
                                                            <figure class="image"><img
                                                                    src="{{ asset("/images/resource/candidate-2.png") }}"
                                                                    alt=""></figure>
                                                            <h4 class="name"><a href="{{ url("#") }}">Wade Warren</a></h4>
                                                            <ul class="candidate-info">
                                                                <li class="designation">UI Designer</li>
                                                                <li><span class="icon flaticon-map-locator"></span> London,
                                                                    UK</li>
                                                                <li><span class="icon flaticon-money"></span> $99 / hour
                                                                </li>
                                                            </ul>
                                                            <ul class="post-tags">
                                                                <li><a href="{{ url("#") }}">App</a></li>
                                                                <li><a href="{{ url("#") }}">Design</a></li>
                                                                <li><a href="{{ url("#") }}">Digital</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="option-box">
                                                            <ul class="option-list">
                                                                <li><button data-text="View Aplication"><span
                                                                            class="la la-eye"></span></button></li>
                                                                <li><button data-text="Approve Aplication"><span
                                                                            class="la la-check"></span></button></li>
                                                                <li><button data-text="Reject Aplication"><span
                                                                            class="la la-times-circle"></span></button></li>
                                                                <li><button data-text="Delete Aplication"><span
                                                                            class="la la-trash"></span></button></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!--Tab-->
                                        <div class="tab" id="rejected">
                                            <div class="row">
                                                <!-- Candidate block three -->
                                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                                    <div class="inner-box">
                                                        <div class="content">
                                                            <figure class="image"><img
                                                                    src="{{ asset("/images/resource/candidate-3.png") }}"
                                                                    alt=""></figure>
                                                            <h4 class="name"><a href="{{ url("#") }}">Leslie Alexander</a>
                                                            </h4>
                                                            <ul class="candidate-info">
                                                                <li class="designation">UI Designer</li>
                                                                <li><span class="icon flaticon-map-locator"></span> London,
                                                                    UK</li>
                                                                <li><span class="icon flaticon-money"></span> $99 / hour
                                                                </li>
                                                            </ul>
                                                            <ul class="post-tags">
                                                                <li><a href="{{ url("#") }}">App</a></li>
                                                                <li><a href="{{ url("#") }}">Design</a></li>
                                                                <li><a href="{{ url("#") }}">Digital</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="option-box">
                                                            <ul class="option-list">
                                                                <li><button data-text="View Aplication"><span
                                                                            class="la la-eye"></span></button></li>
                                                                <li><button data-text="Approve Aplication"><span
                                                                            class="la la-check"></span></button></li>
                                                                <li><button data-text="Reject Aplication"><span
                                                                            class="la la-times-circle"></span></button></li>
                                                                <li><button data-text="Delete Aplication"><span
                                                                            class="la la-trash"></span></button></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Candidate block three -->
                                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                                    <div class="inner-box">
                                                        <div class="content">
                                                            <figure class="image"><img
                                                                    src="{{ asset("/images/resource/candidate-1.png") }}"
                                                                    alt=""></figure>
                                                            <h4 class="name"><a href="{{ url("#") }}">Darlene Robertson</a>
                                                            </h4>
                                                            <ul class="candidate-info">
                                                                <li class="designation">UI Designer</li>
                                                                <li><span class="icon flaticon-map-locator"></span> London,
                                                                    UK</li>
                                                                <li><span class="icon flaticon-money"></span> $99 / hour
                                                                </li>
                                                            </ul>
                                                            <ul class="post-tags">
                                                                <li><a href="{{ url("#") }}">App</a></li>
                                                                <li><a href="{{ url("#") }}">Design</a></li>
                                                                <li><a href="{{ url("#") }}">Digital</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="option-box">
                                                            <ul class="option-list">
                                                                <li><button data-text="View Aplication"><span
                                                                            class="la la-eye"></span></button></li>
                                                                <li><button data-text="Approve Aplication"><span
                                                                            class="la la-check"></span></button></li>
                                                                <li><button data-text="Reject Aplication"><span
                                                                            class="la la-times-circle"></span></button></li>
                                                                <li><button data-text="Delete Aplication"><span
                                                                            class="la la-trash"></span></button></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Candidate block three -->
                                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                                    <div class="inner-box">
                                                        <div class="content">
                                                            <figure class="image"><img
                                                                    src="{{ asset("/images/resource/candidate-2.png") }}"
                                                                    alt=""></figure>
                                                            <h4 class="name"><a href="{{ url("#") }}">Wade Warren</a></h4>
                                                            <ul class="candidate-info">
                                                                <li class="designation">UI Designer</li>
                                                                <li><span class="icon flaticon-map-locator"></span> London,
                                                                    UK</li>
                                                                <li><span class="icon flaticon-money"></span> $99 / hour
                                                                </li>
                                                            </ul>
                                                            <ul class="post-tags">
                                                                <li><a href="{{ url("#") }}">App</a></li>
                                                                <li><a href="{{ url("#") }}">Design</a></li>
                                                                <li><a href="{{ url("#") }}">Digital</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="option-box">
                                                            <ul class="option-list">
                                                                <li><button data-text="View Aplication"><span
                                                                            class="la la-eye"></span></button></li>
                                                                <li><button data-text="Approve Aplication"><span
                                                                            class="la la-check"></span></button></li>
                                                                <li><button data-text="Reject Aplication"><span
                                                                            class="la la-times-circle"></span></button></li>
                                                                <li><button data-text="Delete Aplication"><span
                                                                            class="la la-trash"></span></button></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Candidate block three -->
                                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                                    <div class="inner-box">
                                                        <div class="content">
                                                            <figure class="image"><img
                                                                    src="{{ asset("/images/resource/candidate-3.png") }}"
                                                                    alt=""></figure>
                                                            <h4 class="name"><a href="{{ url("#") }}">Leslie Alexander</a>
                                                            </h4>
                                                            <ul class="candidate-info">
                                                                <li class="designation">UI Designer</li>
                                                                <li><span class="icon flaticon-map-locator"></span> London,
                                                                    UK</li>
                                                                <li><span class="icon flaticon-money"></span> $99 / hour
                                                                </li>
                                                            </ul>
                                                            <ul class="post-tags">
                                                                <li><a href="{{ url("#") }}">App</a></li>
                                                                <li><a href="{{ url("#") }}">Design</a></li>
                                                                <li><a href="{{ url("#") }}">Digital</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="option-box">
                                                            <ul class="option-list">
                                                                <li><button data-text="View Aplication"><span
                                                                            class="la la-eye"></span></button></li>
                                                                <li><button data-text="Approve Aplication"><span
                                                                            class="la la-check"></span></button></li>
                                                                <li><button data-text="Reject Aplication"><span
                                                                            class="la la-times-circle"></span></button></li>
                                                                <li><button data-text="Delete Aplication"><span
                                                                            class="la la-trash"></span></button></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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