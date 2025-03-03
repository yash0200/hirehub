@extends('layouts.admin_dashboard')

@section('title', 'View Application')

@section('content')
    <!-- Sidebar Backdrop -->
    <div class="sidebar-backdrop"></div>

    <div class="user-dashboard bc-user-dashboard">
        <div class="dashboard-outer">
            <a href="{{ url("../html/javascript:void(0).html") }}" class="mobile-sidebar-btn hidden-lg hidden-md">
                <i class="fa fa-bars"></i> Show Sidebar
            </a>
            <div class="mobile-sidebar-panel-overlay"></div>

            <div class="row">
                <div class="col-md-9">
                    <div class="upper-title-box">
                        <h3>All Applications</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Applications</h4>

                                <div class="chosen-outer">
                                    <form method="get" class="default-form form-inline" action="">
                                        <!--Tabs Box-->

                                        <a href="{{ url("../html/export.html") }}" target="_blank" title="Export to excel"
                                            class="theme-btn btn-style-two mr-1">Export</a>

                                        <div class="chosen-outer frontend-select-2 mr-1">
                                            <select class="form-control dungdt-select2-field"
                                                data-options="{&quot;ajax&quot;:{&quot;url&quot;:&quot;https:\/\/superio.bookingcore.co\/admin\/module\/job\/getForSelect2&quot;,&quot;dataType&quot;:&quot;json&quot;},&quot;allowClear&quot;:true,&quot;placeholder&quot;:&quot;-- Select Job --&quot;}"
                                                name="job_id">
                                            </select>
                                        </div>

                                        <button type="submit" class="theme-btn btn-style-one">Search</button>
                                    </form>
                                </div>
                            </div>

                            <div class="widget-content">
                                <div class="table-outer">
                                    <table class="default-table manage-job-table">
                                        <thead>
                                            <tr>
                                                <th>Candidate</th>
                                                <th>Job Title</th>
                                                <th>CV</th>
                                                <th>Date Applied</th>
                                                <th>Status</th>
                                                <th class="text-center applicant-actions">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tbody>
                                            @if($applicants->count() > 0)
                                                @foreach($applicants as $applicant)
                                                    <tr>
                                                        <td>{{ $applicant->name }}</td>
                                                        <td>{{ $applicant->job_title }}</td>
                                                        <td>
                                                            <a href="{{ asset('storage/cvs/' . $applicant->cv) }}"
                                                                target="_blank">Download CV</a>
                                                        </td>
                                                        <td>{{ $applicant->date_applied->format('d M Y') }}</td>
                                                        <td>{{ ucfirst($applicant->status) }}</td>
                                                        <td class="text-center applicant-actions">
                                                            <ul class="option-list">
                                                                <!-- View Profile -->
                                                                <li>
                                                                <a href="{{ route('admin.applications', $applicant->id) }}"target="_blank" data-text="View Application">
                                                                    <span class="la la-eye"></span></a>
                                                                </li>

                                                                <!-- Edit Applicant -->
                                                                <li>
                                                                    <a href="{{ route('admin.applications', $applicant->id) }}"
                                                                        data-text="Edit Application">
                                                                        <span class="la la-pencil"></span>
                                                                    </a>
                                                                </li>

                                                                <!-- Delete Applicant -->
                                                                <li>
                                                                    <form
                                                                        action="{{ route('admin.applications', $applicant->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Are you sure you want to delete this Application?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="bc-delete-item"
                                                                            data-text="Delete Application">
                                                                            <span class="la la-trash"></span>
                                                                        </button>
                                                                    </form>
                                                                </li>

                                                                <!-- Change Applicant Status -->
                                                                <li>
                                                                    <form
                                                                        action="{{ route('admin.applications', $applicant->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PATCH')

                                                                        <details>
                                                                            <summary
                                                                                style="cursor: pointer; display: inline-flex; align-items: center;">
                                                                                <span class="la la-exchange-alt"></span>
                                                                                <!-- Clickable Icon -->
                                                                            </summary>
                                                                            <select name="status"
                                                                                class="form-control form-control-sm"
                                                                                onchange="this.form.submit()">
                                                                                <option value="pending" {{ $applicant->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                                                <option value="approved" {{ $applicant->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                                                <option value="rejected" {{ $applicant->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                                            </select>
                                                                        </details>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6">No applicants found</td>
                                                </tr>
                                            @endif
                                        </tbody>


                                        </tbody>
                                    </table>
                                </div>

                                <div class="ls-pagination">

                                </div>
                            </div>
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