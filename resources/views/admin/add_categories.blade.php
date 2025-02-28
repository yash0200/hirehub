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
        <form method="POST" action="{{ route('admin.categories.store') }}" class="default-form">
            @csrf <!-- CSRF Token -->

            <input type="hidden" name="id" value="">

            <div class="upper-title-box">
                <div class="row">
                    <div class="col-md-9">
                        <h3>Add new category</h3>
                        <div class="text"></div>
                    </div>
                    <div class="col-md-3 text-right"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Add category</h4>
                            </div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" value="" placeholder="Category name" name="title" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Slug</label>
                                    <div>
                                        <input type="text" value="" placeholder="Slug name" name="slug" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <div>
                                        <label><input checked type="radio" name="status" value="active"> Active</label>
                                        <label><input type="radio" name="status" value="inactive"> Inactive</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 d-none d-md-block">
                <button class="theme-btn btn-style-one" type="submit">Add Category</button>
            </div>
        </form>

    </div>
</div>

@endsection