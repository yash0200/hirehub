<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\Applicant;
use App\Models\Notification;

class ApplicantController extends Controller
{
    public function index()
    {
        // Get the logged-in employer's ID
        $employerId = auth()->user()->employer->id;

        // Fetch the jobs posted by the logged-in employer
        $jobs = Jobs::where('employer_id', $employerId)->get();

        // Fetch the applicants for these jobs
        // Assuming you have a 'job_id' field in the applicants table to link applicants to jobs
        $applicants = Applicant::whereIn('job_id', $jobs->pluck('id'))->get();


        // Pass the applicants and jobs to the view
        return view('employers.employer_applicants', compact('applicants', 'jobs'));
    }
    public function job()
    {
        return $this->belongsTo(Jobs::class);
    }

    public function approveApplicant($id)
    {
        $applicant = Applicant::findOrFail($id);
      

        // Update status
        $applicant->status = 'approved';
        $applicant->save();

        // Create a notification
        Notification::create([
            'user_id' => $applicant->candidate_id, // Assuming candidate_id links to users
            'message' => "Your application has been approved successfully.",
        ]);

        return response()->json(['message' => 'Application approved successfully.']);
    }

    public function rejectApplicant($id)
{
    try {
        $applicant = Applicant::find($id);
        if (!$applicant) {
            return response()->json(['error' => 'Applicant not found'], 404);
        }

        $applicant->status = 'rejected';
        $applicant->save();


        Notification::create([
            'user_id' => $applicant->candidate_id, // Ensure this field exists
            'message' => "Your application has been rejected.",
        ]);


        return response()->json(['message' => 'Application rejected successfully.']);

    } catch (\Exception $e) {
        return response()->json(['error' => 'Something went wrong.'], 500);
    }
}
}
