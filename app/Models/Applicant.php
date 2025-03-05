<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'job_id',
        'cv',
        'status'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function job()
    {
        return $this->belongsTo(Jobs::class, 'job_id');
    }
    public function resume()
    {
        return $this->hasOne(Resume::class, 'candidate_id', 'candidate_id');
    }
    // In Applicant model
public function candidate_address()
{
    return $this->hasOne(CandidateAddress::class, 'candidate_id');
}

}
