<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Lecturer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'identification_number',
        'major_id',
        'email',
        'password'
    ];

    protected $hidden = ['password'];

    protected $with = ['major'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
