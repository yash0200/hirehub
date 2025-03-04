<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'country', 'state', 'city', 'postalcode', 'street','candidate_id'
    ];
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
