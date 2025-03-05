<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';

    protected $fillable = [
        'user_id',
        'description',
        'degree_name',
        'field_of_study',
        'institution_name',
        'start_year',
        'end_year',
        'job_title',
        'company_name',
        'employment_type',
        'skills',
        'resume_file',
    ];

    protected $casts = [
        'skills' => 'array',  // Assuming skills are stored as an array
    ];


    public function candidate()
    {
        return $this->belongsTo(Candidate::class); // Each resume belongs to a candidate
    }
    public function isResumeUpdated()
    {
        return !empty($this->degree_name) &&
            !empty($this->field_of_study) &&
            !empty($this->institution_name) &&
            !empty($this->start_year) &&
            !empty($this->end_year) &&
            !empty($this->job_title) &&
            !empty($this->company_name) &&
            !empty($this->employment_type) &&
            !empty($this->skills) &&
            !empty($this->resume_file);
    }
}