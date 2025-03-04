<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Display Manage Job page 
    public function manage()
    {
        // $jobs=Jobs::all();
        $jobs = Jobs::with('jobAddresses')->get();
        return view('employers.employer_manageJob',compact('jobs'));
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Jobs::all();
        $categories = JobCategory::where('status', 'active')->get();
        return view('employers.employer_postJob', compact('jobs', 'categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $messages = [
            'title.required' => 'The job title is required.',
            'description.required' => 'The job description is required.',
            'category_id.required' => 'Please select a valid job category.',
            'category_id.exists' => 'The selected category is invalid.',
            'experience.required' => 'Experience field is required.',
            'industry.required' => 'Industry field is required.',
            'salary.required' => 'Salary is required.',
            'salary.string' => 'Salary must be a valid string.',
            'job_type.required' => 'Job type is required.',
            'qualification.required' => 'Qualification field is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'deadline.date' => 'Deadline must be a valid date.',
            'skills.string' => 'Skills must be a valid string.',
            'country.string' => 'Country must be a valid string.',
            'state.string' => 'State must be a valid string.',
            'city.string' => 'City must be a valid string.',
            'postcode.string' => 'Postcode must be a valid string.',
            'address.string' => 'Address must be a valid string.',
        ];
        $id=auth()->user()->employer->id;
       

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:job_categories,id',
            'experience' => 'required|string',
            'salary' => 'required|string',
            'job_type' => 'required|string',
            'qualification' => 'required|string',
            'email' => 'required|email',
            'deadline' => 'nullable|date',
            'skills' => 'nullable|string', // Changed to string
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
            'address' => 'required|string',
        ], $messages);

        // Create Job First
        // dd($validatedData);

        $job = Jobs::create([
            'employer_id' =>  auth()->user()->employer->id,
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
            'experience' => $validatedData['experience'],
            'salary' => $validatedData['salary'],
            'job_type' => $validatedData['job_type'],
            'qualification' => $validatedData['qualification'],
            'email' => $validatedData['email'],
            'deadline' => $validatedData['deadline'],
            'skills' => $validatedData['skills'],
        ]);

        // Store Job Address
        if ($request->filled(['country', 'state', 'city', 'postcode', 'address'])) {
            $job->jobAddress()->create([
                'job_id' => $job->id, // Link job_id to this job
                'country' => $validatedData['country'],
                'state' => $validatedData['state'],
                'city' => $validatedData['city'],
                'postcode' => $validatedData['postcode'],
                'complete_address' => $validatedData['address'],
            ]);
        }

        return redirect()->route('employer.jobs.index')->with('success', 'Job created successfully.');
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
        return view('jobs.edit', compact('jobs'));
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

        return redirect()->route('jobs.index')->with('success', 'Jobs updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobs $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Jobs deleted successfully.');
    }
}
