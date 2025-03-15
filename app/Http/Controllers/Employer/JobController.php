<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Models\JobAlertNotification;
use App\Models\AdminNotification;
use App\Models\Employer;
use App\Models\JobAlert;

class JobController extends Controller
{
    // Display Manage Job page 
    public function manage()
    {
        // Get the logged-in employer's ID
        $employerId = auth()->user()->employer->id;

        $jobs = Jobs::with(['jobAddresses', 'category'])
            ->where('employer_id', $employerId)
            ->get();
        return view('employers.employer_manageJob', compact('jobs'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employer = auth()->user(); // Get logged-in employer

        // Check if employer profile is completed
        if ($employer->profile_completed != 1) {
            return redirect()->route('employer.company.profile')
                ->with('error', 'Please complete your company profile before posting a job.');
        }


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
        $id = auth()->user()->employer->id;


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
            $jobAddress = $job->jobAddress()->create([
                'job_id' => $job->id, // Link job_id to this job
                'country' => $validatedData['country'],
                'state' => $validatedData['state'],
                'city' => $validatedData['city'],
                'postcode' => $validatedData['postcode'],
                'complete_address' => $validatedData['address'],
            ]);
        }
        // **Notify Candidates Based on Preferences**

        $candidates = JobAlert::where(function ($query) use ($job) {
            $keywords = explode(',', $job->title); // Split job title into words
            foreach ($keywords as $word) {
                $query->orWhere('criteria', 'LIKE', "%$word%");
            }
        })
            ->where('location', $jobAddress->city)
            ->where('category_id', $job->category_id)
            ->get();

        foreach ($candidates as $candidate) {
            JobAlertNotification::updateOrCreate([
                'job_id' => $job->id,
                'candidate_id' => $candidate->candidate_id,
            ]);
        }

        $employer=auth()->user()->employer;
        
        AdminNotification::create([
            'user_id' => auth()->user()->id,
            'title'   => 'New Job Posted',
            'message' => "A new job titled '{$job->title}' has been posted by {$employer->company_name}.",
            'type'    => 'job_post',
            'is_read' => false,
        ]);


        return redirect()->route('employer.jobs.manage')->with('success', 'Job created successfully.');
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
    public function edit(jobs $job)
    {
        $categories = JobCategory::all();
        $job->load('jobAddresses');

        return view('employers.employer_postjob', compact('job', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jobs $job)
    {
        $messages = [
            'title.required' => 'The job title is required.',
            'description.required' => 'The job description is required.',
            'category_id.required' => 'Please select a valid job category.',
            'category_id.exists' => 'The selected category is invalid.',
            'experience.required' => 'Experience field is required.',
            'salary.required' => 'Salary is required.',
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
            'skills' => 'nullable|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
            'address' => 'required|string',
        ], $messages);

        // Update job details
        $job->update([
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

        // Update or create job address
        $job->jobAddresses()->updateOrCreate(
            ['job_id' => $job->id], // Condition for matching record
            [
                'country' => $validatedData['country'],
                'state' => $validatedData['state'],
                'city' => $validatedData['city'],
                'postcode' => $validatedData['postcode'],
                'complete_address' => $validatedData['address'],
            ]
        );

        return redirect()->route('employer.jobs.manage')->with('success', 'Job updated successfully.');
    }
    public function destroy(Jobs $job)
    {
        if (in_array($job->status, ['closed', 'expired'])) {
            return redirect()->route('employer.jobs.manage')->with('error', 'You cannot delete a closed or expired job.');
        }
        // Mark job as 'deleted' and soft delete
        $job->update(['status' => 'deleted']);
        $job->delete(); // Soft delete (sets deleted_at)

        return redirect()->route('employer.jobs.manage')->with('success', 'Job has been deleted successfully.');
    }

    public function updateStatus(Request $request, Jobs $job)
    {
        $request->validate([
            'status' => 'required|in:active,inactive,closed',
        ]);
        // Prevent closing non-active jobs
        if ($request->status === 'closed' && $job->status !== 'active') {
            return redirect()->route('employer.jobs.manage')
                ->with('error', 'Only active jobs can be closed.');
        }

        // Prevent activating expired or closed jobs
        if ($request->status === 'active' && in_array($job->status, ['expired', 'closed'])) {
            return redirect()->route('employer.jobs.manage')
                ->with('error', 'This job is expired or closed. Please create a new job.');
        }

        // Prevent deactivating expired or closed jobs
        if ($request->status === 'inactive' && in_array($job->status, ['expired', 'closed'])) {
            return redirect()->route('employer.jobs.manage')
                ->with('error', 'This job is expired or closed. Please create a new job.');
        }

        // Update the job status
        $job->update(['status' => $request->status]);

        return redirect()->route('employer.jobs.manage')->with('success', 'Job status updated successfully!');
    }
    public function viewApplicant($id)
    {
        $candidate = Candidate::where('user_id', $id)->firstOrFail();
    
        return view('employer.candidate-profile', compact('candidate'));
    }
}
