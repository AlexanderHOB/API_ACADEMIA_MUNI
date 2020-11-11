<?php

namespace App\Models;

use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Model;
use App\Transformers\StudentTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    public $transformer = StudentTransformer::class;

    protected $dates = ['deleted_at'];

    protected $fillable=[
        'id',
        'name',
        'lastname',
        'dni',
        'birthday',
        'phone',
        'province',
        'district',
        'relationship',
        'year_culmination',
        'representative_id',
    ];
    
    public function representative(){
        return $this->belongsTo(Representative::class);
    }
    public function resources(){
        return $this->belongsToMany(Resource::class);
    }
    public function enrollments(){
        return $this->hasMany(Enrollment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
