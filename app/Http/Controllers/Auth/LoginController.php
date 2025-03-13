<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',        // At least one uppercase letter
                'regex:/[a-z]/',        // At least one lowercase letter
                'regex:/[0-9]/',        // At least one number
                'regex:/[@$!%*?&]/',    // At least one special character
            ],
        ], [
            'password.regex' => 'Password must be at least 8 characters long and include at least one uppercase letter, one number, and one special character (@$!%*?&).',
            'email.regex' => 'Please enter a valid email address.',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->user_type === 'candidate') {
                return redirect()->route('candidate.dashboard')
                ->with('success', "Welcome, {$user->name}! You have logged in successfully.");
            } elseif ($user->user_type === 'employer') {
                return redirect()->route('employer.dashboard')
                ->with('success', "Welcome, {$user->name}! You have logged in successfully.");
            }
        }
        return back()->withInput()->with('error', 'Invalid email or password.');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully!');
    }
}
