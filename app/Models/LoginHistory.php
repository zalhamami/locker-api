<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoginHistory extends General
{
    use HasFactory;

    protected $fillable = [
        'device_info',
        'user_id',
        'user_type'
    ];

    protected $with = ['user'];

    public function user() {
        return $this->morphTo();
    }

    public function getDeviceInfoAttribute($val)
    {
        return json_decode($val);
    }
}
