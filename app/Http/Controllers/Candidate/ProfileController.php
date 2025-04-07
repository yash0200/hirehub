<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $candidate = Candidate::where('user_id', auth()->id())->with('address', 'user.socialNetwork')->firstOrNew();
        return view('candidates.candidates_profile', compact('candidate'));
    }
    public function update(Request $request)
    {
        try {
            // Get logged-in user
            $user = Auth::user();

            // Find or create candidate profile
            $profile = Candidate::firstOrNew(['user_id' => $user->id]);

            // Identify which form is submitted
            $formType = $request->input('form_type');

            if ($formType === 'my_profile') {
                // Validate input
                // $request->validate([
                //     'full_name' => 'required|string|max:255',
                //     'phone' => 'nullable|string|max:20',
                //     'dob' => ['required', 'date', 'before:today'],
                //     'website' => 'nullable|url',
                //     'gender' => 'nullable|in:male,female',
                //     'marital_status' => 'nullable|in:single,married,divorced,widowed',
                //     'age_range' => 'nullable|string|max:20',
                //     'education_levels' => 'nullable|string|max:255',
                //     'languages' => 'nullable|string|max:255',
                //     'description' => 'nullable|string',
                //     'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                // ]);

                $validator = Validator::make($request->all(), [
                    'full_name' => 'required|string|regex:/^[a-zA-Z\s,\'-]+$/|max:255',
                    'phone' => 'required|numeric|digits:10',
                    'dob' => ['required', 'date', 'before:' . \Carbon\Carbon::now()->subYears(18)->toDateString()],
                    'website' => 'nullable|url',
                    'gender' => 'required|in:male,female',
                    'marital_status' => 'nullable|in:single,married,divorced,widowed',
                    'age_range' => 'required|string|max:20|in:18 - 22 years,23 - 25 years,26 - 30 years,31 - 40 years,41 - 60 years',
                    'education_levels' => 'nullable|string|regex:/^[a-zA-Z\s,\'-]+$/|min:5|max:255',
                    'languages' => 'nullable|string|regex:/^[a-zA-Z\s,\'-]+$/|max:255',
                    'description' => 'nullable|string|min:100',
                    'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                ]);
                $dob = Carbon::parse($request->dob);
                $age = $dob->age;
                if ($request->age_range) {
                    // Remove "years" from the selected range and split the string by the hyphen
                    $ageRange = str_replace(' years', '', $request->age_range);
                    list($minAge, $maxAge) = explode(' - ', $ageRange);

                    // Check if the age falls within the specified range (inclusive)
                    if ($age < $minAge || $age > $maxAge) {
                        return redirect()->back()->withErrors([
                            'age_range' => "Your age ($age) is not within the specified range ($minAge - $maxAge years)."
                        ])->withInput();
                    }
                }
                // If validation fails, return with errors
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // Update profile fields
                $profile->full_name = $request->full_name;
                $profile->phone = $request->phone;
                $profile->dob = $request->dob ? Carbon::createFromFormat('Y-m-d', $request->dob)->format('Y-m-d') : null;
                $profile->website = $request->website;
                $profile->gender = $request->gender;
                $profile->marital_status = $request->marital_status;
                $profile->age_range = $request->age_range;
                $profile->education_levels = $request->education_levels;
                $profile->languages = $request->languages;
                $profile->description = $request->description;
                // Handle profile photo upload
                if ($request->hasFile('profile_photo')) {
                    // Delete the old photo if it exists
                    if ($profile->profile_photo) {
                        Storage::delete('public/profile_photos/' . $profile->profile_photo);
                    }

                    // Store the new profile photo
                    $file = $request->file('profile_photo');
                    $filename = 'profile-' . $profile->id . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/profile_photos', $filename);
                    $profile->profile_photo = $filename;
                }
            }

            if ($formType === 'social_network') {
                // Validate input
                $validator = Validator::make($request->all(), [
                    'facebook' => 'nullable|url',
                    'twitter' => 'nullable|url',
                    'linkedin' => 'nullable|url',
                ]);

                // If validation fails, return with errors
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // Update or create social links for the logged-in user
                $user->socialNetwork()->updateOrCreate(
                    ['user_id' => $user->id], // Search by user_id
                    [
                        'facebook' => $request->facebook,
                        'twitter' => $request->twitter,
                        'linkedin' => $request->linkedin,
                    ]
                );
            }



            if ($formType === 'contact_information') {
                // Validate input
                $validator = Validator::make($request->all(), [
                    'country' => 'required|string|regex:/^[a-zA-Z\s,\'-]+$/|max:255',
                    'state' => 'required|string|regex:/^[a-zA-Z\s,\'-]+$/|max:255',
                    'city' => 'required|string|regex:/^[a-zA-Z\s,\'-]+$/|max:255',
                    'postal_code' => 'required|numeric|digits:6',
                    'street' => 'required|string|max:100',  
                ]);

                // If validation fails, return with errors
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // Update or create address for the profile
                $profile->address()->updateOrCreate(
                    ['candidate_id' => $profile->id], // Search for an existing address by candidate_id
                    [
                        'country' => $request->country,
                        'state' => $request->state,
                        'city' => $request->city,
                        'postal_code' => $request->postal_code,
                        'street' => $request->street,
                    ]
                );
            }


            $profile->save();

            $user->updateProfileStatus();

            return redirect()->route('candidate.profile')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('candidate.profile')->withErrors($e->getMessage());
        }
    }
    public function changePassword(Request $request)
    {
        // Update validation rule to check for 'confirm_password' manually
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8',
            'new_password_confirmation' => 'required|string|same:new_password', // Check if 'confirm_password' matches 'new_password'
        ]);

        $user = auth()->user();

        // Check if old password is correct
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect back with a success message
        return back()->with('success', 'Password updated successfully!');
    }
}
