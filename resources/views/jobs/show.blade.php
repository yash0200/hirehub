@extends('layouts.app')

@section('title', $job->title)

@section('content')
  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    <header class="main-header">
      <!-- Main box -->
      <div class="main-box">
        <!--Nav Outer -->
        <div class="nav-outer">
          <div class="logo-box">
            <div class="logo"><a href="{{ url('index.html') }}"><img src="{{ asset('/images/logo.svg') }}" alt="" title=""></a></div>
          </div>

          <nav class="nav main-menu">
            <ul class="navigation" id="navbar">
              <li class="dropdown">
                <span>Home</span>
                <div class="mega-menu">
                  <div class="mega-menu-bar row pt-0">
                    <div class="column col-lg-3 col-md-3 col-sm-12">
                      <ul>
                        <li><a href="{{ url('index.html') }}">Home Page 01</a></li>
                        <li><a href="{{ url('index-2.html') }}">Home Page 02</a></li>
                        <li><a href="{{ url('index-3.html') }}">Home Page 03</a></li>
                        <li><a href="{{ url('index-4.html') }}">Home Page 04</a></li>
                        <li><a href="{{ url('index-5.html') }}">Home Page 05</a></li>
                      </ul>
                    </div>

                    <div class="column col-lg-3 col-md-3 col-sm-12">
                      <ul>
                        <li><a href="{{ url('index-6.html') }}">Home Page 06</a></li>
                        <li><a href="{{ url('index-7.html') }}">Home Page 07</a></li>
                        <li><a href="{{ url('index-8.html') }}">Home Page 08</a></li>
                        <li><a href="{{ url('index-9.html') }}">Home Page 09</a></li>
                        <li><a href="{{ url('index-10.html') }}">Home Page 10</a></li>
                      </ul>
                    </div>

                    <div class="column col-lg-3 col-md-3 col-sm-12">
                      <ul>
                        <li><a href="{{ url('index-11.html') }}">Home Page 11</a></li>
                        <li><a href="{{ url('index-12.html') }}">Home Page 12</a></li>
                        <li><a href="{{ url('index-13.html') }}">Home Page 13</a></li>
                        <li><a href="{{ url('index-14.html') }}">Home Page 14</a></li>
                        <li><a href="{{ url('index-15.html') }}">Home Page 15</a></li>
                      </ul>
                    </div>

                    <div class="column col-lg-3 col-md-3 col-sm-12">
                      <ul>
                        <li><a href="{{ url('index-16.html') }}">Home Page 16</a></li>
                        <li><a href="{{ url('index-17.html') }}">Home Page 17</a></li>
                        <li><a href="{{ url('index-18.html') }}">Home Page 18</a></li>
                        <li><a href="{{ url('index-19.html') }}">Home Page 19</a></li>
                        <li><a href="{{ url('index-20.html') }}">Home Page 20</a></li>
                        <li><a href="{{ url('index-21.html') }}">Home Page 21</a></li>
                        <li><a href="{{ url('index-22.html') }}">Home Page 22</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </li>

              <li class="current dropdown has-mega-menu" id="has-mega-menu">
                <span>Find Jobs</span>
                <div class="mega-menu">
                  <div class="mega-menu-bar row">
                    <div class="column col-lg-3 col-md-3 col-sm-12">
                      <h3>Jobs Listing</h3>
                      <ul>
                        <li><a href="{{ url('job-list-v1.html') }}">Jobs List – v1</a></li>
                        <li><a href="{{ url('job-list-v2.html') }}">Jobs List – v2</a></li>
                        <li><a href="{{ url('job-list-v3.html') }}">Jobs List – v3</a></li>
                        <li><a href="{{ url('job-list-v4.html') }}">Jobs List – v4</a></li>
                        <li><a href="{{ url('job-list-v5.html') }}">Jobs List – v5</a></li>
                      </ul>
                    </div>

                    <div class="column col-lg-3 col-md-3 col-sm-12">
                      <ul>
                        <li><a href="{{ url('job-list-v6.html') }}">Jobs List – v6</a></li>
                        <li><a href="{{ url('job-list-v7.html') }}">Jobs List – v7</a></li>
                        <li><a href="{{ url('job-list-v8.html') }}">Jobs List – v8</a></li>
                        <li><a href="{{ url('job-list-v9.html') }}">Jobs List – v9</a></li>
                        <li><a href="{{ url('job-list-v10.html') }}">Jobs List – v10</a></li>
                      </ul>
                    </div>

                    <div class="column col-lg-3 col-md-3 col-sm-12">
                      <ul>
                        <li><a href="{{ url('job-list-v11.html') }}">Jobs List – v11</a></li>
                        <li><a href="{{ url('job-list-v12.html') }}">Jobs List – v12</a></li>
                        <li><a href="{{ url('job-list-v13.html') }}">Jobs List – v13</a></li>
                        <li><a href="{{ url('job-list-v14.html') }}">Jobs List – v14</a></li>
                        <li><a href="{{ url('job-list-v15.html') }}">Jobs List – v15</a></li>
                        <li><a href="{{ url('job-list-v16.html') }}">Jobs List – v16</a></li>
                        <li><a href="{{ url('job-list-v17.html') }}">Jobs List – v17</a></li>
                      </ul>
                    </div>

                    <div class="column col-lg-3 col-md-3 col-sm-12">
                      <h3>Jobs Single</h3>
                      <ul>
                        <li><a href="{{ url('job-single.html') }}">Job Single v1</a></li>
                        <li><a href="{{ url('job-single-2.html') }}">Job Single v2</a></li>
                        <li><a href="{{ url('job-single-3.html') }}">Job Single v3</a></li>
                        <li><a href="{{ url('job-single-4.html') }}">Job Single v4</a></li>
                        <li><a href="{{ url('job-single-5.html') }}">Job Single v5</a></li>
                        <li><a href="{{ url('job-single-6.html') }}">Job Single v6</a></li>
                        <li><a href="{{ url('job-single-7.html') }}">Job Single v7</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </li>

              <li class="dropdown">
                <span>Employers</span>
                <ul>
                  <li class="dropdown">
                    <span>Employers List</span>
                    <ul>
                      <li><a href="{{ url('employers-list-v1.html') }}">Employers LIst v1</a></li>
                      <li><a href="{{ url('employers-list-v2.html') }}">Employers LIst v2</a></li>
                      <li><a href="{{ url('employers-list-v3.html') }}">Employers LIst v3</a></li>
                      <li><a href="{{ url('employers-list-v4.html') }}">Employers LIst v4</a></li>
                    </ul>
                  </li>

                  <li class="dropdown">
                    <span>Employers Single</span>
                    <ul>
                      <li><a href="{{ url('employers-single-v1.html') }}">Employers Single v1</a></li>
                      <li><a href="{{ url('employers-single-v2.html') }}">Employers Single v2</a></li>
                      <li><a href="{{ url('employers-single-v3.html') }}">Employers Single v3</a></li>
                    </ul>
                  </li>
                  <li><a href="{{ url('dashboard.html') }}">Employers Dashboard</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <span>Candidates</span>
                <ul>
                  <li class="dropdown">
                    <span>Candidates List</span>
                    <ul>
                      <li><a href="{{ url('candidates-list-v1.html') }}">Candidates LIst v1</a></li>
                      <li><a href="{{ url('candidates-list-v2.html') }}">Candidates LIst v2</a></li>
                      <li><a href="{{ url('candidates-list-v3.html') }}">Candidates LIst v3</a></li>
                      <li><a href="{{ url('candidates-list-v4.html') }}">Candidates LIst v4</a></li>
                      <li><a href="{{ url('candidates-list-v5.html') }}">Candidates LIst v5</a></li>
                      <li><a href="{{ url('candidates-list-v6.html') }}">Candidates LIst v6</a></li>
                      <li><a href="{{ url('candidates-list-v7.html') }}">Candidates LIst v7</a></li>
                    </ul>
                  </li>

                  <li class="dropdown">
                    <span>Candidates Single</span>
                    <ul>
                      <li><a href="{{ url('candidates-single-v1.html') }}">Candidates Single v1</a></li>
                      <li><a href="{{ url('candidates-single-v2.html') }}">Candidates Single v2</a></li>
                      <li><a href="{{ url('candidates-single-v3.html') }}">Candidates Single v3</a></li>
                      <li><a href="{{ url('candidates-single-v4.html') }}">Candidates Single v4</a></li>
                      <li><a href="{{ url('candidates-single-v5.html') }}">Candidates Single v5</a></li>
                    </ul>
                  </li>
                  <li><a href="{{ url('candidate-dashboard.html') }}">Candidates Dashboard</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <span>Blog</span>
                <ul>
                  <li><a href="{{ url('blog-list-v1.html') }}">Blog LIst v1</a></li>
                  <li><a href="{{ url('blog-list-v2.html') }}">Blog LIst v2</a></li>
                  <li><a href="{{ url('blog-list-v3.html') }}">Blog LIst v3</a></li>
                  <li><a href="{{ url('blog-single.html') }}">Blog Single</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <span>Pages</span>
                <ul>
                  <li class="dropdown">
                    <span>Shop</span>
                    <ul>
                      <li><a href="{{ url('shop.html') }}">Shop List</a></li>
                      <li><a href="{{ url('shop-single.html') }}">Shop Single</a></li>
                      <li><a href="{{ url('shopping-cart.html') }}">Shopping Cart</a></li>
                      <li><a href="{{ url('shop-checkout.html') }}">Checkout</a></li>
                      <li><a href="{{ url('order-completed.html') }}">Order Completed</a></li>
                      <li><a href="{{ url('login.html') }}">Login</a></li>
                      <li><a href="{{ url('register.html') }}">Register</a></li>
                    </ul>
                  </li>
                  <li><a href="{{ url('about.html') }}">About</a></li>
                  <li><a href="{{ url('pricing.html') }}">Pricing</a></li>
                  <li><a href="{{ url('faqs.html') }}">FAQ's</a></li>
                  <li><a href="{{ url('terms.html') }}">Terms</a></li>
                  <li><a href="{{ url('invoice.html') }}">Invoice</a></li>
                  <li><a href="{{ url('elements.html') }}">Ui Elements</a></li>
                  <li><a href="{{ url('contact.html') }}">Contact</a></li>
                </ul>
              </li>

              <!-- Only for Mobile View -->
              <li class="mm-add-listing">
                <a href="{{ url('add-listing.html') }}" class="theme-btn btn-style-one">Job Post</a>
                <span>
                  <span class="contact-info">
                    <span class="phone-num"><span>Call us</span><a href="{{ url('tel:1234567890') }}">123 456 7890</a></span>
                    <span class="address">329 Queensberry Street, North Melbourne VIC <br>3051, Australia.</span>
                    <a href="{{ url('mailto:support@superio.com') }}" class="email">support@superio.com</a>
                  </span>
                  <span class="social-links">
                    <a href="{{ url('#') }}"><span class="fab fa-facebook-f"></span></a>
                    <a href="{{ url('#') }}"><span class="fab fa-twitter"></span></a>
                    <a href="{{ url('#') }}"><span class="fab fa-instagram"></span></a>
                    <a href="{{ url('#') }}"><span class="fab fa-linkedin-in"></span></a>
                  </span>
                </span>
              </li>
            </ul>
          </nav>
          <!-- Main Menu End-->
        </div>

        <div class="outer-box">
          <!-- Add Listing -->
          <a href="{{ url('candidate-dashboard-cv-manager.html') }}" class="upload-cv"> Upload your CV</a>
          <!-- Login/Register -->
          <div class="btn-box">
            <a href="{{ url('login-popup.html') }}" class="theme-btn btn-style-three call-modal">Login / Register</a>
            <a href="{{ url('dashboard-post-job.html') }}" class="theme-btn btn-style-one">Job Post</a>
          </div>
        </div>
      </div>

      <!-- Mobile Header -->
      <div class="mobile-header">
        <div class="logo"><a href="{{ url('index.html') }}"><img src="{{ asset('/images/logo.svg') }}" alt="" title=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

          <div class="outer-box">
            <!-- Login/Register -->
            <div class="login-box">
              <a href="{{ url('login-popup.html') }}" class="call-modal"><span class="icon-user"></span></a>
            </div>
            <a href="{{ url('#nav-mobile') }}" class="mobile-nav-toggler"><span class="flaticon-menu-1"></span></a>
          </div>
        </div>
      </div>

      <!-- Mobile Nav -->
      <div id="nav-mobile"></div>
    </header>
    <!--End Main Header -->

    <!-- Job Detail Section -->
    <section class="job-detail-section">
      <div class="job-detail-outer">
        <div class="auto-container">
          <div class="row">
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
              <div class="job-block-outer">
                <!-- Job Block -->
                <div class="job-block-seven style-two">
                  <div class="inner-box">
                    <div class="content">
                      <h4><a href="{{ url('#') }}">Product Designer / UI Designer</a></h4>
                      <ul class="job-info">
                        <li><span class="icon flaticon-briefcase"></span> Segment</li>
                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                        <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                        <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                      </ul>
                      <ul class="job-other-info">
                        <li class="time">Full Time</li>
                        <li class="privacy">Private</li>
                        <li class="required">Urgent</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="job-overview-two">
                <h4>Job Description</h4>
                <ul>
                  <li>
                    <i class="icon icon-calendar"></i>
                    <h5>Date Posted:</h5>
                    <span>Posted 1 hours ago</span>
                  </li>
                  <li>
                    <i class="icon icon-expiry"></i>
                    <h5>Expiration date:</h5>
                    <span>April 06, 2021</span>
                  </li>
                  <li>
                    <i class="icon icon-location"></i>
                    <h5>Location:</h5>
                    <span>London, UK</span>
                  </li>
                  <li>
                    <i class="icon icon-user-2"></i>
                    <h5>Job Title:</h5>
                    <span>Designer</span>
                  </li>
                  <li>
                    <i class="icon icon-clock"></i>
                    <h5>Hours:</h5>
                    <span>50h / week</span>
                  </li>
                  <li>
                    <i class="icon icon-rate"></i>
                    <h5>Rate:</h5>
                    <span>$15 - $25 / hour</span>
                  </li>
                  <li>
                    <i class="icon icon-salary"></i>
                    <h5>Salary:</h5>
                    <span>$35k - $45k</span>
                  </li>
                </ul>
              </div>

              <div class="job-detail">

                <h4>Job Description</h4>
                <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                <h4>Key Responsibilities</h4>
                <ul class="list-style-three">
                  <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                  <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                  <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                  <li>Accurately estimate design tickets during planning sessions.</li>
                  <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                  <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                  <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                  <li>Present your work to the wider business at Show & Tell sessions.</li>
                </ul>
                <h4>Skill & Experience</h4>
                <ul class="list-style-three">
                  <li>You have at least 3 years’ experience working as a Product Designer.</li>
                  <li>You have experience using Sketch and InVision or Framer X</li>
                  <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                  <li>You are familiar using Jira and Confluence in your workflow</li>
                </ul>
              </div>

              <!-- Other Options -->
              <div class="other-options">
                <div class="social-share">
                  <h5>Share this job</h5>
                  <a href="{{ url('#') }}" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                  <a href="{{ url('#') }}" class="twitter"><i class="fab fa-twitter"></i> Twitter</a>
                  <a href="{{ url('#') }}" class="google"><i class="fab fa-google"></i> Google+</a>
                </div>
              </div>
            </div>

            <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">
                <div class="btn-box">
                  <a href="{{ url('#') }}" class="theme-btn btn-style-one">Apply For Job</a>
                  <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button>
                </div>

                <div class="sidebar-widget company-widget">
                  <div class="widget-content">
                    <div class="company-title">
                      <div class="company-logo"><img src="{{ asset('/images/resource/company-7.png') }}" alt=""></div>
                      <h5 class="company-name">InVision</h5>
                      <a href="{{ url('#') }}" class="profile-link">View company profile</a>
                    </div>

                    <ul class="company-info">
                      <li>Primary industry: <span>Software</span></li>
                      <li>Company size: <span>501-1,000</span></li>
                      <li>Founded in: <span>2011</span></li>
                      <li>Phone: <span>123 456 7890</span></li>
                      <li>Email: <span>info@joio.com</span></li>
                      <li>Location: <span>London, UK</span></li>
                      <li>Social media:
                        <div class="social-links">
                          <a href="{{ url('#') }}"><i class="fab fa-facebook-f"></i></a>
                          <a href="{{ url('#') }}"><i class="fab fa-twitter"></i></a>
                          <a href="{{ url('#') }}"><i class="fab fa-instagram"></i></a>
                          <a href="{{ url('#') }}"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                      </li>
                    </ul>

                    <div class="btn-box"><a href="{{ url('#') }}" class="theme-btn btn-style-three">www.invisionapp.com</a></div>
                  </div>
                </div>

                <div class="sidebar-widget contact-widget">
                  <h4 class="widget-title">Contact Us</h4>
                  <div class="widget-content">
                    <!-- Comment Form -->
                    <div class="default-form">
                      <!--Comment Form-->
                      <form>
                        <div class="row clearfix">
                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="text" name="username" placeholder="Your Name" required>
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="email" name="email" placeholder="Email Address" required>
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea class="darma" name="message" placeholder="Message"></textarea>
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <button class="theme-btn btn-style-one" type="submit" name="submit-form">Send Message</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </aside>
            </div>
          </div>

          <!-- Related Jobs -->
          <div class="related-jobs">
            <div class="title-box">
              <h3>Related Jobs</h3>
              <div class="text">2020 jobs live - 293 added today.</div>
            </div>
            <div class="row">
              <!-- Job Block -->
              <div class="job-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                  <ul class="job-other-info">
                    <li class="time">Full Time</li>
                    <li class="privacy">Private</li>
                    <li class="required">Urgent</li>
                  </ul>
                  <span class="company-logo"><img src="{{ asset('/images/resource/company-logo/3-1.png') }}" alt=""></span>
                  <span class="company-name">Catalyst</span>
                  <h4><a href="{{ url('#') }}">Software Engineer (Android), Libraries</a></h4>
                  <div class="location"><span class="icon flaticon-map-locator"></span> London, UK</div>
                </div>
              </div>

              <!-- Job Block -->
              <div class="job-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                  <ul class="job-other-info">
                    <li class="time">Full Time</li>
                  </ul>
                  <span class="company-logo"><img src="{{ asset('/images/resource/company-logo/3-2.png') }}" alt=""></span>
                  <span class="company-name">Catalyst</span>
                  <h4><a href="{{ url('#') }}">Software Engineer (Android), Libraries</a></h4>
                  <div class="location"><span class="icon flaticon-map-locator"></span> London, UK</div>
                </div>
              </div>

              <!-- Job Block -->
              <div class="job-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                  <ul class="job-other-info">
                    <li class="time">Full Time</li>
                  </ul>
                  <span class="company-logo"><img src="{{ asset('/images/resource/company-logo/3-3.png') }}" alt=""></span>
                  <span class="company-name">Upwork</span>
                  <h4><a href="{{ url('#') }}">Software Engineer (Android), Libraries</a></h4>
                  <div class="location"><span class="icon flaticon-map-locator"></span> London, UK</div>
                </div>
              </div>

              <!-- Job Block -->
              <div class="job-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                  <ul class="job-other-info">
                    <li class="time">Full Time</li>
                  </ul>
                  <span class="company-logo"><img src="{{ asset('/images/resource/company-logo/3-4.png') }}" alt=""></span>
                  <span class="company-name">invision</span>
                  <h4><a href="{{ url('#') }}">Software Engineer (Android), Libraries</a></h4>
                  <div class="location"><span class="icon flaticon-map-locator"></span> London, UK</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Job Detail Section -->
     @endsection