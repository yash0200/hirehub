<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'country', 'state', 'city', 'postal_code', 'street','candidate_id'
    ];
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
    // In CandidateAddress model
public function applicant()
{
    return $this->belongsTo(Applicant::class, 'candidate_id');
}

}
