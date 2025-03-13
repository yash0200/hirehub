<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\Applicant;
use App\Models\Notification;
use App\Models\Candidate;

class ApplicantController extends Controller
{
    public function index()
    {
        // Get the logged-in employer's ID
        $employerId = auth()->user()->employer->id;

        // Fetch employer's jobs with their related applicants
        $jobs = Jobs::with([
            'applicants' => function ($query) {
                $query->with(['candidate', 'resume', 'candidate_address']);
            }
        ])->where('employer_id', $employerId)->get();

        // Fetch applicants with their statuses
        $applicants = Applicant::with(['candidate', 'resume', 'candidate_address', 'job'])
            ->whereIn('job_id', $jobs->pluck('id'))
            ->get();

        // Categorize applicants
        $totals = $applicants;
        $approved = $applicants->where('status', 'approved');
        $rejected = $applicants->where('status', 'rejected');

        return view('employers.employer_applicants', compact('applicants', 'jobs', 'totals', 'approved', 'rejected'));
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
    public function viewApplicant($id)
    {
        $candidate = Candidate::with(['resume', 'socialNetworks', 'address'])
            ->where('id', $id)
            ->firstOrFail();

        return view('employers.candidate_profile', compact('candidate'));
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
