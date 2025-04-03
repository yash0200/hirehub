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
        
        $resume = Resume::where('candidate_id', Auth::user()->candidate->id)->first();

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
            $messages = [
                'description.required' => 'The description field is required.',
                'description.min' => 'The description must be at least 10 characters.',
                'description.max' => 'The description cannot be more than 1000 characters.',
                
                'degree_name.required' => 'The degree name field is required.',
                'degree_name.regex' => 'The degree name must contain only letters and spaces.',
                
                'field_of_study.required' => 'The field of study is required.',
                
                'institution_name.required' => 'The institution name is required.',
                'institution_name.regex' => 'The institution name must contain only letters and spaces.',
                
                'start_year.required' => 'The start year is required.',
                'start_year.integer' => 'The start year must be a valid number.',
                'start_year.min' => 'The start year cannot be before 1900.',
                'start_year.max' => 'The start year cannot be in the future.',
            
                'end_year.required' => 'The end year is required.',
                'end_year.integer' => 'The end year must be a valid number.',
                'end_year.min' => 'The end year must be at least 3 years after the start year.',
            
                'job_title.required' => 'The job title is required.',
                'company_name.required' => 'The company name is required.',
            
                'employment_type.required' => 'The employment type is required.',
            
                'skills.required' => 'At least one skill is required.',
                'skills.array' => 'Skills must be an array.',
                'skills.*.max' => 'Each skill must not exceed 255 characters.',
            
                'resume_file.required' => 'The resume file is required.',
                'resume_file.file' => 'The uploaded file must be a valid file.',
                'resume_file.mimes' => 'The resume file must be a PDF.',
                'resume_file.max' => 'The resume file size cannot exceed 2MB.',
            
                'current_salary.required' => 'Please enter your current salary.',
                'expected_salary.required' => 'Please enter your expected salary.',
            ];

            $validator = Validator::make($request->all(), [
                'description' => 'required|string|min:10|max:1000',
                'degree_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
                'field_of_study' => 'required|string|max:255',
                'institution_name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
                'start_year' => 'required|integer|min:1900|max:' . date('Y'), // Start year should not be in future
                'end_year'   => 'required|integer|min:1900', // End year should be within valid range
                'job_title' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'employment_type' => 'required|string',
                'skills' => 'required|array|min:1',
                'skills.*' => 'string|max:255',
                // 'resume_file' => 'required|file|mimes:pdf|max:2048',
                'resume_file' => $resume->resume_file ? 'nullable|file|mimes:pdf|max:2048' : 'required|file|mimes:pdf|max:2048',
                'current_salary'  => 'required',
                'expected_salary' => 'required',
            ],$messages);

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
                    // Extract minimum salary from the range (convert ₹3,00,000 - ₹5,00,000 → 300000)
                    $current_min = (int) filter_var(explode(' - ', str_replace(['₹', ','], '', $request->current_salary))[0], FILTER_SANITIZE_NUMBER_INT);
                    $expected_min = (int) filter_var(explode(' - ', str_replace(['₹', ','], '', $request->expected_salary))[0], FILTER_SANITIZE_NUMBER_INT);
                    // Compare extracted numeric values
                    if ($expected_min <= $current_min) {
                        $validator->errors()->add('expected_salary', 'Expected salary must be greater than current salary.');
                    }
                }
            });
            // dd($validator->errors()->toArray());

         


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
