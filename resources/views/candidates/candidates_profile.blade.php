@extends('layouts.dashboard')

@section('title', 'Candidate Profile')
@section('content')
    <!-- Dashboard -->
    <section class="user-dashboard">
      <div class="dashboard-outer">
        <div class="upper-title-box">
          <h3>My Profile</h3>
          <div class="text">Ready to jump back in?</div>
        </div>
        @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li><b>{{ $error }}</b> </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
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
                      <input class="uploadButton-input" type="file" name="attachments[]" accept="image/*, application/pdf" id="upload" multiple />
                      <label class="uploadButton-button ripple-effect" for="upload">Browse Image</label>
                      <span class="uploadButton-file-name"></span>
                    </div>
                    <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</div>
                  </div>

                  <form class="default-form" action="{{route('candidate.profile.update')}}" method="POST">
                  @csrf
                  <input type="hidden" name="form_type" value="my_profile">
                    <div class="row">
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Full Name</label>
                        <input type="text" name="full_name" placeholder="Jerome">
                      </div>

                      <!-- Input -->
                      <!-- <div class="form-group col-lg-6 col-md-12">
                        <label>Job Title</label>
                        <input type="text" name="name" placeholder="UI Designer">
                      </div> -->

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Phone</label>
                        <input type="text" name="phone" placeholder="+91 9999999999">
                      </div>



                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12"> 
                        <label>Date Of Birth</label>
                        <input type="text" id="dob" name="dob" placeholder="DD/MM/YYYY" maxlength="10" oninput="validateDate(this)">
                        <small id="error-message" style="color: red; display: none;">Enter a valid date (DD/MM/YYYY)</small>
                    </div>

                    <script>
                    function validateDate(input) {
                        let value = input.value.replace(/[^0-9/]/g, ''); // Allow only numbers and slashes
                        input.value = value;
                        
                        let datePattern = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/; // DD/MM/YYYY format
                        let errorMessage = document.getElementById("error-message");
                        
                        if (value.length === 10 && !datePattern.test(value)) {
                            errorMessage.style.display = "inline"; // Show error if invalid
                        } else {
                            errorMessage.style.display = "none"; // Hide error if valid
                        }
                    }
                    </script>



                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Website</label>
                        <input type="text" name="website" placeholder="www.jerome.com">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-3 col-md-12">
                        <label>Gender</label>
                        <select class="chosen-select" name="gender">
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-3 col-md-12">
                        <label>Marital Status</label>
                        <select class="chosen-select" name="marital_status">
                          <option value="single">Single</option>
                          <option value="married">Married</option>
                          <option value="divorced">Divorced</option>
                          <option value="widowed">Widowed</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <!-- <div class="form-group col-lg-6 col-md-12">
                        <label>Work Experience</label>
                        <input type="text" name="name" placeholder="5-10 Years">
                      </div> -->

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Age</label>
                        <select class="chosen-select" name="age_range">
                          <option value="23 - 27 years">23 - 27 Years</option>
                          <option value="24 - 28 years">24 - 28 Years</option>
                          <option value="25 - 29 years">25 - 29 Years</option>
                          <option value="26 - 30 years">26 - 30 Years</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Education Levels</label>
                        <input type="text" name="education_levels" placeholder="Certificate">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Languages</label>
                        <input type="text" name="languages" placeholder="English, Turkish">
                      </div>

                      <!-- Search Select -->
                      <!-- <div class="form-group col-lg-6 col-md-12">
                        <label>Categories </label>
                        <select data-placeholder="Categories" class="chosen-select multiple" multiple tabindex="4">
                          <option value="Banking">Banking</option>
                          <option value="Digital&Creative">Digital & Creative</option>
                          <option value="Retail">Retail</option>
                          <option value="Human Resources">Human Resources</option>
                          <option value="Management">Management</option>
                        </select>
                      </div> -->

                      <!-- Input -->
                      <!-- <div class="form-group col-lg-6 col-md-12">
                        <label>Allow In Search & Listing</label>
                        <select class="chosen-select">
                          <option>Yes</option>
                          <option>No</option>
                        </select>
                      </div> -->

                      <!-- About Company -->
                      <div class="form-group col-lg-12 col-md-12">
                        <label>Description</label>
                        <textarea name="description" placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
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
                  <form class="default-form" action="{{route('candidate.profile.update')}}" method="POST">
                  @csrf
                  <input type="hidden" name="form_type" value="social_network">
                    <div class="row">
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Facebook</label>
                        <input type="text" name="facebook" placeholder="www.facebook.com/Invision">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Twitter</label>
                        <input type="text" name="twitter" placeholder="www.x.com">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Linkedin</label>
                        <input type="text" name="linkedin" placeholder="www.linkedin.com">
                      </div>

                      <!-- Input -->
                      <!-- <div class="form-group col-lg-6 col-md-12">
                        <label>Google Plus</label>
                        <input type="text" name="name" placeholder="www.googleplus.com">
                      </div> -->

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
                  <form class="default-form" action="{{route('candidate.profile.update')}}" method="POST">
                  @csrf
                  <input type="hidden" name="form_type" value="contact_information">
                    <div class="row">
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Nationality</label>
                        <input type="text" name="nationality" placeholder="Indian...">
                        <!-- <select class="chosen-select">
                          <option>Australia</option>
                          <option>Pakistan</option>
                          <option>Chaina</option>
                          <option>Japan</option>
                          <option>India</option>
                        </select> -->
                      </div>

                      <div class="form-group col-lg-6 col-md-12">
                        <label>State</label>
                        <input type="text" name="state" placeholder="Gujarat...">
                        <!-- <select class="chosen-select">
                          <option>Victoria</option>
                          <option>Queensland</option>
                          <option>New South Wales</option>
                          <option>South Australia</option>
                          <option>Northan Territory</option>
                        </select> -->
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>City</label>
                        <input type="text" name="city" placeholder="Surat...">
                        <!-- <select class="chosen-select">
                          <option>Melbourne</option>
                          <option>Sydney</option>
                          <option>Perth</option>
                          <option>Adelaide</option>
                          <option>Hobart</option>
                        </select> -->
                      </div>

                      <div class="form-group col-lg-6 col-md-12">
                        <label>Postal/ZIP Code</label>
                        <input type="text" name="postal_code" placeholder="395004">
                        <!-- <select class="chosen-select">
                          <option>Melbourne</option>
                          <option>Sydney</option>
                          <option>Perth</option>
                          <option>Adelaide</option>
                          <option>Hobart</option>
                        </select> -->
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-12 col-md-12">
                        <label>Address</label>
                        <input type="text" name="address" placeholder="A-12,Madhuvan Society, Singapur, Katargam">
                      </div>

                      <!-- Input -->
                      <!-- <div class="form-group col-lg-6 col-md-12">
                        <label>Find On Map</label>
                        <input type="text" name="name" placeholder="329 Queensberry Street, North Melbourne VIC 3051, Australia.">
                      </div> -->

                      <!-- Input -->
                      <!-- <div class="form-group col-lg-3 col-md-12">
                        <label>Latitude</label>
                        <input type="text" name="name" placeholder="Melbourne">
                      </div> -->

                      <!-- Input -->
                      <!-- <div class="form-group col-lg-3 col-md-12">
                        <label>Longitude</label>
                        <input type="text" name="name" placeholder="Melbourne">
                      </div> -->

                      <!-- Input -->
                      <!-- <div class="form-group col-lg-12 col-md-12">
                        <button class="theme-btn btn-style-three">Search Location</button>
                      </div> -->


                      <!-- <div class="form-group col-lg-12 col-md-12">
                        <div class="map-outer">
                          <div class="map-canvas map-height" data-zoom="12" data-lat="-37.817085" data-lng="144.955631" data-type="roadmap" data-hue="#ffc400" data-title="Envato" data-icon-path="images/resource/map-marker.png" data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
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
    <!-- Copyright -->
    <div class="copyright-text">
      <p>© 2025 Hirehub. All Right Reserved.</p>
    </div>
    @endsection
    <!-- End Dashboard -->