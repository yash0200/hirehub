<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
                return redirect()->route('employer.company.profile')->withErrors(['general' => 'Employer profile not found.']);
            }

            $formType = $request->input('form_type');

            if ($formType === 'company_profile') {
                $validator = Validator::make($request->all(), [
                    'logo' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                    'company_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
                    'phone' => 'required|string|max:10|regex:/^[0-9]{10}$/',
                    'website' => 'nullable|url',
                    'established_year' => 'required|integer|min:1900|max:' . (date('Y') - 5),
                    'company_size' => 'required|string|max:255',
                    'industry' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
                ], [
                    'logo.image' => 'The logo must be an image file.',
                    'logo.mimes' => 'The logo must be a file of type: jpeg, png, jpg.',
                    'logo.max' => 'The logo may not be greater than 1MB.',
                    'company_name.required' => 'The company name is required.',
                    'company_name.regex' => 'The company name must contain only alphabets.',
                    'company_name.max' => 'The company name may not exceed 255 characters.',
                    'phone.required' => 'The phone number is required.',
                    'phone.max' => 'The phone number must be exactly 10 digits.',
                    'phone.regex' => 'The phone number must contain only numbers and 10 digits.',
                    'website.url' => 'Enter a valid website URL.',
                    'established_year.integer' => 'The established year must be a valid number.',
                    'established_year.min' => 'The established year cannot be earlier than 1900.',
                    'established_year.max' => 'The established year cannot be in the future.',
                    'company_size.required' => 'The company size is required.',
                    'industry.required' => 'The industry field is required.',
                    'industry.regex' => 'The industry must contain only alphabets.',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $validatedData = $request->only(['company_name', 'phone', 'website', 'established_year', 'company_size', 'industry']);

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
                $validator = Validator::make($request->all(), [
                    'facebook' => 'nullable|url',
                    'twitter' => 'nullable|url',
                    'linkedin' => 'nullable|url',
                ], [
                    'facebook.url' => 'Enter a valid Facebook URL.',
                    'twitter.url' => 'Enter a valid Twitter URL.',
                    'linkedin.url' => 'Enter a valid LinkedIn URL.',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $user->socialNetwork()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'facebook' => $request->facebook,
                        'twitter' => $request->twitter,
                        'linkedin' => $request->linkedin,
                    ]
                );
            } elseif ($formType === 'contact_info') {
                $validator = Validator::make($request->all(), [
                    'country' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
                    'state' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
                    'city' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
                    'street' => 'required|string|max:255',
                    'postal_code' => 'required|string|max:6|regex:/^[0-9]{6}$/',
                ], [
                    'country.required' => 'The country field is required.',
                    'state.required' => 'The state field is required.',
                    'city.required' => 'The city field is required.',
                    'street.required' => 'The street field is required.',
                    'postal_code.required' => 'The postal code is required.',
                    'postal_code.max' => 'The postal code must be exactly 6 digits.',
                    'postal_code.regex' => 'The postal code must contain only 6 numbers.',
                    'country.regex' => 'The country must contain only alphabets.',
                    'state.regex' => 'The state must contain only alphabets.',
                    'city.regex' => 'The city must contain only alphabets.',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $employer->address()->updateOrCreate(
                    ['employer_id' => $employer->id],
                    $request->only(['country', 'state', 'city', 'street', 'postal_code'])
                );
            } else {
                return redirect()->route('employer.company.profile')->withErrors(['general' => 'Invalid form type.']);
            }

            return redirect()->route('employer.company.profile')->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('employer.company.profile')->withErrors(['general' => $e->getMessage()]);
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
