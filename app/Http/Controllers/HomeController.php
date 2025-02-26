<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = JobCategory::withCount('jobs')->get();

        // Pass the categories to the home view
        return view('pages.home', compact('categories'));
    }
}
