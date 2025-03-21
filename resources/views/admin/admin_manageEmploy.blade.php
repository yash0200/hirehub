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
                        <h3>Manage Employers</h3>
                        <div class="text">Ready to jump back in?</div>
                    </div>
                    @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                </div>
                
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Manage Employers</h4>

                                <div class="chosen-outer">
                                    <form method="GET" class="default-form form-inline">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" name="keyword" value="{{ request('keyword') }}" 
                                                       placeholder="Search by name or email" 
                                                       class="form-control">
                                            </div>
                                    
                                            <div class="form-group col-md-3">
                                                <select name="status" class="form-control">
                                                    <option value="">All Status</option>
                                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                    <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                                </select>
                                            </div>
                                    
                                            <div class="col-md-3">
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
                                                <th>Company Name</th>
                                                <th>Email</th>
                                                <th>Register Date</th>
                                                <th>Status</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($employers as $index => $employer)
                                            <tr class="publish">
                                                <!-- Serial Number -->
                                                <td class="title">
                                                    {{ ($employers->currentPage() - 1) * $employers->perPage() + $index + 1 }}
                                                </td>
                                                
                                                <td>{{ $employer->employer->company_name }}</td>
                                                <td>{{ $employer->email }}</td>
                                                <td>{{ $employer->created_at->format('d-m-Y') }}</td>
                                                <td>
                                                    <span class="
                                                        @if($employer->status === 'active') badge-success 
                                                        @elseif($employer->status === 'inactive') badge-warning 
                                                        @else badge-danger 
                                                        @endif">{{ ucfirst($employer->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="option-box">
                                                        <ul class="option-list">
                                                            <!-- View Profile -->
                                                            <li>
                                                                <a href="{{ route('admin.employer.view', $employer->employer->id) }}" target="_blank" data-text="View Employer Profile">
                                                                    <span class="la la-eye"></span>
                                                                </a>
                                                            </li>
                                        
                                                            {{-- <!-- Edit User -->
                                                            <li>
                                                                <a href="{{ route('admin.users.edit', $employer->id) }}" data-text="Edit User">
                                                                    <span class="la la-pencil"></span>
                                                                </a>
                                                            </li> --}}
                                        
                                                            <!-- Delete User -->
                                                            <!-- <li>
                                                                @if($employer->status === 'inactive' || $employer->status === 'suspended')
                                                                    <form action="{{ route('admin.users.delete', $employer->id) }}" method="POST" 
                                                                        onsubmit="return confirm('Are you sure you want to delete this employer?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="bc-delete-item" data-text="Delete User">
                                                                            <span class="la la-trash"></span>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </li>
                                         -->
                                                            <!-- Change User Status -->
                                                            <li>
                                                                <form action="{{ route('admin.users.status', $employer->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PATCH')
                                        
                                                                    <details>
                                                                        <summary style="cursor: pointer; display: inline-flex; align-items: center;">
                                                                            <span class="la la-exchange-alt"></span> <!-- Clickable Icon -->
                                                                        </summary>
                                                                        <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                                                            <option value="active" {{ $employer->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                            <option value="inactive" {{ $employer->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                                            <option value="suspended" {{ $employer->status == 'suspended' ? 'selected' : '' }}>Suspended</option>
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

                                @if ($employers->hasPages())
                                    <nav class="ls-pagination mb-5">
                                        <ul>
                                            {{-- Previous Page Link --}}
                                            @if ($employers->onFirstPage())
                                                <li class="prev disabled"><span><i class="fa fa-arrow-left"></i></span></li>
                                            @else
                                                <li class="prev">
                                                    <a href="{{ $employers->previousPageUrl() }}"><i class="fa fa-arrow-left"></i></a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($employers->getUrlRange(1, $employers->lastPage()) as $page => $url)
                                                @if ($page == $employers->currentPage())
                                                    <li><a class="current-page">{{ $page }}</a></li>
                                                @else
                                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                @endif
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($employers->hasMorePages())
                                                <li class="next">
                                                    <a href="{{ $employers->nextPageUrl() }}"><i class="fa fa-arrow-right"></i></a>
                                                </li>
                                            @else
                                                <li class="next disabled"><span><i class="fa fa-arrow-right"></i></span></li>
                                            @endif
                                        </ul>
                                    </nav>
                                @endif

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