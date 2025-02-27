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
                    <li><a href="{{ route('jobs.list') }}">Jobs</a></li>
                    <li><a href="{{ route('employers.list') }}">Companies</a></li>

                    @auth
                        @if(auth()->user()->user_type === 'admin')
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
                        <img src="{{ asset('/images/resource/company-6.png') }}" alt="avatar" class="thumb">
                        <span class="name">{{ auth()->user()->name ?? 'My Account' }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        @if(auth()->user()->user_type === 'admin')
                            <li class="active"><a href="{{ route('admin.dashboard') }}"><i class="la la-home"></i> Admin Dashboard</a></li>
                            <li><a href="{{ route('admin.users') }}"><i class="la la-users"></i> Manage Users</a></li>
                            <li><a href="{{ route('admin.jobs') }}"><i class="la la-briefcase"></i> Manage Job Posts</a></li>
                            <li><a href="{{ route('admin.categories') }}"><i class="la la-tags"></i> Job Categories</a></li>
                            <li><a href="{{ route('admin.payments') }}"><i class="la la-credit-card"></i> Payments</a></li>
                            <li><a href="{{ route('admin.messages') }}"><i class="la la-comment-o"></i> Messages</a></li>
                            <li><a href="{{ route('admin.settings') }}"><i class="la la-cogs"></i> Site Settings</a></li>
                            <li><a href="{{ route('admin.password.change') }}"><i class="la la-lock"></i> Change Password</a></li>
                            <li><a href="{{ route('admin.profile') }}"><i class="la la-user-alt"></i> View Profile</a></li>

                        @elseif(auth()->user()->user_type === 'employer')
                            <li class="active"><a href="{{ route('employer.dashboard') }}"><i class="la la-home"></i> Employer Dashboard</a></li>
                            <li><a href="{{ route('employer.company.profile') }}"><i class="la la-user-tie"></i> Company Profile</a></li>
                            <li><a href="{{ route('employer.job.create') }}"><i class="la la-paper-plane"></i> Post a New Job</a></li>
                            <li><a href="{{ route('employer.applicants') }}"><i class="la la-file-invoice"></i> View Applicants</a></li>
                            <li><a href="{{ route('employer.messages') }}"><i class="la la-comment-o"></i> Messages</a></li>
                            <li><a href="{{ route('employer.resume.alerts') }}"><i class="la la-bell"></i> Resume Alerts</a></li>
                            <li><a href="{{ route('employer.packages') }}"><i class="la la-box"></i> Packages</a></li>
                            <li><a href="{{ route('employer.password.change') }}"><i class="la la-lock"></i> Change Password</a></li>

                        @elseif(auth()->user()->user_type === 'candidate')
                            <li class="active"><a href="{{ route('candidate.dashboard') }}"><i class="la la-home"></i> Candidate Dashboard</a></li>
                            <li><a href="{{ route('candidate.jobs') }}"><i class="la la-briefcase"></i> View Jobs</a></li>
                            <li><a href="{{ route('candidate.applications') }}"><i class="la la-file-invoice"></i> My Applications</a></li>
                            <li><a href="{{ route('candidate.resumes') }}"><i class="la la-bookmark-o"></i> Saved Jobs</a></li>
                            <li><a href="{{ route('candidate.messages') }}"><i class="la la-comment-o"></i> Messages</a></li>
                            <li><a href="{{ route('candidate.profile') }}"><i class="la la-user-alt"></i> View Profile</a></li>
                            <li><a href="{{ route('candidate.password.change') }}"><i class="la la-lock"></i> Change Password</a></li>
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
