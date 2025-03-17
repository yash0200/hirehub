  @extends('layouts.app')

  @section('title', 'Job Listings')

  @section('content')
    <!-- Preloader
      <div class="preloader"></div> -->

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Listing Section -->
    <section class="ls-section style-two">
      <div class="filters-backdrop"></div>

      <div class="row no-gutters">
      <!-- Filters Column -->
      <div class="filters-column col-xl-3 col-lg-4 col-md-12 col-sm-12">
        <div class="inner-column">
        <div class="filters-outer">
          <button type="button" class="theme-btn close-filters">X</button>

          <!-- Filter Block - Search -->
          <form action="{{ route('jobs.list') }}" method="GET">

            <div class="filter-block">
              <h4>Search by Keywords</h4>
              <div class="form-group">
                <input type="text" name="keyword" placeholder="Job title, keywords, or company" value="{{ request('keyword') }}">
                <span class="icon flaticon-search-3"></span>
              </div>
            </div>

            <!-- Filter Block - Location -->
            <div class="filter-block">
              <h4>Location</h4>
              <div class="form-group">
                <input type="text" name="location" placeholder="City,State or postcode" value="{{ request('location') }}">
                <span class="icon flaticon-map-locator"></span>
              </div>
            </div>
            {{-- <p>Radius around selected destination</p>
            <div class="range-slider-one">
              <div class="area-range-slider"></div>
              <div class="input-outer">
              <div class="amount-outer"><span class="area-amount"></span>km</div>
              </div>
            </div>
            </div> --}}

            <!-- Filter Block - Category -->
            <div class="filter-block">
              <h4>Category</h4>
              <div class="form-group">
                <select class="chosen-select" name="category_id">
                  <option value="">Choose a category</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                      {{ $category->name }}
                    </option>
                  @endforeach
                </select>
                <span class="icon flaticon-briefcase"></span>
              </div>
            </div>

            <!-- Switchbox - Job Type -->
            <div class="switchbox-outer">
              <h4>Job type</h4>
              <ul class="switchbox">
                @php 
                  $selectedJobTypes = (array) request('job_type', []);
                @endphp
                @foreach(['Freelance', 'Full-Time', 'Internship', 'Part-Time', 'Temporary'] as $type)
                  <li>
                    <label class="switch">
                      <input type="checkbox" name="job_type[]" value="{{ $type }}" {{ in_array($type, $selectedJobTypes) ? 'checked' : '' }}>
                      <span class="slider round"></span>
                      <span class="title">{{ $type }}</span>
                    </label>
                  </li>
                @endforeach
              </ul>
            </div>

          {{-- <!-- Checkboxes - Date Posted -->
            <div class="checkbox-outer">
              <h4>Date Posted</h4>
              <ul class="checkboxes">
                @foreach(['All' => '', 'Last Hour' => '1', 'Last 24 Hours' => '24', 'Last 7 Days' => '7', 'Last 14 Days' => '14', 'Last 30 Days' => '30'] as $label => $value)
                  <li>
                    <input id="date-{{ $value }}" type="radio" name="date_posted" value="{{ $value }}" {{ request('date_posted') == $value ? 'checked' : '' }}>
                    <label for="date-{{ $value }}">{{ $label }}</label>
                  </li>
                @endforeach
              </ul>
            </div>

            <!-- Filter Block - Experience Level -->
            <div class="checkbox-outer">
              <h4>Experience Level</h4>
              <ul class="checkboxes square">
                @foreach(['All', 'Internship', 'Entry level', 'Associate', 'Mid-Senior level'] as $level)
                  <li>
                    <input id="exp-{{ $level }}" type="checkbox" name="experience[]" value="{{ $level }}" {{ in_array($level, (array) request('experience', [])) ? 'checked' : '' }}>
                    <label for="exp-{{ $level }}">{{ $level }}</label>
                  </li>
                @endforeach
              </ul>
            </div>

            <!-- Filter Block - Salary -->
            <div class="filter-block">
              <h4>Salary</h4>
              <div class="range-slider-one salary-range">
                <div class="salary-range-slider"></div>
                <div class="input-outer">
                  <div class="amount-outer">
                    <span class="amount salary-amount">
                      $<span class="min">{{ request('min_salary', 0) }}</span> - 
                      $<span class="max">{{ request('max_salary', 2000000) }}</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Filter Block - Tags -->
            <div class="filter-block">
              <h4>Tags</h4>
              <ul class="tags-style-one">
                @foreach(['app', 'administrative', 'android', 'wordpress', 'design', 'react'] as $tag)
                  <li>
                    <a href="{{ route('jobs.list', array_merge(request()->query(), ['tag' => $tag])) }}">{{ $tag }}</a>
                  </li>
                @endforeach
              </ul>
            </div> --}}
            <div class="filter-buttons">
              <button type="submit" class="btn btn-primary">Apply</button>
              <a href="{{ route('jobs.list') }}" class="btn btn-secondary">Reset</a>
          </div>
          
          </form>
        </div>
        </div>
      </div>

      <!-- Content Column -->
      <div class="content-column col-xl-9 col-lg-8 col-md-12 col-sm-12">
        <div class="ls-outer">
        <button type="button" class="theme-btn btn-style-two toggle-filters">Show Filters</button>

        <!-- ls Switcher -->
        <div class="ls-switcher">
          <div class="showing-result">
          <div class="text">
            Showing
            <strong>{{ $jobs->firstItem() }}-{{ $jobs->lastItem() }}</strong>
            of <strong>{{ $jobs->total() }}</strong> jobs
          </div>
          </div>

          <div class="sort-by">
          {{-- <select class="chosen-select">
            <option>New Jobs</option>
            <option>Freelance</option>
            <option>Full Time</option>
            <option>Internship</option>
            <option>Part Time</option>
            <option>Temporary</option>
          </select> --}}

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

        <div class="row" id="job-list">
          @include('partials.job-card',['jobs'=>$jobs])
          <!-- Job Block -->
        </div>
          
          <!-- Job Listing Show More -->
        <div class="ls-show-more">
          <p>Showing <span id="job-count">{{ $jobs->count() }}</span> of <span id="total-jobs">{{ $jobs->total() }}</span> Jobs</p>
          <div class="bar">
              @php
                  $percentage = ($jobs->total() > 0) ? ($jobs->count() / $jobs->total()) * 100 : 0;
              @endphp
              <span class="bar-inner" style="width: {{ $percentage }}%"></span>
          </div>
          @if ($jobs->hasMorePages())
          {{-- <p>Next Page URL: {{ $jobs->nextPageUrl() }}</p> <!-- Debugging --> --}}
              <button id="show-more-btn" class="show-more" data-next-page="{{ $jobs->nextPageUrl() }}">Show More</button>
          @endif
        </div>
        
      </div>
    </section>
    <!--End Listing Page Section -->

  @endsection
