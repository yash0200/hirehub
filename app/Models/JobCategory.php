<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Jobs;

class JobCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug','status'];

    public function jobs(): HasMany
    {
        return $this->hasMany(Jobs::class, 'category_id');
    }
}
