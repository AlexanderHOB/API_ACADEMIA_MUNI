<?php

namespace App\Models;

use App\Models\Student;
use App\Transformers\RepresentativeTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Representative extends Model
{
    use HasFactory, SoftDeletes;
    public $transformer = RepresentativeTransformer::class;

    protected $dates = ['deleted_at'];

    protected $fillable=[
        'name',
        'lastname',
        'dni',
    ];
    
    public function students(){
        return $this->hasMany(Student::class);
    }
}
