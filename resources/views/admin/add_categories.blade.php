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
        <form method="post" action="https://superio.bookingcore.co/user/store-job/-1" class="default-form">
            <input type="hidden" name="_token" value="dXFIYmyX03zto0TeDpYxtValjGiZhJvUOtoQqfAn"
                autocomplete="off"> <input type="hidden" name="id" value="">
            <div class="upper-title-box">
                <div class="row">
                    <div class="col-md-9">
                        <h3>Add new category</h3>
                        <div class="text">
                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-9">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Name</h4>
                            </div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <label>Title <span class="required">*</span></label>
                                    <input type="text" value="" placeholder="category name" name="title" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">slug</label>
                                    <div>
                                        <input type="text" value="" placeholder="slug name" name="title" required
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date <span class="required">*</span></label>
                                            <input type="text" value="" placeholder="DD/MM/YYYY"
                                                name="date" autocomplete="false" required
                                                class="form-control has-datepicker bg-white">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection