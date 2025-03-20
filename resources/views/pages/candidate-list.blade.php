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
        <form action="{{ route('candidates.list') }}" method="GET">
        <!-- Filter Block - Search by Keywords -->
        <div class="filter-block">
          <h4>Search by Keywords</h4>
          <div class="form-group">
          <input type="text" name="keyword" placeholder="keywords" value="{{ request('keyword') }}">
          <span class="icon flaticon-search-3"></span>
          </div>
        </div>

        <!-- Filter Block - Location -->
        <div class="filter-block">
          <h4>Location</h4>
          <div class="form-group">
          <input type="text" name="location" placeholder="City or postcode" value="{{ request('location') }}">
          <span class="icon flaticon-map-locator"></span>
          </div>
        </div>

        <!-- Filter Block - Candidate Gender -->
        <div class="filter-block">
          <h4>Candidate Gender</h4>
          <div class="form-group">
          <select class="chosen-select" name="gender">
            <option value="">Select Gender</option>
            <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
          </select>
          <span class="icon flaticon-man"></span>
          </div>
        </div>

        <!-- Checkboxes - Experience
        <div class="checkbox-outer">
          <h4>Experience</h4>
          <ul class="checkboxes square">
          @foreach(['0-2', '10-12', '12-16', '16-20', '20-25'] as $exp)
        <li>
        <input id="check-{{ $exp }}" type="checkbox" name="experience[]" value="{{ $exp }}" {{ is_array(request('experience')) && in_array($exp, request('experience')) ? 'checked' : '' }}>
        <label for="check-{{ $exp }}">{{ $exp }} Years</label>
        </li>
      @endforeach
          </ul>
        </div> -->

        <div class="filter-buttons">
          <button type="submit" class="btn btn-primary">Apply</button>
          <a href="{{ route('candidates.list') }}" class="btn btn-secondary">Reset</a>
        </div>
        </form>

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
        <!-- <div class="sort-by">
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
          </div> -->
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
        <a href="{{ route('candidate.viewprofile', $candidate->id) }}">{{ $candidate->full_name }}</a>
        </h4>
        <ul class="candidate-info">
        <li class="designation">{{ $candidate->designation }}</li>
        <li>
        <span class="icon flaticon-map-locator"></span>
        {{ $candidate->address->city ?? 'N/A' }}, {{ $candidate->address->country ?? 'N/A' }}
        </li>
        <li>
        <span class="icon flaticon-money"></span>
        {{ $candidate->resume->current_salary ?? 'N/A' }}
        </li>
        </ul>
        <ul class="post-tags">
        @foreach(explode(',', $candidate->skills) as $skill)
      <li><a href="#">{{ trim($skill) }}</a></li>
    @endforeach
        </ul>
        <p><strong>Education:</strong> {{ $candidate->resume->degree_name ?? 'Not Available' }} -
        {{ $candidate->resume->institution_name ?? 'N/A' }}</p>
        <p><strong>Work:</strong> {{ $candidate->resume->job_title ?? 'N/A' }} at
        {{ $candidate->resume->company_name ?? 'N/A' }}</p>
      </div>
      <div class="btn-box">
        <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
        <a href="{{ route('candidate.viewprofile', $candidate->id) }}" class="theme-btn btn-style-three">
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