<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id', 'image', 'title', 'location', 'job_post_time', 'salary', 'job_type', 'category','description'
    ];

    protected $casts = [
        'job_post_time' => 'datetime', // Automatically cast to Carbon instance
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employer_id');
    }
}

