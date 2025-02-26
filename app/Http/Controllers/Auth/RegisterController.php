<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required|in:candidate,employer',
            'company_name' => 'nullable|required_if:user_type,employer|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);

        if ($request->user_type == 'employer') {
            Employer::create([
                'user_id' => $user->id,
                'company_name' => $request->company_name,
                'industry' => $request->industry ?? 'Unknown',
                'location' => $request->location ?? 'Unknown',
                'website' => $request->website ?? null,
            ]);
        } else {
            Candidate::create([
                'user_id' => $user->id,
                'skills' => $request->skills ?? null,
                'bio' => $request->bio ?? null,
                'experience' => $request->experience ?? null,
                'education' => $request->education ?? null,
                'portfolio' => $request->portfolio ?? null,
            ]);
        }

        Auth::login($user);

        return redirect($user->user_type === 'employer' ? route('employer.dashboard') : route('candidate.dashboard'));
    }
}
