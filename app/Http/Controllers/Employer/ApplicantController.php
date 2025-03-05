<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\Applicant; 

class ApplicantController extends Controller
{
    public function index()
    {
         // Get the logged-in employer's ID
         $employerId = auth()->user()->employer->id;

         // Fetch the jobs posted by the logged-in employer
         $jobs = Jobs::where('employer_id', $employerId)->get();
 
         // Fetch the applicants for these jobs
         // Assuming you have a 'job_id' field in the applicants table to link applicants to jobs
         $applicants = Applicant::whereIn('job_id', $jobs->pluck('id'))->get();
         
 
         // Pass the applicants and jobs to the view
         return view('employers.employer_applicants', compact('applicants', 'jobs'));
    }
    public function job()
{
    return $this->belongsTo(Jobs::class);
}
}
