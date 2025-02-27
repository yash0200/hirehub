<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function create()
    {
        return view('employers.employer_postJob');
    }
    public function manage()
    {
        return view('employers.employer_managejob');
    }
}
