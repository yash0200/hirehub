<header class="main-header">

    <!-- Main box -->
    <div class="main-box">
        <!--Nav Outer -->
        <div class="nav-outer">
            <div class="logo-box">
                <div class="logo"><a href="{{ url('/') }}"><img style="height:55px;width:152px;" src="{{ asset('/images/logo.svg') }}" alt="Hirehub" title=""></a></div>
            </div>

            <nav class="nav main-menu">
                <ul class="navigation" id="navbar">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="dropdown has-mega-menu" id="has-mega-menu">
                        <span><a href="{{ url('/jobs') }}" >Jobs</a></span>
                        <div class="mega-menu">
                            <div class="mega-menu-bar row">
                                <div class="column col-lg-3 col-md-3 col-sm-12">
                                    <h3>Popular categories</h3>
                                    <ul>
                                        <li><a href="{{ url('job-list-v1.html') }}">It jobs</a></li>
                                        <li><a href="{{ url('job-list-v2.html') }}">Sales jobs</a></li>
                                        <li><a href="{{ url('job-list-v3.html') }}">Marketing jobs</a></li>
                                        <li><a href="{{ url('job-list-v4.html') }}">Data Sciencejobs</a></li>
                                        <li><a href="{{ url('job-list-v5.html') }}">HR jobs</a></li>
                                        <li><a href="{{ url('job-list-v5.html') }}">Engineering jobs</a></li>
                                    </ul>
                                </div>

                                <div class="column col-lg-3 col-md-3 col-sm-12">
                                    <h3>Jobs in demand</h3>
                                    <ul>
                                        <li><a href="{{ url('job-list-v6.html') }}">Fresher jobs</a></li>
                                        <li><a href="{{ url('job-list-v7.html') }}">MNC jobs</a></li>
                                        <li><a href="{{ url('job-list-v8.html') }}">Work from home jobs</a></li>
                                        <li><a href="{{ url('job-list-v9.html') }}">Walk-in jobs</a></li>
                                        <li><a href="{{ url('job-list-v10.html') }}">Part-time jobs</a></li>
                                    </ul>
                                </div>

                                <div class="column col-lg-3 col-md-3 col-sm-12">
                                    <h3>Jobs by location</h3>
                                    <ul>
                                        <li><a href="{{ url('job-list-v11.html') }}">Jobs in Delhi</a></li>
                                        <li><a href="{{ url('job-list-v12.html') }}">Jobs in Mumbai</a></li>
                                        <li><a href="{{ url('job-list-v13.html') }}">Jobs in Bangalore</a></li>
                                        <li><a href="{{ url('job-list-v14.html') }}">Jobs in Hyderabad</a></li>
                                        <li><a href="{{ url('job-list-v15.html') }}">Jobs in Chennai</a></li>
                                        <li><a href="{{ url('job-list-v16.html') }}">Jobs in Pune</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown">
                        <span><a href="{{ url('/companies') }}" >Companies</a></span>
                        <ul>
                            <li class="dropdown">
                                <span>Companies</span>
                                <ul>
                                    <li><a href="{{ url('compines-list-v1.html') }}">Companies</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <span>compines Single</span>
                                <ul>
                                    <li><a href="{{ url('compines-single-v1.html') }}">compines Single v1</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <span>Candidates</span>
                        <ul>
                            <li class="dropdown">
                                <span>Candidates List</span>
                                <ul>
                                    <li><a href="{{ url('candidates-list-v1.html') }}">Candidates LIst v1</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <span>Candidates Single</span>
                                <ul>
                                    <li><a href="{{ url('candidates-single-v1.html') }}">Candidates Single v1</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('candidate-dashboard.html') }}">Candidates Dashboard</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <span>Blog</span>
                        <ul>
                            <li><a href="{{ url('blog-list-v1.html') }}">Blog LIst v1</a></li>
                            <li><a href="{{ url('blog-single.html') }}">Blog Single</a></li>
                        </ul>
                    </li>

                    <!-- <li class="dropdown">
                        <span>Pages</span>
                        <ul>
                            <li class="dropdown">
                                <span>Shop</span>
                                <ul>
                                    <li><a href="{{ url("shop.html") }}">Shop List</a></li>
                                    <li><a href="{{ url("shop-single.html") }}">Shop Single</a></li>
                                    <li><a href="{{ url("shopping-cart.html") }}">Shopping Cart</a></li>
                                    <li><a href="{{ url("shop-checkout.html") }}">Checkout</a></li>
                                    <li><a href="{{ url("order-completed.html") }}">Order Completed</a></li>
                                    <li><a href="{{ url("login.html") }}">Login</a></li>
                                    <li><a href="{{ url("register.html") }}">Register</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url("about.html") }}">About</a></li>
                            <li><a href="{{ url("pricing.html") }}">Pricing</a></li>
                            <li><a href="{{ url("faqs.html") }}">FAQ's</a></li>
                            <li><a href="{{ url("terms.html") }}">Terms</a></li>
                            <li><a href="{{ url("invoice.html") }}">Invoice</a></li>
                            <li><a href="{{ url("elements.html") }}">Ui Elements</a></li>
                            <li><a href="{{ url("contact.html") }}">Contact</a></li>
                        </ul>
                    </li> -->

                    <!-- Only for Mobile View -->
                    <li class="mm-add-listing">
                        <a href="{{ url('add-listing.html') }}" class="theme-btn btn-style-one">Job Post</a>
                        <span>
                            <span class="contact-info">
                                <span class="phone-num"><span>Call us</span><a href="{{ url('tel:1234567890') }}">123 456 7890</a></span>
                                <span class="address">329 Queensberry Street, North Melbourne VIC <br>3051, Australia.</span>
                                <a href="{{ url('mailto:support@Hirehub.com') }}" class="email">support@Hirehub.com</a>
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
            <div class="btn-box">
                <!-- @if (!request()->is('login') && !request()->is('register')) -->
                    <a href="{{ url('/login') }}" class="theme-btn btn-style-five">Login / Register</a>
                    <a href="{{ url('/post-job') }}" class="theme-btn btn-style-one">Post a Job</a>
                <!-- @endif -->
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

                <a href="{{ url('#nav-mobile') }}" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>
<!--End Main Header -->