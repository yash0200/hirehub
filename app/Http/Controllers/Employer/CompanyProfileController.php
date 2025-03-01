<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $employer = Auth::user()->employer;
        return view('employers.employer_profile', compact('employer'));
    }
    public function update(Request $request)
    {
        try {
            // dd($request->all(), $request->file('logo'));

            $user = Auth::user();
            $employer = $user->employer;

            if (!$employer) {
                return redirect()->route('employer.company.profile.update')->withErrors('Employer profile not found.');
            }

            if ($request->form_type === 'company_profile') {
                $validatedData = $request->validate([
                    'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
                    'company_name' => 'required|string|max:255',
                    'phone' => 'required|string|max:10',
                    'website' => 'nullable|url',
                    'established_year' => 'nullable|integer',
                    'company_size' => 'required|string|max:255',
                ]);
                    if ($request->hasFile('logo')) {
                        dd('File is being received:', $request->file('logo'));
                    }
                
                
            } elseif ($request->form_type === 'social_network') {
                $validatedData = $request->validate([
                    'facebook' => 'nullable|url',
                    'twitter' => 'nullable|url',
                    'linkedin' => 'nullable|url',
                ]);
            } elseif ($request->form_type === 'contact_info') {
                $validatedData = $request->validate([
                    'country' => 'required|string|max:255',
                    'state' => 'required|string|max:255',
                    'city' => 'required|string|max:255',
                    'address' => 'nullable|string|max:255',
                ]);
            } else {
                return redirect()->route('employer.company.profile')->withErrors('Invalid form type.');
            }

            $employer->update($validatedData);

            return redirect()->route('employer.company.profile')->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('employer.company.profile')->withErrors($e->getMessage());
        }
    }
}
