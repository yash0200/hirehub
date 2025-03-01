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

            <div class="widget-content">

              <div class="uploading-outer">
                <div class="uploadButton">
                  <input class="uploadButton-input" type="file" name="attachments[]" accept="image/*, application/pdf" id="upload" />
                  <label class="uploadButton-button ripple-effect" for="upload">Add Resume</label>
                  <span class="uploadButton-file-name"></span>
                </div>
              </div>
              <!-- About your self -->
              <form class="default-form">
                <div class="row">
                  <div class="form-group col-lg-12 col-md-12">
                    <label>Description</label>
                    <textarea placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                  </div>
                  <div class="form-group col-lg-12 col-md-12">
                    <div class="upper-title">
                      <h4>Education Details</h4>
                    </div>
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Degree Name</label>
                    <input type="text" name="degree_name" placeholder="E.g.,Bachelor of Science in Computer Science">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Field of Study</label>
                    <input type="text" name="field_of_study" placeholder="E.g.,Engineering,Biology,Architecture">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Institution Name</label>
                    <input type="text" name="institution_name" placeholder="E.g.,College name">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Start year</label>
                    <input type="number" name="start_year" placeholder="E.g.,2020">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>End year</label>
                    <input type="number" name="end_" placeholder="E.g.,2024">
                  </div>
                  <div class="form-group col-lg-12 col-md-12">
                    <div class="upper-title">
                      <h4>Work Experience</h4>
                    </div>
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Job title</label>
                    <input type="text" name="job_title" placeholder="E.g.,software engineer">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Company name</label>
                    <input type="text" name="company_name" placeholder="name of the company">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Employment type</label>
                    <select data-placeholder="Categories" class="chosen-select single">
                      <option value="Banking">full time</option>
                      <option value="Digital&Creative">part time</option>
                      <option value="Retail">internship</option>
                      <option value="Human Resources">contract</option>
                      <option value="Management">freelance</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Start year</label>
                    <input type="number" name="start_year" placeholder="E.g.,2020">
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>End year</label>
                    <input type="number" name="end_" placeholder="E.g.,2024">
                  </div>
                  <!-- Search Select -->
                  <div class="form-group col-lg-12 col-md-12">
                    <div class="upper-title">
                      <h4>Skill</h4>
                    </div>
                  </div>
                  <div class="form-group col-lg-6 col-md-12">
                    <label>Skills </label>
                    <select data-placeholder="Categories" class="chosen-select multiple" multiple tabindex="4">
                      <option value="Banking">Banking</option>
                      <option value="Digital&Creative">Digital & Creative</option>
                      <option value="Retail">Retail</option>
                      <option value="Human Resources">Human Resources</option>
                      <option value="Management">Management</option>
                    </select>
                  </div>
                </div>
                <!-- Input -->
                <div class="form-group col-lg-12 col-md-12">
                  <button class="theme-btn btn-style-one">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</section>
<!-- End Dashboard -->

<!-- Copyright -->
<div class="copyright-text">
  <p>© 2021 Superio. All Right Reserved.</p>
</div>
@endsection