<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\JobCategory;

class EmployersController extends Controller
{
    public function index(Request $request)
    {
        // $companySizes = Employer::select('company_size')->distinct()->pluck('company_size');
        $query = Employer::latest();

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
    
        // Apply category filter
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
    
        $employers = $query->paginate(10); // Paginate results
    
        // Fetch job categories
        $categories = JobCategory::where('status', 'active')->get();
    
        return view('employers.index', compact('employers','categories'));   
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
   
}
