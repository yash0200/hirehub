@extends('layouts.admin_dashboard')

@section('title', 'Admin Dashboard')

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
                    <h3> All Category</h3>
                </div>
            </div>
            <div class="col-md-3 text-right">
                <a class="theme-btn btn-style-one" href="{{route('admin.categories.create') }}">Add new category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Category</h4>

                            <div class="chosen-outer">
                                <form method="get" class="default-form form-inline"
                                    action="https://superio.bookingcore.co/user/manage-jobs">
                                    <!-- Tabs Box -->
                                    <div class="form-group mb-0 mr-2">
                                        <input type="text" name="s" value="" placeholder="Search by name"
                                            class="form-control">
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
                                            <th>Name</th>
                                            <th>slug</th>
                                            <th>date</th>
                                            <th>status</th>
                                            <th>operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="publish">
                                            <td class="title">
                                                <a href="{{ url("../html/15.html") }}">Test</a>
                                            </td>
                                            <td>London</td>
                                            <td>02/10/2025</td>
                                            <td><span class="badge badge-publish">publish</span></td>

                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li><a href="{{ url("../html/15.html") }}"
                                                                data-text="Edit Job"><span
                                                                    class="la la-pencil"></span></a></li>
                                                        <li><a href="{{ url("../html/15.html") }}"
                                                                data-text="Delete Job" class="bc-delete-item"
                                                                data-confirm="Do you want to delete?"><span
                                                                    class="la la-trash"></span></a></li>
                                                    </ul>
                                                </div>
                                            </td>
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
    <p>© 2025 <a href="{{ url("/") }}">HireHub</a>. All Right Reserved.</p>
</div>
@endsection