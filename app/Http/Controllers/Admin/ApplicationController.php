<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applicant; 

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applicants = Applicant::latest()->get(); // Fetch all applicants from the database
        return view('admin.admin_viewapplications', compact('applicants'));
    }
}