<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends General
{
    use HasFactory;

    protected $fillable = ['name', 'faculty_id'];

    protected $with = ['faculty'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
