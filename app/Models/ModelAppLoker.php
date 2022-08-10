<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAppLoker extends Model
{
    protected $table = "appointment_loker";
    public $timestamps = false;
    protected $fillable = [
        'text',
        'loker',
        'status_active'
    ];
}
