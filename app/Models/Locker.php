<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Locker extends General
{
    use HasFactory;

    const STATUS_OPEN = 'open';
    const STATUS_CLOSE = 'close';

    protected $fillable = [
        'code',
        'name',
        'status',
        'qr_url'
    ];

    public function transactions()
    {
        return $this->hasMany(LockerTransaction::class)->orderByDesc('id');
    }
}
