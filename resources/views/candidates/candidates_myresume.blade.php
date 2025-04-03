@extends('layouts.dashboard')

@section('title', 'Candidate My Resume')

@section('content')

<!-- Dashboard -->
<section class="user-dashboard">
  <div class="dashboard-outer">
    <div class="upper-title-box">
      <h3>My Resume</h3>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <!-- Ls widget -->
        <div class="ls-widget">
          <div class="tabs-box">
            <div class="widget-title">
              <h4>Add Resume</h4>
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
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="widget-content">
              <form action="{{ route('candidate.resume.store') }}" method="POST" enctype="multipart/form-data"
                class="default-form">
                @csrf
                <div class="uploading-outer">
                  <div class="uploadButton">
                    <input class="uploadButton-input" type="file" name="resume_file" id="upload" />
                    <label class="uploadButton-button ripple-effect" for="upload">Add Resume</label>
                    <span
                      class="uploadButton-file-name">{{ isset($resume->resume_file) ? basename($resume->resume_file) : '' }}</span>
                  </div>
                  @error('resume_file')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!-- About your self -->

                <div class="row">
                  <div class="form-group col-lg-12 col-md-12">
                    <label>Description</label>
                    <textarea name="description"
                      placeholder="Enter your description...">{{ old('description', $resume->description ?? '') }}</textarea>
                    @error('description')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group col-lg-12 col-md-12">
                    <div class="upper-title">
                      <h4>Education Details</h4>
                    </div>
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Degree Name</label>
                    <input type="text" name="degree_name" value="{{ old('degree_name', $resume->degree_name ?? '') }}"
                      placeholder="E.g., Bachelor of Science in Computer Science">
                    @error('degree_name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Field of Study</label>
                    <input type="text" name="field_of_study"
                      value="{{ old('field_of_study', $resume->field_of_study ?? '') }}"
                      placeholder="E.g., Engineering, Biology, Architecture">
                    @error('field_of_study')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Institution Name</label>
                    <input type="text" name="institution_name"
                      value="{{ old('institution_name', $resume->institution_name ?? '') }}"
                      placeholder="E.g., College name">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Start year</label>
                    <input type="number" name="start_year" value="{{ old('start_year', $resume->start_year ?? '') }}"
                      placeholder="E.g., 2020">
                    @error('start_year')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>End year</label>
                    <input type="number" name="end_year" value="{{ old('end_year', $resume->end_year ?? '') }}"
                      placeholder="E.g., 2024">
                    @error('end_year')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-lg-12 col-md-12">
                    <div class="upper-title">
                      <h4>Work Experience</h4>

                    </div>
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Job title</label>
                    <input type="text" name="job_title" value="{{ old('job_title', $resume->job_title ?? '') }}"
                      placeholder="E.g., Software Engineer">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Company name</label>
                    <input type="text" name="company_name"
                      value="{{ old('company_name', $resume->company_name ?? '') }}" placeholder="name of the company">
                    @error('company_name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Employment type</label>
                    <select name="employment_type" class="chosen-select single">
                      <option value="full_time" {{ old('employment_type', $resume->employment_type ?? '') == 'full_time' ? 'selected' : '' }}>Full Time</option>
                      <option value="part_time" {{ old('employment_type', $resume->employment_type ?? '') == 'part_time' ? 'selected' : '' }}>Part Time</option>
                      <option value="internship" {{ old('employment_type', $resume->employment_type ?? '') == 'internship' ? 'selected' : '' }}>Internship</option>
                      <option value="fresher" {{ old('employment_type', $resume->employment_type ?? '') == 'fresher' ? 'selected' : '' }}>Fresher</option>
                      <option value="remote" {{ old('employment_type', $resume->employment_type ?? '') == 'remote' ? 'selected' : '' }}>Work From Home</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Skills</label>
                    <select name="skills[]" class="chosen-select multiple" multiple>

                      <!-- IT Skills -->
                      <option value="Software Development" {{ in_array('Software Development', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Software Development</option>
                      <option value="Web Development" {{ in_array('Web Development', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Web Development</option>
                      <option value="App Development" {{ in_array('App Development', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>App Development</option>
                      <option value="Cloud Computing" {{ in_array('Cloud Computing', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Cloud Computing</option>
                      <option value="Database Management" {{ in_array('Database Management', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Database Management</option>
                      <option value="Cybersecurity" {{ in_array('Cybersecurity', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Cybersecurity</option>
                      <option value="Data Science" {{ in_array('Data Science', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Data Science</option>
                      <option value="Machine Learning" {{ in_array('Machine Learning', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Machine Learning</option>
                      <option value="Software Testing" {{ in_array('Software Testing', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Software Testing</option>
                      <option value="Networking" {{ in_array('Networking', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Networking</option>
                      <option value="Programming" {{ in_array('Programming', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Programming</option>
                      <option value="SQL" {{ in_array('SQL', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>
                        SQL</option>
                      <option value="IT Support" {{ in_array('IT Support', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>IT Support</option>

                      <!-- Banking Skills -->
                      <option value="Banking Operations" {{ in_array('Banking Operations', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Banking Operations</option>
                      <option value="Financial Analysis" {{ in_array('Financial Analysis', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Financial Analysis</option>
                      <option value="Risk Management" {{ in_array('Risk Management', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Risk Management</option>
                      <option value="Investment Banking" {{ in_array('Investment Banking', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Investment Banking</option>
                      <option value="Customer Relationship Management (CRM)" {{ in_array('Customer Relationship Management (CRM)', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Customer
                        Relationship Management (CRM)</option>
                      <option value="Credit Analysis" {{ in_array('Credit Analysis', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Credit Analysis</option>
                      <option value="Loan Origination" {{ in_array('Loan Origination', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Loan Origination</option>
                      <option value="Fraud Prevention" {{ in_array('Fraud Prevention', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Fraud Prevention</option>
                      <option value="Compliance" {{ in_array('Compliance', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Compliance</option>
                      <option value="Investment Strategy" {{ in_array('Investment Strategy', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Investment Strategy</option>
                      <option value="Financial Planning" {{ in_array('Financial Planning', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Financial Planning</option>
                      <option value="Loan Processing" {{ in_array('Loan Processing', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Loan Processing</option>
                      <option value="Foreign Exchange" {{ in_array('Foreign Exchange', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Foreign Exchange</option>

                      <!-- Tending Skills (Healthcare, Customer Service, etc.) -->
                      <option value="Banking" {{ in_array('Banking', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Banking</option>
                      <option value="Digital & Creative" {{ in_array('Digital & Creative', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Digital & Creative</option>
                      <option value="Retail" {{ in_array('Retail', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Retail</option>
                      <option value="Human Resources" {{ in_array('Human Resources', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Human Resources</option>
                      <option value="Management" {{ in_array('Management', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Management</option>
                      <option value="Patient Care" {{ in_array('Patient Care', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Patient Care</option>
                      <option value="Caregiving" {{ in_array('Caregiving', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Caregiving</option>
                      <option value="Medical Assistance" {{ in_array('Medical Assistance', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Medical Assistance</option>
                      <option value="Customer Service" {{ in_array('Customer Service', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Customer Service</option>
                      <option value="Conflict Resolution" {{ in_array('Conflict Resolution', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Conflict Resolution</option>
                      <option value="Health Administration" {{ in_array('Health Administration', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Health Administration</option>
                      <option value="Patient Communication" {{ in_array('Patient Communication', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Patient Communication</option>
                      <option value="Basic Life Support (BLS)" {{ in_array('Basic Life Support (BLS)', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Basic Life Support (BLS)</option>
                      <option value="First Aid" {{ in_array('First Aid', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>First Aid</option>
                      <option value="Elderly Care" {{ in_array('Elderly Care', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Elderly Care</option>
                      <option value="Customer Relations" {{ in_array('Customer Relations', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Customer Relations</option>
                      <option value="Compassionate Care" {{ in_array('Compassionate Care', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Compassionate Care</option>
                      <option value="Health Counseling" {{ in_array('Health Counseling', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Health Counseling</option>
                      <option value="Hospice Care" {{ in_array('Hospice Care', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Hospice Care</option>
                      <option value="Geriatrics" {{ in_array('Geriatrics', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Geriatrics</option>
                      <option value="Nutrition Planning" {{ in_array('Nutrition Planning', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Nutrition Planning</option>
                      <option value="Mental Health Support" {{ in_array('Mental Health Support', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Mental Health Support</option>
                      <option value="Rehabilitation" {{ in_array('Rehabilitation', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Rehabilitation</option>
                      <option value="Physical Therapy" {{ in_array('Physical Therapy', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Physical Therapy</option>
                      <option value="Wound Care" {{ in_array('Wound Care', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Wound Care</option>
                      <option value="Personal Care" {{ in_array('Personal Care', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Personal Care</option>

                    </select>
                    @error('skills')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Current Salary</label>
                    <select name="current_salary" class="chosen-select form-control">
                      <option>Select</option>
                      <option value="₹3,00,000 - ₹5,00,000" {{ old('current_salary', $resume->current_salary ?? '') == '₹3,00,000 - ₹5,00,000' ? 'selected' : '' }}>₹3,00,000 - ₹5,00,000</option>
                      <option value="₹5,00,000 - ₹7,00,000" {{ old('current_salary', $resume->current_salary ?? '') == '₹5,00,000 - ₹7,00,000' ? 'selected' : '' }}>₹5,00,000 - ₹7,00,000</option>
                      <option value="₹7,00,000 - ₹10,00,000" {{ old('current_salary', $resume->current_salary ?? '') == '₹7,00,000 - ₹10,00,000' ? 'selected' : '' }}>₹7,00,000 - ₹10,00,000</option>
                      <option value="₹10,00,000 - ₹15,00,000" {{ old('current_salary', $resume->current_salary ?? '') == '₹10,00,000 - ₹15,00,000' ? 'selected' : '' }}>₹10,00,000 - ₹15,00,000</option>
                    </select>
                    @error('current_salary')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Expected Salary</label>
                    <select name="expected_salary" class="chosen-select form-control">
                      <option>Select</option>
                      <option value="₹3,00,000 - ₹5,00,000" {{ old('expected_salary', $resume->expected_salary ?? '') == '₹3,00,000 - ₹5,00,000' ? 'selected' : '' }}>₹3,00,000 - ₹5,00,000</option>
                      <option value="₹5,00,000 - ₹7,00,000" {{ old('expected_salary', $resume->expected_salary ?? '') == '₹5,00,000 - ₹7,00,000' ? 'selected' : '' }}>₹5,00,000 - ₹7,00,000</option>
                      <option value="₹7,00,000 - ₹10,00,000" {{ old('expected_salary', $resume->expected_salary ?? '') == '₹7,00,000 - ₹10,00,000' ? 'selected' : '' }}>₹7,00,000 - ₹10,00,000</option>
                      <option value="₹10,00,000 - ₹15,00,000" {{ old('expected_salary', $resume->expected_salary ?? '') == '₹10,00,000 - ₹15,00,000' ? 'selected' : '' }}>₹10,00,000 - ₹15,00,000</option>
                      <option value="₹15,00,000 - ₹20,00,000" {{ old('expected_salary', $resume->expected_salary ?? '') == '₹15,00,000 - ₹20,00,000' ? 'selected' : '' }}>₹15,00,000 - ₹20,00,000</option>
                    </select>
                    @error('expected_salary')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <!-- Input -->
                <div class="form-group col-lg-12 col-md-12">
                  <button class="theme-btn btn-style-one" type="submit">Save</button>
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
  <p>© 2025 <a href="{{ url("/") }}">Hirehub</a>. All Right Reserved.</p>
</div>
@endsection