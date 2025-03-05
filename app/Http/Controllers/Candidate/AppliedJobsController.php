<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;

class AppliedJobsController extends Controller
{
    public function index()
    {
        // Assuming the user is authenticated and the candidate ID is the authenticated user's ID
        $candidateId = auth()->user()->candidate->id; // Adjust this if the candidate_id is stored elsewhere

        // Fetch applied jobs for the candidate 
        $appliedJobs = Applicant::where('candidate_id', $candidateId)
            ->with('job.employer') // Assuming 'job' is a relationship method in Applicant model
            ->get();
        
        return view('candidates.candidates_applied_jobs', compact('appliedJobs'));
    }
}
