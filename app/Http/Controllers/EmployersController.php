<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\JobCategory;
use App\Models\Jobs;

class EmployersController extends Controller
{
    public function index(Request $request)
    {   // Get the jobs with pagination, 9 jobs per page
        $jobs = Jobs::paginate(9);



        $query = Employer::with(['address']) // Eager load address
            ->withCount(['jobs' => function ($query) {
                $query->where('status', 'active'); // Count only active jobs
            }])
            ->latest();

        // Apply keyword filter (search in company name and job title)
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('company_name', 'like', '%' . $request->keyword . '%');
            });
        }

        // Apply location filter
        if ($request->filled('location')) {
            $location = $request->location;

            $query->whereHas('address', function ($q) use ($location) {
                if (preg_match('/^\d{6}$/', $location)) {
                    // If input is a 6-digit number, filter by pincode
                    $q->where('postal_code', $location);
                } else {
                    // Otherwise, assume it's a city name
                    $q->where('city', 'LIKE', '%' . $location . '%');
                }
            });
        }

        // Apply industry filter
        if ($request->filled('industry')) {
            $query->where(function ($q) use ($request) {
                $q->where('industry', 'like', '%' . $request->industry . '%');
            });
        }

        $employers = $query->paginate(10); // Paginate results

        // Fetch job categories
        $categories = JobCategory::where('status', 'active')->get();

        return view('employers.index', compact('employers', 'categories','jobs'));
    }
    public function dashboard()
    {
        // $employerId = auth()->id();
        // return view('employers.dashboard', [
        //     'postedJobs' => Job::where('employer_id', $employerId)->count(),
        //     'applications' => Application::whereHas('job', function ($query) use ($employerId) {
        //         $query->where('employer_id', $employerId);
        //     })->count(),
        //     'messages' => Message::where('receiver_id', $employerId)->count(),
        //     'shortlisted' => Application::where('status', 'shortlisted')->whereHas('job', function ($query) use ($employerId) {
        //         $query->where('employer_id', $employerId);
        //     })->count(),
        // ]);
        return view('employers.dashboard');
    }
    public function show($id)
    {
        // Fetch employer details with address and active jobs count
        $employer = Employer::with(['address', 'socialNetworks'])
            ->withCount(['jobs' => function ($query) {
                $query->where('status', 'active'); // Count only active jobs
            }])
            ->findOrFail($id); // Return 404 if not found

        // Fetch employer's active jobs
        $activeJobs = Jobs::where('employer_id', $id)
            ->where('status', 'active')
            ->get();

        // Active job count for this employer
        $jobCount = $employer->jobs_count;

        // Total active jobs for all employers
        $totalJobs = Jobs::where('status', 'active')->count();

        // Jobs added today
        $jobsToday = Jobs::whereDate('created_at', today())
            ->where('status', 'active')
            ->count();

        return view('employers.show', compact('employer', 'jobCount', 'totalJobs', 'jobsToday', 'activeJobs'));
    }
}
