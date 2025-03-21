@extends('layouts.admin_dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<!-- Sidebar Backdrop -->
<div class="sidebar-backdrop"></div>

<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        
        <div class="mobile-sidebar-panel-overlay"></div>

        <div class="row">
            <div class="col-md-9">
                <div class="upper-title-box">
                    <h3>All Categories</h3>
                </div>
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
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
                                <form method="GET" class="default-form form-inline" action="{{ route('admin.categories') }}">
                                    <div class="row">
                                        <div class="form-group mb-0 mr-2 col-lg-6">
                                            <input type="text" name="search" value="{{ request()->search }}" placeholder="Search by name" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" class="theme-btn btn-style-one">Search</button>
                                        </div>
                                        <div class="col-lg-3">
                                            @if(request()->has('search'))
                                                <a href="{{ route('admin.categories') }}" class="theme-btn btn-style-one">Clear</a>
                                            @endif

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
                                      
                                        @if($admin_categories->isEmpty())
                                        <tr>
                                            <td colspan="4">There is no category</td>
                                        </tr>
                                        @else
                                        @foreach ($admin_categories as $category)
                                        
                                        <tr>
                                            <td class="title">{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <span class="{{ $category->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                                                    {{ ucfirst($category->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li>
                                                            <a href="{{ route('admin.categories.edit', $category->id) }}" data-text="Edit Category">
                                                                <span class="la la-pencil"></span>
                                                            </a>
                                                        </li>
                                                        <!-- Delete User -->
                                                        <li>
                                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employer?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="bc-delete-item" data-text="Delete Category">
                                                                    <span class="la la-trash"></span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <!-- Change User Status -->
                                                        <li>
                                                            <form action="{{ route('admin.categories.changeStatus', $category->id) }}" method="POST">
                                                                @csrf
                                                            
                                                                <details>
                                                                    <summary style="cursor: pointer; display: inline-flex; align-items: center;">
                                                                        <span class="la la-exchange-alt"></span> <!-- Clickable Icon -->
                                                                    </summary>
                                                                    <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                                                        <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                        <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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