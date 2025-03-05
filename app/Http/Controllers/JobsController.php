<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use App\Models\JobCategory;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Jobs::with('employer','jobCategory','jobAddress')->latest()->paginate(10);
        $categories = JobCategory::where('status', 'active')->get();

        // dd($jobs);
        return view('jobs.index', compact('jobs','categories'));
    }
    public function show($id)
    {
        $job = Jobs::with('employer','jobAddress','jobCategory')->findOrFail($id);
        // Fetch related jobs based on the same category
        $relatedJobs = Jobs::where('category_id', $job->category_id)
        ->where('id', '!=', $id) // Exclude the current job
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

