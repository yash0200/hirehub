<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Candidate\AppliedJobsController;
use App\Http\Controllers\Candidate\ShortlistJobsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidate\DashboardController as CandidateDashboard;
use App\Http\Controllers\Candidate\JobController as CandidateJob;
use App\Http\Controllers\Candidate\CandidateResumeController;
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
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployersController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\JobCategoryController;

use App\Http\Controllers\Common\HomeController;
use App\Models\Candidate;

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
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


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

        Route::get('/candidate/jobalerts', [JobAlertController::class, 'index'])->name('candidate.jobalerts');
        Route::get('/candidate/jobalerts/create', [JobAlertController::class, 'create'])->name('candidate.jobalert.create');
        Route::post('/candidate/jobalerts/store', [JobAlertController::class, 'store'])->name('candidate.jobalert.store');
        Route::delete('/candidate/job-alerts/{id}', [JobAlertController::class, 'destroy'])->name('candidate.jobalert.destroy');


        Route::get('/candidate/messages', [MessageController::class, 'index'])->name('candidate.messages');
        Route::get('/candidate/change-password', [ChangePasswordController::class, 'candidateIndex'])->name('candidate.password');
        Route::post('/candidate/change-password', [ChangePasswordController::class, 'candidateChangePassword'])->name('candidate.password.change');
        Route::get('/candidate/delete-profile', [ProfileController::class, 'delete'])->name('candidate.profile.delete');
        Route::get('/candidate/appliedjobs', [AppliedJobsController::class, 'index'])->name('candidate.appliedjobs');
        Route::get('/candidate/shortlistjobs', [ShortlistJobsController::class, 'index'])->name('candidate.shortlist');
        Route::post('/candidate/shortlist-job', [ShortlistJobsController::class, 'shortlistJob'])->name('candidate.shortlist.job');
    });

    /** ================== Employer Routes ================== */
    Route::middleware(['employer'])->group(function () {
        Route::get('/employer-dashboard', [EmployerDashboard::class, 'index'])->name('employer.dashboard');

        /** ================== Profile Routes ================== */
        Route::get('/employer/company-profile', [CompanyProfileController::class, 'index'])->name('employer.company.profile');
        Route::post('/employer/company-profile/update', [CompanyProfileController::class, 'update'])->name('employer.company.profile.update');

        /** ================== Post Job Routes ================== */

        Route::get('/employer/jobs', [EmployerJobController::class, 'index'])->name('employer.jobs.index');     // List all jobs
        Route::get('/employer/jobs/create', [EmployerJobController::class, 'create'])->name('jobs.create');     // Show create form
        Route::post('/employer/jobs', [EmployerJobController::class, 'store'])->name('jobs.store');             // Store job
        Route::get('/employer/jobs/{id}', [EmployerJobController::class, 'show'])->name('jobs.show');            // Show a specific job

        Route::get('jobs/{job}/edit', [EmployerJobController::class, 'edit'])->name('jobs.edit');
        Route::patch('jobs/{job}.update', [EmployerJobController::class, 'update'])->name('jobs.update');     // Update job

        Route::delete('/employer/jobs/{id}', [EmployerJobController::class, 'destroy'])->name('jobs.destroy');  // Delete job


        Route::get('/employer/manage-jobs', [EmployerJobController::class, 'manage'])->name('employer.job.manage');
        Route::get('/employer/applicants', [EmployerApplicantController::class, 'index'])->name('employer.applicants');
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
Route::get('/jobs/{id}', [JobsController::class, 'show'])->name('jobs.details');




Route::get('/employers/{id}', [EmployersController::class, 'show'])->name('employers.details');
Route::get('/employers', [EmployersController::class, 'index'])->name('employers.list');

Route::get('/categories', [JobCategoryController::class, 'index'])->name('categories.list');
Route::get('/categories/{slug}', [JobCategoryController::class, 'show'])->name('categories.details');

// Admin only: Add categories
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/categories/create', [JobCategoryController::class, 'create'])->name('categories.create');
    Route::post('/admin/categories/store', [JobCategoryController::class, 'store'])->name('categories.store');
});

require __DIR__ . '/admin.php';
