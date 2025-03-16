<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\Applicant;
use App\Models\CandidateNotification;
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
    public function approveApplicant($id)
    {
        $applicant = Applicant::findOrFail($id);


        // Update status
        $applicant->status = 'approved';
        $applicant->save();

        CandidateNotification::create([
            'candidate_id' => $applicant->candidate_id,
            'title'        => 'Application Approved',
            'message'      => "Congratulations! Your application for the position '{$applicant->job->title}' has been approved successfully.",
            'type'         => 'application_status',  // Add this field
            'is_read'      => false,
        ]);


        return response()->json(['message' => 'Application approved successfully.']);
    }
    public function viewProfile($id)
    {
        $candidate = Candidate::with(['resume', 'socialNetworks', 'address'])
            ->where('id', $id)
            ->firstOrFail();

        return view('employers.candidate_profile', compact('candidate'));
    }

    public function viewApplicant($id)
    {
        $application = Applicant::with(['job', 'candidate', 'resume'])->findOrFail($id);
        // $application = Applicant::with([
        //     'job.employer',
        //     'candidate.user',
        //     'resume'
        // ])->findOrFail($id);
        

        return view('applications.view_application', compact('application'));
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

            // Create rejection notification
            CandidateNotification::create([
                'candidate_id' => $applicant->candidate_id,
                'title'        => 'Application Rejected',
                'message'      => "Unfortunately, your application for the position '{$applicant->job->title}' has been rejected.",
                'type'         => 'application_status',
                'is_read'      => false,
            ]);

            return response()->json(['message' => 'Application rejected successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }
}
