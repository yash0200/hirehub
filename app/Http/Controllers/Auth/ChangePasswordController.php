<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function candidateIndex(Request $request)
    {
        return view('candidates.candidates_changepassword');
    }
    public function employerIndex(Request $request)
    {
        return view('employers.employer_changepassword');
    }
    public function candidateChangePassword(Request $request)
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

    public function employerChangePassword(Request $request)
    {
        return $this->candidateChangePassword($request); // Reuse same validation
    }
}
