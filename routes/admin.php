<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmployerController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AuthController;

// Admin Login Routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
// Route::get('/admin', [AuthController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin', [AuthController::class, 'login'])->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard & Protected Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    /**========================Mange user routes ============================= */
    Route::get('/admin/manage-users', [UserController::class, 'index'])->name('admin.users'); // View all users
    Route::get('/admin/manage-users/{id}', [UserController::class, 'show'])->name('admin.users.view'); // View user
    Route::get('/admin/manage-users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit'); // Edit user
    Route::put('/admin/manage-users/{id}', [UserController::class, 'update'])->name('admin.users.update'); // Update user
    Route::patch('/admin/manage-users/{id}/status', [UserController::class, 'updateStatus'])->name('admin.users.status'); // Update user status
    Route::delete('/admin/manage-users/{id}', [UserController::class, 'destroy'])->name('admin.users.delete'); // Delete user
    // Route::get('/admin/manage-users/candidate/{id}', [UserController::class, 'showCandidate'])->name('admin.users.candidate.view');
    // Route::get('/admin/manage-users/employer/{id}', [UserController::class, 'showEmployer'])->name('admin.users.employer.view');


    /**========================Mange emoloyers routes ============================= */

    Route::get('/admin/manage-employers', [EmployerController::class, 'index'])->name('admin.employers');
    Route::get('/admin/manage-job-posts', [JobController::class, 'index'])->name('admin.jobs');

    /**========================Manange categories routes ============================= */

    Route::get('/admin/manage-categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/admin/add-categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/store-category', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::delete('/delete-category/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');
    Route::post('/change-category-status/{category}', [CategoryController::class, 'changeStatus'])->name('admin.categories.changeStatus');

    Route::get('/admin/manage-applications', [ApplicationController::class, 'index'])->name('admin.applications');
    Route::get('/admin/manage-payments', [PaymentController::class, 'index'])->name('admin.payments');
    Route::get('/admin/notifications', [NotificationController::class, 'index'])->name('admin.notifications');
    Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports');
    Route::get('/admin/site-settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::get('/admin/change-password', [ProfileController::class, 'changePassword'])->name('admin.password.change');
    Route::get('/admin/view-profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('/admin/delete-profile', [ProfileController::class, 'delete'])->name('admin.profile.delete');
});