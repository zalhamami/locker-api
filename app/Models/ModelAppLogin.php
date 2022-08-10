<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAppLogin extends Model
{
    protected $table = "appointment_login";
    public $timestamps = false;
    protected $fillable = [
        'text',
        'date_login',
        'time_login'
    ];
}
