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
                            <form class="default-form" action="{{ route('employer.company.profile.update') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
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


                               
                                    <input type="hidden" name="form_type" value="company_profile">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Company Name</label>
                                            <input type="text" name="company_name"
                                                value="{{ old('company_name', $employer->company_name ?? '') }}"
                                                placeholder="Enter Company Name">
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Phone</label>
                                            <input type="text" name="phone"
                                                value="{{ old('phone', $employer->phone ?? '') }}"
                                                placeholder="Enter Phone Number">
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Website</label>
                                            <input type="text" name="website"
                                                value="{{ old('website', $employer->website ?? '') }}"
                                                placeholder="Enter Website">
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Est. Since</label>
                                            <input type="text" name="established_year"
                                                value="{{ old('established_year', $employer->established_year ?? '') }}"
                                                placeholder="YYYY">
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Company Size</label>
                                            <select class="chosen-select" name="company_size">
                                                <option value="50 - 100" {{ old('company_size', $employer->company_size ?? '') == "50 - 100" ? 'selected' : '' }}>50 - 100</option>
                                                <option value="100 - 150" {{ old('company_size', $employer->company_size ?? '') == "100 - 150" ? 'selected' : '' }}>100 - 150</option>
                                                <option value="200 - 250" {{ old('company_size', $employer->company_size ?? '') == "200 - 250" ? 'selected' : '' }}>200 - 250</option>
                                                <option value="300 - 350" {{ old('company_size', $employer->company_size ?? '') == "300 - 350" ? 'selected' : '' }}>300 - 350</option>
                                                <option value="500 - 1000" {{ old('company_size', $employer->company_size ?? '') == "500 - 1000" ? 'selected' : '' }}>500 - 1000</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12">
                                            <button class="theme-btn btn-style-one" type="submit">Save</button>
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
                                <form class="default-form" action="{{ route('employer.company.profile.update') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="form_type" value="social_network">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Facebook</label>
                                            <input type="text" name="facebook"
                                                value="{{ old('facebook', $employer->facebook ?? '') }}"
                                                placeholder="www.facebook.com">
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Twitter</label>
                                            <input type="text" name="twitter"
                                                value="{{ old('twitter', $employer->twitter ?? '') }}"
                                                placeholder="www.twitter.com">
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>LinkedIn</label>
                                            <input type="text" name="linkedin"
                                                value="{{ old('linkedin', $employer->linkedin ?? '') }}"
                                                placeholder="www.linkedin.com">
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <button class="theme-btn btn-style-one" type="submit">Save</button>
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
                                <form class="default-form" action="{{ route('employer.company.profile.update') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="form_type" value="contact_info">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Country</label>
                                            <input type="text" name="country"
                                                value="{{ old('country', $employer->country ?? '') }}"
                                                placeholder="Enter Your Country">
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>State</label>
                                            <input type="text" name="state"
                                                value="{{ old('state', $employer->state ?? '') }}"
                                                placeholder="Enter Your State">
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>City</label>
                                            <input type="text" name="city" value="{{ old('city', $employer->city ?? '') }}"
                                                placeholder="Enter Your City">
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Complete Address</label>
                                            <input type="text" name="address"
                                                value="{{ old('address', $employer->address ?? '') }}"
                                                placeholder="123 Main Street.">
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12">
                                            <button class="theme-btn btn-style-one" type="submit">Save</button>
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