<?php

namespace App\Models;

use App\Models\Cycle;
use App\Models\Career;
use App\Models\Course;
use App\Transformers\AreaTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory,SoftDeletes;
    const AREA_AVAILABLE='activado';
    const AREA_NO_AVAILABLE='desactivado';
    public $transformer = AreaTransformer::class;

    protected $dates = ['deleted_at'];
    protected $fillables=[
        'name',
        'description',
        'state'
    ];
    public function careers(){
        return $this->hasMany(Career::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }
    public function cycles(){
        return $this->belongsToMany(Cycle::class);
    }
}
