<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

