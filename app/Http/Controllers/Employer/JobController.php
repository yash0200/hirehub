<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Display Manage Job page 
    public function manage()
    {
        return view('employers.employer_manageJob');
    }
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Jobs::all();
        return view('employers.employer_postJob', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employers.employer_postJob');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:job_categories,id', // Ensuring valid category ID
            'experience' => 'required|string',
            'industry' => 'required|string',
            'salary' => 'required|number',
            'job_type' => 'required|string',
            'qualification' => 'required|string',
            'email' => 'required|email',
            'deadline' => 'nullable|date',
            'skills' => 'nullable|array', // Ensure it's an array
            'skills.*' => 'string', // Each skill must be a string
    
            // Job Address Fields
            'country' => 'nullable|string',
            'state' => 'nullable|string',
            'city' => 'nullable|string',
            'postcode' => 'nullable|string',
            'address' => 'nullable|string',
        ]);
    
        // Create Job
        $job = Jobs::create([
            'employer_id' => auth()->id(), // Assign job to logged-in employer
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'experience' => $request->experience,
            'industry' => $request->industry,
            'qualification' => $request->qualification,
            'email' => $request->email,
            'deadline' => $request->deadline,
            'skills' => $request->skills ? json_encode($request->skills) : null, // Convert skills array to JSON
        ]);
    
        // Store Job Address
        if ($request->filled(['country','state', 'city', 'postcode', 'address'])) {
            $job->jobAddress()->create([
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'postcode' => $request->postcode,
                'address' => $request->address,
            ]);
        }
    
        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Jobs $job)
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobs $job)
    {
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jobs $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'required|string',
            'experience' => 'required|string',
            'industry' => 'required|string',
            'qualification' => 'required|string',
            'deadline' => 'nullable|date',
            'state' => 'nullable|string',
            'city' => 'nullable|string',
            'postcode' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $job->update($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobs $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }

}
