<?php

namespace App\Models;

use App\Models\Career;
use Illuminate\Database\Eloquent\Model;
use App\Transformers\EnrollmentTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    use HasFactory, SoftDeletes;
    const STATE_PENDING='pendiente';
    const STATE_PROGRESS='aprobado';
    const STATE_DISAPPROVED = 'desaprobado';
    const STATE_TIMEOUT='terminado';

    public $transformer = EnrollmentTransformer::class;

    protected $fillable=[
        'id',
        'student_id',
        'cycle_id',
        'career_id',
        'state'
    ];

    public function vouchers(){
        return $this->hasMany(Voucher::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function cycle(){
        return $this->belongsTo(Cycle::class);
    }
    public function career(){
        return $this->belongsTo(Career::class);

    }
}
