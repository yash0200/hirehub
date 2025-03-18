<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployerNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // Show all notifications for the logged-in employer
    public function index()
    {
        $notifications = EmployerNotification::where('employer_id', Auth::user()->employer->id)
            ->latest()
            ->get();

        return view('employer.notifications.index', compact('notifications'));
    }

    // Mark notification as read
    public function markAsRead($id)
    {
        $notification = EmployerNotification::findOrFail($id);
        $notification->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Notification marked as read.');
    }

    // Delete notification
    public function destroy($id)
    {
        EmployerNotification::destroy($id);

        return redirect()->back()->with('success', 'Notification deleted successfully.');
    }
}
