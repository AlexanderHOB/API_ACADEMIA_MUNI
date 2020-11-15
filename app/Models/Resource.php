<?php

namespace App\Models;

use App\Models\Student;
use App\Transformers\ResourceTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
    use HasFactory, SoftDeletes;
    public $transformer = ResourceTransformer::class;

    protected $dates = ['deleted_at'];

    protected $fillable=[
        'name',
        'description',
        'type'
    ];
    
    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
