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
                        <figure class="image"><img src="{{ asset("/images/resource/candidate-4.png") }}" alt=""></figure>
                        <h4 class="name"><a href="{{ url('#') }}">Darlene Robertson</a></h4>
                        <ul class="candidate-info">
                            <li class="designation">UI Designer at Invision</li>
                            <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                            <li><span class="icon flaticon-money"></span> $99 / hour</li>
                            <li><span class="icon flaticon-clock"></span> Member Since,Aug 19, 2020</li>
                        </ul>
                    </div>
                    <div class="btn-box">
                        <a href="{{ url('#') }}" class="theme-btn btn-style-one">Download CV</a>
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
                        <p>Hello my name is Nicole Wells and web developer from Portland. In pharetra orci dignissim, blandit mi semper, ultricies diam. Suspendisse malesuada suscipit nunc non volutpat. Sed porta nulla id orci laoreet tempor non consequat enim. Sed vitae aliquam velit. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie. Morbi ornare ipsum sed sem condimentum, et pulvinar tortor luctus. Suspendisse condimentum lorem ut elementum aliquam.</p>
                        <p>Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie. Morbi ornare ipsum sed sem condimentum, et pulvinar tortor luctus. Suspendisse condimentum lorem ut elementum aliquam. Mauris nec erat ut libero vulputate pulvinar.</p>

                        <!-- Resume / Education -->
                        <div class="resume-outer">
                            <div class="upper-title">
                                <h4>Education</h4>
                            </div>
                            <!-- Resume BLock -->
                            <div class="resume-block">
                                <div class="inner">
                                    <span class="name">M</span>
                                    <div class="title-box">
                                        <div class="info-box">
                                            <h3>Bachlors in Fine Arts</h3>
                                            <span>Modern College</span>
                                        </div>
                                        <div class="edit-box">
                                            <span class="year">2012 - 2014</span>
                                        </div>
                                    </div>
                                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                                </div>
                            </div>

                            <!-- Resume BLock -->
                            <div class="resume-block">
                                <div class="inner">
                                    <span class="name">H</span>
                                    <div class="title-box">
                                        <div class="info-box">
                                            <h3>Computer Science</h3>
                                            <span>Harvard University</span>
                                        </div>
                                        <div class="edit-box">
                                            <span class="year">2008 - 2012</span>
                                        </div>
                                    </div>
                                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                                </div>
                            </div>
                        </div>

                        <!-- Resume / Work & Experience -->
                        <div class="resume-outer theme-blue">
                            <div class="upper-title">
                                <h4>Work & Experience</h4>
                            </div>
                            <!-- Resume BLock -->
                            <div class="resume-block">
                                <div class="inner">
                                    <span class="name">S</span>
                                    <div class="title-box">
                                        <div class="info-box">
                                            <h3>Product Designer</h3>
                                            <span>Spotify Inc.</span>
                                        </div>
                                        <div class="edit-box">
                                            <span class="year">2008 - 2012</span>
                                        </div>
                                    </div>
                                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                                </div>
                            </div>

                            <!-- Resume BLock -->
                            <div class="resume-block">
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
                        </div>

                        <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
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
                                                <span>28-33 Years</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-rate"></i>
                                                <h5>Current Salary:</h5>
                                                <span>11K - 15K</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-salary"></i>
                                                <h5>Expected Salary:</h5>
                                                <span>26K - 30K</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-user-2"></i>
                                                <h5>Gender:</h5>
                                                <span>Female</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-language"></i>
                                                <h5>Language:</h5>
                                                <span>English, German, Spanish</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-degree"></i>
                                                <h5>Education Level:</h5>
                                                <span>Master Degree</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="sidebar-widget social-media-widget">
                                    <h4 class="widget-title">Social media</h4>
                                    <div class="widget-content">
                                        <div class="social-links">
                                            <a href="{{ url('#') }}"><i class="fab fa-facebook-f"></i></a>
                                            <a href="{{ url('#') }}"><i class="fab fa-twitter"></i></a>
                                            <a href="{{ url('#') }}"><i class="fab fa-instagram"></i></a>
                                            <a href="{{ url('#') }}"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-widget">
                                    <!-- Job Skills -->
                                    <h4 class="widget-title">Professional Skills</h4>
                                    <div class="widget-content">
                                        <ul class="job-skills">
                                            <li><a href="{{ url('#') }}">app</a></li>
                                            <li><a href="{{ url('#') }}">administrative</a></li>
                                            <li><a href="{{ url('#') }}">android</a></li>
                                            <li><a href="{{ url('#') }}">wordpress</a></li>
                                            <li><a href="{{ url('#') }}">design</a></li>
                                            <li><a href="{{ url('#') }}">react</a></li>
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