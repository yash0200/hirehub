<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Display all users except admin
    public function index(Request $request)
    {
        $query = User::where('user_type', 'candidate');

        // $users = User::where('is_admin', false)->where('user_type','candidate')->get();
        if ($request->filled('keyword')) {
            $query->where('name', 'LIKE', "%{$request->keyword}%")
                  ->orWhere('email', 'LIKE', "%{$request->keyword}%");
        }
    
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
        $users = $query->paginate(10);
        return view('admin.admin_manageuser', compact('users'));
    }

    // View user details
    public function show($id)
    {
        
        // $candidate = User::where('id', $id)->with('candidate.resume')->firstOrFail();
        $user = User::where('id', $id)
        ->with([
            'candidate.resume',      // Load Resume
            'candidate.address',     // Load Address (Fixed)
            'socialNetwork' // Load Social Networks
        ])->firstOrFail();

        return view('admin.candidate_profile', compact('user'));
    }

    // Edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.admin_edituser', compact('user'));
    }

    // Update user details
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'user_type' => 'required|string',
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    // Update user status (Active, Inactive, Suspended)
    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'status' => 'required|in:active,inactive,suspended',
        ]);

        $user->update(['status' => $request->status]);

        return redirect()->route('admin.users')->with('success', 'User status updated successfully.');
    }

    // Delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
