<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Models\Jobs;

class HomeController extends Controller
{
    public function index()
    {
        $categories = JobCategory::where('status', 'active')->withCount('jobs')->get();

        $jobs = Jobs::with('employer', 'jobCategory', 'jobAddress')
        ->where('status', 'active')->orderBy('created_at', 'desc')->take(3)->get();

       
        return view('pages.home', compact('jobs','categories'));
    }
}
