@extends('layouts.app')

@section('title', 'Employers')

@section('content')

<span class="header-span"></span>

    
<!--Page Title-->
<section class="page-title">
  <div class="auto-container">
    <div class="title-outer">
      <h1>Companies</h1>
      <ul class="page-breadcrumb">
        <li><a href="{{ url("index.html") }}">Home</a></li>
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
              <h4>Company Size</h4>
              <div class="form-group">
                <select class="chosen-select">
                  <option>1-100 Members</option>
                  <option>100-200 Members</option>
                  <option>200-500 Members</option>
                  <option>500-1000 Members</option>
                  <option>1000-10000 Members</option>
                </select>
                <span class="icon flaticon-briefcase"></span>
              </div>
            </div>

            <!-- Filter Block -->
            <div class="filter-block">
              <h4>Founded Date</h4>
              <div class="range-slider-one">
                <div class="range-slider"></div>
                <div class="input-outer">
                  <div class="amount-outer"><span class="count"></span></div>
                </div>
              </div>
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
              <div class="text">Showing <strong>41-60</strong> of <strong>944</strong> employer</div>
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
            <div class="company-block-four col-xl-4 col-lg-6 col-md-6 col-sm-12">
              <div class="inner-box">
                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                <span class="featured">Featured</span>
                <span class="company-logo"><img src="{{ asset("/images/resource/company-logo/6-1.png") }}" alt=""></span>
                <h4><a href="{{ url("#") }}">Netflix</a></h4>
                <ul class="job-info">
                  <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                  <li><span class="icon flaticon-briefcase"></span> Accounting / Finance</li>
                </ul>
                <div class="job-type">Open Jobs – 2</div>
              </div>
            </div>

            <!-- Company Block Four -->
            <div class="company-block-four col-xl-4 col-lg-6 col-md-6 col-sm-12">
              <div class="inner-box">
                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                <span class="featured">Featured</span>
                <span class="company-logo"><img src="{{ asset("/images/resource/company-logo/6-2.png") }}" alt=""></span>
                <h4><a href="{{ url("#") }}">Opendoor</a></h4>
                <ul class="job-info">
                  <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                  <li><span class="icon flaticon-briefcase"></span> Accounting / Finance</li>
                </ul>
                <div class="job-type">Open Jobs – 2</div>
              </div>
            </div>

            <!-- Company Block Four -->
            <div class="company-block-four col-xl-4 col-lg-6 col-md-6 col-sm-12">
              <div class="inner-box">
                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                <span class="featured">Featured</span>
                <span class="company-logo"><img src="{{ asset("/images/resource/company-logo/6-3.png") }}" alt=""></span>
                <h4><a href="{{ url("#") }}">Checkr</a></h4>
                <ul class="job-info">
                  <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                  <li><span class="icon flaticon-briefcase"></span> Accounting / Finance</li>
                </ul>
                <div class="job-type">Open Jobs – 2</div>
              </div>
            </div>

            <!-- Company Block Four -->
            <div class="company-block-four col-xl-4 col-lg-6 col-md-6 col-sm-12">
              <div class="inner-box">
                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                <span class="featured">Featured</span>
                <span class="company-logo"><img src="{{ asset("/images/resource/company-logo/6-4.png") }}" alt=""></span>
                <h4><a href="{{ url("#") }}">Mural</a></h4>
                <ul class="job-info">
                  <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                  <li><span class="icon flaticon-briefcase"></span> Accounting / Finance</li>
                </ul>
                <div class="job-type">Open Jobs – 2</div>
              </div>
            </div>

            <!-- Company Block Four -->
            <div class="company-block-four col-xl-4 col-lg-6 col-md-6 col-sm-12">
              <div class="inner-box">
                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                <span class="featured">Featured</span>
                <span class="company-logo"><img src="{{ asset("/images/resource/company-logo/6-5.png") }}" alt=""></span>
                <h4><a href="{{ url("#") }}">Astronomer</a></h4>
                <ul class="job-info">
                  <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                  <li><span class="icon flaticon-briefcase"></span> Accounting / Finance</li>
                </ul>
                <div class="job-type">Open Jobs – 2</div>
              </div>
            </div>

            <!-- Company Block Four -->
            <div class="company-block-four col-xl-4 col-lg-6 col-md-6 col-sm-12">
              <div class="inner-box">
                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                <span class="featured">Featured</span>
                <span class="company-logo"><img src="{{ asset("/images/resource/company-logo/6-6.png") }}" alt=""></span>
                <h4><a href="{{ url("#") }}">Figma</a></h4>
                <ul class="job-info">
                  <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                  <li><span class="icon flaticon-briefcase"></span> Accounting / Finance</li>
                </ul>
                <div class="job-type">Open Jobs – 2</div>
              </div>
            </div>


            <!-- Company Block Four -->
            <div class="company-block-four col-xl-4 col-lg-6 col-md-6 col-sm-12">
              <div class="inner-box">
                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                <span class="featured">Featured</span>
                <span class="company-logo"><img src="{{ asset("/images/resource/company-logo/6-7.png") }}" alt=""></span>
                <h4><a href="{{ url("#") }}">Mural</a></h4>
                <ul class="job-info">
                  <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                  <li><span class="icon flaticon-briefcase"></span> Accounting / Finance</li>
                </ul>
                <div class="job-type">Open Jobs – 2</div>
              </div>
            </div>

            <!-- Company Block Four -->
            <div class="company-block-four col-xl-4 col-lg-6 col-md-6 col-sm-12">
              <div class="inner-box">
                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                <span class="featured">Featured</span>
                <span class="company-logo"><img src="{{ asset("/images/resource/company-logo/6-8.png") }}" alt=""></span>
                <h4><a href="{{ url("#") }}">Astronomer</a></h4>
                <ul class="job-info">
                  <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                  <li><span class="icon flaticon-briefcase"></span> Accounting / Finance</li>
                </ul>
                <div class="job-type">Open Jobs – 2</div>
              </div>
            </div>

            <!-- Company Block Four -->
            <div class="company-block-four col-xl-4 col-lg-6 col-md-6 col-sm-12">
              <div class="inner-box">
                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                <span class="featured">Featured</span>
                <span class="company-logo"><img src="{{ asset("/images/resource/company-logo/6-9.png") }}" alt=""></span>
                <h4><a href="{{ url("#") }}">Figma</a></h4>
                <ul class="job-info">
                  <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                  <li><span class="icon flaticon-briefcase"></span> Accounting / Finance</li>
                </ul>
                <div class="job-type">Open Jobs – 2</div>
              </div>
            </div>


          </div>

          <!-- Pagination -->
          <nav class="ls-pagination">
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