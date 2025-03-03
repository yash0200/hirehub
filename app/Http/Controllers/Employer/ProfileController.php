<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('employers.employer_changePassword');
    }
    public function changePassword(Request $request)
{
    // Update validation rule to check for 'confirm_password' manually
    $request->validate([
        'old_password' => 'required|string',
        'new_password' => 'required|string|min:8',
        'new_password_confirmation' => 'required|string|same:new_password', // Check if 'confirm_password' matches 'new_password'
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
