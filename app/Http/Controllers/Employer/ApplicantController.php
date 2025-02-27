<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        return view('employers.employer_applicants');
    }
}
