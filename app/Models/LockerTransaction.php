<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class LockerTransaction extends General
{
    use HasFactory;

    protected $fillable = [
        'locker_id',
        'status',
        'user_id',
        'user_type',
    ];

    protected $with = ['user', 'locker'];

    public function locker()
    {
        return $this->belongsTo(Locker::class);
    }

    public function user() {
        return $this->morphTo();
    }
}
