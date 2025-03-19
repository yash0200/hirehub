@extends('layouts.app')

@section('title', 'HireHub - Home')

@section('content')

<span class="header-span"></span>

<!-- Listing Section -->
<section class="ls-section style-two">
<div class="auto-container"></div>
<div class="row">

          <!-- Filters Column -->
          <div class="filters-column col-lg-4 col-md-12 col-sm-12">
            <div class="inner-column pd-right">
              <div class="filters-outer">
                <button type="button" class="theme-btn close-filters">X</button>

                <!-- Filter Block -->
                <div class="filter-block">
                  <h4>Search by Keywords</h4>
                  <div class="form-group">
                    <input type="text" name="listing-search" placeholder="Job title, keywords, or company">
                    <span class="icon flaticon-search-3"></span>
                  </div>
                </div>

                <!-- Filter Block -->
                <div class="filter-block">
                  <h4>Location</h4>
                  <div class="form-group">
                    <input type="text" name="listing-search" placeholder="City or postcode">
                    <span class="icon flaticon-map-locator"></span>
                  </div>
                  <p>Radius around selected destination</p>
                  <div class="range-slider-one">
                    <div class="area-range-slider"></div>
                    <div class="input-outer">
                      <div class="amount-outer"><span class="area-amount"></span>km</div>
                    </div>
                  </div>
                </div>

                <!-- Filter Block -->
                <div class="filter-block">
                  <h4>Category</h4>
                  <div class="form-group">
                    <select class="chosen-select">
                      <option>Choose a category</option>
                      <option>Residential</option>
                      <option>Commercial</option>
                      <option>Industrial</option>
                      <option>Apartments</option>
                    </select>
                    <span class="icon flaticon-briefcase"></span>
                  </div>
                </div>

                <!-- Filter Block -->
                <div class="filter-block">
                  <h4>Candidate Gender</h4>
                  <div class="form-group">
                    <select class="chosen-select">
                      <option>Male</option>
                      <option>Female</option>
                      <option>Others</option>
                    </select>
                    <span class="icon flaticon-man"></span>
                  </div>
                </div>

                <!-- Checkboxes Ouer -->
                <div class="checkbox-outer">
                  <h4>Date Posted</h4>
                  <ul class="checkboxes square">
                    <li>
                      <input id="check-f" type="checkbox" name="check">
                      <label for="check-f">All</label>
                    </li>
                    <li>
                      <input id="check-g" type="checkbox" name="check">
                      <label for="check-g">Last Hour</label>
                    </li>
                    <li>
                      <input id="check-h" type="checkbox" name="check">
                      <label for="check-h">Last 24 Hours</label>
                    </li>
                    <li>
                      <input id="check-i" type="checkbox" name="check">
                      <label for="check-i">Last 7 Days</label>
                    </li>
                    <li>
                      <input id="check-j" type="checkbox" name="check">
                      <label for="check-j">Last 14 Days</label>
                    </li>
                    <li>
                      <input id="check-k" type="checkbox" name="check">
                      <label for="check-k">Last 30 Days</label>
                    </li>
                  </ul>
                </div>


                <!-- Checkboxes Ouer -->
                <div class="checkbox-outer">
                  <h4>Experience</h4>
                  <ul class="checkboxes square">
                    <li>
                      <input id="check-l" type="checkbox" name="check">
                      <label for="check-l">0-2 Years</label>
                    </li>
                    <li>
                      <input id="check-m" type="checkbox" name="check">
                      <label for="check-m">10-12 Years</label>
                    </li>
                    <li>
                      <input id="check-n" type="checkbox" name="check">
                      <label for="check-n">12-16 Years</label>
                    </li>
                    <li>
                      <input id="check-o" type="checkbox" name="check">
                      <label for="check-o">16-20 Years</label>
                    </li>
                    <li>
                      <input id="check-p" type="checkbox" name="check">
                      <label for="check-p">20-25 Years</label>
                    </li>
                    <li>
                      <button class="view-more"><span class="icon flaticon-plus"></span> View More</button>
                    </li>
                  </ul>
                </div>

                <!-- Checkboxes Ouer -->
                <div class="checkbox-outer">
                  <h4>Education Levels</h4>
                  <ul class="checkboxes square">
                    <li>
                      <input id="check-a" type="checkbox" name="check">
                      <label for="check-a">Certificate</label>
                    </li>
                    <li>
                      <input id="check-b" type="checkbox" name="check">
                      <label for="check-b">Diploma</label>
                    </li>
                    <li>
                      <input id="check-c" type="checkbox" name="check">
                      <label for="check-c">Associate Degree</label>
                    </li>
                    <li>
                      <input id="check-d" type="checkbox" name="check">
                      <label for="check-d">Bachelor Degree</label>
                    </li>
                    <li>
                      <input id="check-e" type="checkbox" name="check">
                      <label for="check-e">Master’s Degree</label>
                    </li>
                    <li>
                      <button class="view-more"><span class="icon flaticon-plus"></span> View More</button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>


          <!-- Content Column -->
          <div class="content-column col-lg-8 col-md-12 col-sm-12">
            <div class="ls-outer">
              <button type="button" class="theme-btn btn-style-two toggle-filters">Show Filters</button>

              <!-- ls Switcher -->
              <div class="ls-switcher">
                <div class="showing-result">
                  <div class="text">Showing <strong>41-60</strong> of <strong>944</strong> jobs</div>
                </div>
                <div class="sort-by">
                  <select class="chosen-select">
                    <option>New Jobs</option>
                    <option>Freelance</option>
                    <option>Full Time</option>
                    <option>Internship</option>
                    <option>Part Time</option>
                    <option>Temporary</option>
                  </select>

                  <select class="chosen-select">
                    <option>Show 10</option>
                    <option>Show 20</option>
                    <option>Show 30</option>
                    <option>Show 40</option>
                    <option>Show 50</option>
                    <option>Show 60</option>
                  </select>
                </div>
              </div>


              <!-- Candidate block three -->
              @foreach ($candidates as $candidate)
    <div class="candidate-block-three">
        <div class="inner-box">
            <div class="content">
                <figure class="image">
                <img src="{{ asset('/storage/profile_photos/' . $candidate->profile_photo) }}">
                </figure>
                <h4 class="name">
                    <a href="{{ route('candidate.profile', $candidate->id) }}">{{ $candidate->full_name }}</a>
                </h4>
                <ul class="candidate-info">
                    <li class="designation">{{ $candidate->designation }}</li>
                    <li>
                        <span class="icon flaticon-map-locator"></span> 
                        {{ $candidate->address->city ?? 'N/A' }}, {{ $candidate->address->country ?? 'N/A' }}
                    </li>
                    <li>
                        <span class="icon flaticon-money"></span> 
                        ${{ $candidate->hourly_rate }} / hour
                    </li>
                </ul>
                <ul class="post-tags">
                    @foreach(explode(',', $candidate->skills) as $skill)
                        <li><a href="#">{{ trim($skill) }}</a></li>
                    @endforeach
                </ul>
                <p><strong>Education:</strong> {{ $candidate->resume->degree_name ?? 'Not Available' }} - {{ $candidate->resume->institution_name ?? 'N/A' }}</p>
                <p><strong>Work:</strong> {{ $candidate->resume->job_title ?? 'N/A' }} at {{ $candidate->resume->company_name ?? 'N/A' }}</p>
            </div>
            <div class="btn-box">
                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                <a href="{{ route('candidate.profile', $candidate->id) }}" class="theme-btn btn-style-three">
                    <span class="btn-title">View Profile</span>
                </a>
            </div>
        </div>
    </div>
@endforeach

              <!-- Listing Show More -->
              <nav class="ls-pagination mb-5">
            <ul>
              @if ($candidates->onFirstPage())
              <li class="prev disabled"><span><i class="fa fa-arrow-left"></i></span></li>
              @else
              <li class="prev"><a href="{{ $candidates->previousPageUrl() }}"><i class="fa fa-arrow-left"></i></a></li>
              @endif

              @foreach ($candidates->getUrlRange(1, $candidates->lastPage()) as $page => $url)
              <li>
                <a href="{{ $url }}" class="{{ $candidates->currentPage() == $page ? 'current-page' : '' }}">
                  {{ $page }}
                </a>
              </li>
              @endforeach

              @if ($candidates->hasMorePages())
              <li class="next"><a href="{{ $candidates->nextPageUrl() }}"><i class="fa fa-arrow-right"></i></a></li>
              @else
              <li class="next disabled"><span><i class="fa fa-arrow-right"></i></span></li>
              @endif
            </ul>
          </nav>
            </div>
          </div>
        </div>
    
 </section>

@endsection