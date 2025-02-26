<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Jobs::with('employer')->latest()->paginate(10);
        dd($jobs);
        return view('jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = Jobs::findOrFail($id);
        return view('jobs.show', compact('job'));
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

