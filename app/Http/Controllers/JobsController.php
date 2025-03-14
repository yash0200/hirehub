<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use App\Models\JobCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        try{
            $query = Jobs::with('employer', 'jobCategory', 'jobAddress')
                    ->where('status', 'active')
                    ->latest();

            $categories = JobCategory::where('status', 'active')->get();

            if ($request->filled('employer_id')) {
                $query->where('employer_id', $request->employer_id);
            }
    
            
            if ($request->has('keyword')) {  
                $query->where('title', 'LIKE', '%' . $request->keyword . '%');
            }
            
            
            if ($request->filled('location')) {
                $location = $request->location;
            
                $query->whereHas('jobAddress', function ($q) use ($location) {
                    if (preg_match('/^\d{6}$/', $location)) {
                        // If input is a 6-digit number, filter by pincode
                        $q->where('postcode', $location);
                    } else {
                        // Otherwise, assume it's a city name
                        $q->where(function ($query) use ($location) {
                            $query->where('city', 'LIKE', '%' . $location . '%')
                                  ->orWhere('state', 'LIKE', '%' . $location . '%');
                        });
                    }
                });
            }
            
            
            if ($request->filled('category_id')) {
                $query->where('category_id', $request->category_id);
            }
            
            if ($request->has('job_type') && !empty($request->job_type)) {
                $query->whereIn('job_type', $request->job_type);
            }
            
            if ($request->filled('date_posted')) {
                $datePosted = (int) $request->date_posted;
                
                if ($datePosted == 1) { // Last Hour
                    $query->where('created_at', '>=', Carbon::now()->subHour());
                } elseif ($datePosted == 24) { // Last 24 Hours
                    $query->where('created_at', '>=', Carbon::now()->subHours(24));
                } elseif ($datePosted > 0) { // Last X Days
                    $query->where('created_at', '>=', Carbon::now()->subDays($datePosted)->startOfDay()); //Use `startOfDay()` to avoid time issues
                }
            }
            
            
            // Apply pagination AFTER filters
            $jobs = $query->paginate(10);
            

            // Handle AJAX requests separately
            if ($request->ajax()) {
                return response()->json([
                    'jobs' => View::make('partials.job-card', compact('jobs'))->render(),
                    'next_page_url' => $jobs->nextPageUrl(),
                    'current_count' => $jobs->count(),
                    'total' => $jobs->total(),
                ]);
            }

            return view('jobs.index', compact('jobs', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error fetching jobs: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function show($id)
    {
        $job = Jobs::with('employer', 'jobAddress', 'jobCategory')->findOrFail($id);
        // Fetch related jobs based on the same category
        $relatedJobs = Jobs::where('category_id', $job->category_id)
            ->where('id', '!=', $id) // Exclude the current job
            ->where('status','active')
            ->with(['employer', 'jobAddress'])
            ->limit(4) // Show only 4 related jobs
            ->get();

        return view('jobs.show', compact('job', 'relatedJobs'));
    }
}
//     // Show a specific job
//     public function show($id)
//     {
//         // Example: find and return a specific job
//         $job = Job::findOrFail($id);
//         return view('jobs.show', compact('job'));
//     }

//     // Create a new job
//     public function create()
//     {
//         return view('jobs.create');
//     }

//     // Store a newly created job
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'title' => 'required|string|max:255',
//             'description' => 'required|string',
//         ]);

//         $job = Job::create($validated);

//         return redirect()->route('jobs.index');
//     }

//     // Edit an existing job
//     public function edit($id)
//     {
//         $job = Job::findOrFail($id);
//         return view('jobs.edit', compact('job'));
//     }

//     // Update an existing job
//     public function update(Request $request, $id)
//     {
//         $validated = $request->validate([
//             'title' => 'required|string|max:255',
//             'description' => 'required|string',
//         ]);

//         $job = Job::findOrFail($id);
//         $job->update($validated);

//         return redirect()->route('jobs.index');
//     }

//     // Delete a job
//     public function destroy($id)
//     {
//         $job = Job::findOrFail($id);
//         $job->delete();

//         return redirect()->route('jobs.index');
//     }
// }
