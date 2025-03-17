<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Termwind\Components\Dd;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->is_admin) {
                session(['admin_logged_in' => true]); // Set admin session
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout(); // Logout if not admin
                return back()->withInput()->with('error', 'Access Denied! Only Admins can log in.');
            }
        }

        return back()->withInput()->withErrors(['email' => 'Invalid email or password.']);
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('admin_logged_in');
        return redirect('/admin/login')->with('success', 'Logged out successfully!');
    }
    public function changePassword(Request $request)
    {
        // Update validation rule to check for 'confirm_password' manually
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',      // Must contain at least one uppercase letter
                'regex:/[@$!%*?&]/',  // Must contain at least one special character
            ],
            'new_password_confirmation' => 'required|string|same:new_password',
        ], [
            'new_password.regex' => 'Password must contain at least one uppercase letter and one special character.',
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
