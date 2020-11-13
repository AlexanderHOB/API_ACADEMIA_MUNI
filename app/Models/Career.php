<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Enrollment;
use App\Transformers\CareerTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
{
    use HasFactory,SoftDeletes;
    const CAREER_AVAILABLE='1';
    const CAREER_NO_AVAILABLE='0';
    public $transformer = CareerTransformer::class;

    protected $dates = ['deleted_at'];

    protected $fillable=[
        'name',
        'description',
        'area_id',
        'state'
    ];
    
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function enrollments(){
        return $this->hasMany(Enrollment::class);
    }

}
