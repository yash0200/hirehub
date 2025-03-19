<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Jobs;

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
        // Fetch employer details with address and active jobs count
        $employer = Employer::with(['address', 'socialNetworks'])
            ->withCount(['jobs' => function ($query) {
                $query->where('status', 'active'); // Count only active jobs
            }])
            ->findOrFail($id); // Return 404 if not found

        // Fetch employer's active jobs
        $activeJobs = Jobs::where('employer_id', $id)
            ->where('status', 'active')
            ->get();

        // Active job count for this employer
        $jobCount = $employer->jobs_count;

        // Total active jobs for all employers
        $totalJobs = Jobs::where('status', 'active')->count();

        // Jobs added today
        $jobsToday = Jobs::whereDate('created_at', today())
            ->where('status', 'active')
            ->count();

        return view('employers.show', compact('employer', 'jobCount', 'totalJobs', 'jobsToday', 'activeJobs'));
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
