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
        $messages = [
            'title.required' => 'The job title is required.',
            'description.required' => 'The job description is required.',
            'category_id.required' => 'Please select a valid job category.',
            'category_id.exists' => 'The selected category is invalid.',
            'experience.required' => 'Experience field is required.',
            'industry.required' => 'Industry field is required.',
            'salary.required' => 'Salary is required.',
            'salary.string' => 'Salary must be a valid string.', // Updated message
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

        try {
            // Validate request
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
                'category_id' => 'required|string',
                'experience' => 'required|string',
                'industry' => 'required|string',
                'salary' => 'required|string',
                'job_type' => 'required|string',
                'qualification' => 'required|string',
                'email' => 'required|email',
                'deadline' => 'nullable|date',
                'skills' => 'nullable|string',
                'country' => 'nullable|string',
                'state' => 'nullable|string',
                'city' => 'nullable|string',
                'postcode' => 'nullable|string',
                'address' => 'nullable|string',
            ], $messages);

            // Create Job
            $job = Jobs::create([
                'employer_id' => auth()->id(),
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'category_id' => $validatedData['category_id'],
                'experience' => $validatedData['experience'],
                'industry' => $validatedData['industry'],
                'salary' => $validatedData['salary'],
                'job_type' => $validatedData['job_type'],
                'qualification' => $validatedData['qualification'],
                'email' => $validatedData['email'],
                'deadline' => $validatedData['deadline'],
                'skills' => $validatedData['skills'] ? json_encode($validatedData['skills']) : null,
            ]);

            // Store Job Address if provided
            if ($request->filled(['country', 'state', 'city', 'postcode', 'address'])) {
                $job->jobAddress()->create([
                    'country' => $validatedData['country'],
                    'state' => $validatedData['state'],
                    'city' => $validatedData['city'],
                    'postcode' => $validatedData['postcode'],
                    'address' => $validatedData['address'],
                ]);
            }

            return redirect()->route('jobs.index')->with('success', 'Job created successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'An error occurred while creating the job: ' . $e->getMessage());
        }
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
