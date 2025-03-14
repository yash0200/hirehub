<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'industry',
        'location',
        'website',
        'logo',
        'description',
        'phone', // Added Phone Number
        'company_size', // Added Company Size
        'established_year', // Added Established Year
        'country', // Added Address Fields
        'state',
        'city',
        'street'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function address()
    {
        return $this->hasOne(EmployerAddress::class);
    }
    public function jobs()
    {
        return $this->hasMany(Jobs::class);
    }
    public function socialNetworks()
    {
        return $this->hasOne(SocialNetwork::class, 'user_id', 'user_id');
    }

}
