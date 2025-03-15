<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminNotification;

class NotificationController extends Controller
{
     // Show all notifications for the logged-in admin
     public function index()
     {
         $notifications = AdminNotification::latest()->get();
 
         return view('admin.notifications.index', compact('notifications'));
     }
 
     // Mark notification as read
     public function markAsRead($id)
     {
         $notification = AdminNotification::findOrFail($id);
         $notification->update(['is_read' => true]);
 
         return redirect()->back()->with('success', 'Notification marked as read.');
     }
 
     // Delete notification
     public function destroy($id)
     {
         AdminNotification::destroy($id);
 
         return redirect()->back()->with('success', 'Notification deleted successfully.');
     }
}
