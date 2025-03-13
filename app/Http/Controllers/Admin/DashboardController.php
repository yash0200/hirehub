<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Applicant;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'total_users' => User::count(),
            'total_jobs' => Jobs::count(),
            'total_employers' => User::where('user_type', 'employer')->count(), // Count employers
            'total_applications' => Applicant::count() // Count total applications
        ]);
    }
    public function getWeeklyChartData(Request $request)
    {
        $weeks = $request->input('weeks', 4); // Default to last 4 weeks

        // Get the last X weeks as an array
        $weekNumbers = [];
        for ($i = $weeks - 1; $i >= 0; $i--) {
            $weekNumbers[] = Carbon::now()->subWeeks($i)->format('oW'); // ISO YearWeek
        }

        // Fetch weekly candidates count
        $candidates = User::select(DB::raw('YEARWEEK(created_at, 3) as week, COUNT(*) as count'))
            ->where('user_type', 'candidate')
            ->where('created_at', '>=', Carbon::now()->subWeeks($weeks))
            ->groupBy('week')
            ->orderBy('week', 'ASC')
            ->pluck('count', 'week')
            ->toArray();

        // Fetch weekly employers count
        $employers = User::select(DB::raw('YEARWEEK(created_at, 3) as week, COUNT(*) as count'))
            ->where('user_type', 'employer')
            ->where('created_at', '>=', Carbon::now()->subWeeks($weeks))
            ->groupBy('week')
            ->orderBy('week', 'ASC')
            ->pluck('count', 'week')
            ->toArray();

        // Fill missing weeks with 0
        $formattedCandidates = [];
        $formattedEmployers = [];

        foreach ($weekNumbers as $week) {
            $formattedCandidates[$week] = isset($candidates[$week]) ? (int) $candidates[$week] : 0;
            $formattedEmployers[$week] = isset($employers[$week]) ? (int) $employers[$week] : 0;
        }

        return response()->json([
            'candidates' => $formattedCandidates,
            'employers' => $formattedEmployers
        ]);
    }
}
