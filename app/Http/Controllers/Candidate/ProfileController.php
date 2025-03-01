<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function changePassword(){
        return view('candidates.candidates_changepassword');
    }


    public function index()
    {
        $candidate = Candidate::where('user_id', auth()->id())->first();
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
            $request->validate([
                'full_name' => 'required|string|max:255',
                'phone' => 'nullable|string|max:20',
                'dob' => 'nullable|date_format:d/m/Y',
                'website' => 'nullable|url',
                'gender' => 'nullable|in:male,female',
                'marital_status' => 'nullable|in:single,married,divorced,widowed',
                'age_range' => 'nullable|string|max:20',
                'education_levels' => 'nullable|string|max:255',
                'languages' => 'nullable|string|max:255',
                'description' => 'nullable|string',
            ]);

            // Update profile fields
            $profile->full_name = $request->full_name;
            $profile->phone = $request->phone;
            $profile->dob = $request->dob ? Carbon::createFromFormat('d/m/Y', $request->dob)->format('Y-m-d') : null;            $profile->website = $request->website;
            $profile->gender = $request->gender;
            $profile->marital_status = $request->marital_status;
            $profile->age_range = $request->age_range;
            $profile->education_levels = $request->education_levels;
            $profile->languages = $request->languages;
            $profile->description = $request->description;
        }

        if ($formType === 'social_network') {
            // Validate input
            $request->validate([
                'facebook' => 'nullable|url',
                'twitter' => 'nullable|url',
                'linkedin' => 'nullable|url',
            ]);

            // Update social fields
            $profile->facebook = $request->facebook;
            $profile->twitter = $request->twitter;
            $profile->linkedin = $request->linkedin;
        }

        if ($formType === 'contact_information') {
            // Validate input
            $request->validate([
                'nationality' => 'nullable|string|max:255',
                'state' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'postal_code' => 'nullable|string|max:10',
                'address' => 'nullable|string|max:500',
            ]);

            // Update contact information
            $profile->nationality = $request->nationality;
            $profile->state = $request->state;
            $profile->city = $request->city;
            $profile->postal_code = $request->postal_code;
            $profile->address = $request->address;
        }

        // Save updated profile
        $profile->save();

        return redirect()->route('candidate.profile')->with('success', 'Profile updated successfully.');

    } catch (\Exception $e) {
        return redirect()->route('candidate.profile')->withErrors($e->getMessage());
    }
    }

}
