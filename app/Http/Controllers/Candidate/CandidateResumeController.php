<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resume; // Assuming you have a Resume model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        try {
            $user = auth()->user();
            $candidate = Auth::user()->candidate;
            if (!$candidate) {
                return redirect()->back()->with('error', 'Candidate profile not found.');
            }

            // Ensure a resume exists or create a new one
            $resume = Resume::firstOrNew(['candidate_id' => $candidate->id]);

            // Validate the request
            //    $validator = $request->validate([
            //         'description' => 'required|string',
            //         'degree_name' => 'nullable|string',
            //         'field_of_study' => 'nullable|string',
            //         'institution_name' => 'nullable|string',
            //         'start_year' => 'nullable|integer',
            //         'end_year' => 'nullable|integer',
            //         'job_title' => 'nullable|string',
            //         'company_name' => 'nullable|string',
            //         'employment_type' => 'nullable|string',
            //         'skills' => 'nullable|array',
            //         'resume_file' => 'nullable|file|mimes:pdf,jpeg,jpg,png|max:2048',
            //         'current_salary' => 'nullable|string',
            //         'expected_salary' => 'nullable|string',
            //     ]);

            $validator = Validator::make($request->all(), [
                'description' => 'required|string|min:10|max:1000',
                'degree_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
                'field_of_study' => 'required|string|max:255',
                'institution_name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
                'start_year' => 'required|integer|min:1900|max:' . date('Y'), // Start year should not be in future
                'end_year'   => 'required|integer|min:1900|max:' . date('Y'), // End year should be within valid range
                'job_title' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'employment_type' => 'required|string',
                'skills' => 'required|array|min:1',
                'skills.*' => 'string|max:255',
                'resume_file' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'current_salary'  => 'required|min:0',
                'expected_salary' => 'required|min:0',
            ]);

            // Custom validation for minimum 3-year gap between start and end year
            $validator->after(function ($validator) use ($request) {
                if (!empty($request->start_year) && !empty($request->end_year)) {
                    if ($request->end_year < ($request->start_year + 3)) {
                        $validator->errors()->add('end_year', 'End year must be at least 3 years after the start year.');
                    }
                }
            });

            // Custom validation rule to check expected salary > current salary
            $validator->after(function ($validator) use ($request) {
                if (!empty($request->current_salary) && !empty($request->expected_salary)) {
                    if ($request->expected_salary <= $request->current_salary) {
                        $validator->errors()->add('expected_salary', 'Expected salary must be greater than current salary.');
                    }
                }
            });


            // If validation fails, return with errors
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Handle file upload if provided
            if ($request->hasFile('resume_file')) {
                $resumePath = $request->file('resume_file')->store('resumes', 'public');
            } else {
                $resumePath = null;
            }



            // Prepare the data for saving
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
                'skills',
                'current_salary',
                'expected_salary',
            ]);

            // Handle file upload
            if ($request->hasFile('resume_file')) {
                // Delete old resume if it exists
                if ($resume->resume_file) {
                    Storage::delete('public/resumes/' . $resume->resume_file);
                }

                // Store the new resume file
                $file = $request->file('resume_file');
                $filename = 'resume-' . $candidate->id . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/resumes', $filename); // Save in 'storage/app/public/resumes'

                $data['resume_file'] = $filename;
            }

            // Save the resume
            $resume->fill($data);
            $resume->candidate_id = $candidate->id;
            $resume->save();
            $user->updateResumeStatus();

            return redirect()->route('candidate.resumes')->with('success', 'Resume updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('candidate.resumes')->withErrors($e->getMessage());
        }
    }
}
