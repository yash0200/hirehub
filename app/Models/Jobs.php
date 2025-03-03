<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jobs extends Model
{
    use HasFactory;

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
        'skills' => 'array', // Store skills as JSON array
    ];

    /**
     * Relationship with Employer (User Model)
     */
    public function employer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    /**
     * Relationship with Job Category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }

    /**
     * Relationship with JobAddress (One-to-One)
     */
    public function jobAddress(): HasOne
    {
        return $this->hasOne(JobAddress::class);
    }
}

