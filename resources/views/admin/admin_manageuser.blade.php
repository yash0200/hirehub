@extends('layouts.admin_dashboard')

@section('title', 'Manage User')

@section('content')

<div class="sidebar-backdrop"></div>

<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="mobile-sidebar-panel-overlay"></div>
        <div class="row">
            <div class="col-md-9">
                <div class="upper-title-box">
                    <h3>Manage Users</h3>
                    <div class="text">Ready to jump back in?</div>
                </div>
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            <!-- <div class="col-md-3 text-right">
                <a class="theme-btn btn-style-one" href="{{ url("../html/new-job.html") }}">Add new job</a>
            </div> -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Users</h4>
                            <div class="chosen-outer">
                                <form method="get" class="default-form form-inline" action="">
                                    <!--Tabs Box-->
                                    <div class="row">
                                        <div class="form-group mb-0 mr-2 col-lg-6">
                                            <input type="text" name="s" value="" placeholder="Search by name" class="form-control">
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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Register Date</th>
                                            <th>Status</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr class="publish">
                                            <td class="title">
                                                <a href="{{ route('admin.users.view', $user->id) }}">{{ $user->id }}</a>
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <span class=" @if($user->status === 'active') badge-success 
                                                    @elseif($user->status === 'inactive') badge-warning 
                                                    @else badge-danger 
                                                    @endif">{{ ucfirst($user->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <!-- View Profile -->
                                                        <li>
                                                            <a href="{{ route('admin.users.view', $user->id) }}" target="_blank" data-text="View Profile">
                                                                <span class="la la-eye"></span>
                                                            </a>
                                                        </li>
                                                        <!-- Edit User -->
                                                        <li>
                                                            <a href="{{ route('admin.users.edit', $user->id) }}" data-text="Edit User">
                                                                <span class="la la-pencil"></span>
                                                            </a>
                                                        </li>
                                                        <!-- Delete User -->
                                                        <li>
                                                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="bc-delete-item" data-text="Delete User">
                                                                    <span class="la la-trash"></span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <!-- Change User Status -->
                                                        <li>
                                                            <form action="{{ route('admin.users.status', $user->id) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <details>
                                                                    <summary style="cursor: pointer; display: inline-flex; align-items: center;">
                                                                        <span class="la la-exchange-alt"></span> <!-- Clickable Icon -->
                                                                    </summary>
                                                                    <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                                                        <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                        <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                                        <option value="suspended" {{ $user->status == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                                                    </select>
                                                                </details>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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

    <div class="copyright-text">
        <p>© 2025 <a href="{{ url("/") }}">Hirehub</a>. All Right Reserved.</p>
    </div>
    @endsection