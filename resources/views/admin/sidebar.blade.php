<div class="user-sidebar">
    <div class="sidebar-inner">
        <ul class="navigation">
            <!-- Dashboard Link -->
            <li class="active"><a > <i class="la la-home"></i> Dashboard</a></li>
            
            <!-- Manage Users -->
            <li><a href="{{ url('/admin-manage-users') }}"><i class="la la-users"></i> Manage Users</a></li>
            
            <!-- Manage Employers -->
            <li><a href="{{ url('/admin-manage-employers') }}"><i class="la la-user-tie"></i> Manage Employers</a></li>
            
            <!-- Manage Job Posts -->
            <li><a href="{{ url('/admin-manage-job-posts') }}"><i class="la la-briefcase"></i> Manage Job Posts</a></li>
            
            <!-- Job Categories -->
            <li><a href="{{ url('/admin-manage-categories') }}"><i class="la la-tags"></i> Job Categories</a></li>
            
            <!-- Application Management -->
            <li><a href="{{ url('/admin-manage-applications') }}"><i class="la la-file-invoice"></i> View Applications</a></li>
            
            <!-- Payments -->
            <li><a href="{{ url('/admin-manage-payments') }}"><i class="la la-credit-card"></i> Payments</a></li>
            
            <!-- Notifications -->
            <li><a href="{{ url('/admin-notifications') }}"><i class="la la-bell"></i> Notifications</a></li>
            
            <!-- Reports -->
            <li><a href="{{ url('/admin-reports') }}"><i class="la la-chart-line"></i> Reports</a></li>
            
            <!-- Site Settings -->
            <li><a href="{{ url('/admin-site-settings') }}"><i class="la la-cogs"></i> Site Settings</a></li>
            
            <!-- Change Password -->
            <li><a href="{{ url('/admin-change-password') }}"><i class="la la-lock"></i> Change Password</a></li>
            
            <!-- View Admin Profile -->
            <li><a href="{{ url('/admin-view-profile') }}"><i class="la la-user-alt"></i> View Profile</a></li>
            
            <!-- Logout -->
            <li><a href="{{ url('/') }}"><i class="la la-sign-out"></i> Logout</a></li>
            
            <!-- Delete Admin Account -->
            <li><a href="{{ url('/') }}"><i class="la la-trash"></i> Delete Account</a></li>
        </ul>
    </div>
</div>
