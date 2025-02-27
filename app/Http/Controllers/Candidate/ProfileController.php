<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function changePassword(){
        return view('candidates.candidates_changepassword');
    }
    public function index(){
        return view('candidates.candidates_profile');
    }
}
