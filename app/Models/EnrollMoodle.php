<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollMoodle extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $connection = 'mysql2';
    protected $table='mdltc_user_enrolments';
    protected $fillable=[
        'status',
        'enrolid',
        'userid'
    ];
}
