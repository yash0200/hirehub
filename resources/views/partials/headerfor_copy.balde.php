<header class="main-header">
    <div class="main-box">
        <!-- Navigation Outer -->
        <div class="nav-outer">
            <!-- Logo -->
            <div class="logo-box">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img style="height:55px;width:152px;" src="{{ asset('/images/logo.svg') }}" alt="Hirehub">
                    </a>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="nav main-menu">
                <ul class="navigation" id="navbar">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('jobs.list') }}">Jobs</a></li>
                    <li><a href="{{ route('companies.list') }}">Companies</a></li>
                    <li><a href="{{ route('blog.list') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>

                    @auth
                        @if(auth()->user()->user_type === 'admin')
                            <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                            <li><a href="{{ route('admin.users') }}">Manage Users</a></li>
                            <li><a href="{{ route('admin.jobs') }}">Manage Job Posts</a></li>
                            <li><a href="{{ route('admin.categories') }}">Job Categories</a></li>
                            <li><a href="{{ route('admin.payments') }}">Payments</a></li>

                        @elseif(auth()->user()->user_type === 'candidate')
                            <li><a href="{{ route('candidate.dashboard') }}">Candidate Dashboard</a></li>
                            <li><a href="{{ route('candidate.jobs') }}">View Jobs</a></li>
                            <li><a href="{{ route('candidate.applications') }}">My Applications</a></li>

                        @elseif(auth()->user()->user_type === 'employer')
                            <li><a href="{{ route('employer.dashboard') }}">Employer Dashboard</a></li>
                            <li><a href="{{ route('employer.jobs') }}">Manage Jobs</a></li>
                            <li><a href="{{ route('employer.job.create') }}">Post a Job</a></li>
                        @endif
                    @endauth
                </ul>
            </nav>
        </div>

        <!-- Right Side Buttons -->
        <div class="outer-box">
            <!-- Saved Jobs (Only for Candidates) -->
            @auth
                @if(auth()->user()->user_type === 'candidate')
                    <button class="menu-btn">
                        <span class="count">{{ auth()->user()->savedJobs()->count() ?? 0 }}</span>
                        <span class="icon la la-heart-o"></span>
                    </button>
                @endif
            @endauth

            <!-- Notifications -->
            <button class="menu-btn">
                <span class="icon la la-bell"></span>
                <span class="count">{{ auth()->user()->notifications()->count() ?? 0 }}</span>
            </button>

            <!-- User Profile Dropdown -->
            <div class="dropdown dashboard-option">
                <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('/images/resource/company-6.png') }}" alt="avatar" class="thumb">
                    <span class="name">{{ auth()->user()->name ?? 'My Account' }}</span>
                </a>

                <ul class="dropdown-menu">
                    @auth
                        @if(auth()->user()->user_type === 'admin')
                            <li><a href="{{ route('admin.dashboard') }}"><i class="la la-home"></i> Admin Dashboard</a></li>
                            <li><a href="{{ route('admin.users') }}"><i class="la la-users"></i> Manage Users</a></li>
                            <li><a href="{{ route('admin.jobs') }}"><i class="la la-briefcase"></i> Manage Job Posts</a></li>
                            <li><a href="{{ route('admin.categories') }}"><i class="la la-tags"></i> Job Categories</a></li>
                            <li><a href="{{ route('admin.payments') }}"><i class="la la-credit-card"></i> Payments</a></li>
                            <li><a href="{{ route('admin.messages') }}"><i class="la la-comment-o"></i> Messages</a></li>
                            <li><a href="{{ route('admin.settings') }}"><i class="la la-cogs"></i> Site Settings</a></li>
                            <li><a href="{{ route('admin.password.change') }}"><i class="la la-lock"></i> Change Password</a></li>
                            <li><a href="{{ route('admin.profile') }}"><i class="la la-user-alt"></i> View Profile</a></li>

                        @elseif(auth()->user()->user_type === 'employer')
                            <li><a href="{{ route('employer.dashboard') }}"><i class="la la-home"></i> Employer Dashboard</a></li>
                            <li><a href="{{ route('employer.jobs') }}"><i class="la la-briefcase"></i> Manage Jobs</a></li>
                            <li><a href="{{ route('employer.job.create') }}"><i class="la la-paper-plane"></i> Post a New Job</a></li>
                            <li><a href="{{ route('employer.applicants') }}"><i class="la la-file-invoice"></i> View Applicants</a></li>
                            <li><a href="{{ route('employer.messages') }}"><i class="la la-comment-o"></i> Messages</a></li>

                        @elseif(auth()->user()->user_type === 'candidate')
                            <li><a href="{{ route('candidate.dashboard') }}"><i class="la la-home"></i> Candidate Dashboard</a></li>
                            <li><a href="{{ route('candidate.jobs') }}"><i class="la la-briefcase"></i> View Jobs</a></li>
                            <li><a href="{{ route('candidate.applications') }}"><i class="la la-file-invoice"></i> My Applications</a></li>
                            <li><a href="{{ route('candidate.messages') }}"><i class="la la-comment-o"></i> Messages</a></li>
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

                        <!-- Delete Account -->
                        <li>
                            @if(auth()->user()->user_type === 'admin')
                                <a href="{{ route('admin.profile.delete') }}">
                            @elseif(auth()->user()->user_type === 'employer')
                                <a href="{{ route('employer.profile.delete') }}">
                            @elseif(auth()->user()->user_type === 'candidate')
                                <a href="{{ route('candidate.profile.delete') }}">
                            @endif
                                <i class="la la-trash"></i> Delete Account
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('/images/logo.svg') }}" alt="Hirehub">
            </a>
        </div>
        <div class="nav-outer clearfix">
            <div class="outer-box">
                @guest
                    <a href="{{ route('login') }}" class="theme-btn btn-style-five">Login / Register</a>
                @endguest
            </div>
        </div>
    </div>
</header>
