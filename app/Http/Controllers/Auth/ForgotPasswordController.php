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
        'email' => 'required|email|exists:users,email',
    ]);

    $user = User::where('email', $request->email)->first();

    // Generate OTP
    $otp = Str::random(6); // You can also use a numeric OTP if preferred

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
        'email' => 'required|email',
        'otp' => 'required',
        'password' => 'required|min:6|confirmed',
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
        return back()->with('error', 'Invalid OTP or email.');
    }
}
}
