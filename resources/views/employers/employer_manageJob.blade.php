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
                                    <option>Last 6 Months</option>
                                    <option>Last 12 Months</option>
                                    <option>Last 16 Months</option>
                                    <option>Last 24 Months</option>
                                    <option>Last 5 years</option>
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
                                                <h6>{{ $job->title }}</h6>
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
                                                        <li><button data-text="View Job"><span class="la la-eye"></span></button></li>
                                                        <li><button data-text="Edit Job"><span class="la la-pencil"></span></button></li>
                                                        <li><button data-text="Delete Job"><span class="la la-trash"></span></button></li>
                                                        <!-- Change User Status -->
                                                        <li>
                                                            <form action="{{ route('admin.categories.changeStatus', $job->id) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')

                                                                <details>
                                                                    <summary style="cursor: pointer; display: inline-flex; align-items: center;">
                                                                        <span class="la la-exchange-alt" ></span> <!-- Clickable Icon -->
                                                                    </summary>
                                                                    <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                                                        <option value="active" {{ $job->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                        <option value="inactive" {{ $job->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
    <p>© 2025 HireHub. All Rights Reserved.</p>
</div>
@endsection