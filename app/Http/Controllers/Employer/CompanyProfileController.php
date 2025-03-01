<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $employer = Auth::user()->employer;
        return view('employers.employer_profile', compact('employer'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $employer = $user->employer;

        if ($request->form_type === 'company_profile') {
            $request->validate([
                'company_name' => 'required|string|max:255',
                'phone' => 'required|string|max:10',
                'website' => 'nullable|url',
                'established_year' => 'nullable|integer',
                'company_size' => 'required|string|max:255',
            ]);

            $employer->update($request->only([
                'company_name',
                'phone',
                'website',
                'established_year',
                'company_size'
            ]));
        }

        if ($request->form_type === 'social_network') {
            $request->validate([
                'facebook' => 'nullable|url',
                'twitter' => 'nullable|url',
                'linkedin' => 'nullable|url',
            ]);

            $employer->update($request->only(['facebook', 'twitter', 'linkedin']));
        }

        if ($request->form_type === 'contact_info') {
            $request->validate([
                'country' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'address' => 'nullable|string|max:255',
            ]);

            $employer->update($request->only(['country', 'state', 'city', 'address']));
        }

        return redirect()->route('employer.company.profile')->with('success', 'Profile updated successfully!');
    }
}
