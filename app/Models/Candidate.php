<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'full_name', 'phone', 'dob', 'website', 'gender', 
        'marital_status', 'age_range', 'education_levels', 'languages', 
        'description', 'facebook', 'twitter', 'linkedin', 'nationality', 
        'state', 'city', 'postal_code', 'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
