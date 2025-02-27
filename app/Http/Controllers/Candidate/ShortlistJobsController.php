<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShortlistJobsController extends Controller
{
    public function shortlistJobs(){
        return view('candidates.candidates_shortlistJobs');
    }
}
