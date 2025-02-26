<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployersController extends Controller
{
    public function index()
    {
        // Fetch latest jobs for the homepage
        //$jobs = Job::latest()->limit(6)->get();

        //return view('pages.home', compact('jobs'));
        return view('employers.index');
    }
    public function dashboard()
    {
        // $employerId = auth()->id();
        // return view('employers.dashboard', [
        //     'postedJobs' => Job::where('employer_id', $employerId)->count(),
        //     'applications' => Application::whereHas('job', function ($query) use ($employerId) {
        //         $query->where('employer_id', $employerId);
        //     })->count(),
        //     'messages' => Message::where('receiver_id', $employerId)->count(),
        //     'shortlisted' => Application::where('status', 'shortlisted')->whereHas('job', function ($query) use ($employerId) {
        //         $query->where('employer_id', $employerId);
        //     })->count(),
        // ]);
        return view('employers.dashboard');
    }
}
