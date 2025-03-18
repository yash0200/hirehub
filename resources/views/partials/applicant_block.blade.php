<div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
    <div class="inner-box">
        <div class="content">
            <figure class="image">
                <img src="{{ asset('/images/resource/candidate-1.png') }}" alt="Applicant Image">
            </figure>
            <h4 class="name">
                <a href="{{ route('employer.applicant.view', ['id' => $applicant->candidate_id]) }}">
                    {{ $applicant->candidate->full_name }}
                </a>
            </h4>

            <ul class="candidate-info">
                <li class="designation">{{ $applicant->resume->job_title }}</li>
                <li>
                    <span class="icon flaticon-map-locator"></span>
                    {{ optional($applicant->candidate_address)->state ?? 'State not available' }},
                    {{ optional($applicant->candidate_address)->city ?? 'City not available' }}
                </li>
            </ul>

            <ul class="post-tags">
                @foreach ($applicant->resume->skills as $skill)
                    <li><a href="#">{{ $skill }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="option-box">
            <ul class="option-list">
                <li>
                    <a href="{{ route('employer.applicant.view', ['id' => $applicant->candidate_id]) }}"
                        data-text="View Applicant Profile">
                        <span class="la la-eye"></span>
                    </a>
                </li>
                <li>
                    <button data-text="Already Approved"
                            class="disabled-btn"
                            disabled>
                        <span class="la la-check text-success"></span>
                    </button>
                </li>
                <li>
                    <button data-text="Reject Application"
                            class="reject-btn"
                            data-id="{{ $applicant->id }}">
                        <span class="la la-times-circle"></span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>
