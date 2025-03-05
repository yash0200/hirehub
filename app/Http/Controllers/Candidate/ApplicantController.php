<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidate;
use App\Models\Applicant;

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
        

        $application->save();

        return redirect()->route('jobs.list')->with('success', 'Your application has been submitted successfully.');
    }
}
