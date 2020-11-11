<?php

namespace App\Models;

use App\Transformers\CourseTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory,SoftDeletes;
    const COURSE_AVAILABLE='1';
    const COURSE_NO_AVAILABLE='0';
    public $transformer = CourseTransformer::class;

    protected $dates = ['deleted_at'];

    protected $fillables=[
        'name',
        'description',
        'state'
    ];
    
    public function areas(){
        return $this->belongsToMany(Area::class);
    }
}
