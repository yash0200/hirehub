<div class="user-sidebar">
    <div class="sidebar-inner">
        <ul class="navigation">
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

            <!-- Logout -->
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="la la-sign-out"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

            <!-- Delete Admin Account -->
            <li class="{{ request()->routeIs('admin.profile.delete') ? 'active' : '' }}">
                <a href="{{ route('admin.profile.delete') }}"><i class="la la-trash"></i> Delete Account</a>
            </li>
        </ul>
    </div>
</div>
