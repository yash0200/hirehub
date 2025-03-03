<header class="main-header">

    <!-- Main box -->
    <div class="main-box">
        <!--Nav Outer -->
        <div class="nav-outer">
            <div class="logo-box">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img style="height:55px;width:152px;" src="{{ asset('/images/logo.svg') }}" alt="Hirehub">
                    </a>
                </div>
            </div>

            <nav class="nav main-menu">
                <ul class="navigation" id="navbar">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="dropdown has-mega-menu" id="has-mega-menu">
                        <span><a href="{{ url('/jobs') }}">Jobs</a></span>
                        <div class="mega-menu">
                            <div class="mega-menu-bar row">
                                <div class="column col-lg-3 col-md-3 col-sm-12">
                                    <h3>Popular categories</h3>
                                    <ul>
                                        <li><a href="{{ url('job-list-v1.html') }}">It jobs</a></li>
                                        <li><a href="{{ url('job-list-v2.html') }}">Sales jobs</a></li>
                                        <li><a href="{{ url('job-list-v3.html') }}">Marketing jobs</a></li>
                                        <li><a href="{{ url('job-list-v4.html') }}">Data Sciencejobs</a></li>
                                        <li><a href="{{ url('job-list-v5.html') }}">HR jobs</a></li>
                                        <li><a href="{{ url('job-list-v5.html') }}">Engineering jobs</a></li>
                                    </ul>
                                </div>

                                <div class="column col-lg-3 col-md-3 col-sm-12">
                                    <h3>Jobs in demand</h3>
                                    <ul>
                                        <li><a href="{{ url('job-list-v6.html') }}">Fresher jobs</a></li>
                                        <li><a href="{{ url('job-list-v7.html') }}">MNC jobs</a></li>
                                        <li><a href="{{ url('job-list-v8.html') }}">Work from home jobs</a></li>
                                        <li><a href="{{ url('job-list-v9.html') }}">Walk-in jobs</a></li>
                                        <li><a href="{{ url('job-list-v10.html') }}">Part-time jobs</a></li>
                                    </ul>
                                </div>

                                <div class="column col-lg-3 col-md-3 col-sm-12">
                                    <h3>Jobs by location</h3>
                                    <ul>
                                        <li><a href="{{ url('job-list-v11.html') }}">Jobs in Delhi</a></li>
                                        <li><a href="{{ url('job-list-v12.html') }}">Jobs in Mumbai</a></li>
                                        <li><a href="{{ url('job-list-v13.html') }}">Jobs in Bangalore</a></li>
                                        <li><a href="{{ url('job-list-v14.html') }}">Jobs in Hyderabad</a></li>
                                        <li><a href="{{ url('job-list-v15.html') }}">Jobs in Chennai</a></li>
                                        <li><a href="{{ url('job-list-v16.html') }}">Jobs in Pune</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown has-mega-menu" id="has-mega-menu">
                        <span><a href="{{ url('/companies') }}">Companies</a></span>
                        <div class="mega-menu">
                            <div class="mega-menu-bar row">
                                <div class="column col-lg-3 col-md-3 col-sm-12">
                                    <h3>Explore categories</h3>
                                    <ul>
                                        <li><a href="{{ url('compines-list-v1.html') }}">Unicorn</a></li>
                                        <li><a href="{{ url('compines-list-v1.html') }}">MNC</a></li>
                                        <li><a href="{{ url('compines-list-v1.html') }}">Startup</a></li>
                                        <li><a href="{{ url('compines-list-v1.html') }}">Product Based</a></li>
                                        <li><a href="{{ url('compines-list-v1.html') }}">Internet</a></li>
                                    </ul>
                                </div>

                                <div class="column col-lg-3 col-md-3 col-sm-12">
                                    <h3>Explore collections</h3>
                                    <ul>
                                        <li><a href="{{ url('compines-single-v1.html') }}">Top companies</a></li>
                                        <li><a href="{{ url('compines-single-v1.html') }}">IT companies</a></li>
                                        <li><a href="{{ url('compines-single-v1.html') }}">Fintech companies</a></li>
                                        <li><a href="{{ url('compines-single-v1.html') }}">Sponsored companies</a></li>
                                        <li><a href="{{ url('compines-single-v1.html') }}">Featured companies</a></li>
                                    </ul>
                                </div>

                                <div class="column col-lg-3 col-md-3 col-sm-12">
                                    <h3>Research companies</h3>
                                    <ul>
                                        <li><a href="{{ url('compines-single-v1.html') }}">Interview questions</a></li>
                                        <li><a href="{{ url('compines-single-v1.html') }}">Company salaries</a></li>
                                        <li><a href="{{ url('compines-single-v1.html') }}">Company reviews</a></li>
                                        <li><a href="{{ url('compines-single-v1.html') }}">Salary calculator</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    @auth
                    @if(auth()->user()->name === 'admin')

                    <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                    <li><a href="{{ route('admin.users') }}">Manage Users</a></li>
                    <li><a href="{{ route('admin.settings') }}">Settings</a></li>

                    @elseif(auth()->user()->user_type === 'candidate')
                    <li><a href="{{ route('candidate.dashboard') }}">Candidate Dashboard</a></li>
                    <li><a href="{{ route('candidate.profile') }}">My Profile</a></li>
                    <li><a href="{{ route('candidate.applications') }}">My Applications</a></li>

                    @elseif(auth()->user()->user_type === 'employer')

                    <li><a href="{{ route('employer.dashboard') }}">Employer Dashboard</a></li>
                    @endif
                    @endauth
                </ul>
            </nav>
            <!-- Main Menu End-->
        </div>

        <div class="outer-box">

            <!-- Show Login/Register & Post Job only when Logged Out -->
            @guest
            <div class="btn-box">
                <a href="{{ route('login') }}" class="theme-btn btn-style-five">Login / Register</a>
                <a href="{{ route('employer.job.create') }}" class="theme-btn btn-style-one">Post a Job</a>
            </div>
            @endguest

            @auth

            <!-- Saved Jobs (Only for Candidates) -->
            @if(auth()->user()->user_type === 'candidate')
            <button class="menu-btn">
                <span class="count"></span>
                <span class="icon la la-heart-o"></span>
            </button>
            @endif

            <!-- Notifications -->
            <button class="menu-btn">
                <span class="icon la la-bell"></span>
                <span class="count"></span>
            </button>

            <!-- Dashboard Option -->
            <div class="dropdown dashboard-option">
                <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                    @php
                    $user = auth()->user();
                    $profilePhoto = asset('/images/resource/company-6.png'); // Default Image

                    if ($user) {
                    if ($user->user_type === 'candidate' && $user->candidate && $user->candidate->profile_photo) {
                    $profilePhoto = asset('storage/profile_photos/' . $user->candidate->profile_photo);
                    } elseif ($user->user_type === 'employer' && $user->employer && $user->employer->logo) {
                    $profilePhoto = asset('storage/logos/' . $user->employer->logo);
                    }
                    }
                    @endphp
                    <img src="{{ $profilePhoto }}" alt="profile" class="thumb">
                    <span class="name">{{ auth()->user()->name ?? 'My Account' }}</span>
                </a>

                <ul class="dropdown-menu">
                    @if(auth()->user()->user_type === 'admin')
                    <!-- Dashboard Link -->
                    <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}"><i class="la la-home"></i> Dashboard</a>
                    </li>

                    <!-- Manage Users -->
                    <li class="{{ request()->routeIs('admin.users') ? 'active' : '' }}">
                        <a href="{{ route('admin.users') }}"><i class="la la-users"></i> Manage Users</a>
                    </li>

                    <!-- Manage Employers -->
                    <li class="{{ request()->routeIs('admin.employers') ? 'active' : '' }}">
                        <a href="{{ route('admin.employers') }}"><i class="la la-user-tie"></i> Manage Employers</a>
                    </li>

                    <!-- Manage Job Posts -->
                    <li class="{{ request()->routeIs('admin.jobs') ? 'active' : '' }}">
                        <a href="{{ route('admin.jobs') }}"><i class="la la-briefcase"></i> Manage Job Posts</a>
                    </li>

                    <!-- Job Categories -->
                    <li class="{{ request()->routeIs('admin.categories') ? 'active' : '' }}">
                        <a href="{{ route('admin.categories') }}"><i class="la la-tags"></i> Job Categories</a>
                    </li>

                    <!-- Application Management -->
                    <li class="{{ request()->routeIs('admin.applications') ? 'active' : '' }}">
                        <a href="{{ route('admin.applications') }}"><i class="la la-file-invoice"></i> View Applications</a>
                    </li>

                    <!-- Payments -->
                    <li class="{{ request()->routeIs('admin.payments') ? 'active' : '' }}">
                        <a href="{{ route('admin.payments') }}"><i class="la la-credit-card"></i> Payments</a>
                    </li>

                    <!-- Notifications -->
                    <li class="{{ request()->routeIs('admin.notifications') ? 'active' : '' }}">
                        <a href="{{ route('admin.notifications') }}"><i class="la la-bell"></i> Notifications</a>
                    </li>

                    <!-- Reports -->
                    <li class="{{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                        <a href="{{ route('admin.reports') }}"><i class="la la-chart-line"></i> Reports</a>
                    </li>

                    <!-- Site Settings -->
                    <li class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings') }}"><i class="la la-cogs"></i> Site Settings</a>
                    </li>

                    <!-- Change Password -->
                    <li class="{{ request()->routeIs('admin.password.change') ? 'active' : '' }}">
                        <a href="{{ route('admin.password.change') }}"><i class="la la-lock"></i> Change Password</a>
                    </li>

                    <!-- View Admin Profile -->
                    <li class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                        <a href="{{ route('admin.profile') }}"><i class="la la-user-alt"></i> View Profile</a>
                    </li>

                    <!-- Delete Admin Account -->
                    <li class="{{ request()->routeIs('admin.profile.delete') ? 'active' : '' }}">
                        <a href="{{ route('admin.profile.delete') }}"><i class="la la-trash"></i> Delete Account</a>
                    </li>


                    @elseif(auth()->user()->user_type === 'employer')
                    <li class="{{ request()->routeIs('employer.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('employer.dashboard') }}"><i class="la la-home"></i> Employer Dashboard</a>
                    </li>
                    <li class="{{ request()->routeIs('employer.company.profile') ? 'active' : '' }}">
                        <a href="{{ route('employer.company.profile') }}"><i class="la la-user-tie"></i> Company Profile</a>
                    </li>
                    <li class="{{ request()->routeIs('employer.job.create') ? 'active' : '' }}">
                        <a href="{{ route('employer.job.create') }}"><i class="la la-paper-plane"></i> Post a New Job</a>
                    </li>
                    <li class="{{ request()->routeIs('employer.job.manage') ? 'active' : '' }}">
                        <a href="{{ route('employer.job.manage') }}"><i class="la la-briefcase"></i>Manage Jobs</a>
                    </li>
                    <li class="{{ request()->routeIs('employer.applicants') ? 'active' : '' }}">
                        <a href="{{ route('employer.applicants') }}"><i class="la la-file-invoice"></i>All Applicant</a>
                    </li>
                    <li class="{{ request()->routeIs('employer.resumes') ? 'active' : '' }}">
                        <a href="{{ route('employer.resumes') }}"><i class="la la-bookmark-o"></i>Shortlisted Resume</a>
                    </li>
                    <li class="{{ request()->routeIs('employer.packages') ? 'active' : '' }}">
                        <a href="{{ route('employer.packages') }}"><i class="la la-box"></i> Packages</a>
                    </li>
                    <li class="{{ request()->routeIs('employer.messages') ? 'active' : '' }}">
                        <a href="{{ route('employer.messages') }}"><i class="la la-comment-o"></i> Messages</a>
                    </li>
                    <li class="{{ request()->routeIs('employer.resume.alerts') ? 'active' : '' }}">
                        <a href="{{ route('employer.resume.alerts') }}"><i class="la la-bell"></i>Resume Alert</a>
                    </li>
                    <li class="{{ request()->routeIs('employer.password.change') ? 'active' : '' }}">
                        <a href="{{ route('employer.password.change') }}"><i class="la la-lock"></i> Change Password</a>
                    </li>

                    @elseif(auth()->user()->user_type === 'candidate')
                    <li class="{{ request()->routeIs('candidate.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('candidate.dashboard') }}"> <i class="la la-home"></i> Dashboard</a>
                    </li>
                    <li class="{{ request()->routeIs('candidate.profile') ? 'active' : '' }}">
                        <a href="{{ route('candidate.profile') }}"><i class="la la-user-alt"></i>My Profile</a>
                    </li>
                    <li class="{{ request()->routeIs('candidate.resumes') ? 'active' : '' }}">
                        <a href="{{ route('candidate.resumes') }}"><i class="la la-file-invoice"></i> My Resume</a>
                    </li>
                    <li class="{{ request()->routeIs('candidate.appliedjobs') ? 'active' : '' }}">
                        <a href="{{ route('candidate.appliedjobs') }}"><i class="la la-briefcase"></i> Applied Jobs</a>
                    </li>
                    <li class="{{ request()->routeIs('candidate.jobalerts') ? 'active' : '' }}">
                        <a href="{{ route('candidate.jobalerts') }}"><i class="la la-bell"></i> Job Alerts</a>
                    </li>
                    <li class="{{ request()->routeIs('candidate.shortlist') ? 'active' : '' }}">
                        <a href="{{ route('candidate.shortlist') }}"><i class="la la-bookmark-o"></i>Shortlisted Jobs</a>
                    </li>
                    <li class="{{ request()->routeIs('candidate.messages') ? 'active' : '' }}">
                        <a href="{{ route('candidate.messages') }}"><i class="la la-comment-o"></i> Messages</a>
                    </li>
                    <li class="{{ request()->routeIs('candidate.password.change') ? 'active' : '' }}">
                        <a href="{{ route('candidate.password.change') }}"><i class="la la-lock"></i> Change Password</a>
                    </li>
                    @endif

                    <!-- Logout -->
                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="la la-sign-out"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @endauth
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('/images/logo.svg') }}" alt="Hirehub">
            </a>
        </div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">
            <div class="outer-box">
                <button id="toggle-user-sidebar">
                    <img src="{{ asset('/images/resource/company-6.png') }}" alt="avatar" class="thumb">
                </button>
                <a href="#" class="mobile-nav-toggler navbar-trigger">
                    <span class="flaticon-menu-1"></span>
                </a>
            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>