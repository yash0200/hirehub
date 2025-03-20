<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Candidate;

class CandidateController extends Controller
{
    //changes
    public function index(Request $request)
    {
        $query = Candidate::whereHas('user', function ($q) {
            $q->where('status', 'active');
        })
        ->with(['address', 'resume']);

        // Apply filters
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->keyword . '%')
                  ->orWhereHas('resume', function ($userQuery) use ($request) {
                      $userQuery->where('degree_name', 'like', '%' . $request->keyword . '%');
                  });
            });
        }

        if ($request->filled('location')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('city', 'like', '%' . $request->location . '%')
                  ->orWhere('postal_code', 'like', '%' . $request->location . '%');
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('experience')) {
            $query->whereIn('experience', $request->experience);
        }

        $candidates = $query->paginate(10);

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
