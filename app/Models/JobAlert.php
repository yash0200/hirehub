<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'criteria',
        'category_id',
        'location',
        'salary_range',
        'job_type',
    ]; // Make sure you're allowing assignment of these fields.

    protected $casts = [
        'criteria' => 'array', // Convert 'criteria' to an array when saved or retrieved from the database
    ];

    // Define the inverse relationship back to Candidate
    public function candidate()
    {
        return $this->belongsTo(Candidate::class); // Each job alert belongs to a candidate
    }
    // Candidate model (App\Models\Candidate.php)
    public function jobAlerts()
    {
        return $this->hasMany(JobAlertNotification::class, 'candidate_id');
    }
    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }
}
