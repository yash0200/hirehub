<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\JobAlertNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Jobs;
use App\Models\JobAlert;

class JobController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'      => 'required|string',
            'category'   => 'required|string',
            'location'   => 'required|string',
            'salary'     => 'required|numeric',
            'experience' => 'nullable|string',
        ]);

        $job = Jobs::create($data);

        // Find job alerts that match this new job
        $matchingAlerts = JobAlert::all()->filter(function ($alert) use ($job) {
            $criteria = json_decode($alert->criteria, true);

            return ($criteria['category'] == $job->category) &&
                ($criteria['location'] == $job->location);
        });

        // Send notifications to candidates
        foreach ($matchingAlerts as $alert) {
            Notification::send($alert->candidate, new JobAlertNotification($job));
        }

        return redirect()->back()->with('success', 'Job posted successfully!');
    }
}
