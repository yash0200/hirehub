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
        return view('employers.employer_profile');
    }
    public function update(Request $request)
    {
        $request->validate([
            'company_name'    => 'required|string|max:255',
            'industry'        => 'required|string|max:255',
            'location'        => 'nullable|string|max:255',
            'website'         => 'nullable|url|max:255',
            'phone'           => 'nullable|string|max:20',
            'company_size'    => 'nullable|string|max:50',
            'established_year'=> 'nullable|digits:4',
            'description'     => 'nullable|string',
            'logo'            => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'cover_image'     => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'facebook'        => 'nullable|url|max:255',
            'twitter'         => 'nullable|url|max:255',
            'linkedin'        => 'nullable|url|max:255',
            'google_plus'     => 'nullable|url|max:255',
            'country'         => 'nullable|string|max:100',
            'state'           => 'nullable|string|max:100',
            'city'            => 'nullable|string|max:100',
            'address'         => 'nullable|string|max:255',
        ]);

        $employer = Employer::where('user_id', Auth::id())->firstOrFail();

        $employer->update([
            'company_name'    => $request->company_name,
            'industry'        => $request->industry,
            'location'        => $request->location,
            'website'         => $request->website,
            'phone'           => $request->phone,
            'company_size'    => $request->company_size,
            'established_year'=> $request->established_year,
            'description'     => $request->description,
            'facebook'        => $request->facebook,
            'twitter'         => $request->twitter,
            'linkedin'        => $request->linkedin,
            'country'         => $request->country,
            'state'           => $request->state,
            'city'            => $request->city,
            'address'         => $request->address,
        ]);

        // Handle Logo Upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $employer->update(['logo' => $logoPath]);
        }

        // Handle Cover Image Upload
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('covers', 'public');
            $employer->update(['cover_image' => $coverPath]);
        }

        return redirect()->route('employer.company.profile')->with('success', 'Profile updated successfully.');
    }
}
