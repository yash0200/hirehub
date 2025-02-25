<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        // Fetch latest jobs for the homepage
        //$jobs = Job::latest()->limit(6)->get();

        //return view('pages.home', compact('jobs'));
        return view('employers.index');
    }
}
