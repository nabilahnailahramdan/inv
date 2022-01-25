<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $fillable =[
        'nama',
        'username',
        'level',
        'no_telepon',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
