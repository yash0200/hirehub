@extends('layouts.dashboard')

@section('title', 'Employer Dashboard')

@section('content')
<!-- Dashboard -->
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Manage Jobs</h3>
            <div class="text">Ready to jump back in?</div>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>My Job Listings</h4>

                            <div class="chosen-outer">
                                <!-- Tabs Box -->
                                <select class="chosen-select">
                                    <option>Ascending</option>
                                    <option>Descending</option>
                                   
                                </select>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="table-outer">
                                <table class="default-table manage-job-table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Created & Expired</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if($jobs->isEmpty())
                                        <tr>
                                            <td colspan="5">There are no jobs available.</td>
                                        </tr>
                                        @else
                                        @foreach ($jobs as $job)
                                        <tr>
                                            <td>
                                                <h6><a href="{{ url('jobs/'.$job->id) }}">{{ $job->title }}</h6>
                                                <span class="info"><i class="icon flaticon-map-locator"></i>
                                                    @if ($job->jobAddresses->isNotEmpty())
                                                    {{ $job->jobAddresses->first()->state }},
                                                    {{ $job->jobAddresses->first()->city }}
                                                    @else
                                                    No address available
                                                    @endif
                                                </span>
                                            </td>
                                            <td>{{ $job->category ? $job->category->name : 'No category' }}</td>

                                            <td>{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }} <br>{{ \Carbon\Carbon::parse($job->deadline)->format('d M, Y') }}</td>
                                            <td class="status">
                                             {{$job->status}}
                                            </td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li><button data-text="View Job" onclick="window.location.href='{{ url('jobs/'.$job->id) }}'"><span class="la la-eye"></span></button></li>
                                                        <li><button data-text="Edit Job"  onclick="window.location.href='{{ route('jobs.edit', $job->id) }}'"><span class="la la-pencil"></span></button></li>
                                                        <!-- Delete Job -->
                                                        <li>
                                                            <form action="{{ route('employer.jobs.delete', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="bc-delete-item" data-text="Delete Job">
                                                                    <span class="la la-trash"></span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                        
                                                        <!-- Change Job Status -->
                                                        <li>
                                                            <form action="{{ route('employer.jobs.status', $job->id) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                        
                                                                <details>
                                                                    <summary style="cursor: pointer; display: inline-flex; align-items: center;">
                                                                        <span class="la la-exchange-alt"></span> <!-- Clickable Icon -->
                                                                    </summary>
                                                                    <select name="status" class="form-control form-control-sm"
                                                                            onchange="if(this.value !== '{{ $job->status }}') this.form.submit();">
                                                                        <option value="active" {{ $job->status === 'active' ? 'selected' : '' }}>Active</option>
                                                                        <option value="inactive" {{ $job->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                                        <option value="closed" {{ $job->status === 'closed' ? 'selected' : '' }}>Closed</option>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Dashboard -->

<!-- Copyright -->
<div class="copyright-text">
    <p>© 2025 <a href="{{ url("/") }}">Hirehub</a>. All Right Reserved.</p>
</div>
@endsection