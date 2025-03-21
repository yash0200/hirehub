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
    <!-- @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li><b>{{ $error }}</b> </li>
        @endforeach
      </ul>
    </div>
    @endif -->
    <div class="row">
      <div class="col-lg-12">
        <!-- Ls widget -->
        <div class="ls-widget">
          <div class="tabs-box">
            <div class="widget-title">
              <h4>My Profile</h4>
            </div>

            <div class="widget-content">
              <form class="default-form" action="{{ route('candidate.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="uploading-outer">
                  <div class="uploadButton">
                    <input class="uploadButton-input" type="file" name="profile_photo" accept="image/*" id="upload" multiple />
                    <label class="uploadButton-button ripple-effect" for="upload">Browse Image</label>
                    <span class="uploadButton-file-name">{{ isset($candidate->profile_photo) ? basename($candidate->profile_photo) : '' }}</span>
                  </div>
                  <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</div>
                </div>

                <input type="hidden" name="form_type" value="my_profile">
                <div class="row">
                  <!-- Input: Full Name -->
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Full Name</label>
                    <input type="text" name="full_name" placeholder="Enter full name" value="{{ old('full_name', $candidate->full_name ?? '') }}">
                    @error('full_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- Input: Phone -->
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Phone</label>
                    <input type="text" name="phone" placeholder="Enter phone number" value="{{ old('phone', $candidate->phone ?? '') }}">
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- Input: Date Of Birth -->
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Date Of Birth</label>
                    <input type="date" name="dob" class="" placeholder="DD/MM/YYYY" value="{{ old('dob', $candidate->dob ?? '') }}" maxlength="10">
                    @error('dob')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- Input: Website -->
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Website</label>
                    <input type="text" name="website" placeholder="https://www.google.com" value="{{ old('website', $candidate->website ?? '') }}">
                    @error('website')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- Input: Gender -->
                  <div class="form-group col-lg-3 col-md-12">
                    <label>Gender</label>
                    <select class="chosen-select" name="gender">
                      <option value="male" {{ old('gender', $candidate->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                      <option value="female" {{ old('gender', $candidate->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- Input: Marital Status -->
                  <div class="form-group col-lg-3 col-md-12">
                    <label>Marital Status</label>
                    <select class="chosen-select" name="marital_status">
                      <option value="single" {{ old('marital_status', $candidate->marital_status ?? '') == 'single' ? 'selected' : '' }}>Single</option>
                      <option value="married" {{ old('marital_status', $candidate->marital_status ?? '') == 'married' ? 'selected' : '' }}>Married</option>
                      <option value="divorced" {{ old('marital_status', $candidate->marital_status ?? '') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                      <option value="widowed" {{ old('marital_status', $candidate->marital_status ?? '') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                    </select>
                    @error('marital_status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- Input: Age Range -->
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Age</label>
                    <select class="chosen-select" name="age_range">
                      <option value="18 - 22 years" {{ old('age_range', $candidate->age_range ?? '') == '18 - 22 years' ? 'selected' : '' }}>18 - 22 Years</option>
                      <option value="23 - 25 years" {{ old('age_range', $candidate->age_range ?? '') == '23 - 25 years' ? 'selected' : '' }}>23 - 25 Years</option>
                      <option value="26 - 30 years" {{ old('age_range', $candidate->age_range ?? '') == '26 - 30 years' ? 'selected' : '' }}>26 - 30 Years</option>
                      <option value="31 - 40 years" {{ old('age_range', $candidate->age_range ?? '') == '31 - 40 years' ? 'selected' : '' }}>31 - 40 Years</option>
                      <option value="41 - 60 years" {{ old('age_range', $candidate->age_range ?? '') == '41 - 60 years' ? 'selected' : '' }}>41 - 60 Years</option>
                    </select>
                    @error('age_range')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- Input: Education Levels -->
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Education Levels</label>
                    <input type="text" name="education_levels" placeholder="Certificate" value="{{ old('education_levels', $candidate->education_levels ?? '') }}">
                    @error('education_levels')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- Input: Languages -->
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Languages</label>
                    <input type="text" name="languages" placeholder="English, Turkish" value="{{ old('languages', $candidate->languages ?? '') }}">
                    @error('languages')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- Input: Description -->
                  <div class="form-group col-lg-12 col-md-12">
                    <label>Description</label>
                    <textarea name="description" placeholder="Enter a brief description about yourself or your experience...">{{ old('description', $candidate->description ?? '') }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

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
                    <input type="text" name="facebook"
                      value="{{ old('facebook', $candidate->user->socialNetwork->facebook ?? '') }}"
                      placeholder="https://www.facebook.com/yourprofile">
                    @error('facebook')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- Input -->
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Twitter</label>
                    <input type="text" name="twitter"
                      value="{{ old('twitter', $candidate->user->socialNetwork->twitter ?? '') }}"
                      placeholder="https://www.x.com/yourprofile">
                    @error('twitter')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- Input -->
                  <div class="form-group col-lg-6 col-md-12">
                    <label>LinkedIn</label>
                    <input type="text" name="linkedin"
                      value="{{ old('linkedin', $candidate->user->socialNetwork->linkedin ?? '') }}"
                      placeholder="https://www.linkedin.com/in/yourprofile">
                    @error('linkedin')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

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

                    <input type="text" name="country" value="{{ old('country', $candidate->address->country ?? '') }}" placeholder="e.g., Indian">
                    @error('country')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
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
                    <input type="text" name="state" value="{{ old('state', $candidate->address->state ?? '') }}" placeholder="e.g., Gujarat">
                    @error('state')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
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
                    <input type="text" name="city" value="{{ old('city', $candidate->address->city ?? '') }}" placeholder="e.g., Surat">
                    @error('city')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
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
                    <input type="text" name="postal_code" value="{{ old('postal_code', $candidate->address->postal_code ?? '') }}" placeholder="e.g., 395004">
                    @error('postal_code')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <!-- Input -->
                  <div class="form-group col-lg-12 col-md-12">
                    <label>Street</label>
                    <input type="text" name="street" value="{{ old('street', $candidate->address->street ?? '') }}" placeholder="e.g., A-12, Madhuvan Society, Katargam, Surat">
                    @error('street')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
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
  <p>© 2025 <a href="{{ url("/") }}">Hirehub</a>. All Right Reserved.</p>
</div>
@endsection
<!-- End Dashboard -->