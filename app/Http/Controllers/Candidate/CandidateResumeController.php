<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resume; // Assuming you have a Resume model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CandidateResumeController extends Controller
{
    public function show()
    {
        // Fetch the authenticated user's resume
        $resume = Resume::where('candidate_id', Auth::id())->first();

        return view('candidates.candidates_myresume', compact('resume'));
    }

    public function store(Request $request)
    {
        $candidate = Auth::user()->candidate;

        $resume = $candidate->resume;
        dd($candidate);



        // Validate the incoming request
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

        // Prepare the data to be saved
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

        // Handle the file upload if a file is provided
        if ($request->hasFile('resume_file')) {
            // Delete old resume if it exists
            if ($resume->resume_file) {
                $oldResumePath = 'public/resumes/' . $resume->resume_file;
                if (Storage::exists($oldResumePath)) {
                    Storage::delete($oldResumePath);
                }
            }

            // Store the new file with a unique filename
            $file = $request->file('resume_file');
            $filename = 'resume-resume-' . $candidate->id . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/resumes', $filename); // Store in the 'public/resumes' folder

            $data['resume_file'] = $filename; // Save the filename to the database
        }

        // Update resume with the new data

        $resume->update($data);

        // Redirect with a success message
        return redirect()->route('resume.resumes')->with('success', 'Resume updated successfully!');
    }
}
