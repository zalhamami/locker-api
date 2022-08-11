<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends General
{
    use HasFactory;

    protected $fillable = ['name'];

    public function majors()
    {
        return $this->hasMany(Major::class);
    }
}
