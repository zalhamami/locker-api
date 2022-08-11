<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guest extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'institution',
        'email',
        'password'
    ];

    protected $hidden = ['password'];
}
