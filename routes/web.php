<?php

use App\Http\Controllers\Candidate\AppliedJobsController;
use App\Http\Controllers\Candidate\ShortlistJobsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidate\DashboardController as CandidateDashboard;
use App\Http\Controllers\Candidate\JobController as CandidateJob;
use App\Http\Controllers\Candidate\ResumeController;
use App\Http\Controllers\Employer\ResumeController as EmployerResume;
use App\Http\Controllers\Candidate\ProfileController;
use App\Http\Controllers\Candidate\MessageController;
use App\Http\Controllers\Employer\DashboardController as EmployerDashboard;
use App\Http\Controllers\Employer\JobController as EmployerJob;
use App\Http\Controllers\Employer\ApplicantController;
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
Route::get('/companies',[EmployersController::class,'index']);
// Middleware to check authentication before accessing dashboards
Route::middleware(['auth'])->group(function () {

    /** ================== Candidate Routes ================== */
    Route::middleware(['candidate'])->group(function () {
        Route::get('/candidate-dashboard', [CandidateDashboard::class, 'index'])->name('candidate.dashboard');
        Route::get('/candidate/jobs', [CandidateJob::class, 'index'])->name('candidate.jobs');
        Route::get('/candidate/applications', [ApplicantController::class, 'index'])->name('candidate.applications');
        Route::get('/candidate/resumes', [ResumeController::class, 'shortlisted'])->name('candidate.resumes');
        Route::get('/candidate/messages', [MessageController::class, 'index'])->name('candidate.messages');
        Route::get('/candidate/profile', [ProfileController::class, 'index'])->name('candidate.profile');
        Route::get('/candidate/change-password', [ProfileController::class, 'changePassword'])->name('candidate.password.change');
        Route::get('/candidate/delete-profile', [ProfileController::class, 'delete'])->name('candidate.profile.delete');
        Route::get('/candidate/appliedjobs', [AppliedJobsController::class, 'index'])->name('candidate.appliedjobs');
        Route::get('/candidate/shortlistjobs', [ShortlistJobsController::class, 'shortlistJobs'])->name('candidate.shortlist');
        
    });

    /** ================== Employer Routes ================== */
    Route::middleware(['employer'])->group(function () {
        Route::get('/employer-dashboard', [EmployerDashboard::class, 'index'])->name('employer.dashboard');
        Route::get('/employer/company-profile', [CompanyProfileController::class, 'index'])->name('employer.company.profile');
        Route::get('/employer/post-job', [EmployerJob::class, 'create'])->name('employer.job.create');
        Route::get('/employer/manage-jobs', [EmployerJob::class, 'manage'])->name('employer.job.manage');
        Route::get('/employer/applicants', [ApplicantController::class, 'index'])->name('employer.applicants');
        Route::get('/employer/resumes', [EmployerResume::class, 'shortlisted'])->name('employer.resumes');
        Route::get('/employer/packages', [PackageController::class, 'index'])->name('employer.packages');
        Route::get('/employer/messages', [EmployerMessage::class, 'index'])->name('employer.messages');
        Route::get('/employer/resume-alerts', [EmployerResume::class, 'alerts'])->name('employer.resume.alerts');
        Route::get('/employer/change-password', [EmployerProfile::class, 'changePassword'])->name('employer.password.change');
        Route::get('/employer/delete-profile', [EmployerProfile::class, 'delete'])->name('employer.profile.delete');
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

require __DIR__.'/admin.php';