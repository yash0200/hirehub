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
        // $alerts = JobAlertNotification::where('candidate_id', auth()->id())
        //     ->with('job')
        //     ->orderBy('created_at', 'desc')
        //     ->get();

        $alerts = JobAlert::where('candidate_id', auth()->user()->candidate->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $notifications = JobAlertNotification::where('candidate_id', auth()->user()->candidate->id)->with('job')->get();



        return view('candidates.candidates_jobalert', compact('alerts','notifications'));
    }
    public function create()
    {
        $categories = JobCategory::where('status', 'active')->get();
        return view('candidates.create_job_alert', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'criteria' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:job_categories,id',
            'salary_range' => 'nullable|string|max:255',
            'job_type' => 'nullable|in:full-time,part-time,remote,internship',
        ]);

        // Check for existing job alert with the same preferences
        $existingAlert = JobAlert::where('candidate_id', auth()->user()->candidate->id)
            ->where('category_id', $request->category_id)
            ->where('location', $request->location)
            ->where('salary_range', $request->salary_range)
            ->where('job_type', $request->job_type)
            ->whereJsonContains('criteria', $request->criteria) // Check JSON field
            ->exists();
        if ($existingAlert) {
            return redirect()->back()->with('error', 'You have already created this job alert.');
        }

        

        JobAlert::create([
            'candidate_id' => auth()->user()->candidate->id,
            'criteria' => $request->criteria,
            'location' => $request->location,
            'category_id' => $request->category_id,
            'salary_range' => $request->salary_range,
            'job_type' => $request->job_type,
        ]);

        return redirect()->route('candidate.jobalerts')->with('success', 'Job alert created successfully!');
    }


    public function jobAlerts()
    {
        $alerts = JobAlertNotification::where('candidate_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('candidate.job_alerts', compact('alerts'));
    }

    public function destroy($id)
    {
        $alert = JobAlert::where('id', $id)->where('candidate_id', auth()->user()->candidate->id)->first();

        if ($alert) {
            $alert->delete();
            return redirect()->route('candidate.jobalerts')->with('success', 'Job alert deleted successfully.');
        }

        return redirect()->route('candidate.jobalerts')->with('error', 'Job alert not found.');
    }

}
