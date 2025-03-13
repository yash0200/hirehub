<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\PasswordResetOtp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->with('error', 'User not found.');
        }
        // Generate OTP
        $otp = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Store OTP temporarily in session
        Session::put('otp', $otp);
        Session::put('email', $user->email);

        // Send OTP using Mailable class
        Mail::to($user->email)->send(new PasswordResetOtp($otp));

        // Redirect to OTP verification form
        return redirect()->route('password.otp.form', ['email' => $user->email]);
    }


    public function showResetPasswordForm($email)
    {
        return view('auth.passwords.otp', compact('email'));
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'otp' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',        // At least one uppercase letter
                'regex:/[a-z]/',        // At least one lowercase letter
                'regex:/[0-9]/',        // At least one number
                'regex:/[@$!%*?&]/',    // At least one special character
                'confirmed'
            ],
        ], [
            'password.regex' => 'Password must be at least 8 characters long and include at least one uppercase letter, one number, and one special character (@$!%*?&).',
            'email.regex' => 'Please enter a valid email address.',
        ]);

        // Verify OTP
        if (Session::get('otp') === $request->otp && Session::get('email') === $request->email) {
            $user = User::where('email', $request->email)->first();
            $user->password = bcrypt($request->password);
            $user->save();

            // Clear session data
            Session::forget('otp');
            Session::forget('email');

            return redirect()->route('login')->with('success', 'Password reset successful!');
        } else {
            return back()->with('error', 'Invalid OTP.');
        }
    }
}
