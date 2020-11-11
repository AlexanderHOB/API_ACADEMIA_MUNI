<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Enrollment;
use App\Transformers\CycleTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cycle extends Model
{
    use HasFactory,SoftDeletes;
    const CYCLE_AVAILABLE='disponible';
    const CYCLE_FINISH='culminado';
    const CYCLE_PROX='proximamente';

    public $transformer = CycleTransformer::class;

    protected $dates = ['deleted_at'];

    protected $fillables=[
        'name',
        'description',
        'quantity',
        'duration',
        'state'
    ];
    
    public function areas(){
        return $this->belongsToMany(Area::class);
    }
    public function enrollments(){
        return $this->hasMany(Enrollment::class);
    }

}
