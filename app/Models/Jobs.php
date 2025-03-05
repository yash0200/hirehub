<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jobs extends Model
{
    use HasFactory;
    protected $table = 'jobs';


    protected $fillable = [
        'employer_id',
        'image',
        'title',
        'deadline',
        'email',
        'salary',
        'job_type',
        'category_id',
        'description',
        'skills',
        'experience',
        'industry',
        'gender',
        'qualification'
    ];

    protected $casts = [
        'deadline' => 'datetime', // Automatically cast to Carbon instance
    ];

    /**
     * Relationship with Employer (User Model)
     */
    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }


    /**
     * Relationship with Job Category
     */
    public function jobCategory(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }

    /**
     * Relationship with Job Address (One-to-One)
     */
    public function jobAddress(): HasOne
    {
        return $this->hasOne(JobAddress::class, 'job_id');
    }

    // Define the relationship with the JobAddress model
    public function jobAddresses()
    {
        return $this->hasMany(JobAddress::class, 'job_id');
    }
    public function shortlistedByCandidates() {
        return $this->hasMany(ShortlistedJob::class, 'job_id');
    }

    

}
