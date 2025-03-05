<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShortlistJobsController extends Controller
{
    public function index()
    {
     
            $shortlistedJobs = auth()->user()->shortlistedJobs()->with('company')->get();
            
            
            return view('candidates.candidates_shortlistJobs', compact('shortlistedJobs'));
           
    }
    public function shortlistJob(Request $request)
    {
        $candidateId = auth()->user()->candidate->id;        
        $jobId = $request->job_id;

        if (!DB::table('shortlisted_jobs')->where('candidate_id', $candidateId)->where('job_id', $jobId)->exists()) {
            DB::table('shortlisted_jobs')->insert([
                'candidate_id' => $candidateId,
                'job_id' => $jobId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json(['message' => 'Job shortlisted successfully']);
    }

}
