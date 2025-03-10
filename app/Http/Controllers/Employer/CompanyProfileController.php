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
            $user = Auth::user();
            $employer = $user->employer;

            if (!$employer) {
                return redirect()->route('employer.company.profile.update')->withErrors('Employer profile not found.');
            }

            $formType = $request->input('form_type');

            if ($formType === 'company_profile') {
                $request->validate([
                    'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
                    'company_name' => 'required|string|max:255',
                    'phone' => 'required|string|max:10',
                    'website' => 'nullable|url',
                    'established_year' => 'nullable|integer',
                    'company_size' => 'required|string|max:255',
                ]);

                $validatedData = $request->only(['company_name', 'phone', 'website', 'established_year', 'company_size']);

                // Handle File Upload
                if ($request->hasFile('logo')) {
                    if ($employer->logo) {
                        Storage::delete('public/logos/' . $employer->logo);
                    }

                    $file = $request->file('logo');
                    $filename = 'company-logo-' . $user->id . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/logos', $filename);

                    $validatedData['logo'] = $filename;
                }

                $employer->update($validatedData);
            } elseif ($formType === 'social_network') {
                $request->validate([
                    'facebook' => 'nullable|url',
                    'twitter' => 'nullable|url',
                    'linkedin' => 'nullable|url',
                ]);

                // Update or create social links
                $user->socialNetwork()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'facebook' => $request->facebook,
                        'twitter' => $request->twitter,
                        'linkedin' => $request->linkedin,
                    ]
                );
            } elseif ($formType === 'contact_info') {
                $request->validate([
                    'country' => 'required|string|max:255',
                    'state' => 'required|string|max:255',
                    'city' => 'required|string|max:255',
                    'street' => 'required|string|max:255',
                    'postal_code' => 'required|string|max:6',
                ]);

                // Update or create address entry for employer
                $employer->address()->updateOrCreate(
                    ['employer_id' => $employer->id],
                    $request->only(['country', 'state', 'city', 'street', 'postal_code'])
                );
            } else {
                return redirect()->route('employer.company.profile')->withErrors('Invalid form type.');
            }
             $this->checkProfileCompletion();

            return redirect()->route('employer.company.profile')->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('employer.company.profile')->withErrors($e->getMessage());
        }
    }
    private function checkProfileCompletion()
    {
        $user = Auth::user();
        $employer = $user->employer;
        

        if (!$employer) {
            return;
        }

        // Check if all required company profile fields are filled
        $isProfileComplete = !empty($employer->company_name) &&
            !empty($employer->phone) &&
            !empty($employer->website) &&
            !empty($employer->established_year) &&
            !empty($employer->company_size) &&
            !empty($employer->logo);
        

        // Check if all required address fields are filled
        $address = $employer->address;
        $hasCompleteAddress = $address &&
            !empty($address->country) &&
            !empty($address->state) &&
            !empty($address->city) &&
            !empty($address->street) &&
            !empty($address->postal_code);
        

        // Update profile completion status for the logged-in employer
        $user->update(['profile_completed' => ($isProfileComplete && $hasCompleteAddress) ? 1 : 0]);
        
    }
}
