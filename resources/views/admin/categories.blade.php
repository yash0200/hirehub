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
                    <h3>All Categories</h3>
                </div>
            </div>
            <div class="col-md-3 text-right">
                <a class="theme-btn btn-style-one" href="{{route('admin.categories.create')}}">Add new category</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Category</h4>
                            <div class="chosen-outer">
                                <form method="get" class="default-form form-inline" action="">
                                    <div class="row">
                                        <div class="form-group mb-0 mr-2 col-lg-6">
                                            <input type="text" name="s" value="{{ request()->s }}" placeholder="Search by name" class="form-control">
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="theme-btn btn-style-one">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="table-outer">
                                <table class="default-table manage-job-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($categories->isEmpty())
                                        <tr>
                                            <td colspan="4">There is no category</td>
                                        </tr>
                                        @else
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td class="title">{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                @if($category->status == 'active')
                                                <span>active</span>
                                                @else
                                                <span>inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li>
                                                            <a href="{{ route('admin.categories.edit', $category->id) }}" data-text="Edit User">
                                                                <span class="la la-pencil"></span>
                                                            </a>
                                                        </li>
                                                        <!-- Delete User -->
                                                        <li>
                                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employer?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="bc-delete-item" data-text="Delete User">
                                                                    <span class="la la-trash"></span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <!-- Change User Status -->
                                                        <li>
                                                            <form action="{{ route('admin.categories.changeStatus', $category->id) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')

                                                                <details>
                                                                    <summary style="cursor: pointer; display: inline-flex; align-items: center;">
                                                                        <span class="la la-exchange-alt"></span> <!-- Clickable Icon -->
                                                                    </summary>
                                                                    <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                                                        <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                        <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                                        <option value="suspended" {{ $category->status == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                                                    </select>
                                                                </details>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
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
    <p>© 2025 <a href="{{ url("/") }}">HireHub</a>. All Rights Reserved.</p>
</div>
@endsection