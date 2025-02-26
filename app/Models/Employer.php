<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Employer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'company_name', 'industry', 'location', 'website', 'logo', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
