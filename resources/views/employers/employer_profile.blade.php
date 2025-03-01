@extends('layouts.dashboard')

@section('title', 'Employer Profile')   

@section('content') 


    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Company Profile!</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>My Profile</h4>
                            </div>

                            <div class="widget-content">

                                <div class="uploading-outer">
                                    <div class="uploadButton">
                                        <input class="uploadButton-input" type="file" name="attachments[]"
                                            accept="image/*, application/pdf" id="upload" multiple />
                                        <label class="uploadButton-button ripple-effect" for="upload">Browse Logo</label>
                                        <span class="uploadButton-file-name"></span>
                                    </div>
                                    <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files
                                        are .jpg & .png</div>
                                </div>

                                <div class="uploading-outer">
                                    <div class="uploadButton">
                                        <input class="uploadButton-input" type="file" name="attachments[]"
                                            accept="image/*, application/pdf" id="upload_cover" multiple />
                                        <label class="uploadButton-button ripple-effect" for="upload">Browse Cover</label>
                                        <span class="uploadButton-file-name"></span>
                                    </div>
                                    <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files
                                        are .jpg & .png</div>
                                </div>

                                <form class="default-form">
                                    <div class="row">
                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Company Name</label>
                                            <input type="text" name="name" placeholder="Enter Company Name">
                                        </div>



                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Phone</label>
                                            <input type="number" name="name"
                                                placeholder="Enter Phone Number (0 123 456 7890)">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Website</label>
                                            <input type="text" name="name" placeholder="Enter Website Name">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Est. Since</label>
                                            <input type="text" name="name" placeholder="06.04.2020">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Company Size</label>
                                            <select class="chosen-select">
                                                <option>50 - 100</option>
                                                <option>100 - 150</option>
                                                <option>200 - 250</option>
                                                <option>300 - 350</option>
                                                <option>500 - 1000</option>
                                            </select>
                                        </div>


                                        <!-- About Company -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>About Company</label>
                                            <textarea placeholder="Describe About Your Comapny"></textarea>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <button class="theme-btn btn-style-one">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Social Network</h4>
                            </div>

                            <div class="widget-content">
                                <form class="default-form">
                                    <div class="row">
                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Facebook</label>
                                            <input type="text" name="name" placeholder="www.facebook.com">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Twitter</label>
                                            <input type="text" name="name" placeholder="www.twitter.com">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Linkedin</label>
                                            <input type="text" name="name" placeholder="www.Linkedin.com">
                                        </div>


                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <button class="theme-btn btn-style-one">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Contact Information</h4>
                            </div>

                            <div class="widget-content">
                                <form class="default-form">
                                    <div class="row">
                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Country</label>
                                            <input type="text" name="name" placeholder="Enter Your Country">

                                        </div>
                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>State</label>
                                            <input type="text" name="name" placeholder="Enter Your State">

                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>City</label>
                                            <input type="text" name="name" placeholder="Enter Your City">

                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Complete Address</label>
                                            <input type="text" name="name" placeholder="123 Main Street.">
                                        </div>



                                        <!-- <div class="form-group col-lg-12 col-md-12">
                                                <div class="map-outer">
                                                    <div class="map-canvas map-height" data-zoom="12" data-lat="-37.817085"
                                                        data-lng="144.955631" data-type="roadmap" data-hue="#ffc400"
                                                        data-title="Envato" data-icon-path="images/resource/map-marker.png"
                                                        data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
                                                    </div>
                                                </div>
                                            </div> -->

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <button class="theme-btn btn-style-one">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>
    <!-- End Dashboard -->

    <!-- Copyright -->
    <div class="copyright-text">
        <p>© 2025 HireHub. All Right Reserved.</p>
    </div>
@endsection