<?php

namespace App\Transformers;

use App\Models\Voucher;
use League\Fractal\TransformerAbstract;

class VoucherTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Voucher $voucher)
    {
        return [
            'id'                =>  (int)    $voucher->id,
            'codigo'            =>  (string) $voucher->code,
            'imagen'            =>  url("assets/images/vouchers/{$voucher->image}"),
            'fecha'             =>  (string) $voucher->date,
            'estado'            =>  (string) $voucher->state,
            'matricula_id'      =>   (int) $voucher->enrollment_id,
            'links' =>[
                [
                    'rel'   =>  'self',
                    'href'  =>  route('vouchers.show',$voucher->id),
                ],   
                [
                    'rel'   =>  'voucher.enrollments',
                    'href'  =>  route('vouchers.enrollments.index',$voucher->id),
                ],  
            ]
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'id'                    => 'id',
            'codigo'                => 'code',
            'imagen'                => 'image',
            'fecha'                 => 'date',
            'estado'                =>  'state',
            'matricula_id'          =>  'enrollment_id',
            'fechaCreacion'         => 'created_at',
            'fechaActualizacion'    => 'updated_at',
            'fechaEliminacion'      => 'deleted_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id'                        => 'id',
            'code'                      => 'codigo',
            'image'                     => 'imagen',
            'date'                      => 'fecha',
            'state'                     =>  'estado',
            'enrollment_id'             =>  'matricula_id'
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
