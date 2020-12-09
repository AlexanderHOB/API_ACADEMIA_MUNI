<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMoodle extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $connection = 'mysql2';
    protected $table='mdl_course';
    protected $fillable=[
        'id',
        'category',
        'fullname',
        'shorname   '
    ];
}
