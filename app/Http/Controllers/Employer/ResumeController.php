<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function shortlisted()
    {
        return view('employers.employer_resume');
    }
    public function alerts()
    {
        return view('employers.employer_resumeAlert');
    }

    //changes
    // public function index()
    // {
    //     return view('candidate.resume');
    // }
    //changes
}
