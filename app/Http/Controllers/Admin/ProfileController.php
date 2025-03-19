<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $admin = $user->admin; 

        return view('admin.admin_profile', compact('user', 'admin'));
    }
    public function changePassword()
    {
        return view('admin.admin_changePassword');
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'admin_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'required|string|max:10',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $admin = $user->admin;

        // Update 'users' table
        $user->update([
            'name' => $request->admin_name,
            'email' => $request->email,
        ]);

        // Update 'admins' table
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('admin_photos', 'public');
            $admin->photo = $path;
        }

        $admin->contact = $request->phone;
        $admin->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
