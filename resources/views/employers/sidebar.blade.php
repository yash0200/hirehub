<div class="user-sidebar">
    <div class="sidebar-inner">
        <ul class="navigation">
            <li class="active"><a href="{{ route('candidate.dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
            <li><a href="{{ route('company.profile') }}"><i class="la la-user-tie"></i>Company Profile</a></li>
            <li><a href="{{ route('job.create') }}"><i class="la la-paper-plane"></i>Post a New Job</a></li>
            <li><a href="{{ route('job.manage') }}"><i class="la la-briefcase"></i> Manage Jobs </a></li>
            <li><a href="{{ route('applicants.list') }}"><i class="la la-file-invoice"></i> All Applicants</a></li>
            <li><a href="{{ route('resumes.shortlisted') }}"><i class="la la-bookmark-o"></i>Shortlisted Resumes</a></li>
            <li><a href="{{ route('packages') }}"><i class="la la-box"></i>Packages</a></li>
            <li><a href="{{ route('messages') }}"><i class="la la-comment-o"></i>Messages</a></li>
            <li><a href="{{ route('resume.alerts') }}"><i class="la la-bell"></i>Resume Alerts</a></li>
            <li><a href="{{ route('password.change') }}"><i class="la la-lock"></i>Change Password</a></li>
            <li><a href="{{ route('company.profile') }}"><i class="la la-user-alt"></i>View Profile</a></li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="la la-sign-out"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            <li><a href="{{ route('profile.delete') }}"><i class="la la-trash"></i>Delete Profile</a></li>
        </ul>
    </div>
</div>