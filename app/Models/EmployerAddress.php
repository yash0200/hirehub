<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerAddress extends Model
{
    use HasFactory;


    protected $fillable = ['employer_id', 'country', 'state', 'city', 'street', 'postal_code'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

}
