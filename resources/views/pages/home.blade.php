@extends('layouts.app')

@section('title', 'HireHub - Home')

@section('content')
<div class="preloader"></div>

<!-- Banner Section -->
<section class="banner-section-three at-home18">
  <div class="auto-container">
    <div class="row align-items-center">
      <div class="content-column col-lg-7">
        <div class="inner-column">
          <div class="title-box wow fadeInUp">
            <h3>We find the best jobs for you</h3>
            <div class="text">Search your career opportunity through 12,800 jobs</div>
          </div>
          <!-- Job Search Form -->
          <div class="job-search-form-two wow fadeInUp" data-wow-delay="200ms">
            <form method="get" action="{{ route('jobs.list') }}">
              <div class="row">
                <div class="form-group col-lg-5 col-md-12 col-sm-12">
                  <label class="title">What</label>
                  <span class="icon flaticon-search-1"></span>
                  <input type="text" name="keyword" placeholder="Job title, keywords, or company" value="{{ request('keyword') }}">
                </div>
                <!-- Form Group -->
                <div class="form-group col-lg-4 col-md-12 col-sm-12 location">
                  <label class="title">Where</label>
                  <span class="icon flaticon-map-locator"></span>
                  <input type="text" name="location" placeholder="City or postcode" value="{{ request('location') }}">
                </div>
                <!-- Form Group -->
                <div class="form-group col-lg-3 col-md-12 col-sm-12 btn-box">
                  <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">Find Jobs</span></button>
                </div>
              </div>
            </form>
          </div>
          <!-- Job Search Form -->
          <!-- Popular Search -->
          <div class="popular-searches at-home18 mb-5 wow fadeInUp" data-wow-delay="400ms">
            <span class="title">Popular Searches : </span>
            <a class="dark-color" href="{{ url('#') }}">Designer</a>,
            <a class="dark-color" href="{{ url('#') }}">Developer</a>,
            <a class="dark-color" href="{{ url('#') }}">Web</a>,
            <a class="dark-color" href="{{ url('#') }}">IOS</a>,
            <a class="dark-color" href="{{ url('#') }}">PHP</a>,
            <a class="dark-color" href="{{ url('#') }}">Senior</a>,
            <a class="dark-color" href="{{ url('#') }}">Engineer</a>,
          </div>
          <!-- End Popular Search -->
          <!--Candidate Section-->
          <div class="bottom-box d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="1500ms">
            <div class="count-compines d-flex align-items-center">
              <!-- Display the dynamic candidate count with number formatting -->
              <span class="title mr20 fz16 fw500">{{ number_format($candidatesCount) }}+ Candidates</span>
              <!-- Static Image -->
              <img src="{{ asset('/images/resource/multi-peoples.png') }}" alt="Candidates">
            </div>

            @if(auth()->check() && auth()->user()->candidate)
            <!-- If the user is logged in and is a candidate, link to the resume page -->
            <a href="{{ route('candidate.resumes') }}" class="upload-cv dark-color fz16 fw500">
              <span class="icon flaticon-file"></span> Upload your CV
            </a>
            @else
            <!-- If not logged in or not a candidate, link to the login page -->
            <a href="{{ route('login') }}" class="upload-cv dark-color fz16 fw500">
              <span class="icon flaticon-file"></span> Upload your CV
            </a>
            @endif
          </div>
          <!-- End Candidate Section-->
        </div>
      </div>
      <div class="image-column col-lg-4 offset-lg-1">
        <!-- Job Block -->
        @foreach ($jobs as $index => $job)
        <div class="job-block {{ $loop->first ? 'mr-30 ml-30 mb30 mt30' : ($loop->last ? 'mr-30 ml-30' : 'mb30') }}">

          <div class="inner-box">
            <div class="content">
              <!-- Display Employer's Logo (Fallback if image doesn't exist) -->
              <span class="company-logo">
                <img class="rounded-circle w50" src="{{ asset($job->employer->logo ? 'storage/logos/' . $job->employer->logo : 'images/resource/company-logo/default-logo.png') }}" alt="logo">
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
              </ul>

              <ul class="job-other-info">
                <!-- Job Type -->
                <li class="time">{{ $job->job_type }}</li>
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

      </div>
    </div>
  </div>
</section>
<!-- End Banner Section Three-->

@include('/categories.index')

<!-- Registeration Banners -->
<section class="pt-0 layout-pb-60">
  <div class="auto-container">
    <div class="row wow fadeInUp">
      <!-- Banner Style One -->
      <div class="banner-style-home22 at-home22 mb30 col-sm-12">
        <div class="inner-box">
          <div class="content">
            <h3 class="title">We Are Hiring</h3>
            <p class="text">Let’s Work Together & Explore Opportunities</p>
            <a href="{{ route('jobs.list') }}" class="theme-btn btn-style-one bdrs12">Apply Now <i class="fal fa-long-arrow-right ms-3"></i></a>
          </div>
          <figure class="image d-none d-md-block"><img src="{{ asset('/images/banner-1.png') }}" alt=""></figure>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Registeration Banners -->

<!-- Latest jobs -->
<section class="job-categories at-home18">
  <div class="auto-container">
    <div class="d-sm-flex align-items-center justify-content-sm-between wow fadeInUp mb-4 mb-sm-0">
      <div class="sec-title">
        <h2>Latest jobs</h2>
        <div class="text">2020 jobs live - 293 added today.</div>
      </div>
      <a href="{{ route('jobs.list') }}" class="ud-btn-border-theme at-home18 mb-4 dark-style">View All Jobs <i class="fal fa-long-arrow-right"></i></a>
    </div>
    <div class="row wow fadeInUp">
      <!-- Job Block -->
      <div class="col-xl-4 col-sm-6">
        <div class="job-block at-jlv17 at-home20 at-home18">
          <div class="inner-box">
            <div class="tags">
              <a class="flaticon-bookmark" href="{{ url('#') }}"></a>
            </div>
            <div class="content ps-0">
              <h4 class="fz22 mb-2"><a href="{{ url('#') }}">Software Engineer (Android) Libraries</a></h4>
              <ul class="job-other-info at-jsv6 at-jsv17 mt15 ms-0">
                <li class="time2 fz15 border-0 ps-0 me-0 mb-0"><i class="flaticon-map-locator pe-2"></i>London, UK</li>
                <li class="time2 fz15 border-0 ps-0 mb-0"><i class="flaticon-clock pe-2"></i>Full Time</li>
              </ul>
              <ul class="job-other-info at-jsv6 at-jsv17 mt-0 ms-0 mb-5">
                <li class="time2 fz15 border-0 ps-0 me-0 mb-0"><i class="flaticon-money-2 pe-2"></i>450 - $900/month</li>
              </ul>
              <div class="d-md-flex align-items-center justify-content-md-between mt30">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                  <span class="company-logo position-relative mr15"><img class="wa w60 rounded-circle" src="{{ asset('/images/companieslogo/company-logo-2.png') }}" alt=""></span>
                  <div class="text-start">
                    <h5 class="fz18 fw500">Dennis</h5>
                    <p class="text">11 hours ago</p>
                  </div>
                </div>
                <a href="{{ url('#') }}" class="ud-btn-transparent at-home18">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Job Block -->
      <div class="col-xl-4 col-sm-6">
        <div class="job-block at-jlv17 at-home20 at-home18">
          <div class="inner-box">
            <div class="tags">
              <a class="flaticon-bookmark" href="{{ url('#') }}"></a>
            </div>
            <div class="content ps-0">
              <h4 class="fz22 mb-2"><a href="{{ url('#') }}">Senior Product Marketing <br> Manager</a></h4>
              <ul class="job-other-info at-jsv6 at-jsv17 mt15 ms-0">
                <li class="time2 fz15 border-0 ps-0 me-0 mb-0"><i class="flaticon-map-locator pe-2"></i>London, UK</li>
                <li class="time2 fz15 border-0 ps-0 mb-0"><i class="flaticon-clock pe-2"></i>Full Time</li>
              </ul>
              <ul class="job-other-info at-jsv6 at-jsv17 mt-0 ms-0 mb-5">
                <li class="time2 fz15 border-0 ps-0 me-0 mb-0"><i class="flaticon-money-2 pe-2"></i>450 - $900/month</li>
              </ul>
              <div class="d-md-flex align-items-center justify-content-md-between mt30">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                  <span class="company-logo position-relative mr15"><img class="wa w60 rounded-circle" src="{{ asset('/images/companieslogo/company-logo-1.png') }}" alt=""></span>
                  <div class="text-start">
                    <h5 class="fz18 fw500">Dennis</h5>
                    <p class="text">11 hours ago</p>
                  </div>
                </div>
                <a href="{{ url('#') }}" class="ud-btn-transparent at-home18">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Job Block -->
      <div class="col-xl-4 col-sm-6">
        <div class="job-block at-jlv17 at-home20 at-home18">
          <div class="inner-box">
            <div class="tags">
              <a class="flaticon-bookmark" href="{{ url('#') }}"></a>
            </div>
            <div class="content ps-0">
              <h4 class="fz22 mb-2"><a href="{{ url('#') }}">Senior Full Stack Engineer, <br> Creator Success</a></h4>
              <ul class="job-other-info at-jsv6 at-jsv17 mt15 ms-0">
                <li class="time2 fz15 border-0 ps-0 me-0 mb-0"><i class="flaticon-map-locator pe-2"></i>London, UK</li>
                <li class="time2 fz15 border-0 ps-0 mb-0"><i class="flaticon-clock pe-2"></i>Full Time</li>
              </ul>
              <ul class="job-other-info at-jsv6 at-jsv17 mt-0 ms-0 mb-5">
                <li class="time2 fz15 border-0 ps-0 me-0 mb-0"><i class="flaticon-money-2 pe-2"></i>450 - $900/month</li>
              </ul>
              <div class="d-md-flex align-items-center justify-content-md-between mt30">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                  <span class="company-logo position-relative mr15"><img class="wa w60 rounded-circle" src="{{ asset('/images/companieslogo/company-logo-5.png') }}" alt=""></span>
                  <div class="text-start">
                    <h5 class="fz18 fw500">Dennis</h5>
                    <p class="text">11 hours ago</p>
                  </div>
                </div>
                <a href="{{ url('#') }}" class="ud-btn-transparent at-home18">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Job Block -->
      <div class="col-xl-4 col-sm-6">
        <div class="job-block at-jlv17 at-home20 at-home18">
          <div class="inner-box">
            <div class="tags d-flex align-items-center">
              <a class="flaticon-bookmark" href="{{ url('#') }}"></a>
            </div>
            <div class="content ps-0">
              <h4 class="fz22 mb-2"><a href="{{ url('#') }}">Senior Product <br> Designer</a></h4>
              <ul class="job-other-info at-jsv6 at-jsv17 mt15 ms-0">
                <li class="time2 border-0 ps-0 me-0"><i class="flaticon-map-locator pe-2"></i>Full Time</li>
                <li class="time2 border-0 ps-0"><i class="flaticon-clock pe-2"></i>London, UK</li>
              </ul>
              <ul class="job-other-info at-jsv6 at-jsv17 mt-0 ms-0 mb-5">
                <li class="time2 fz15 border-0 ps-0 me-0 mb-0"><i class="flaticon-money-2 pe-2"></i>450 - $900/month</li>
              </ul>
              <div class="d-md-flex align-items-center justify-content-md-between mt30">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                  <span class="company-logo position-relative mr15"><img class="wa w60 rounded-circle" src="{{ asset('/images/companieslogo/company-logo-3.png') }}" alt=""></span>
                  <div class="text-start">
                    <h5 class="fz18 fw500">Dennis</h5>
                    <p class="text">11 hours ago</p>
                  </div>
                </div>
                <a href="{{ url('#') }}" class="ud-btn-transparent at-home18">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Job Block -->
      <div class="col-xl-4 col-sm-6">
        <div class="job-block at-jlv17 at-home20 at-home18">
          <div class="inner-box">
            <div class="tags d-flex align-items-center">
              <a class="flaticon-bookmark" href="{{ url('#') }}"></a>
            </div>
            <div class="content ps-0">
              <h4 class="fz22 mb-2"><a href="{{ url('#') }}">Product Manager, <br> Studio</a></h4>
              <ul class="job-other-info at-jsv6 at-jsv17 mt15 ms-0">
                <li class="time2 border-0 ps-0 me-0"><i class="flaticon-map-locator pe-2"></i>Full Time</li>
                <li class="time2 border-0 ps-0"><i class="flaticon-clock pe-2"></i>London, UK</li>
              </ul>
              <ul class="job-other-info at-jsv6 at-jsv17 mt-0 ms-0 mb-5">
                <li class="time2 fz15 border-0 ps-0 me-0 mb-0"><i class="flaticon-money-2 pe-2"></i>450 - $900/month</li>
              </ul>
              <div class="d-md-flex align-items-center justify-content-md-between mt30">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                  <span class="company-log  o position-relative mr15"><img class="wa w60 rounded-circle" src="{{ asset('/images/companieslogo/company-logo-4.png') }}" alt=""></span>
                  <div class="text-start">
                    <h5 class="fz18 fw500">Dennis</h5>
                    <p class="text">11 hours ago</p>
                  </div>
                </div>
                <a href="{{ url('#') }}" class="ud-btn-transparent at-home18">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Job Block -->
      <div class="col-xl-4 col-sm-6">
        <div class="job-block at-jlv17 at-home20 at-home18">
          <div class="inner-box">
            <div class="tags d-flex align-items-center">
              <a class="flaticon-bookmark" href="{{ url('#') }}"></a>
            </div>
            <div class="content ps-0">
              <h4 class="fz22 mb-2"><a href="{{ url('#') }}">UX/UI <br> Designer</a></h4>
              <ul class="job-other-info at-jsv6 at-jsv17 mt15 ms-0">
                <li class="time2 border-0 ps-0 me-0"><i class="flaticon-map-locator pe-2"></i>Full Time</li>
                <li class="time2 border-0 ps-0"><i class="flaticon-clock pe-2"></i>London, UK</li>
              </ul>
              <ul class="job-other-info at-jsv6 at-jsv17 mt-0 ms-0 mb-5">
                <li class="time2 fz15 border-0 ps-0 me-0 mb-0"><i class="flaticon-money-2 pe-2"></i>450 - $900/month</li>
              </ul>
              <div class="d-md-flex align-items-center justify-content-md-between mt30">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                  <span class="company-logo position-relative mr15"><img class="wa w60 rounded-circle" src="{{ asset('/images/companieslogo/company-logo-7.png') }}" alt=""></span>
                  <div class="text-start">
                    <h5 class="fz18 fw500">Dennis</h5>
                    <p class="text">11 hours ago</p>
                  </div>
                </div>
                <a href="{{ url('#') }}" class="ud-btn-transparent at-home18">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Latest jobs -->

<!-- Popular City -->
<section class="job-categories border-bottom-0">
  <div class="auto-container">
    <div class="d-flex align-items-center justify-content-between wow fadeInUp">
      <div class="sec-title">
        <h2>Popular Cities</h2>
        <div class="text">Know your worth and find the job that qualify your life</div>
      </div>
    </div>
    <div class="row wow fadeInUp">
      @foreach($cities as $city)
      <div class="col-sm-6 col-md-4">
        <div class="border-1 p20 bdrs12 d-flex align-items-center mb30">
          <div class="thumb mr20">
            <img class="rounded-circle" src="{{ asset('/images/city/' . $city['image']) }}" alt="">
          </div>
          <div class="details">
            <h5 class="mb-0 fz18 fw500">{{ $city['name'] }}</h5>
            <p class="text">Jobs</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  </div>
</section>
<!-- End Popular City -->

<!-- CTA -->
<section class="cta-home18-2 mx-auto">
  <div class="auto-container">
    <div class="content-wrapper wow fadeInRight">
      <div class="sec-title mb-0">
        <h2>Looking to Post a Job</h2>
        <div class="text mb-4">Find professionals from arround the world and <br class="d-none d-lg-block"> across all skills.</div>
        <a href="{{ url('#') }}" class="ud-btn-border-theme at-home18 dark-style">Post Your Job For Free <i class="fal fa-long-arrow-right"></i></a>
      </div>
    </div>
    <img src="{{ asset('/images/about-1.jpg') }}" alt="" class="cta-home18-img-2 d-none d-lg-block wow fadeInLeft">
  </div>
</section>
<!-- End CTA -->

<!-- Testimonial Section Three -->
<section class="testimonial-section-three layout-pb-60">
  <div class="auto-container">
    <div class="carousel-outer wow fadeInUp">
      <!-- Testimonial Carousel -->
      <div class="testimonial-carousel-two owl-carousel owl-theme">
        <!-- Slide Item -->
        <div class="slide-item">
          <div class="image-column">
            <figure class="image"><img src="{{ asset('/images/testimonials-1.png') }}" alt=""></figure>
          </div>
          <div class="content-column">
            <!--Testimonial Block -->
            <div class="testimonial-block-three">
              <div class="inner-box">
                <h4 class="title">Great quality!</h4>
                <div class="text">Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality</div>
                <div class="info-box">
                  <h4 class="name">Gabriel Nolan</h4>
                  <span class="designation">Consultant</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Slide Item -->
        <div class="slide-item">
          <div class="image-column">
            <figure class="image"><img src="{{ asset('/images/testimonials-1.png') }}" alt=""></figure>
          </div>
          <div class="content-column">
            <!--Testimonial Block -->
            <div class="testimonial-block-three">
              <div class="inner-box">
                <h4 class="title">Great quality!</h4>
                <div class="text">Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality</div>
                <div class="info-box">
                  <h4 class="name">Gabriel Nolan</h4>
                  <span class="designation">Consultant</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Slide Item -->
        <div class="slide-item">
          <div class="image-column">
            <figure class="image"><img src="{{ asset('/images/testimonials-1.png') }}" alt=""></figure>
          </div>
          <div class="content-column">
            <!--Testimonial Block -->
            <div class="testimonial-block-three">
              <div class="inner-box">
                <h4 class="title">Great quality!</h4>
                <div class="text">Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality</div>
                <div class="info-box">
                  <h4 class="name">Gabriel Nolan</h4>
                  <span class="designation">Consultant</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Testimonial Section Three -->

<!-- CTA Home 18 -->
<section class="cta-home-18 mx-auto">
  <div class="auto-container">
    <div class="row wow fadeInUp">
      <!-- How Its Block -->
      <div class="col-md-4 col-sm-6">
        <div class="how-it-work at-home18 mb-md-0 text-center">
          <div class="top-part position-relative">
            <div class="icon position-relative"><span class="fal fa-book-user"></span></div>
          </div>
          <div class="details">
            <h4 class="title">Register an account <br class="d-none d-lg-block"> to start</h4>
          </div>
        </div>
      </div>
      <!-- How Its Block -->
      <div class="col-md-4 col-sm-6">
        <div class="how-it-work at-home18 mb-md-0 text-center">
          <div class="top-part position-relative">
            <div class="icon position-relative"><span class="far fa-file-magnifying-glass"></span></div>
          </div>
          <div class="details">
            <h4 class="title">Explore over thousands <br class="d-none d-lg-block"> of resumes</h4>
          </div>
        </div>
      </div>
      <!-- How Its Block -->
      <div class="col-md-4 col-sm-6">
        <div class="how-it-work at-home18 mb-md-0 text-center">
          <div class="top-part position-relative">
            <div class="icon position-relative"><span class="far fa-clipboard-list-check"></span></div>
          </div>
          <div class="details">
            <h4 class="title">Find the most suitable <br class="d-none d-lg-block"> candidate.</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End CTA Home 18 -->

<!-- Testimonials Section -->
<section class="layout-pt-120 layout-pb-120">
  <div class="auto-container">
    <div class="d-sm-flex align-items-center justify-content-sm-between wow fadeInUp mb-4 mb-sm-0">
      <div class="sec-title">
        <h2>Featured Companies Actively Hiring</h2>
        <div class="text">Over 200 Million Jobs</div>
      </div>
      <a href="{{ url('#') }}" class="ud-btn-border-theme at-home18 mb-4">View All Company <i class="fal fa-long-arrow-right"></i></a>
    </div>
    <div class="job-carousel wow fadeInUp owl-carousel owl-theme default-dots">
      <!-- Job Block -->
      <div class="candidate-block-four at-v7">
        <div class="inner-box text-start">
          <div class="d-flex align-items-center">
            <span class="thumb mx-0 wa ha"><img class="w70" src="{{ asset('/images/testinomal/top-company-1.png') }}" alt=""></span>
            <div class="ml15">
              <h3 class="name"><a href="{{ url('#') }}">Floyd Miles</a></h3>
              <span class="cat">UI Designer</span>
            </div>
          </div>
          <ul class="job-info justify-content-start at-clv7 mt-2 mb-4">
            <li class="ms-0"><span class="icon flaticon-briefcase"></span> Software</li>
            <li><span class="icon fal fa-location-dot"></span> London, UK</li>
            <li class="mx-0 ps-2"><span class="fal fa-users"></span> 10-50</li>
          </ul>
          <p class="text mb20">Netflix is the world's leading streaming entertainment service with over 195 million paid memberships...</p>
          <div class="d-grid">
            <div class="d-grid">
              <a href="{{ url('#') }}" class="ud-btn-border-theme at-home18">Follow <i class="fal fa-long-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Job Block -->
      <div class="candidate-block-four at-v7">
        <div class="inner-box text-start">
          <div class="d-flex align-items-center">
            <span class="thumb mx-0 wa ha"><img class="w70" src="{{ asset('/images/testinomal/top-company-2.png') }}" alt=""></span>
            <div class="ml15">
              <h3 class="name"><a href="{{ url('#') }}">Darrell Steward</a></h3>
              <span class="cat">UI Designer</span>
            </div>
          </div>
          <ul class="job-info justify-content-start at-clv7 mt-2 mb-4">
            <li class="ms-0"><span class="icon flaticon-briefcase"></span> Software</li>
            <li><span class="icon fal fa-location-dot"></span> London, UK</li>
            <li class="mx-0 ps-2"><span class="fal fa-users"></span> 10-50</li>
          </ul>
          <p class="text mb20">Netflix is the world's leading streaming entertainment service with over 195 million paid memberships...</p>
          <div class="d-grid">
            <a href="{{ url('#') }}" class="ud-btn-border-theme at-home18">Follow <i class="fal fa-long-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Job Block -->
      <div class="candidate-block-four at-v7">
        <div class="inner-box text-start">
          <div class="d-flex align-items-center">
            <span class="thumb mx-0 wa ha"><img class="w70" src="{{ asset('/images/testinomal/top-company-3.png') }}" alt=""></span>
            <div class="ml15">
              <h3 class="name"><a href="{{ url('#') }}">Brooklyn Simmons</a></h3>
              <span class="cat">UI Designer</span>
            </div>
          </div>
          <ul class="job-info justify-content-start at-clv7 mt-2 mb-4">
            <li class="ms-0"><span class="icon flaticon-briefcase"></span> Software</li>
            <li><span class="icon fal fa-location-dot"></span> London, UK</li>
            <li class="mx-0 ps-2"><span class="fal fa-users"></span> 10-50</li>
          </ul>
          <p class="text mb20">Netflix is the world's leading streaming entertainment service with over 195 million paid memberships...</p>
          <div class="d-grid">
            <a href="{{ url('#') }}" class="ud-btn-border-theme at-home18">Follow <i class="fal fa-long-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Job Block -->
      <div class="candidate-block-four at-v7">
        <div class="inner-box text-start">
          <div class="d-flex align-items-center">
            <span class="thumb mx-0 wa ha"><img class="w70" src="{{ asset('/images/testinomal/top-company-4.png') }}" alt=""></span>
            <div class="ml15">
              <h3 class="name"><a href="{{ url('#') }}">Jane Cooper</a></h3>
              <span class="cat">UI Designer</span>
            </div>
          </div>
          <ul class="job-info justify-content-start at-clv7 mt-2 mb-4">
            <li class="ms-0"><span class="icon flaticon-briefcase"></span> Software</li>
            <li><span class="icon fal fa-location-dot"></span> London, UK</li>
            <li class="mx-0 ps-2"><span class="fal fa-users"></span> 10-50</li>
          </ul>
          <p class="text mb20">Netflix is the world's leading streaming entertainment service with over 195 million paid memberships...</p>
          <div class="d-grid">
            <a href="{{ url('#') }}" class="ud-btn-border-theme at-home18">Follow <i class="fal fa-long-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Job Block -->
      <div class="candidate-block-four at-v7">
        <div class="inner-box text-start">
          <div class="d-flex align-items-center">
            <span class="thumb mx-0 wa ha"><img class="w70" src="{{ asset('/images/testinomal/top-company-1.png') }}" alt=""></span>
            <div class="ml15">
              <h3 class="name"><a href="{{ url('#') }}">Ralph Edwards</a></h3>
              <span class="cat">UI Designer</span>
            </div>
          </div>
          <ul class="job-info justify-content-start at-clv7 mt-2 mb-4">
            <li class="ms-0"><span class="icon flaticon-briefcase"></span> Software</li>
            <li><span class="icon fal fa-location-dot"></span> London, UK</li>
            <li class="mx-0 ps-2"><span class="fal fa-users"></span> 10-50</li>
          </ul>
          <p class="text mb20">Netflix is the world's leading streaming entertainment service with over 195 million paid memberships...</p>
          <div class="d-grid">
            <a href="{{ url('#') }}" class="ud-btn-border-theme at-home18">Follow <i class="fal fa-long-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Testimonials Section -->

<!-- Subscribe Section -->
<section class="subscribe-section-two at-home18 mx-auto p-0">
  <div class="auto-container wow fadeInUp">
    <div class="row">
      <div class="col-lg-10 offset-lg-1 col-xl-6 offset-xl-1">
        <div class="sec-title mb-0 pb-20 text-center text-lg-start">
          <h2>Get Matched The Most Valuable Jobs, Just Drop Your Cv at Hirehub</h2>
          <div class="text fz16 mt-4">The template is really nice and offers quite a large set of options. It’s beautiful and the coding is done quickly and seamlessly. Thank you!</div>

          <div class="mt30">
            <a href="{{ url('#') }}" class="theme-btn btn-style-one">
              <span class="icon far fa-file-arrow-up pe-2"></span>
              Upload Your CV
            </a>
          </div>
        </div>
      </div>
    </div>
    <img class="obj-img d-none d-xxl-block" src="{{ asset('/images/banner-2.png') }}" alt="image">
  </div>
</section>
<!-- End Subscribe Section -->

<!-- Blog Post -->
<section class="layout-pt-120 layout-pb-120 border-bottom-1">
  <div class="auto-container">
    <div class="d-sm-flex align-items-center justify-content-sm-between wow fadeInUp mb-4 mb-sm-0">
      <div class="sec-title">
        <h2>Travel Articles</h2>
        <div class="text">Fresh job related news content posted each day.</div>
      </div>
      <a href="{{ url('#') }}" class="ud-btn-border-theme at-home18 mb-4">View All <i class="fal fa-long-arrow-right"></i></a>
    </div>
    <div class="row wow fadeInUp">
      <!-- Blog Block -->
      <div class="col-lg-4 col-sm-6">
        <div class="blog -type-1 at-home21 mb-4 mb-xl-0">
          <div class="blog-image position-relative mb30">
            <a href="{{ url('#') }}" class="tag">Designer</a>
            <img class="bdrs12" src="{{ asset('/images/blog/blog-1.png') }}" alt="image">
          </div>
          <div class="blog-content">
            <div class="d-flex align-items-center">
              <a href="{{ url('#') }}" class="date fz15 dark-color">April 06 2023</a><span class="text-border-color mx-2">|</span><a href="{{ url('#') }}" class="author fz15 dark-color">By Ali Tufan</a>
            </div>
            <h4><a href="{{ url('#') }}">21 Job Interview Tips: How To Make a Great <br class="d-none d-xl-block"> Impression</a></h4>
          </div>
        </div>
      </div>
      <!-- Blog Block -->
      <div class="col-lg-4 col-sm-6">
        <div class="blog -type-1 at-home21 mb-4 mb-xl-0">
          <div class="blog-image position-relative mb30">
            <a href="{{ url('#') }}" class="tag">Developer</a>
            <img class="bdrs12" src="{{ asset('/images/blog/blog-2.png') }}" alt="image">
          </div>
          <div class="blog-content">
            <div class="d-flex align-items-center">
              <a href="{{ url('#') }}" class="date fz15 dark-color">April 06 2023</a><span class="text-border-color mx-2">|</span><a href="{{ url('#') }}" class="author dark-color fz15">By Ali Tufan</a>
            </div>
            <h4><a href="{{ url('#') }}">10 Ways to Avoid a Referee Disaster <br class="d-none d-xl-block">Zone</a></h4>
          </div>
        </div>
      </div>
      <!-- Blog Block -->
      <div class="col-lg-4 col-sm-6">
        <div class="blog -type-1 at-home21 mb-4 mb-xl-0">
          <div class="blog-image position-relative mb30">
            <a href="{{ url('#') }}" class="tag">Marketing</a>
            <img class="bdrs12" src="{{ asset('/images/blog/blog-1.png') }}" alt="image">
          </div>
          <div class="blog-content">
            <div class="d-flex align-items-center">
              <a href="{{ url('#') }}" class="date fz15 dark-color">April 06 2023</a><span class="text-border-color mx-2">|</span><a href="{{ url('#') }}" class="author dark-color fz15">By Ali Tufan</a>
            </div>
            <h4><a href="{{ url('#') }}">Tips to Keep Your Resume Relevant to the <br class="d-none d-xl-block"> Position</a></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Blog Post -->
@endsection