<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Guest extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        'institution',
        'email',
        'password'
    ];

    protected $hidden = ['password'];

    public function access_token()
    {
        return $this->morphOne(AccessToken::class, 'user');
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
