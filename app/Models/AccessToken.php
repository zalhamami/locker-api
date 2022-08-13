<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccessToken extends General
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_type',
        'token'
    ];
}
