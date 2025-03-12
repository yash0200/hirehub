<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get logged-in candidate

        return view('candidates.dashboard', compact('user'))->with('userType', Auth::user()->user_type);
    }
}
