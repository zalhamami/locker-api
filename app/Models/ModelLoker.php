<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelLoker extends Model
{
    protected $table = "loker";
    public $timestamps = false;
    protected $fillable = [
        'text',
        'open_date',
        'closed_date'
    ];
}
