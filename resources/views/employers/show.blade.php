@extends('layouts.app')

<!-- @section('title', 'Employers') -->

@section('content')

<span class="header-span"></span>



<!-- Job Detail Section -->
<section class="job-detail-section">
  <!-- Upper Box -->
  <div class="upper-box">
    <div class="auto-container">
      <!-- Job Block -->
      <div class="job-block-seven">
        <div class="inner-box">
          <div class="content">
            <span class="company-logo">
              <img src="{{ asset($employer->logo ? 'storage/logos/'.$employer->logo : '/images/resource/company-logo/default.png') }}" 
                   alt="{{ $employer->company_name }}">
            </span>
            <h4>
              <a href="{{ route('employers.details', ['id' => $employer->id]) }}">
                  {{ $employer->company_name }}
              </a>
            </h4>
            <ul class="job-info">
              <li>
                  <span class="icon flaticon-map-locator"></span>
                  {{ $employer->address->city ?? 'City not available' }}, 
                  {{ $employer->address->state ?? 'State not available' }}
              </li>
      
              <li>
                  <span class="icon flaticon-briefcase"></span>
                  {{ $employer->industry ?? 'Industry not available' }}
              </li>
      
              <li>
                  <span class="icon flaticon-telephone-1"></span>
                  {{ $employer->phone ?? 'N/A' }}
              </li>
      
              <li>
                  <span class="icon flaticon-mail"></span>
                  {{ $employer->user->email ?? 'N/A' }}
              </li>
          </ul>
      
          <ul class="job-other-info">
              <li class="time">Open Jobs – {{ $employer->jobs_count ?? 0 }}</li>
          </ul>
          </div>

          <div class="btn-box">
            <a href="{{ route('jobs.list', ['employer_id' => $employer->id]) }}" 
               class="theme-btn btn-style-one">
                View Jobs
            </a>
        
            <button class="bookmark-btn">
                <i class="flaticon-bookmark"></i>
            </button>
        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="job-detail-outer">
    <div class="auto-container">
      <div class="row">
        <div class="content-column col-lg-8 col-md-12 col-sm-12">
          <div class="job-detail">
            <h4>About Company</h4>
            <p>Moody’s Corporation, often referred to as Moody’s, is an American business and financial services company. It is the holding company for Moody’s Investors Service (MIS), an American credit rating agency, and Moody’s Analytics (MA), an American provider of financial analysis software and services.</p>
            <p>Moody’s was founded by John Moody in 1909 to produce manuals of statistics related to stocks and bonds and bond ratings. Moody’s was acquired by Dun & Bradstreet in 1962. In 2000, Dun & Bradstreet spun off Moody’s Corporation as a separate company that was listed on the NYSE under MCO. In 2007, Moody’s Corporation was split into two operating divisions, Moody’s Investors Service, the rating agency, and Moody’s Analytics, with all of its other products.</p>
            <div class="row images-outer">
              <div class="col-lg-3 col-md-3 col-sm-6">
                <figure class="image"><a href="{{ url("images/resource/employers-single-1.png") }}" class="lightbox-image" data-fancybox="gallery"><img src="{{ asset("/images/resource/employers-single-1.png") }}" alt=""></a></figure>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <figure class="image"><a href="{{ url("images/resource/employers-single-2.png") }}" class="lightbox-image" data-fancybox="gallery"><img src="{{ asset("/images/resource/employers-single-2.png") }}" alt=""></a></figure>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <figure class="image"><a href="{{ url("images/resource/employers-single-3.png") }}" class="lightbox-image" data-fancybox="gallery"><img src="{{ asset("/images/resource/employers-single-3.png") }}" alt=""></a></figure>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <figure class="image"><a href="{{ url("images/resource/employers-single-4.png") }}" class="lightbox-image" data-fancybox="gallery"><img src="{{ asset("/images/resource/employers-single-4.png") }}" alt=""></a></figure>
              </div>
            </div>
            <p>Moody’s Corporation, often referred to as Moody’s, is an American business and financial services company. It is the holding company for Moody’s Investors Service (MIS), an American credit rating agency, and Moody’s Analytics (MA), an American provider of financial analysis software and services.</p>
            <p>Moody’s was founded by John Moody in 1909 to produce manuals of statistics related to stocks and bonds and bond ratings. Moody’s was acquired by Dun & Bradstreet in 1962. In 2000, Dun & Bradstreet spun off Moody’s Corporation as a separate company that was listed on the NYSE under MCO. In 2007, Moody’s Corporation was split into two operating divisions, Moody’s Investors Service, the rating agency, and Moody’s Analytics, with all of its other products.</p>
          </div>

          <!-- Related Jobs -->
          <div class="related-jobs">
            <div class="title-box">
              <h3>{{ $jobCount }} jobs at {{ $employer->company_name }}</h3>
              <div class="text">{{ $totalJobs }} jobs live - {{ $jobsToday }} added today.</div>      
            </div>
            

            <!-- Job Block -->
            {{-- <div class="job-block">
              <div class="inner-box">
                <div class="content">
                  <span class="company-logo"><img src="{{ asset("/images/resource/company-logo/1-3.png") }}" alt=""></span>
                  <h4><a href="{{ url("#") }}">Senior Full Stack Engineer, Creator Success</a></h4>
                  <ul class="job-info">
                    <li><span class="icon flaticon-briefcase"></span> Segment</li>
                    <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                    <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                    <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                  </ul>
                  <ul class="job-other-info">
                    <li class="time">Full Time</li>
                    <li class="required">Urgent</li>
                  </ul>
                  <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                </div>
              </div>
            </div> --}}
            @foreach ($activeJobs as $job)
              <!-- Job Block -->
              <div class="job-block">
                  <div class="inner-box">
                      <div class="content">
                          <span class="company-logo">
                              <img src="{{ asset('storage/logos/'.$employer->logo ?? '/images/resource/company-logo/default.png') }}" alt="">
                          </span>
                          <h4>
                              <a href="{{ route('jobs.details', $job->id) }}">{{ $job->title }}</a>
                          </h4>
                          <ul class="job-info">
                              <li>
                                  <span class="icon flaticon-briefcase"></span>
                                  {{ $job->jobCategory->name }}
                              </li>
                              <li>
                                  <span class="icon flaticon-map-locator"></span>
                                  {{ optional($job->jobAddress)->city ?? 'City not available' }},
                                  {{ optional($job->jobAddress)->state ?? 'State not available' }}
                              </li>
                              <li>
                                  <span class="icon flaticon-clock-3"></span>
                                  {{ $job->created_at->diffForHumans() }}
                              </li>
                              <li>
                                  <span class="icon flaticon-money"></span>
                                  {{ $job->salary ?? 'Salary not disclosed' }}
                              </li>
                          </ul>
                          <ul class="job-other-info">
                              <li class="time">{{ ucfirst($job->job_type) }}</li>
                              @if($job->is_urgent)
                                  <li class="required">Urgent</li>
                              @endif
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
          </div>
        </div>

        <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
          <aside class="sidebar">
            <div class="sidebar-widget company-widget">
              <div class="widget-content">

                <ul class="company-info mt-0">
                  <li>Primary industry: <span>{{ $employer->industry ?? 'N/A' }}</span></li>
                  <li>Company size: <span>{{ $employer->company_size ?? 'N/A' }}</span></li>
                  <li>Founded in: <span>{{ $employer->established_year ?? 'N/A' }}</span></li>
                  <li>Phone: <span>{{ $employer->phone ?? 'N/A' }}</span></li>
                  <li>Email: <span>{{ $employer->user->email ?? 'N/A' }}</span></li>

                  <li>Location: 
                      <span>
                          {{ optional($employer->address)->city ?? 'City not available' }}, 
                          {{ optional($employer->address)->state ?? 'State not available' }}
                      </span>
                  </li>
                  <li>Social media:
                    <div class="social-links">
                        @if($employer->socialNetworks)
                            @if($employer->socialNetworks->facebook)
                                <a href="{{ $employer->socialNetworks->facebook }}" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                
                            @if($employer->socialNetworks->twitter)
                                <a href="{{ $employer->socialNetworks->twitter }}" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                
                            @if($employer->socialNetworks->linkedin)
                                <a href="{{ $employer->socialNetworks->linkedin }}" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            @endif
                        @else
                            <span>No social links available</span>
                        @endif
                    </div>
                </li>
                
                </ul>
                <div class="btn-box">
                  @if($employer->website)
                      <a href="{{ $employer->website }}" target="_blank" class="theme-btn btn-style-three">
                          {{ parse_url($employer->website, PHP_URL_HOST) }}
                      </a>
                  @endif
                </div>
              </div>
            </div>

            {{-- <div class="sidebar-widget">
              <!-- Map Widget -->
              <h4 class="widget-title">Job Location</h4>
              <div class="widget-content">
                <div class="map-outer mb-0">
                  <div class="map-canvas" data-zoom="12" data-lat="-37.817085" data-lng="144.955631" data-type="roadmap" data-hue="#ffc400" data-title="Envato" data-icon-path="images/resource/map-marker.png" data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
                  </div>
                </div>
              </div>
            </div> --}}


          </aside>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Job Detail Section -->




</div><!-- End Page Wrapper -->

@endsection