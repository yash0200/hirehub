<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jobs;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get logged-in employer
        $jobCount = Jobs::where('employer_id', $user->id)->count(); // Count jobs posted by employer

        return view('employers.dashboard', compact('user', 'jobCount'));
    }
}
