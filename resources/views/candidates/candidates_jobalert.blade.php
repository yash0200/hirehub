@extends('layouts.dashboard')

@section('title', 'Candidate Job Alerts')

@section('content')
<!-- Dashboard -->
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="row">
            <div class="col-md-9">
                <div class="upper-title-box">
                    <h3>Preferences & Job alerts</h3>
                </div>
            </div>
            <div class="col-md-3 text-right">
                <a class="theme-btn btn-style-one" href="{{ route('candidate.jobalert.create') }}">Add preferences for Job Alert</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>My Preferences</h4>

                            {{-- <div class="chosen-outer">
                                <!--Tabs Box-->
                                <select class="chosen-select">
                                    <option>Last 6 Months</option>
                                    <option>Last 12 Months</option>
                                    <option>Last 16 Months</option>
                                    <option>Last 24 Months</option>
                                    <option>Last 5 years</option>
                                </select>
                            </div> --}}
                        </div>

                        <div class="widget-content">
                            <div class="table-outer">
                                <table class="default-table manage-job-table">
                                    <thead>
                                        <tr>
                                            <th>Criteria</th>
                                            <th>Job Type</th>
                                            <th>Category</th>
                                            <th>Salary Range</th>
                                            <th>Location</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @forelse ($alerts as $alert)
                                            <tr>
                                                <td>
                                                    <ul>
                                                        
                                                            <li>{{ $alert->criteria }}</li>
                                                      
                                                </td>
                                                <td>{{ $alert->job_type ?? 'Not specified' }}</td>
                                                <td>{{ $alert->category->name }}</td>
                                                <td>{{ $alert->salary_range ?? 'Negotiable' }}</td>
                                                <td><i class="icon flaticon-map-locator"></i> {{ $alert->location }}</td>
                                                <td>{{ $alert->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    <div class="option-box">
                                                        <ul class="option-list">
                                                            <li>
                                                                <button data-text="View Details"><span class="la la-eye"></span></button>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('candidate.jobalert.destroy', $alert->id) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" data-text="Delete Alert"><span class="la la-trash"></span></button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7">No job alerts preferences saved.</td>
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
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>My Job Alerts</h4>
                            {{-- <div class="chosen-outer">
                                <!--Tabs Box-->
                                <select class="chosen-select">
                                    <option>Last 6 Months</option>
                                    <option>Last 12 Months</option>
                                    <option>Last 16 Months</option>
                                    <option>Last 24 Months</option>
                                    <option>Last 5 years</option>
                                </select>
                            </div> --}}
                        </div>
    
                        <div class="widget-content">
                            <div class="table-outer">
                                <table class="default-table manage-job-table">
                                    <thead>
                                        <tr>
                                            <th>Job Title</th>
                                            <th>Company</th>
                                            <th>Category</th>
                                            <th>Salary Range</th>
                                            <th>Location</th>
                                            <th>Notification Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @forelse ($notifications as $alert)
                                        <tr>
                                            <td>{{ $alert->job->title }}</td>
                                            <td>{{ $alert->job->employer->company_name }}</td>
                                            <td>{{ $alert->job->category->name }}</td>
                                            <td>{{ $alert->job->salary ?? 'Negotiable' }}</td>
                                            <td><i class="icon flaticon-map-locator"></i> {{ $alert->job->jobaddress->city }}</td>
                                            <td>{{ $alert->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li>
                                                            <a href="{{ route('jobs.show', $alert->job->id) }}" data-text="View Job">
                                                                <span class="la la-eye"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('candidate.jobalert.destroy', $alert->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" data-text="Delete Alert"><span class="la la-trash"></span></button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No job alert notifications available.</td>
                                        </tr>
                                    @endforelse
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
    <p>© 2025 <a href="{{ url("/") }}">Hirehub</a>. All Right Reserved.</p>
</div>
@endsection
