@extends('layouts.dashboard')

@section('title', 'Employer Dashboard')

@section('content')

<!-- Dashboard -->
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3 class="dark-color">Post a New Job!</h3>
            <p class="text-color">Ready to jump back in?</p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4 class="dark-color">Post Job</h4>
                        </div>

                        <div class="widget-content">
                            <div class="post-job-steps">
                                <div class="step"><span class="icon flaticon-briefcase"></span><h5>Job Detail</h5></div>
                                <div class="step"><span class="icon flaticon-money"></span><h5>Package & Payments</h5></div>
                                <div class="step"><span class="icon flaticon-checked"></span><h5>Confirmation</h5></div>
                            </div>

                            <form class="default-form">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Job Title</label>
                                        <input type="text" name="name" class="form-control" placeholder="Title">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Job Description</label>
                                        <textarea class="form-control" placeholder="Enter job details..."></textarea>
                                    </div>
                                

                                    <!-- Search Select -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Specialisms </label>
                                        <select data-placeholder="Categories" class="chosen-select multiple" multiple
                                            tabindex="4">
                                            <option value="Banking">Banking</option>
                                            <option value="Digital&Creative">Digital & Creative</option>
                                            <option value="Retail">Retail</option>
                                            <option value="Human Resources">Human Resources</option>
                                            <option value="Management">Management</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Job Category</label>
                                        <select class="chosen-select">
                                            <option>Select</option>
                                            <option>Banking</option>
                                            <option>Digital & Creative</option>
                                            <option>Retail</option>
                                            <option>Human Resources</option>
                                            <option>Management</option>
                                        </select>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6">
                                        <label>Offered Salary (INR Per Annum)</label>
                                        <select class="chosen-select form-control">
                                            <option>Select</option>
                                            <option>₹3,00,000</option>
                                            <option>₹5,00,000</option>
                                            <option>₹7,00,000</option>
                                            <option>₹10,00,000</option>
                                            <option>₹15,00,000</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Experience</label>
                                        <select class="chosen-select">
                                            <option>Select</option>
                                            <option>Banking</option>
                                            <option>Digital & Creative</option>
                                            <option>Retail</option>
                                            <option>Human Resources</option>
                                            <option>Management</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Gender</label>
                                        <select class="chosen-select">
                                            <option>Select</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Industry</label>
                                        <select class="chosen-select">
                                            <option>Select</option>
                                            <option>Banking</option>
                                            <option>Digital & Creative</option>
                                            <option>Retail</option>
                                            <option>Human Resources</option>
                                            <option>Management</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Qualification</label>
                                        <select class="chosen-select">
                                            <option>Select</option>
                                            <option>Banking</option>
                                            <option>Digital & Creative</option>
                                            <option>Retail</option>
                                            <option>Human Resources</option>
                                            <option>Management</option>
                                        </select>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>Application Deadline Date</label>
                                        <input type="text" name="name" placeholder="06.04.2020">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control" value="India" readonly>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control" placeholder="Enter state">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" placeholder="Enter city">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Postcode</label>
                                        <input type="text" name="postcode" class="form-control" placeholder="Enter postcode">
                                    </div>

                                    

                                    <div class="form-group col-lg-12">
                                        <label>Complete Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Enter address">
                                    </div>

<<<<<<< Updated upstream
                                   

                                    <!-- Input -->
                                    <div class="form-group col-lg-12 col-md-12 text-right">
                                        <button class="theme-btn btn-style-one">Next</button>
=======
                                    <div class="form-group col-lg-12 text-right">
                                        <button class="theme-btn btn-style-one" type="submit">Submit</button>
>>>>>>> Stashed changes
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
<div class="copyright-text text-center">
    <p>&copy; 2025 HireHub. All Rights Reserved.</p>
</div>
@endsection
