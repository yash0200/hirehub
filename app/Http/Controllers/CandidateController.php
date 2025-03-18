<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidateController extends Controller
{
    //changes
    public function index()
    {
        return view('pages.candidate-list');
    }
}
