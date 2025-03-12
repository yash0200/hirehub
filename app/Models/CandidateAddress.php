<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'state',
        'city',
        'postal_code',
        'street',
        'candidate_id'
    ];
    public function address()
    {
        return $this->hasOne(CandidateAddress::class, 'candidate_id');
    }

    // In CandidateAddress model
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'candidate_id');
    }
}
