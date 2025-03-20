<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Candidate;

class CandidateController extends Controller
{
    //changes
    public function index()
    {
        $candidates = Candidate::whereHas('user', function ($query) {
            $query->where('status', 'active');
        })
        ->with(['address', 'resume']) // Eager load address and resume
        ->paginate(2);

    return view('pages.candidate-list', compact('candidates'));
    }
    public function viewProfile($id)
    {
        $candidate = Candidate::with(['resume', 'socialNetworks', 'address'])
            ->where('id', $id)
            ->firstOrFail();

        return view('pages.candidate_profile', compact('candidate'));
    }
}
