<footer class="main-footer style-seven">
      <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
          <div class="row">
            <div class="big-column col-xl-3 col-lg-3 col-md-12">
              <div class="footer-column about-widget">
                <div class="logo"><a href="{{ url('#') }}"><img style="height: 55px;width: 152px;" src="{{ asset('/images/hirehub-logo-3.svg') }}" alt=""></a></div>
                <p class="phone-num"><span>Call us </span><a href="{{ url("thebeehost%40support.html") }}">123 456 7890</a></p>
                <p class="address">329 Queensberry Street, North Melbourne VIC<br> 3051, Australia. <br><a href="{{ url("mailto:support@Hirehub.com") }}" class="email">hirehub40@gmail.com</a></p>
              </div>
            </div>
            <div class="big-column col-xl-9 col-lg-9 col-md-12">
              <div class="row">
                <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                  <div class="footer-widget links-widget">
                    <h4 class="widget-title">For Candidates</h4>
                    <div class="widget-content">
                      <ul class="list">
                        <ul>
                          @if(Auth::check() && $userType === 'candidate')
                              <li><a href="{{ route('candidate.dashboard') }}">Candidate Dashboard</a></li>
                              <li><a href="{{ route('candidate.jobalerts') }}">Job Alerts</a></li>
                              <li><a href="{{ route('candidate.shortlist') }}">My Bookmarks</a></li>
                          @else
                              <li><a href="{{ route('jobs.list') }}">Browse Jobs</a></li>
                              <li><a href="#job-categories-section">Browse Categories</a></li>
                          @endif
                      </ul>                      
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                  <div class="footer-widget links-widget">
                    <h4 class="widget-title">For compines</h4>
                    <div class="widget-content">
                      <ul class="list">
                      <ul>
    @if(Auth::check() && $userType === 'employer')
        <!-- Employer Links (Only Visible When Logged In) -->
        <li><a href="{{ route('candidates.list') }}">Browse Candidates</a></li>
        <li><a href="{{ route('employer.dashboard') }}">Employer Dashboard</a></li>
        <li><a href="{{ route('employer.jobs.index') }}">Add Job</a></li>
        <li><a href="{{ route('employer.packages') }}">Job Packages</a></li>
    @endif
</ul>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="footer-column col-lg-2 col-md-6 col-sm-12">
                  <div class="footer-widget links-widget">
                  <h4 class="widget-title"><a href="{{ route('about') }}" style="color:#ffffff">About Us</a></h4>
                    <div class="widget-content">
                      <ul class="list">
                      @if(Auth::check()) 
    <!-- Display when any user (candidate or employer) is logged in -->
    <ul>
        <li><a href="">Contact us</a></li>
        <li><a href="">FAQ's</a></li>
    </ul>
@endif
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="footer-column col-lg-4 col-md-12 col-sm-12">
                  <div class="footer-widget">
                    <h4 class="widget-title">Join Us On</h4>
                    <div class="widget-content">
                      <div class="newsletter-form">
                        <div class="text-white">We don’t send spam so don’t worry.</div>
                        <form method="post" action='#' id="subscribe-form">
                          <div class="form-group">
                            <div class="response"></div>
                          </div>
                          <div class="form-group">
                            <input type="email" name="email" class="email" value="" placeholder="Email" required>
                            <button type="button" id="subscribe-newslatters" class="theme-btn bg-dark"><i class="flaticon-envelope"></i></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Bottom-->
      <div class="footer-bottom">
        <div class="auto-container">
          <div class="outer-box">
            <div class="copyright-text">© 2025 <a href="{{ url('#') }}">Hirehub</a>. All Right Reserved.</div>
            <div class="social-links">
              <a href="{{ url('#') }}"><i class="fab fa-facebook-f"></i></a>
              <a href="{{ url('#') }}"><i class="fab fa-twitter"></i></a>
              <a href="{{ url('#') }}"><i class="fab fa-instagram"></i></a>
              <a href="{{ url('#') }}"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    </footer>