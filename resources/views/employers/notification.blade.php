@extends('layouts.dashboard')

@section('title', 'Employer Notifications')

@section('content')
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Welcome, {{ auth()->user()->company_name }}!</h3>
            <div class="text">Stay updated with all your notifications.</div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Notification Widget -->
                <div class="notification-widget ls-widget">
                    <div class="widget-title">
                        <h4>Notifications</h4>
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('employer.notifications.markAllAsRead') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Mark All as Read</button>
                            </form>
                        </div>
                    </div>

                    <div class="widget-content">
                        <ul class="notification-list">
                            @forelse($notifications as $notification)
                            @php
                            // Fetch the related application status or other relevant info
                            $applicant = \App\Models\Applicant::find($notification->candidate_id);
                            $statusClass = $applicant && $applicant->status == 'approved' ? 'success' :
                            ($applicant && $applicant->status == 'rejected' ? 'danger' : '');
                            @endphp

                            <li class="d-flex justify-content-between align-items-center {{ $statusClass }}">
                                <div>
                                    <span class="icon flaticon-briefcase"></span>
                                    {{ $notification->message }}
                                    <span class="colored">{{ $notification->created_at->diffForHumans() }}</span>
                                </div>

                                <div class="d-flex">
                                    @if(!$notification->is_read)
                                    <form action="{{ route('employer.notifications.read', $notification->id) }}" method="POST" class="d-inline" style="margin-right: 10px">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Mark as Read</button>
                                    </form>
                                    @endif

                                    <form action="{{ route('employer.notifications.destroy', $notification->id) }}" method="POST" class="d-inline">
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

        <!-- Copyright -->
        <div class="copyright-text">
            <p>© 2025 <a href="{{ url("/") }}">Hirehub</a>. All Right Reserved.</p>
        </div>
    </div>
</section>
@endsection