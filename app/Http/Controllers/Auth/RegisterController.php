<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Employer;
use App\Models\AdminNotification;
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
            // 'email' => 'required|string|email|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            // 'password' => 'required|string|min:8|confirmed',
            'password' => [
            'required',
            'string',
            'min:8',                // Minimum 8 characters
            'regex:/[A-Z]/',        // At least one uppercase letter
            'regex:/[a-z]/',        // At least one lowercase letter
            'regex:/[0-9]/',        // At least one number
            'regex:/[@$!%*?&]/',    // At least one special character
            'confirmed'             // Must match confirmation field
            ],
            'user_type' => 'required|in:candidate,employer',
            'company_name' => 'nullable|required_if:user_type,employer|string|max:255',
        ],[
            'password.regex' => 'Password must be at least 8 characters long and include at least one uppercase letter, one number, and one special character (@$!%*?&).',
            'email.regex' => 'Please enter a valid email address.',
            'company_name.required_if' => 'Company name is required for employers.',
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
            AdminNotification::create([
                'user_id' => $user->id,
                'title'   => 'New Employer Registered',
                'message' => "{$request->company_name} has registered as an employer.",
                'type'    => 'employer_registration',
                'is_read' => false,
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

        return redirect($user->user_type === 'employer' ? route('employer.dashboard') : route('candidate.dashboard'))
        ->with('success', 'Registration successful! Welcome to HireHub.');
    }
}
