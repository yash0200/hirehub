@extends('layouts.admin_dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<!-- Sidebar Backdrop -->
<div class="sidebar-backdrop"></div>


<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="mobile-sidebar-panel-overlay"></div>
        <form method="POST" action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" class="default-form">
            @csrf <!-- CSRF Token -->
            @if(isset($category))
                @method('POST')
            @endif

            <input type="hidden" name="id" value="">

            <div class="upper-title-box">
                <div class="row">
                    <div class="col-md-9">
                        <h4>{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h4>
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
                                <h4>{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h4>
                            </div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" value="{{ isset($category) ? $category->name : '' }}" placeholder="Category name" name="name" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Slug</label>
                                    <div>
                                        <input type="text" value="{{ isset($category) ? $category->slug : '' }}" placeholder="Slug name" name="slug" required class="form-control">
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <div>
                                        <label><input checked type="radio" name="status" value="active"> Active</label>
                                        <label><input type="radio" name="status" value="inactive"> Inactive</label>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 d-none d-md-block">
                <button class="theme-btn btn-style-one" type="submit">{{ isset($category) ? 'Update Category' : 'Add Category' }}</button>
            </div>
        </form>

    </div>
</div>

@endsection