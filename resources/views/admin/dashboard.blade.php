@extends('layouts.admin_dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<div class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Welcome, Admin!</h3>
            <div class="text">Ready to manage the platform?</div>
        </div>
        <div class="row">
            <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="ui-item">
                    <div class="left">
                        <i class="icon flaticon-briefcase"></i>
                    </div>
                    <div class="right">
                        <h4>150</h4>
                        <p>Total Employers</p>
                    </div>
                </div>
            </div>
            <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="ui-item ui-red">
                    <div class="left">
                        <i class="icon la la-file-invoice"></i>
                    </div>
                    <div class="right">
                        <h4>9382</h4>
                        <p>Total Applications</p>
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
                        <p>Total Messages</p>
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
                        <p>Total Resumes Shortlisted</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-7 col-lg-12">
                <!-- Graph Widget -->
                <div class="graph-widget ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Platform Usage</h4>
                            <div class="chosen-outer">
                                <!-- Tabs Box -->
                                <select class="chosen-select">
                                    <option>Last 6 Months</option>
                                    <option>Last 12 Months</option>
                                    <option>Last 16 Months</option>
                                    <option>Last 24 Months</option>
                                    <option>Last 5 years</option>
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
                        <h4>Recent Notifications</h4>
                    </div>
                    <div class="widget-content">
                        <ul class="notification-list">
                            <li><span class="icon flaticon-briefcase"></span> <strong>John Doe</strong> registered as a new employer</li>
                            <li><span class="icon flaticon-briefcase"></span> <strong>Jane Smith</strong> posted a new job listing <span class="colored">Software Engineer</span></li>
                            <li class="success"><span class="icon flaticon-briefcase"></span> <strong>Alex Brown</strong> updated his profile</li>
                            <li><span class="icon flaticon-briefcase"></span> <strong>Michael Johnson</strong> posted a new job listing <span class="colored">Senior Product Designer</span></li>
                            <li class="success"><span class="icon flaticon-briefcase"></span> <strong>Raul Costa</strong> made a payment for job posting</li>
                            <li><span class="icon flaticon-briefcase"></span> <strong>Ali Tufan</strong> sent a message to admin</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <!-- Recent Applications Widget -->
                <div class="applicants-widget ls-widget">
                    <div class="widget-title">
                        <h4>Recent Applications</h4>
                    </div>
                    <div class="widget-content">
                        <div class="row">
                            <!-- Candidate Block -->
                            <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-box">
                                    <div class="content">
                                        <figure class="image"><img src="{{ asset('/images/resource/candidate-1.png') }}" alt=""></figure>
                                        <h4 class="name"><a href="{{ url('#') }}">Darlene Robertson</a></h4>
                                        <ul class="candidate-info">
                                            <li class="designation">UI Designer</li>
                                            <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                            <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                        </ul>
                                        <ul class="post-tags">
                                            <li><a href="{{ url('#') }}">App</a></li>
                                            <li><a href="{{ url('#') }}">Design</a></li>
                                            <li><a href="{{ url('#') }}">Digital</a></li>
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

                            <!-- Candidate Block -->
                            <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-box">
                                    <div class="content">
                                        <figure class="image"><img src="{{ asset('/images/resource/candidate-2.png') }}" alt=""></figure>
                                        <h4 class="name"><a href="{{ url('#') }}">Wade Warren</a></h4>
                                        <ul class="candidate-info">
                                            <li class="designation">UI Designer</li>
                                            <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                            <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                        </ul>
                                        <ul class="post-tags">
                                            <li><a href="{{ url('#') }}">App</a></li>
                                            <li><a href="{{ url('#') }}">Design</a></li>
                                            <li><a href="{{ url('#') }}">Digital</a></li>
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

                            <!-- More candidates can be added similarly -->

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
