<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ShortlistedJob;
class ShortlistJobsController extends Controller
{
    public function index()
    {
        $candidateId = auth()->user()->candidate->id;

        $shortlistedJobs = ShortlistedJob::where('candidate_id', $candidateId)
            ->with(['job.jobAddress'])
            ->with(['job.jobCategory']) // Load job details and job address
            ->get();  
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
        return redirect()->route('candidate.shortlist')->with('success', 'Job shortlisted successfully!');
    }

}
