<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployersController extends Controller
{
    public function index()
    {
        $employers = Employer::latest()->paginate(9); // Fetch employers from DB
        return view('employers.index', compact('employers'));
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
