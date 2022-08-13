<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Lecturer extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        'identification_number',
        'major_id',
        'email',
        'password'
    ];

    protected $hidden = ['password'];

    protected $with = ['major'];

    public function access_token()
    {
        return $this->morphOne(AccessToken::class, 'user');
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function login_histories()
    {
        return $this->morphMany(LoginHistory::class, 'user');
    }

    public function locker_transactions()
    {
        return $this->morphMany(LockerTransaction::class, 'user');
    }
}
