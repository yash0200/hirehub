<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CandidateNotification;
use App\Models\ShortlistedJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\AdminNotification;
use App\Models\EmployerNotification;

class HeaderDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
        
                // Initialize counts with zero for safe fallback
                $savedJobsCount = 0;
                $candidateUnreadNotificationsCount = 0;
                $employerUnreadNotificationsCount = 0;
                $adminUnreadNotificationsCount = 0;
        
                // Candidate Data
                if ($user->user_type == 'candidate') {
                    $candidate = $user->candidate;
        
                    $savedJobsCount = ShortlistedJob::where('candidate_id', $candidate->id)->count();
                    $candidateUnreadNotificationsCount = CandidateNotification::where('candidate_id', $candidate->id)
                        ->where('is_read', false)
                        ->count();
                }
        
                // Employer Data
                if ($user->user_type == 'employer') {
                    $employer = $user->employer;
        
                    $employerUnreadNotificationsCount = EmployerNotification::where('employer_id', $employer->id)
                        ->where('is_read', false)
                        ->count();
                }
        
                // Admin Data
                if ($user->user_type == 'admin') {
                    $adminUnreadNotificationsCount = AdminNotification::where('is_read', false)->count();
                }
                // Share data with all views
                $view->with([
                    'savedJobsCount' => $savedJobsCount,
                    'candidateUnreadNotificationsCount' => $candidateUnreadNotificationsCount,
                    'employerUnreadNotificationsCount' => $employerUnreadNotificationsCount,
                    'adminUnreadNotificationsCount' => $adminUnreadNotificationsCount
                ]);
            } else {
                // Default values for guests or non-authenticated users
                $view->with([
                    'savedJobsCount' => 0,
                    'candidateUnreadNotificationsCount' => 0,
                    'employerUnreadNotificationsCount' => 0,
                    'adminUnreadNotificationsCount' => 0
                ]);
            }
        });        
    }
}
