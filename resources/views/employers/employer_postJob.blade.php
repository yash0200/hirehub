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
                                    <div class="step"><span class="icon flaticon-briefcase"></span>
                                        <h5>Job Detail</h5>
                                    </div>
                                    <div class="step"><span class="icon flaticon-money"></span>
                                        <h5>Package & Payments</h5>
                                    </div>
                                    <div class="step"><span class="icon flaticon-checked"></span>
                                        <h5>Confirmation</h5>
                                    </div>
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
                                            <label>Skills </label>
                                            <select data-placeholder="Categories" class="chosen-select multiple" multiple
                                                tabindex="4">
                                                <option value="Software Development">Software Development</option>
                                                <option value="Data Science & Analytics">Data Science & Analytics</option>
                                                <option value="Cybersecurity">Cybersecurity</option>
                                                <option value="Finance & Accounting">Finance & Accounting</option>
                                                <option value="Marketing & Advertising">Marketing & Advertising</option>
                                                <option value="Healthcare & Medical">Healthcare & Medical</option>
                                                <option value="Engineering & Manufacturing">Engineering & Manufacturing
                                                </option>
                                                <option value="Sales & Business Development">Sales & Business Development
                                                </option>
                                                <option value="Human Resources">Human Resources</option>
                                                <option value="Project Management">Project Management</option>
                                                <option value="Legal & Compliance">Legal & Compliance</option>
                                                <option value="Education & Training">Education & Training</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Job Category</label>
                                            <select class="chosen-select">
                                                <option>Select</option>
                                                <option>IT</option>
                                                <option>Marketing</option>
                                                <option>Digital & Creative</option>
                                                <option>Admin</option>
                                                <option>Human Resources</option>
                                                <option>Management</option>
                                                <option>Finance</option>
                                                <option>Sales</option>
                                                <option>Customer Service</option>
                                            </select>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6">
                                            <label>Offered Salary (INR Per Annum)</label>
                                            <select class="chosen-select form-control">
                                                <option>Select</option>
                                                <option>₹3,00,000 - ₹5,00,000</option>
                                                <option>₹5,00,000 - ₹7,00,000</option>
                                                <option>₹7,00,000 - ₹10,00,000</option>
                                                <option>₹10,00,000 - ₹15,00,000</option>
                                                <option>₹15,00,000 - ₹20,00,000</option>
                                            </select>
                                        </div>

                                         <!-- Input -->
                                         <div class="form-group col-lg-6">
                                            <label>Job Type</label>
                                            <select class="chosen-select form-control">
                                                <option>Select</option>
                                                <option>Full-Time </option>
                                                <option>Part-Time </option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Experience</label>
                                            <select class="chosen-select">
                                                <option>Select</option>
                                                <option>Fresher (0-1 years)</option>
                                                <option>1-3 years</option>
                                                <option>3-5 years</option>
                                                <option>5-7 years</option>
                                                <option>7-10 years</option>
                                                <option>10+ years</option>
                                                <option>Senior Management (15+ years)</option>
                                                <option>Executive Level</option>
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
                                                <option>Marketing & Advertising</option>
                                                <option>Telecommunications</option>
                                                <option>Real Estate</option>
                                                <option>Logistics & Transportation</option>
                                                <option>Hospitality & Tourism</option>
                                                <option>Legal Services</option>
                                                <option>Energy & Utilities</option>
                                                <option>Agriculture</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Qualification</label>
                                            <select class="chosen-select">
                                                <option>Select</option>
                                                <option>Graduate</option>
                                                <option>Bachelor's Dergee</option>
                                                <option>Postgraduate</option>
                                                <option>Other Qualifications</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>E-Mail</label>
                                            <input type="email" name="name" placeholder="E-Mail">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Application Deadline Date</label>
                                            <input type="date" name="name" placeholder="06.04.2020">
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Country</label>
                                            <input type="text" name="country" class="form-control" placeholder="Enter Country">
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
                                            <input type="text" name="postcode" class="form-control"
                                                placeholder="Enter postcode">
                                        </div>



                                        <div class="form-group col-lg-12">
                                            <label>Complete Address</label>
                                            <input type="text" name="address" class="form-control"
                                                placeholder="123 Main Street">
                                        </div>

                                        <div class="form-group col-lg-12 text-right">
                                            <button class="theme-btn btn-style-one" type="submit">Submit</button>

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