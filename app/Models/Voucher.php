<?php

namespace App\Models;

use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Model;
use App\Transformers\VoucherTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    use HasFactory, SoftDeletes;
    const STATE_PENDIENTE='pendiente';
    const STATE_ACTIVADO='activo';
    const STATE_DISAPPROVED='desaprobado';
    const STATE_TIMEOUT = 'terminado';
    public $transformer = VoucherTransformer::class;
    
    protected $dates = ['deleted_at'];

    protected $fillable=[
        'code',
        'image',
        'date',
        'state',
        'enrollment_id'
    ];
    public function enrollment(){
        return $this->belongsTo(Enrollment::class);
    }
}
