<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\JobCategory;
use App\Models\Jobs;

class UserTypeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer('*', function ($view) {
            $userType = Auth::check() ? Auth::user()->user_type : null;
            $totalJobs = Jobs::where('status', 'active')->count();
            $addedToday = Jobs::where('status', 'active')
                                ->whereDate('created_at', today())
                                ->count();

            $categories = JobCategory::where('status', 'active')
        ->withCount(['jobs' => function ($query) {
                    $query->where('status', 'active');
                }])
                ->get()
                ->map(function ($category) {
                    $iconMap = [
                        'Sales' => 'flaticon-money-1',
                        'IT' => 'flaticon-laptop',
                        'Marketing' => 'flaticon-megaphone',
                        'Data Science' => 'flaticon-rocket-ship',
                        'HR' => 'flaticon-headhunting',
                        'Engineering' => 'flaticon-vector'
                    ];
                    $category->icon = $iconMap[$category->name] ?? 'flaticon-briefcase';
                    return $category;
                });

            $locations = ['Delhi', 'Mumbai', 'Bangalore', 'Hyderabad', 'Chennai', 'Pune'];
            $cities = [
                ['name' => 'Delhi', 'jobs' => 96, 'image' => 'home22-city-1.png'],
                ['name' => 'Mumbai', 'jobs' => 96, 'image' => 'home22-city-2.png'],
                ['name' => 'Bangalore', 'jobs' => 96, 'image' => 'home22-city-4.png'],
                ['name' => 'Hyderabad', 'jobs' => 96, 'image' => 'home22-city-5.png'],
                ['name' => 'Chennai', 'jobs' => 96, 'image' => 'home22-city-6.png'],
                ['name' => 'Pune', 'jobs' => 96, 'image' => 'home22-city-7.png'],
            ];
            $view->with(compact('userType', 'categories', 'locations', 'cities','addedToday','totalJobs'));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
