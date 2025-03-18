@extends('layouts.app')

@section('title', 'Companies')

@section('content')

  <span class="header-span"></span>


  <!--Page Title-->
  <section class="page-title">
    <div class="auto-container">
    <div class="title-outer">
      <h1>Companies</h1>
      <ul class="page-breadcrumb">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li>Companies</li>
      </ul>
    </div>
    </div>
  </section>
  <!--End Page Title-->

  <!-- Listing Section -->
  <section class="ls-section">
    <div class="auto-container">
    <div class="filters-backdrop"></div>

    <div class="row">

      <!-- Filters Column -->
      <div class="filters-column col-lg-4 col-md-12 col-sm-12">
      <div class="inner-column pd-right">
        <div class="filters-outer">
        <button type="button" class="theme-btn close-filters">X</button>

        <form action="{{ route('employers.list') }}" method="GET">
          <!-- Filter Block -->
          <div class="filter-block">
              <h4>Search by Keywords</h4>
              <div class="form-group">
                  <input type="text" name="keyword" placeholder="Job title, keywords, or company" value="{{ request('keyword') }}">
                  <span class="icon flaticon-search-3"></span>
              </div>
          </div>

          <!-- Filter Block -->
          <div class="filter-block">
              <h4>Location (City)</h4>
              <div class="form-group">
                  <input type="text" name="location" placeholder="City or postcode" value="{{ request('location') }}">
                  <span class="icon flaticon-map-locator"></span>
              </div>
          </div>

          <!-- Filter Block -->
          <div class="filter-block">
              <h4>Category</h4>
              <div class="form-group">
                  <select class="chosen-select" name="category_id">
                      <option value="">Choose a category</option>
                      @foreach($categories as $category)
                          <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                              {{ $category->name }}
                          </option>
                      @endforeach
                  </select>
                  <span class="icon flaticon-briefcase"></span>
              </div>
          </div>

          <!-- Filter Block -->
          <div class="filter-block">
              <h4>Company Size</h4>
              <div class="form-group">
                  <select class="chosen-select" name="company_size">
                      <option value="">Select Company Size</option>
                      <option value="1-100" {{ request('company_size') == '1-100' ? 'selected' : '' }}>1-100 Members</option>
                      <option value="100-200" {{ request('company_size') == '100-200' ? 'selected' : '' }}>100-200 Members</option>
                      <option value="200-500" {{ request('company_size') == '200-500' ? 'selected' : '' }}>200-500 Members</option>
                      <option value="500-1000" {{ request('company_size') == '500-1000' ? 'selected' : '' }}>500-1000 Members</option>
                      <option value="1000-10000" {{ request('company_size') == '1000-10000' ? 'selected' : '' }}>1000-10000 Members</option>
                  </select>
                  <span class="icon flaticon-briefcase"></span>
              </div>
          </div>

          <div class="filter-buttons">
            <button type="submit" class="btn btn-primary">Apply</button>
            <a href="{{ route('employers.list') }}" class="btn btn-secondary">Reset</a>
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
            <div class="text">Showing {{ $employers->firstItem() }}-{{ $employers->lastItem() }} of
            {{ $employers->total() }} employers
            </div>
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
        <div class="row">
          <!-- Company Block Four -->
          {{-- @foreach ($employers as $employer)
            <div class="company-block-four col-xl-4 col-lg-6 col-md-6 col-sm-12">
              <div class="inner-box">
              <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
              <span class="featured">Featured</span>
              <span class="company-logo">
              <img
              src="{{ asset($employer->logo ? 'storage/logos/' . $employer->logo : 'images/resource/company-logo/default.png') }}"
              alt="{{ $employer->company_name }}">
              </span>
              <h4><a href="{{ route('employers.details', $employer->id) }}">{{ $employer->company_name }}</a></h4>
              <ul class="job-info">
              <li><span class="icon flaticon-map-locator"></span> {{ $employer->address->city }},{{$employer->address->state}}</li>
              <li><span class="icon flaticon-briefcase"></span> {{ $employer->industry }}</li>
              </ul>
              <div class="job-type">Open Jobs - {{ $employer->jobs_count ?? 0 }}</div>
              </div>
            </div>
          @endforeach --}}
          @foreach ($employers as $employer)
            <div class="company-block-four col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="inner-box">
                    <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                    @if($employer->is_featured)
                        <span class="featured">Featured</span>
                    @endif
                    <span class="company-logo">
                        <img
                        src="{{ asset($employer->logo ? 'storage/logos/' . $employer->logo : 'images/resource/company-logo/1-1.png') }}"
                        alt="{{ $employer->company_name ?? 'N/A' }}">
                    </span>
                    <h4>
                        <a href="{{ route('employers.details', $employer->id) }}">
                            {{ $employer->company_name ?? 'Company Name Not Available' }}
                        </a>
                    </h4>
                    <ul class="job-info">
                        <li>
                            <span class="icon flaticon-map-locator"></span> 
                            {{ optional($employer->address)->city ?? 'City Not Available' }},
                            {{ optional($employer->address)->state ?? 'State Not Available' }}
                        </li>
                        <li>
                            <span class="icon flaticon-briefcase"></span> 
                            {{ $employer->industry ?? 'Industry Not Specified' }}
                        </li>
                    </ul>
                    <div class="job-type">Open Jobs - {{ $employer->jobs_count ?? 0 }}</div>
                </div>
            </div>
          @endforeach
        </div>

        <!-- Pagination -->
        <nav class="ls-pagination mb-5">
          <ul>
            <li class="prev"><a href="{{ url("#") }}"><i class="fa fa-arrow-left"></i></a></li>
            <li><a href="{{ url("#") }}">1</a></li>
            <li><a href="{{ url("#") }}" class="current-page">2</a></li>
            <li><a href="{{ url("#") }}">3</a></li>
            <li class="next"><a href="{{ url("#") }}"><i class="fa fa-arrow-right"></i></a></li>
          </ul>
        </nav>
      </div>
      </div>
    </div>
    </div>
  </section>
  <!--End Listing Page Section -->
@endsection