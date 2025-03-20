<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\EmployerNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidate;
use App\Models\Applicant;
use App\Models\Jobs;

class ApplicantController extends Controller
{
    public function apply(Request $request, $jobId)
    {
        $user = Auth::user();
        $candidate = Candidate::where('user_id', $user->id)->first();

        if (!$candidate) {
            return redirect()->route('candidate.profile')->with('error', 'Please create your candidate profile before applying.');
        }

        if (!$candidate->isProfileCompleted()) {
            return redirect()->route('candidate.profile')->with('error', 'Please complete your profile before applying.');
        }

        if (!$candidate->resume || !$candidate->resume->isResumeUpdated()) {
            return redirect()->route('candidate.resume')->with('error', 'Please upload your resume before applying.');
        }

        // Check if the candidate already applied
        if (Applicant::where('candidate_id', $candidate->id)->where('job_id', $jobId)->exists()) {
            return redirect()->back()->with('error', 'You have already applied for this job.');
        }

        // Save application
        $application = new Applicant();
        $application->candidate_id = $candidate->id;
        $application->job_id = $jobId;
        $application->status = 'Pending';

        $job=Jobs::FindOrFail($jobId);


        $application->save();
        EmployerNotification::create([
            'employer_id' => $job->employer_id,  // Employer's ID (associated with the job)
            'title' => 'New Candidate Application',
            'message' => "A candidate has applied for your job: {$job->title}.",
            'type' => 'job_application',
            'is_read' => false, // Initially unread
        ]);

        // return redirect()->route('candidate.appliedjobs')->with('success', 'Your application has been submitted successfully.');
        return redirect()->back()->with('success', 'Your application has been submitted successfully.');

    }
}