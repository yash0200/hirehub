<!-- Job Categories -->
<section class="job-categories border-bottom-0">
  <div class="auto-container">
    <div class="d-sm-flex align-items-center justify-content-sm-between wow fadeInUp">
      <div class="sec-title">
        <h2>Popular Job Categories</h2>
        <div class="text">
            {{ $categories->sum('jobs_count') }} jobs live - {{ $categories->sum('jobs_count') - $categories->count() }} added today.
        </div>
    </div>
    
      {{-- <a href="{{ url('#') }}" class="ud-btn-border-theme at-home18 mb-4">View All Categories <i
          class="fal fa-long-arrow-right"></i></a> --}}
    </div>
    <div class="row wow fadeInUp">
      @foreach($categories as $category)
      <div class="category-block col-lg-4 col-md-6 col-sm-12">
        <div class="inner-box">
          <div class="content">
            <span class="icon {{ $category->icon }}"></span>
            <h4><a href="{{ route('jobs.list', ['category_id' => $category->id]) }}">{{ $category->name }}</a></h4>
            <p>({{ $category->jobs_count }} open positions)</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- End Job Categories -->