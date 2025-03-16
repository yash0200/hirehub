<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Applicant;
use App\Models\JobAlertNotification;
use App\Models\ShortlistedJob;
use App\Models\Resume;
use App\Models\SocialNetwork;
use App\Models\CandidateNotification;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get logged-in candidate
        $candidate = $user->candidate;

        // ================== Applied Jobs, Alerts, Shortlist Count ==================
        $appliedJobsCount = Applicant::where('candidate_id', $user->candidate->id)->count();
        $jobAlertsCount = JobAlertNotification::where('candidate_id', $user->candidate->id)->count();
        $shortlistCount = ShortlistedJob::where('candidate_id', $user->candidate->id)->count();


        // ================== Profile Completion Calculation ==================
        $totalProfileFields = 10;
        $completedProfileFields = 0;

        $profileFields = [
            'full_name',
            'phone',
            'dob',
            'website',
            'gender',
            'marital_status',
            'age_range',
            'education_levels',
            'languages',
            'description'
        ];

        foreach ($profileFields as $field) {
            if (!empty($candidate->$field)) {
                $completedProfileFields++;
            }
        }

        // Add social network completion to profile progress
        $socialNetwork = SocialNetwork::where('user_id', $user->id)->first();
        if ($socialNetwork) {
            if ($socialNetwork->facebook) $completedProfileFields++;
            if ($socialNetwork->twitter) $completedProfileFields++;
            if ($socialNetwork->linkedin) $completedProfileFields++;
            $totalProfileFields += 3;
        }

        $profileCompletion = round(($completedProfileFields / $totalProfileFields) * 100);

        // ================== Resume Completion Calculation ==================
        $resume = Resume::where('candidate_id', $user->candidate->id)->first();
        $totalResumeFields = 11;
        $completedResumeFields = 0;

        if ($resume) {
            $resumeFields = [
                'description',
                'degree_name',
                'field_of_study',
                'institution_name',
                'start_year',
                'end_year',
                'job_title',
                'company_name',
                'employment_type',
                'skills',
                'resume_file'
            ];

            foreach ($resumeFields as $field) {
                if (!empty($resume->$field)) {
                    $completedResumeFields++;
                }
            }
        }

        $resumeCompletion = round(($completedResumeFields / $totalResumeFields) * 100);

        // Fetch the last 6 notifications
        $notifications = CandidateNotification::where('candidate_id', $candidate->id)
            ->latest()
            ->take(6)
            ->get();
        $appliedJobs = Applicant::where('candidate_id', $candidate->id)
            ->with('job.employer')
            ->latest()
            ->take(2)
            ->get();

        return view('candidates.dashboard', compact(
            'user',
            'appliedJobsCount',
            'jobAlertsCount',
            'shortlistCount',
            'profileCompletion',
            'resumeCompletion',
            'notifications',
            'appliedJobs'
        ));
    }
}
