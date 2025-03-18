<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class JobTypeServiceProvider extends ServiceProvider
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
        // Define custom job types
        $customJobTypes = [
            ['name' => 'Fresher', 'route' => 'jobs.list', 'param' => ['job_type' => 'fresher']],
            ['name' => 'Full-Time', 'route' => 'jobs.list', 'param' => ['job_type' => 'full-time']],
            ['name' => 'Part-Time', 'route' => 'jobs.list', 'param' => ['job_type' => 'part-time']],
            ['name' => 'Internship', 'route' => 'jobs.list', 'param' => ['job_type' => 'internship']],
            ['name' => 'Work from Home', 'route' => 'jobs.list', 'param' => ['job_type' => 'remote']],
        ];

        // Share with all views
        View::composer('*', function ($view) use ($customJobTypes) {
            $view->with('customJobTypes', $customJobTypes);
        });
    }
}
