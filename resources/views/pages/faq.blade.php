@extends('layouts.app')
@section('title', 'HireHub - FAQ')
@section('content')

<!-- Faqs Section -->
<section class="faqs-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>Frequently Asked Questions</h2>
            <div class="text">Home / FAQ</div>
        </div>

        <h3>Job Applications</h3>
        <!--Accordian Box-->
        <ul class="accordion-box">
            <!--Block-->
            <li class="accordion block active-block">
                <div class="acc-btn active">How do I apply for a job on Hirehub? <span class="icon flaticon-add"></span></div>
                <div class="acc-content current">
                    <div class="content">
                        <p>To apply for a job, create an account on Hirehub, complete your profile, and upload your resume. Browse job listings, select a suitable position, and click the ‘Apply Now’ button.</p>
                    </div>
                </div>
            </li>

            <!--Block-->
            <li class="accordion block">
                <div class="acc-btn">Can I edit my job application after submitting it? <span class="icon flaticon-add"></span></div>
                <div class="acc-content">
                    <div class="content">
                        <p>Once submitted, a job application cannot be edited. However, you can withdraw your application and reapply with updated information.</p>
                    </div>
                </div>
            </li>

            <!--Block-->
            <li class="accordion block">
                <div class="acc-btn">How can I track my application status? <span class="icon flaticon-add"></span></div>
                <div class="acc-content">
                    <div class="content">
                        <p>You can track your application status by logging into your Hirehub account and visiting the ‘My Applications’ section, where updates from employers will be displayed.</p>
                    </div>
                </div>
            </li>

            <!--Block-->
            <li class="accordion block">
                <div class="acc-btn">What happens after I apply for a job? <span class="icon flaticon-add"></span></div>
                <div class="acc-content">
                    <div class="content">
                        <p>After submitting your application, the employer will review your profile. If shortlisted, you may receive an interview invitation or further instructions via email or the Hirehub dashboard.</p>
                    </div>
                </div>
            </li>
        </ul>

        <h3>Employers & Recruiters</h3>
        <!--Accordian Box-->
        <ul class="accordion-box">
            <!--Block-->
            <li class="accordion block active-block">
                <div class="acc-btn active">How can I post a job on Hirehub? <span class="icon flaticon-add"></span></div>
                <div class="acc-content current">
                    <div class="content">
                        <p>Employers can post jobs by signing up for an employer account, filling out company details, and using the ‘Post a Job’ feature to list vacancies.</p>
                    </div>
                </div>
            </li>

            <!--Block-->
            <li class="accordion block">
                <div class="acc-btn">Is there a fee for posting jobs? <span class="icon flaticon-add"></span></div>
                <div class="acc-content">
                    <div class="content">
                        <p>Hirehub offers both free and premium job posting options. Free postings provide basic visibility, while premium plans offer enhanced features such as highlighted listings and targeted promotions.</p>
                    </div>
                </div>
            </li>

            <!--Block-->
            <li class="accordion block">
                <div class="acc-btn">Can I search for candidates on Hirehub? <span class="icon flaticon-add"></span></div>
                <div class="acc-content">
                    <div class="content">
                        <p>Yes, employers can access the candidate database, filter profiles based on skills and experience, and contact potential hires directly.</p>
                    </div>
                </div>
            </li>

            <!--Block-->
            <li class="accordion block">
                <div class="acc-btn">How do I manage received applications? <span class="icon flaticon-add"></span></div>
                <div class="acc-content">
                    <div class="content">
                        <p>All job applications are accessible through your employer dashboard. You can review, shortlist, and contact applicants directly from your Hirehub account.</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- End Faqs Section -->

@endsection
