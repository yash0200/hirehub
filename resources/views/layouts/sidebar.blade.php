<div class="user-sidebar">
    <div class="sidebar-inner">
        <ul class="navigation">
            @if(auth()->user()->user_type === 'candidate')
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
            <li class="{{ request()->routeIs('candidate.password') ? 'active' : '' }}">
                <a href="{{ route('candidate.password') }}"><i class="la la-lock"></i> Change Password</a>
            </li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="la la-sign-out"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

            @elseif(auth()->user()->user_type === 'employer')
<<<<<<< Updated upstream
            <li class="{{ request()->routeIs('employer.dashboard') ? 'active' : '' }}">
                <a href="{{ route ('employer.dashboard') }}"> <i class="la la-home"></i> Dashboard</a>
            </li>
            <li class="{{ request()->routeIs('employer.company.profile') ? 'active' : '' }}">
                <a href="{{ route('employer.company.profile') }}"><i class="la la-user-tie"></i> Company Profile</a>
            </li>
            <li class="{{ request()->routeIs('employer.job.create') ? 'active' : '' }}">
                <a href="{{ route('employer.job.create') }}"><i class="la la-paper-plane"></i> Post a New Job</a>
            </li>
            <li class="{{ request()->routeIs('employer.job.manage') ? 'active' : '' }}">
                <a href="{{ route('employer.job.manage') }}"><i class="la la-briefcase"></i> Manage Jobs</a>
            </li>
            <li class="{{ request()->routeIs('employer.applicants') ? 'active' : '' }}">
                <a href="{{ route('employer.applicants') }}"><i class="la la-file-invoice"></i> All Applicants</a>
            </li>
            <li class="{{ request()->routeIs('employer.resumes') ? 'active' : '' }}">
                <a href="{{ route('employer.resumes') }}"><i class="la la-bookmark-o"></i> Shortlisted Resumes</a>
            </li>
            <li class="{{ request()->routeIs('employer.packages') ? 'active' : '' }}">
                <a href="{{ route('employer.packages') }}"><i class="la la-box"></i> Packages</a>
            </li>
            <li class="{{ request()->routeIs('employer.messages') ? 'active' : '' }}">
                <a href="{{ route('employer.messages') }}"><i class="la la-comment-o"></i> Messages</a>
            </li>
            <li class="{{ request()->routeIs('employer.resume.alerts') ? 'active' : '' }}">
                <a href="{{ route('employer.resume.alerts') }}"><i class="la la-bell"></i> Resume Alerts</a>
            </li>
            <li class="{{ request()->routeIs('employer.password.change') ? 'active' : '' }}">
                <a href="{{ route('employer.password.change') }}"><i class="la la-lock"></i> Change Password</a>
            </li>
=======
            <li class="active"><a href="{{ route('employer.dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
            <li><a href="{{ route('employer.company.profile') }}"><i class="la la-user-tie"></i> Company Profile</a></li>
            <li><a href="{{ route('employer.job.create') }}"><i class="la la-paper-plane"></i> Post a New Job</a></li>
            <li><a href="{{ route('employer.job.manage') }}"><i class="la la-briefcase"></i> Manage Jobs</a></li>
            <li><a href="{{ route('employer.applicants') }}"><i class="la la-file-invoice"></i> All Applicants</a></li>
            <li><a href="{{ route('employer.resumes') }}"><i class="la la-bookmark-o"></i> Shortlisted Resumes</a></li>
            <li><a href="{{ route('employer.packages') }}"><i class="la la-box"></i> Packages</a></li>
            <li><a href="{{ route('employer.messages') }}"><i class="la la-comment-o"></i> Messages</a></li>
            <li><a href="{{ route('employer.resume.alerts') }}"><i class="la la-bell"></i> Resume Alerts</a></li>
            <li><a href="{{ route('employer.password') }}"><i class="la la-lock"></i> Change Password</a></li>
>>>>>>> Stashed changes
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="la la-sign-out"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endif
        </ul>
    </div>
</div>