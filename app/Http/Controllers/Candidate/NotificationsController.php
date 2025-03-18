<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index()
    {


        $notifications = CandidateNotification::where('candidate_id', Auth::user()->candidate->id)
            ->latest()
            ->get();
        return view('candidates.notification', compact('notifications'));
    }
    // Mark notification as read
    public function markAsRead($id)
    {
        $notification = CandidateNotification::findOrFail($id);
        $notification->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Notification marked as read.');
    }

    public function markAllAsRead()
    {
        // Mark all notifications as read
        CandidateNotification::where('is_read', false)
            ->where('candidate_id', Auth::user()->candidate->id)
            ->update(['is_read' => true]);
        return redirect()->back()->with('success', 'All notifications marked as read successfully.');
    }
    // Delete notification
    public function destroy($id)
    {
        CandidateNotification::destroy($id);
        return redirect()->back()->with('success', 'Notification deleted successfully.');
    }
}
