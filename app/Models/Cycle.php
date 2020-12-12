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
    public $transformer = CycleTransformer::class;

    const CYCLE_PENDING     = 'pendiente';
    const CYCLE_PROGRESS    = 'disponible';
    const CYCLE_DISAPPROVED = 'desaprobado';
    const CYCLE_TIMEOUT     = 'terminado';

    protected $dates = ['deleted_at'];

    protected $fillable=[
        'name',
        'description',
        'quantity',
        'duration',
        'state',
        'start_date',
        'end_date',
        'category_moodle_id'
    ];
    
    public function areas(){
        return $this->belongsToMany(Area::class);
    }
    public function enrollments(){
        return $this->hasMany(Enrollment::class);
    }

}
