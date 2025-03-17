<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index(Request $request)
    {
        // $employers = User::where('is_admin', false)->where('user_type','employer')->get();
        $query = User::where('user_type', 'employer');

        // Combined Search by Name or Email
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request->keyword}%")
                    ->orWhere('email', 'LIKE', "%{$request->keyword}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $employers = $query->paginate(10);
        return view('admin.admin_manageEmploy', compact('employers'));
    }

    // View Employer Profile
    public function view($id)
    {
        $employer = User::where('user_type', 'employer')->findOrFail($id);

        return view('admin.admin_viewemployer', compact('employer'));
    }

    // Delete Employer (Only if inactive or suspended)
    public function destroy($id)
    {
        $employer = User::where('user_type', 'employer')->findOrFail($id);

        if ($employer->status === 'inactive' || $employer->status === 'suspended') {
            $employer->delete();

            return redirect()->back()->with('success', 'Employer deleted successfully.');
        }

        return redirect()->back()->with('error', 'Only inactive or suspended employers can be deleted.');
    }

    // Change Employer Status
    public function changeStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive,suspended',
        ]);

        $employer = User::where('user_type', 'employer')->findOrFail($id);
        $employer->status = $request->status;
        $employer->save();

        // Logic for additional actions based on status
        if ($request->status === 'inactive') {
            // Example: Disable login or revoke tokens
        } elseif ($request->status === 'suspended') {
            // Example: Temporarily restrict account actions
        }

        return redirect()->back()->with('success', 'Employer status updated successfully.');
    }
}
