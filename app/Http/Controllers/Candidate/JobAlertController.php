<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobAlertController extends Controller
{
    public function index()
    {
        return view('candidates.candidates_jobalert');
    }

}
