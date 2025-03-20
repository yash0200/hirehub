<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\JobAlert;
use Illuminate\Http\Request;
use App\Models\JobAlertNotification;
use Illuminate\Support\Facades\Validator;
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



        return view('candidates.candidates_jobalert', compact('alerts', 'notifications'));
    }
    public function create()
    {
        $categories = JobCategory::where('status', 'active')->get();
        return view('candidates.create_job_alert', compact('categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'criteria' => 'required|string|regex:/^[a-zA-Z\s,\'-]+$/|max:255',
            'location' => 'required|string|regex:/^[a-zA-Z\s,\'-]+$/|max:255',
            'category_id' => 'required|exists:job_categories,id',
            'salary_range' => [
                'nullable',
                'string',  // Ensure it's a string (so we can check the format)
                'max:255', // Maximum length of 255 characters
                function ($attribute, $value, $fail) {
                    // If the salary range exists, validate it
                    if ($value) {
                        // Remove any spaces and check if the value matches the expected format "min-max"
                        $value = str_replace(' ', '', $value); // Remove spaces

                        // Regular expression to check if it matches the "number-number" format
                        if (!preg_match('/^\d+(\.\d{1,2})?-\d+(\.\d{1,2})?$/', $value)) {
                            $fail('The salary range must be in the format "min-max", e.g., 5000-10000.');
                            return;
                        }

                        // Split the salary range into two parts (min and max)
                        list($minSalary, $maxSalary) = explode('-', $value);

                        // Convert the salaries to floats for comparison
                        $minSalary = (float)$minSalary;
                        $maxSalary = (float)$maxSalary;

                        // Ensure the minimum salary is not greater than the maximum salary
                        if ($minSalary > $maxSalary) {
                            $fail('The minimum salary cannot be greater than the maximum salary.');
                        }
                    }
                }
            ],

            'job_type' => 'nullable|in:full-time,part-time,remote,internship',
        ]);
        $existingAlert = JobAlert::where('candidate_id', auth()->user()->candidate->id)
            ->where('category_id', $request->category_id)
            ->whereJsonContains('criteria', $request->criteria) // Check JSON field for criteria
            ->exists();

        if ($existingAlert) {
            return redirect()->back()->with('error', 'You have already created a job alert with the same criteria and category.');
        }
        // Check for existing job alert with the same preferences
        $existingAlertWithSamePreferences = JobAlert::where('candidate_id', auth()->user()->candidate->id)
            ->where('category_id', $request->category_id)
            ->where('location', $request->location)
            ->where('salary_range', $request->salary_range)
            ->where('job_type', $request->job_type)
            ->where('criteria', $request->criteria) // Directly compare criteria as a string
            ->exists();

        if ($existingAlertWithSamePreferences) {
            return redirect()->back()->withErrors(['error' => 'You have already created a job alert with the same preferences.'])->withInput();
        }

        // Create a new Job Alert
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
