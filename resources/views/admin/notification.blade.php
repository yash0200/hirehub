@extends('layouts.admin_dashboard')

@section('title', 'Notifications')

@section('content')
<div class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Notifications</h3>
            <div class="text">Ready to manage the platform?</div>
        </div>
        <div class="row">
            <div class="col-xl-10 col-lg-12">
                <!-- Notification Widget -->
                <div class="notification-widget ls-widget">
                    <div class="widget-title">
                        <h4>Notifications</h4>
                        <form action="{{ route('admin.notifications.readAll') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Mark All as Read</button>
                        </form>
                    </div>
                    <div class="widget-content">
                        <ul class="notification-list">
                            {{-- <li><span class="icon flaticon-briefcase"></span> <strong>John Doe</strong> registered as a new employer</li>
                            <li><span class="icon flaticon-briefcase"></span> <strong>Jane Smith</strong> posted a new job listing <span class="colored">Software Engineer</span></li>
                            <li class="success"><span class="icon flaticon-briefcase"></span> <strong>Alex Brown</strong> updated his profile</li>
                            <li><span class="icon flaticon-briefcase"></span> <strong>Michael Johnson</strong> posted a new job listing <span class="colored">Senior Product Designer</span></li>
                            <li class="success"><span class="icon flaticon-briefcase"></span> <strong>Raul Costa</strong> made a payment for job posting</li>
                            <li><span class="icon flaticon-briefcase"></span> <strong>Ali Tufan</strong> sent a message to admin</li> --}}
                            @forelse($notifications as $notification)
                                <li class="{{ $notification->is_read ? 'success' : '' }}">
                                    <span class="icon flaticon-briefcase"></span>
                                    <strong>{{ $notification->title }}</strong>
                                    {{ $notification->message }}
                                    <span class="colored">{{ $notification->created_at->diffForHumans() }}</span>

                                    <!-- Actions -->
                                    <div class="actions">
                                        @if(!$notification->is_read)
                                            <form action="{{ route('admin.notifications.read', $notification->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Mark as Read</button>
                                            </form>
                                        @endif

                                        <form action="{{ route('admin.notifications.destroy', $notification->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @empty
                                <li>No notifications found.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright-text">
    <p>© 2025 <a href="{{ url("/") }}">Hirehub</a>. All Right Reserved.</p>
</div>

@endsection