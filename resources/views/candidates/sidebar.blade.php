<div class="sidebar-backdrop"></div>

    <!-- User Sidebar -->
    <div class="user-sidebar">

      <div class="sidebar-inner">
        <ul class="navigation">
          <li class="active"><a href="{{ url('candidate-dashboard.html') }}"> <i class="la la-home"></i> Dashboard</a></li>
          <li><a href="{{ url('candidate-dashboard-profile.html') }}"><i class="la la-user-tie"></i>My Profile</a></li>
          <li><a href="{{ url('candidate-dashboard-resume.html') }}"><i class="la la-file-invoice"></i>My Resume</a></li>
          <li><a href="{{ url('candidate-dashboard-applied-job.html') }}"><i class="la la-briefcase"></i> Applied Jobs </a></li>
          <li><a href="{{ url('candidate-dashboard-job-alerts.html') }}"><i class="la la-bell"></i>Job Alerts</a></li>
          <li><a href="{{ url('candidate-dashboard-shortlisted-resume.html') }}"><i class="la la-bookmark-o"></i>Shortlisted Jobs</a></li>
          <li><a href="{{ url('candidate-dashboard-cv-manager.html') }}"><i class="la la-file-invoice"></i> CV manager</a></li>
          <li><a href="{{ url('dashboard-packages.html') }}"><i class="la la-box"></i>Packages</a></li>
          <!-- <li><a href="{{ url('dashboard-messages.html') }}"><i class="la la-comment-o"></i>Messages</a></li> -->
          <li><a href="{{ url('dashboard-change-password.html') }}"><i class="la la-lock"></i>Change Password</a></li>
          <li><a href="{{ url('dashboard-profile.html') }}"><i class="la la-user-alt"></i>View Profile</a></li>
          <li><a href="{{ url('index.html') }}"><i class="la la-sign-out"></i>Logout</a></li>
          <li><a href="{{ url('dashboard-delete.html') }}"><i class="la la-trash"></i>Delete Profile</a></li>
        </ul>

        <div class="skills-percentage">
          <h4>Skills Percentage</h4>
          <p>Put value for "Cover Image" field to increase your skill up to "85%"</p>

          <!-- Pie Graph -->
          <div class="pie-graph">
            <div class="graph-outer">
              <input type="text" class="dial" data-fgColor="#7367F0" data-bgColor="transparent" data-width="234" data-height="234" data-linecap="normal" value="30">
              <div class="inner-text count-box"><span class="count-text txt" data-stop="30" data-speed="2000"></span>%</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End User Sidebar -->