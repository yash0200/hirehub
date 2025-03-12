<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index(){
        $notifications = Notification::where('user_id', 1)
                                 ->latest()
                                 ->take(6)
                                 ->get();
                                //  dd(auth()->id());

        return view('candidates.notification', compact('notifications'));

    }
}
