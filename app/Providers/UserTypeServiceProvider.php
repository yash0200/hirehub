<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\JobCategory;

class UserTypeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer('*', function ($view) {
            $userType = Auth::check() ? Auth::user()->user_type : null;
            $categories = JobCategory::where('status', 'active')
                ->withCount(['jobs' => function ($query) {
                    $query->where('status', 'active');
                }])
                ->get();

            $locations = ['Delhi', 'Mumbai', 'Bangalore', 'Hyderabad', 'Chennai', 'Pune'];
            $cities = [
                ['name' => 'Delhi', 'jobs' => 96, 'image' => 'home22-city-1.png'],
                ['name' => 'Mumbai', 'jobs' => 96, 'image' => 'home22-city-2.png'],
                ['name' => 'Bangalore', 'jobs' => 96, 'image' => 'home22-city-4.png'],
                ['name' => 'Hyderabad', 'jobs' => 96, 'image' => 'home22-city-5.png'],
                ['name' => 'Chennai', 'jobs' => 96, 'image' => 'home22-city-6.png'],
                ['name' => 'Pune', 'jobs' => 96, 'image' => 'home22-city-7.png'],
            ];
            $view->with(compact('userType', 'categories', 'locations', 'cities'));
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
