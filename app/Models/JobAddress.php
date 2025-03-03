<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id', 'country', 'state', 'city', 'postcode', 'complete_address'
    ];

    // Relationship with Job
    public function job()
    {
        return $this->belongsTo(Jobs::class);
    }
}
