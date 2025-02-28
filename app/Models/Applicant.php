<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'job_title',
        'cv',
        'date_applied',
        'status'
    ];
    protected $casts = [
        'date_applied' => 'date', // Ensure date_applied is treated as a date
    ];
}
