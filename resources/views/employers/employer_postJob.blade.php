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

                                <form class="default-form" method="POST" action="{{ route('jobs.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Job Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Title"
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Job Description</label>
                                            <textarea class="form-control" name="description"
                                                placeholder="Enter job details...">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Skills </label>
                                            <input type="text" name="skills" class="form-control"
                                                placeholder="Enter required Skills" value="{{ old('skills') }}">
                                            @error('skills')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Job Category</label>
                                            <select name="category_id" class="chosen-select">
                                                <option>Select</option>
                                                <option value="IT" {{ old('category_id') == 'IT' ? 'selected' : '' }}>IT
                                                </option>
                                                <option value="Marketing" {{ old('category_id') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                                <option value="Digital & Creative" {{ old('category_id') == 'Digital & Creative' ? 'selected' : '' }}>Digital & Creative</option>
                                                <option value="Admin" {{ old('category_id') == 'Admin' ? 'selected' : '' }}>
                                                    Admin</option>
                                                <option value="Human Resources" {{ old('category_id') == 'Human Resources' ? 'selected' : '' }}>Human Resources</option>
                                                <option value="Management" {{ old('category_id') == 'Management' ? 'selected' : '' }}>Management</option>
                                                <option value="Finance" {{ old('category_id') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                                <option value="Sales" {{ old('category_id') == 'Sales' ? 'selected' : '' }}>
                                                    Sales</option>
                                                <option value="Customer Service" {{ old('category_id') == 'Customer Service' ? 'selected' : '' }}>Customer Service</option>
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Offered Salary (INR Per Annum)</label>
                                            <select name="salary" class="chosen-select form-control">
                                                <option>Select</option>
                                                <option value="₹3,00,000 - ₹5,00,000" {{ old('salary') == '₹3,00,000 - ₹5,00,000' ? 'selected' : '' }}>₹3,00,000 - ₹5,00,000</option>
                                                <option value="₹5,00,000 - ₹7,00,000" {{ old('salary') == '₹5,00,000 - ₹7,00,000' ? 'selected' : '' }}>₹5,00,000 - ₹7,00,000</option>
                                                <option value="₹7,00,000 - ₹10,00,000" {{ old('salary') == '₹7,00,000 - ₹10,00,000' ? 'selected' : '' }}>₹7,00,000 - ₹10,00,000</option>
                                                <option value="₹10,00,000 - ₹15,00,000" {{ old('salary') == '₹10,00,000 - ₹15,00,000' ? 'selected' : '' }}>₹10,00,000 - ₹15,00,000</option>
                                                <option value="₹15,00,000 - ₹20,00,000" {{ old('salary') == '₹15,00,000 - ₹20,00,000' ? 'selected' : '' }}>₹15,00,000 - ₹20,00,000</option>
                                            </select>
                                            @error('salary')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>E-Mail</label>
                                            <input type="email" name="email" class="form-control" placeholder="E-Mail"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Application Deadline Date</label>
                                            <input type="date" name="deadline" class="form-control"
                                                value="{{ old('deadline') }}">
                                            @error('deadline')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Country</label>
                                            <input type="text" name="country" class="form-control"
                                                placeholder="Enter Country" value="{{ old('country') }}">
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>State</label>
                                            <input type="text" name="state" class="form-control" placeholder="Enter State"
                                                value="{{ old('state') }}">
                                            @error('state')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control" placeholder="Enter City"
                                                value="{{ old('city') }}">
                                            @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Postcode</label>
                                            <input type="text" name="postcode" class="form-control"
                                                placeholder="Enter Postcode" value="{{ old('postcode') }}">
                                            @error('postcode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Complete Address</label>
                                            <input type="text" name="address" class="form-control"
                                                placeholder="123 Main Street" value="{{ old('address') }}">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
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