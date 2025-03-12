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
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function resume()
    {
        return $this->hasOne(Resume::class); // Each candidate has one resume
    }
    public function jobAlerts()
    {
        return $this->hasMany(JobAlert::class); // One candidate can have many job alerts

    }
    public function address()
    {
        return $this->hasOne(CandidateAddress::class, 'candidate_id');
    }


    public function applications()
    {
        return $this->hasMany(Applicant::class, 'candidate_id');
    }
    public function shortlistedJobs()
    {
        return $this->hasMany(ShortlistedJob::class, 'candidate_id');
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
            !empty($this->description);
    }

    public function isAddressCompleted()
    {
        return $this->address &&
            !empty($this->address->country) &&
            !empty($this->address->state) &&
            !empty($this->address->city) &&
            !empty($this->address->postal_code) &&
            !empty($this->address->street);
    }
}
