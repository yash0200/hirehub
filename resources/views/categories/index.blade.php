<!-- Job Categories -->
<section class="job-categories border-bottom-0">
  <div class="auto-container">
    <div class="d-sm-flex align-items-center justify-content-sm-between wow fadeInUp">
      <div class="sec-title">
        <h2>Popular Job Categories</h2>
        <div class="text">2020 jobs live - 293 added today.</div>
      </div>
      <a href="{{ url('#') }}" class="ud-btn-border-theme at-home18 mb-4">View All Categories <i
          class="fal fa-long-arrow-right"></i></a>
    </div>
    <div class="row wow fadeInUp">
      <div class="category-block at-home18 col-lg-4 col-md-6 col-sm-12">
      @foreach($categories as $category) <!-- Loop through categories -->
      <div class="inner-box">
        <div class="content">
        <!-- Optionally, you can use category icon here -->
        <span class="icon flaticon-money-1"></span>

        <!-- Category Name Link -->
        <h4><a href="{{ url('categories/' . $category->slug) }}">{{ $category->name }}</a></h4>

        <!-- Count of Jobs Available -->
        <p>({{ $category->jobs_count }} open positions)</p>
        </div>
      </div>
      @endforeach
      </div>
    </div>
  </div>
</section>
<!-- End Job Categories -->