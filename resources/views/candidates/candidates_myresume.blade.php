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
            @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li><b>{{ $error }}</b> </li>
        @endforeach
      </ul>
    </div>
    @endif
             @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
            <div class="widget-content">
            <form action="{{ route('candidate.resume.store') }}" method="POST" enctype="multipart/form-data" class="default-form">
            @csrf
              <div class="uploading-outer">
                <div class="uploadButton">
                  <input class="uploadButton-input" type="file" name="resume_file" id="upload" />
                  <label class="uploadButton-button ripple-effect" for="upload">Add Resume</label>
                  <span class="uploadButton-file-name">{{ isset($resume->resume_file) ? basename($resume->resume_file) : '' }}</span>
                </div>
              </div>
              <!-- About your self -->
              
                <div class="row">
                  <div class="form-group col-lg-12 col-md-12">
                    <label>Description</label>
                    <textarea name="description" placeholder="Enter your description...">{{ old('description', $resume->description ?? '') }}</textarea>
                  </div>
                  <div class="form-group col-lg-12 col-md-12">
                    <div class="upper-title">
                      <h4>Education Details</h4>
                    </div>
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Degree Name</label>
                    <input type="text" name="degree_name" value="{{ old('degree_name', $resume->degree_name ?? '') }}" placeholder="E.g., Bachelor of Science in Computer Science">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Field of Study</label>
                    <input type="text" name="field_of_study" value="{{ old('field_of_study', $resume->field_of_study ?? '') }}" placeholder="E.g., Engineering, Biology, Architecture">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Institution Name</label>
                    <input type="text" name="institution_name" value="{{ old('institution_name', $resume->institution_name ?? '') }}" placeholder="E.g., College name">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Start year</label>
                    <input type="number" name="start_year" value="{{ old('start_year', $resume->start_year ?? '') }}" placeholder="E.g., 2020">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>End year</label>
                    <input type="number" name="end_year" value="{{ old('end_year', $resume->end_year ?? '') }}" placeholder="E.g., 2024">
                  </div>
                  <div class="form-group col-lg-12 col-md-12">
                    <div class="upper-title">
                      <h4>Work Experience</h4>
                    </div>
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Job title</label>
                    <input type="text" name="job_title" value="{{ old('job_title', $resume->job_title ?? '') }}" placeholder="E.g., Software Engineer">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Company name</label>
                    <input type="text" name="company_name" value="{{ old('company_name', $resume->company_name ?? '') }}" placeholder="name of the company">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Employment type</label>
                    <select name="employment_type" class="chosen-select single">
                      <option value="full_time" {{ old('employment_type', $resume->employment_type ?? '') == 'full_time' ? 'selected' : '' }}>Full Time</option>
                      <option value="part_time" {{ old('employment_type', $resume->employment_type ?? '') == 'part_time' ? 'selected' : '' }}>Part Time</option>
                      <option value="internship" {{ old('employment_type', $resume->employment_type ?? '') == 'internship' ? 'selected' : '' }}>Internship</option>
                      <option value="contract" {{ old('employment_type', $resume->employment_type ?? '') == 'contract' ? 'selected' : '' }}>Contract</option>
                      <option value="freelance" {{ old('employment_type', $resume->employment_type ?? '') == 'freelance' ? 'selected' : '' }}>Freelance</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Skills</label>
                    <select name="skills[]" class="chosen-select multiple" multiple>
                      <option value="Banking" {{ in_array('Banking', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Banking</option>
                      <option value="Digital & Creative" {{ in_array('Digital & Creative', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Digital & Creative</option>
                      <option value="Retail" {{ in_array('Retail', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Retail</option>
                      <option value="Human Resources" {{ in_array('Human Resources', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Human Resources</option>
                      <option value="Management" {{ in_array('Management', old('skills', $resume->skills ?? [])) ? 'selected' : '' }}>Management</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Current Salary</label>
                    <select name="current_salary" class="chosen-select form-control">
                                                <option>Select</option>
                                                <option value="₹3,00,000 - ₹5,00,000" {{ old('current_salary', $resume->current_salary ?? '') == '₹3,00,000 - ₹5,00,000' ? 'selected' : '' }}>₹3,00,000 - ₹5,00,000</option>
                                            <option value="₹5,00,000 - ₹7,00,000" {{ old('current_salary', $resume->current_salary ?? '') == '₹5,00,000 - ₹7,00,000' ? 'selected' : '' }}>₹5,00,000 - ₹7,00,000</option>
                                            <option value="₹7,00,000 - ₹10,00,000" {{ old('current_salary', $resume->current_salary ?? '') == '₹7,00,000 - ₹10,00,000' ? 'selected' : '' }}>₹7,00,000 - ₹10,00,000</option>
                                            <option value="₹10,00,000 - ₹15,00,000" {{ old('current_salary', $resume->current_salary ?? '') == '₹10,00,000 - ₹15,00,000' ? 'selected' : '' }}>₹10,00,000 - ₹15,00,000</option>
                                            <option value="₹15,00,000 - ₹20,00,000" {{ old('current_salary', $resume->current_salary ?? '') == '₹15,00,000 - ₹20,00,000' ? 'selected' : '' }}>₹15,00,000 - ₹20,00,000</option>
                                            </select>
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
