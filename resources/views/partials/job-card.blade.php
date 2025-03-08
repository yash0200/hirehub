@foreach ($jobs as $job)
    <div class="job-block col-lg-6 col-md-12 col-sm-12">
        <div class="inner-box">
            <div class="content">
                <!-- Display Employer's Logo (Fallback if image doesn't exist) -->
                <span class="company-logo">
                    <img src="{{ asset($job->employer->logo ? 'storage/logos/' . $job->employer->logo : 'images/resource/company-logo/default-logo.png') }}" alt="logo">
                </span>

                <!-- Job Title -->
                <h4><a href="{{ route('jobs.details', $job->id) }}">{{ $job->title }}</a></h4>

                <ul class="job-info">
                    <!-- Job Category -->
                    <li><span class="icon flaticon-briefcase"></span> {{ $job->jobCategory->name }}</li>

                    <!-- Job Location -->
                    <li>
                        <span class="icon flaticon-map-locator"></span>
                        {{ optional($job->jobAddress)->city ?? 'City not available' }},
                        {{ optional($job->jobAddress)->state ?? 'State not available' }}
                    </li>

                    <!-- Job Posted Time -->
                    <li><span class="icon flaticon-clock-3"></span> {{ $job->created_at->diffForHumans() }}</li>

                    <!-- Job Salary -->
                    <li><span class="icon flaticon-money"></span> {{ $job->salary }}</li>
                </ul>

                <ul class="job-other-info">
                    <!-- Job Type -->
                    <li class="time">{{ $job->job_type }}</li>

                    <!-- Job Privacy -->
                    <li class="privacy">Private</li>

                    <!-- Job Urgency -->
                    <li class="required">{{ $job->created_at->isToday() ? 'Urgent' : 'Not Urgent' }}</li>
                </ul>

                @php
                    $user = auth()->user();
                    $candidate = $user ? $user->candidate : null;
                    $isShortlisted = false;

                    if ($candidate) {
                        $isShortlisted = \App\Models\ShortlistedJob::where('candidate_id', $candidate->id)
                            ->where('job_id', $job->id)
                            ->exists();
                    }
                @endphp

                <!-- Bookmark Button -->
                <button type="button" 
                    class="bookmark-btn {{ $isShortlisted ? 'active' : '' }}" 
                    data-job-id="{{ $job->id }}" 
                    onclick="toggleBookmark(this, {{ $user ? 'true' : 'false' }})">
                    <i class="flaticon-bookmark"></i>
                </button>
            </div>
        </div>
    </div>
@endforeach
