@extends('layouts.dashboard')

@section('title', 'Candidate Shortlisted Jobs')
@section('content')
    <!-- Dashboard -->
    <section class="user-dashboard">
      <div class="dashboard-outer">
        <div class="upper-title-box">
          <h3>Shorlisted Jobs</h3>
          <div class="text">Ready to jump back in?</div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>My Favorite Jobs</h4>

                  <div class="chosen-outer">
                    <!--Tabs Box-->
                    <select class="chosen-select">
                      <option>Last 6 Months</option>
                      <option>Last 12 Months</option>
                      <option>Last 16 Months</option>
                      <option>Last 24 Months</option>
                      <option>Last 5 year</option>
                    </select>
                  </div>
                </div>

                <div class="widget-content">
                  <div class="table-outer">
                    <table class="default-table manage-job-table">
                      <thead>
                        <tr>
                          <th>Job Title</th>
                          <th>Posted date</th>
                          <th>Deadline</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($shortlistedJobs as $savedJob)
                          <tr>
                              <td>
                                  <!-- Job Block -->
                                  <div class="job-block">
                                      <div class="inner-box">
                                          <div class="content">
                                              <span class="company-logo">
                                                  <img src="{{ asset('/storage/logos/' . $savedJob->job->employer->logo ?? '/images/resource/company-logo/default.png') }}" alt="">
                                              </span>
                                              <h4><a href="{{ url('jobs/'.$savedJob->id) }}">{{ $savedJob->job->title }}</a></h4>
                                              <ul class="job-info">
                                                  <li><span class="icon flaticon-briefcase"></span> {{ $savedJob->job->jobCategory->name }}</li>
                                                  <li><span class="icon flaticon-map-locator"></span> {{ $savedJob->job->jobAddress->state }}</li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                              </td>
                              <td>{{ \Carbon\Carbon::parse($savedJob->job->posted_date)->format('M d, Y') }}</td>
                              <td>{{ \Carbon\Carbon::parse($savedJob->job->deadline)->format('M d, Y') }}</td>
                              <td>
                                  <div class="option-box">
                                      <ul class="option-list">
                                          <li>
                                              <button data-text="View Job" onclick="window.location.href='{{ url('jobs/'.$savedJob->job->id) }}'">
                                                  <span class="la la-eye"></span>
                                              </button>
                                          </li>
                                          <li>
                                              <button data-text="Delete Job" onclick="confirm('Are you sure?') ? document.getElementById('delete-form-{{ $savedJob->id }}').submit() : ''">
                                                  <span class="la la-trash"></span>
                                              </button>
                                              <form id="delete-form-{{ $savedJob->id }}" action="{{ route('candidate.job.destroy', $savedJob->id) }}" method="POST" style="display: none;">
                                                  @csrf
                                                  @method('DELETE')
                                              </form>
                                          </li>
                                      </ul>
                                  </div>
                              </td>
                          </tr>
                      @endforeach

                      @if($shortlistedJobs->isEmpty())
                          <tr>
                              <td colspan="4" class="text-center">No shortlisted jobs found.</td>
                          </tr>
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