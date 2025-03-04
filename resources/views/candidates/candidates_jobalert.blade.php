@extends('layouts.dashboard')

@section('title', 'Candidate Job Alerts')

@section('content')
<!-- Dashboard -->
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="row">
            <div class="col-md-9">
                <div class="upper-title-box">
                    <h3>Job Alerts</h3>
                </div>
            </div>
            <div class="col-md-3 text-right">
                <a class="theme-btn btn-style-one" href="{{ route('candidate.jobalert.create') }}">Create Job Alert</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>My Job Alerts</h4>

                            <div class="chosen-outer">
                                <!--Tabs Box-->
                                <select class="chosen-select">
                                    <option>Last 6 Months</option>
                                    <option>Last 12 Months</option>
                                    <option>Last 16 Months</option>
                                    <option>Last 24 Months</option>
                                    <option>Last 5 years</option>
                                </select>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="table-outer">
                                <table class="default-table manage-job-table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Criteria</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($alerts as $alert)
                                            <tr>
                                                <td>
                                                    <h6>{{ $alert->title }}</h6>
                                                    <span class="info"><i class="icon flaticon-map-locator"></i> {{ $alert->location }}</span>
                                                </td>
                                                <td>{{ $alert->criteria }}</td>
                                                <td>{{ $alert->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    <div class="option-box">
                                                        <ul class="option-list">
                                                            <li><button data-text="View Application"><span class="la la-eye"></span></button></li>
                                                            <li><button data-text="Delete Application"><span class="la la-trash"></span></button></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No job alerts found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Dashboard -->

<!-- Copyright -->
<div class="copyright-text">
    <p>© 2021 Hirehub. All Right Reserved.</p>
</div>
@endsection
