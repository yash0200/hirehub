<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'dob',
        'website',
        'gender',
        'marital_status',
        'age_range',
        'education_levels',
        'languages',
        'description',
        'facebook',
        'twitter',
        'linkedin',
        'nationality',
        'state',
        'city',
        'postal_code',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function resume()
    {
        return $this->hasOne(Resume::class); // Each candidate has one resume
    }
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    public function jobAlerts()
    {
        return $this->hasMany(JobAlert::class); // One candidate can have many job alerts
=======
=======
>>>>>>> Stashed changes
    public function address()
    {
        return $this->hasOne(CandidateAddress::class);
    }

    public function isProfileCompleted()
    {
        return !empty($this->full_name) &&
            !empty($this->profile_photo) &&
            !empty($this->phone) &&
            !empty($this->dob) &&
            !empty($this->gender) &&
            !empty($this->education_levels) &&
            !empty($this->languages) &&
            !empty($this->description) &&
            !empty($this->nationality) &&
            !empty($this->state) &&
            !empty($this->city) &&
            !empty($this->postal_code) &&
            !empty($this->address);
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
    }
}

