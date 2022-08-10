<?php

/*--------------------------------------------- */
namespace App\Models;
/*--------------------------------------------- */
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/*--------------------------------------------- */

class ModelUser extends Authenticatable
{
    protected $table = "users";
    public $timestamps = false;
    protected $fillable = [
        'name',
        'nip',
        'nim',
        'institusi',
        'program_studi',
        'jurusan',
        'email',
        'password',
        'role_status',
        'created_at',
        'updated_at'
    ];
}