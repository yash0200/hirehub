<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jobs;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get logged-in employer

        $jobCount = Jobs::where('employer_id', $user->employer->id)->count(); // Count jobs posted by employer

        $applications = DB::table('applicants')
            ->join('jobs', 'applicants.job_id', '=', 'jobs.id')
            ->where('jobs.employer_id', $user->employer->id)
            ->count();

        // New Job Status Counts
        $activeJobs = Jobs::where('employer_id', $user->employer->id)
            ->where('status', 'active')
            ->count();

        $closedJobs = Jobs::where('employer_id', $user->employer->id)
            ->where('status', 'closed')
            ->count();

        $inactiveJobs = Jobs::where('employer_id', $user->employer->id)
            ->where('status', 'inactive')
            ->count();

        $expiredJobs = Jobs::where('employer_id', $user->employer->id)
            ->where('status', 'expired')
            ->count();

        $employerId = $user->employer->id;
        $applicants = Applicant::with(['candidate.address', 'job', 'resume'])
            ->whereHas('job', function ($query) use ($employerId) {
                $query->where('employer_id', $employerId); // Filter by employer's jobs
            })
            ->latest()
            ->take(6) // Limit to 6 applicants
            ->get();

        $chartData = [];

        if (Auth::user()->user_type === 'employer') {
            $jobPerformance = DB::table('jobs')
                ->leftJoin('applicants', 'jobs.id', '=', 'applicants.job_id')
                ->where('jobs.employer_id', $user->employer->id)
                ->select('jobs.title', DB::raw('COUNT(applicants.id) as application_count'))
                ->groupBy('jobs.id', 'jobs.title')
                ->orderByDesc('application_count')
                ->take(6)
                ->get();

            $chartData = [
                'labels' => $jobPerformance->pluck('title')->toArray(),
                'applications' => $jobPerformance->pluck('application_count')->toArray(),
            ];
        }

        return view('employers.dashboard', compact('user', 'jobCount', 'applications', 'applicants', 'chartData', 'activeJobs', 'closedJobs', 'inactiveJobs', 'expiredJobs'));
    }
}
