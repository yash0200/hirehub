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
}
