<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateNotification extends Model
{
    use HasFactory;

    protected $table = 'candidates_notifications';

    protected $fillable = [
        'candidate_id',
        'title',
        'message',
        'type',
        'is_read',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }
}
