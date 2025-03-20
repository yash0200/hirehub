<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';


    protected $fillable = ['user_id', 'contact', 'photo'];

    // Relationship with the 'users' table
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
