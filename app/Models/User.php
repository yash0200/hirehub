<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'is_admin',
        'status'
    ];
    public function getIsAdminAttribute()
    {
        return $this->attributes['is_admin'] == 1;
    }
    public function employer(): HasOne
    {
        return $this->hasOne(Employer::class);
    }

    public function candidate(): HasOne
    {
        return $this->hasOne(Candidate::class);
    }
    public function socialNetwork()
    {
        return $this->hasOne(SocialNetwork::class);
    }
    


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    public function updateProfileStatus()
    {
        $candidate = $this->candidate;

        $this->profile_completed = $candidate->isProfileCompleted() && $candidate->isAddressCompleted();
        $this->save();
    }

    public function updateResumeStatus()
    {
        $resume = $this->candidate->resume;

        $this->resume_updated = $resume ? $resume->isResumeUpdated() : false;
        $this->save();
    }
}
