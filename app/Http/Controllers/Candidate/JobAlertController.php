<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\JobAlert;
use Illuminate\Http\Request;
use App\Models\JobAlertNotification;
use App\Models\JobCategory;
use App\Http\Controllers\Candidate\auth;

class JobAlertController extends Controller
{
    public function index()
    {
        $alerts = JobAlertNotification::where('candidate_id', auth()->id())
            ->with('job')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('candidates.candidates_jobalert',compact('alerts'));
    }
    public function create()
    {
        $categories = JobCategory::where('status', 'active')->get();
        return view('candidates.create_job_alert', compact('categories'));
    }
   public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'criteria' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        // Store the job alert in the database
        JobAlertNotification::create([
            'candidate_id' => auth()->id(),
            'title' => $request->title,
            'criteria' => $request->criteria,
            'location' => $request->location,
        ]);

        return redirect()->route('candidate.jobAlerts')->with('success', 'Job alert created successfully!');
    }
    
    public function jobAlerts()
    {
        $alerts = JobAlertNotification::where('candidate_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('candidate.job_alerts', compact('alerts'));
    }
}