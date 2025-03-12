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

        $applicants = Applicant::with(['candidate.address', 'job', 'resume'])
            ->latest()
            ->take(6)
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

        return view('employers.dashboard', compact('user', 'jobCount', 'applications', 'applicants','chartData'));
    }
}
