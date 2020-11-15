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
    const STATE_PENDIENTE='pending';
    const STATE_ACTIVADO='active';
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
