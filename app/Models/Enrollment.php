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
    const STATE_PENDING='pending';
    const STATE_PROGRESS='progress';
    const STATE_TIMEOUT='timeout';

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
