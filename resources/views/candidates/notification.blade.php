@extends('layouts.dashboard')

@section('title', 'Candidate Dashboard')

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">

                <h3>Welcome, {{auth()->user()->name}}!!</h3>
                <div class="text">Ready to jump back in?</div>

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
                            
                        </div>
                        <div class="widget-content">
                            
                            <!-- <ul class="notification-list">
                                <li><span class="icon flaticon-briefcase"></span> <strong>Wade Warren</strong> applied for a
                                    job <span class="colored">Web Developer</span></li>
                                <li><span class="icon flaticon-briefcase"></span> <strong>Henry Wilson</strong> applied for
                                    a job <span class="colored">Senior Product Designer</span></li>
                                <li class="success"><span class="icon flaticon-briefcase"></span> <strong>Raul
                                        Costa</strong> applied
                                    for a job <span class="colored">Product Manager, Risk</span></li>
                                <li><span class="icon flaticon-briefcase"></span> <strong>Jack Milk</strong> applied for a
                                    job <span class="colored">Technical Architect</span></li>
                                <li class="success"><span class="icon flaticon-briefcase"></span> <strong>Michel
                                        Arian</strong> applied
                                    for a job <span class="colored">Software Engineer</span></li>
                                <li><span class="icon flaticon-briefcase"></span> <strong>Ali Tufan</strong> applied for a
                                    job <span class="colored">UI Designer</span></li>
                            </ul> -->

                            <ul class="notification-list">
                                @foreach($notifications as $notification)
                                    @php
                                        // Fetch the corresponding applicant's status
                                        $applicant = \App\Models\Applicant::where('id', $notification->applicant_id)->first();
                                        $statusClass = $applicant && $applicant->status == 'approved' ? 'success' : 
                                                    ($applicant && $applicant->status == 'rejected' ? 'danger' : '');
                                    @endphp

                                    <li class="{{ $statusClass }}">
                                        <span class="icon flaticon-briefcase"></span> 
                                        {{ $notification->message }} 
                                        @if($applicant)
                                            <strong>{{ ucfirst($applicant->status) }}</strong>.
                                        @endif
                                    </li>
                                @endforeach
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