<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMoodle extends Model
{
    use HasFactory;

    const AUTH = 'manual';
    const CONFIRMED = 1;
    const MNETHOSTID = 1;
    
    public $timestamps = false;
    protected $connection = 'mysql2';
    protected $table='mdl_user';
    protected $fillable=[
        'auth',
        'mnethostid',
        'username',
        'password',
        'firstname',
        'lastname',
        'email',
        'city'
    ];
}
