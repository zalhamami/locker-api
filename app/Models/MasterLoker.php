<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLoker extends Model
{
    protected $table = "master_lokers";
    public $timestamps = false;
    protected $fillable = [
        'nomer_loker',
        'nama_loker',
        'status_loker'
    ];
}
