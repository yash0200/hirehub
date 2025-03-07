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
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->user_type === 'candidate') {
                return redirect()->route('candidate.dashboard')
                ->with('success', 'Welcome, Candidate! You have logged in successfully.');
            } elseif ($user->user_type === 'employer') {
                return redirect()->route('employer.dashboard')
                ->with('success', 'Welcome, Employer! You have logged in successfully.');
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
