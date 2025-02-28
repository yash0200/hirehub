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
            <h3>All Applicants</h3>
            <div class="text">Ready to jump back in?</div>
        </div>
    </div>
    <div class="col-md-3 text-right">
        <a class="theme-btn btn-style-one" href="{{ url("../html/create.html") }}">Add new applicant</a>
    </div>
</div>
    <div class="row">
    <div class="col-lg-12">
        <!-- Ls widget -->
        <div class="ls-widget">
            <div class="tabs-box">
                <div class="widget-title">
                    <h4>Applicants</h4>

                    <div class="chosen-outer">
                        <form method="get" class="default-form form-inline" action="https://superio.bookingcore.co/user/applicants">
                            <!--Tabs Box-->

                            <a href="{{ url("../html/export.html") }}" target="_blank" title="Export to excel" class="theme-btn btn-style-two mr-1">Export</a>

                            <div class="chosen-outer frontend-select-2 mr-1">
                                        <select class="form-control dungdt-select2-field" data-options="{&quot;ajax&quot;:{&quot;url&quot;:&quot;https:\/\/superio.bookingcore.co\/admin\/module\/job\/getForSelect2&quot;,&quot;dataType&quot;:&quot;json&quot;},&quot;allowClear&quot;:true,&quot;placeholder&quot;:&quot;-- Select Job --&quot;}" name="job_id">
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

                                                                <tr>
                                    <td colspan="7">No data</td>
                                </tr>
                            
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