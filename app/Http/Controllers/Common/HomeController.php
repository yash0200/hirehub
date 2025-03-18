<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\Candidate;
use App\Models\JobAddress;
use App\Models\Employer;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = JobCategory::where('status', 'active')->withCount('jobs')->get();
        $candidatesCount = candidate::count();

        $jobs = Jobs::with('employer', 'jobCategory', 'jobAddress')
            ->where('status', 'active')->orderBy('created_at', 'desc')->take(3)->get();

        // City-wise active job count
        $cities = JobAddress::whereHas('job', function ($query) {
            $query->where('status', 'active');
        })
            ->select('city', DB::raw('COUNT(*) as job_count'))
            ->groupBy('city')
            ->get()
            ->map(function ($city) {
                $cityImages = [
                    'delhi' => 'home22-city-1.png',
                    'mumbai' => 'home22-city-2.png',
                    'banglore' => 'home22-city-4.png',
                    'hydrabad' => 'home22-city-5.png',
                    'chennai' => 'home22-city-6.png',
                    'surat' => 'home22-city-7.png',
                ];

                $city->image = $cityImages[$city->city] ?? 'default-city.png';
                return $city;
            });

            $employers = Employer::with(['address']) // Eager load address
            ->withCount(['jobs' => function ($query) {
                $query->where('status', 'active'); // Count only active jobs
            }])
            ->latest()
            ->take(6) // Limit to 6 employers only
            ->get();


        return view('pages.home', compact('jobs', 'categories', 'candidatesCount', 'cities','employers'));
    }
}
