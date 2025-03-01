<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resume; // Assuming you have a Resume model
use Illuminate\Support\Facades\Auth;

class CandidateResumeController extends Controller
{
    public function show()
    {
        // Fetch the authenticated user's resume
        $resume = Resume::where('user_id', Auth::id())->first(); 

        return view('candidates.candidates_myresume', compact('resume'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'degree_name' => 'nullable|string',
            'field_of_study' => 'nullable|string',
            'institution_name' => 'nullable|string',
            'start_year' => 'nullable|integer',
            'end_year' => 'nullable|integer',
            'job_title' => 'nullable|string',
            'company_name' => 'nullable|string',
            'employment_type' => 'nullable|string',
            'skills' => 'nullable|array',
            'resume_file' => 'nullable|file|mimes:pdf,jpeg,jpg,png|max:2048',
        ]);

        $data = $request->only([
            'description', 
            'degree_name', 
            'field_of_study', 
            'institution_name', 
            'start_year', 
            'end_year', 
            'job_title', 
            'company_name', 
            'employment_type', 
            'skills'
        ]);

        if ($request->hasFile('resume_file')) {
            $data['resume_file'] = $request->file('resume_file')->store('resumes');
        }

        $resume = Resume::updateOrCreate(
            ['user_id' => Auth::id()],
            $data
        );

        return redirect()->route('candidate.resumes')->with('success', 'Resume updated successfully!');
    }
}
