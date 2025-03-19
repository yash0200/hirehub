<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Candidate\AppliedJobsController;
use App\Http\Controllers\Candidate\ShortlistJobsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidate\DashboardController as CandidateDashboard;
use App\Http\Controllers\Candidate\JobController as CandidateJob;
use App\Http\Controllers\Candidate\CandidateResumeController;
//changes
use App\Http\Controllers\Common\AboutusController;
use App\Http\Controllers\Common\FAQController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Candidate\JobAlertController;
use App\Http\Controllers\Employer\ResumeController as EmployerResume;
use App\Http\Controllers\Candidate\ProfileController;
use App\Http\Controllers\Candidate\MessageController;
use App\Http\Controllers\Employer\DashboardController as EmployerDashboard;
use App\Http\Controllers\Employer\JobController as EmployerJobController;
use App\Http\Controllers\Employer\ApplicantController as EmployerApplicantController;
use App\Http\Controllers\Candidate\ApplicantController;
use App\Http\Controllers\Employer\PackageController;
use App\Http\Controllers\Employer\MessageController as EmployerMessage;
use App\Http\Controllers\Employer\ProfileController as EmployerProfile;
use App\Http\Controllers\Employer\CompanyProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Candidate\NotificationsController as CandidateNotificationController;
use App\Http\Controllers\EmployersController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\Common\HomeController;
use App\Http\Controllers\Employer\NotificationController as EmployerNotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
//Route::get('/jobs', [JobController::class, 'index']);
//Route::get('/jobs/{id}', [JobController::class, 'show']);
// Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Forgot Password Routes

// Route to show the forgot password form (user enters email)
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');

// Route to send OTP to email
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOtp'])->name('send.otp'); // Define the 'send.otp' route

// Route to show the OTP input form
Route::get('/forgot-password/otp/{email}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.otp.form');

// Route to handle OTP verification and password reset
Route::post('/forgot-password/reset', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



Route::get('/about', [AboutusController::class, 'index'])->name('about');
Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');


// Route::get('/jobs',[JobsController::class, 'index']);    
Route::get('/companies', [EmployersController::class, 'index']);
// Middleware to check authentication before accessing dashboards
Route::middleware(['auth'])->group(function () {


    /** ================== Candidate Routes ================== */
    Route::middleware(['candidate'])->group(function () {
        Route::get('/candidate-dashboard', [CandidateDashboard::class, 'index'])->name('candidate.dashboard');

        Route::get('/candidate/profile', [ProfileController::class, 'index'])->name('candidate.profile');
        Route::post('/candidate/profile/update', [ProfileController::class, 'update'])->name('candidate.profile.update');

        Route::get('/candidate/jobs', [CandidateJob::class, 'index'])->name('candidate.jobs');
        Route::post('/candidate/jobs/{jobId}/apply', [ApplicantController::class, 'apply'])->name('job.apply');



        Route::get('/candidate/applications', [ApplicantController::class, 'index'])->name('candidate.applications');

        Route::get('/candidate/resumes', [CandidateResumeController::class, 'show'])->name('candidate.resumes');
        Route::post('/candidate/resumes', [CandidateResumeController::class, 'store'])->name('candidate.resume.store');

        /** ================== Prederences and their alert Routes ================== */

        Route::get('/candidate/jobalerts', [JobAlertController::class, 'index'])->name('candidate.jobalerts');
        Route::get('/candidate/jobalerts/create', [JobAlertController::class, 'create'])->name('candidate.jobalert.create');
        Route::post('/candidate/jobalerts/store', [JobAlertController::class, 'store'])->name('candidate.jobalert.store');
        Route::delete('/candidate/job-alerts/{id}', [JobAlertController::class, 'destroy'])->name('candidate.jobalert.destroy');

        /** ================== notifications Routes ================== */

        // Route::get('/candidate/notifications', [NotificationsController::class, 'index'])->name('candidate.notifications');
        Route::get('/candidate/notifications', [CandidateNotificationController::class, 'index'])->name('candidate.notifications');
        Route::post('/candidate/notifications/{id}/read', [CandidateNotificationController::class, 'markAsRead'])->name('candidate.notifications.read');
        Route::post('/candidate/notifications/mark-all-read', [CandidateNotificationController::class, 'markAllAsRead'])->name('candidate.notifications.markAllAsRead');
        Route::delete('/candidate/notifications/{id}', [CandidateNotificationController::class, 'destroy'])->name('candidate.notifications.destroy');


        Route::get('/candidate/messages', [MessageController::class, 'index'])->name('candidate.messages');
        Route::get('/candidate/change-password', [ChangePasswordController::class, 'candidateIndex'])->name('candidate.password');
        Route::post('/candidate/change-password', [ChangePasswordController::class, 'candidateChangePassword'])->name('candidate.password.change');
        Route::get('/candidate/delete-profile', [ProfileController::class, 'delete'])->name('candidate.profile.delete');

        // Candidate Applied Jobs and  Actions
        Route::get('/candidate/appliedjobs', [AppliedJobsController::class, 'index'])->name('candidate.appliedjobs');
        Route::post('/candidate/applications/{id}/delete', [AppliedJobsController::class, 'deleteApplication'])->name('candidate.application.delete');
        Route::post('/candidate/applications/{id}/accept-offer', [AppliedJobsController::class, 'acceptOffer'])->name('candidate.application.acceptOffer');
        Route::get('/candidate/application/{id}', [AppliedJobsController::class, 'viewApplication'])->name('candidate.application.view');


        Route::get('/candidate/shortlistjobs', [ShortlistJobsController::class, 'index'])->name('candidate.shortlist');
        Route::post('/candidate/shortlist-job', [ShortlistJobsController::class, 'shortlistJob'])->name('candidate.shortlist.job');
        Route::delete('/candidate/shortlist-job/{id}', [ShortlistJobsController::class, 'destroy'])->name('candidate.job.destroy');
        Route::get('/candidate/jobs/{job}', [ShortlistJobsController::class, 'viewJob'])->name('jobs.view');
    });

    /** ================== Employer Routes ================== */
    Route::middleware(['employer'])->group(function () {
        Route::get('/employer-dashboard', [EmployerDashboard::class, 'index'])->name('employer.dashboard');

        /** ================== Profile Routes ================== */
        Route::get('/employer/company-profile', [CompanyProfileController::class, 'index'])->name('employer.company.profile');
        Route::post('/employer/company-profile/update', [CompanyProfileController::class, 'update'])->name('employer.company.profile.update');

        /** ================== Post/Manage Job and Routes ================== */

        Route::get('/employer/jobs', [EmployerJobController::class, 'index'])->name('employer.jobs.index'); // List all jobs
        Route::get('/employer/jobs/create', [EmployerJobController::class, 'create'])->name('jobs.create'); // Show create form
        Route::post('/employer/jobs', [EmployerJobController::class, 'store'])->name('jobs.store'); // Store job
        Route::get('/employer/jobs/{id}', [EmployerJobController::class, 'show'])->name('jobs.show'); // Show a specific job
        Route::get('/jobs/{job}/edit', [EmployerJobController::class, 'edit'])->name('jobs.edit'); // Edit job
        Route::patch('/jobs/{job}', [EmployerJobController::class, 'update'])->name('jobs.update'); // Update job
        Route::delete('/employer/jobs/{job}', [EmployerJobController::class, 'destroy'])->name('employer.jobs.delete');
        Route::patch('/employer/jobs/{job}/status', [EmployerJobController::class, 'updateStatus'])->name('employer.jobs.status');

        /** ================== notifications Routes ================== */
        Route::get('/employer/notifications', [EmployerNotificationController::class, 'index'])->name('employer.notifications');
        Route::post('/employer/notifications/{id}/read', [EmployerNotificationController::class, 'markAsRead'])->name('employer.notifications.read');
        Route::delete('/employer/notifications/{id}', [EmployerNotificationController::class, 'destroy'])->name('employer.notifications.destroy');




        Route::get('/employer/manage-jobs', [EmployerJobController::class, 'manage'])->name('employer.jobs.manage');
        Route::get('/employer/applicants', [EmployerApplicantController::class, 'index'])->name('employer.applicants');
        Route::post('/employer/applicants/{id}/approve', [EmployerApplicantController::class, 'approveApplicant'])->name('employer.applicant.approve');
        Route::post('/employer/applicants/{id}/reject', [EmployerApplicantController::class, 'rejectApplicant'])->name('employer.applicant.reject');
        Route::get('/employer/applicants/{id}/view', [EmployerApplicantController::class, 'viewApplicant'])->name('employer.applicant.view');
        Route::get('/employer/application/{id}', [EmployerApplicantController::class, 'viewProfile'])->name('employer.applicant.profile');


        Route::get('/employer/resumes', [EmployerResume::class, 'shortlisted'])->name('employer.resumes');
        Route::get('/employer/packages', [PackageController::class, 'index'])->name('employer.packages');
        Route::get('/employer/messages', [EmployerMessage::class, 'index'])->name('employer.messages');
        Route::get('/employer/resume-alerts', [EmployerResume::class, 'alerts'])->name('employer.resume.alerts');
        Route::get('/employer/change-password', [ChangePasswordController::class, 'employerIndex'])->name('employer.password');
        Route::post('/employer/change-password', [ChangePasswordController::class, 'employerChangePassword'])->name('employer.password.change');
        Route::get('/employer/delete-profile', [ProfileController::class, 'delete'])->name('employer.profile.delete');
    });
});

// Job List & Details
Route::get('/jobs', [JobsController::class, 'index'])->name('jobs.list');
Route::get('/jobs/employer/{employer_id}', [JobsController::class, 'index'])->name('employers.jobs.list');
Route::get('/jobs/{id}', [JobsController::class, 'show'])->name('jobs.details');


Route::get('/employers/{id}', [EmployersController::class, 'show'])->name('employers.details');
Route::get('/employers', [EmployersController::class, 'index'])->name('employers.list');

Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.list');


Route::get('/categories', [JobCategoryController::class, 'index'])->name('categories.list');
Route::get('/categories/{slug}', [JobCategoryController::class, 'show'])->name('categories.details');

// Admin only: Add categories
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/categories/create', [JobCategoryController::class, 'create'])->name('categories.create');
    Route::post('/admin/categories/store', [JobCategoryController::class, 'store'])->name('categories.store');
});


require __DIR__ . '/admin.php';
