<?php

namespace App\Transformers;

use App\Models\Career;
use League\Fractal\TransformerAbstract;

class CareerTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
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
    public function transform(Career $career)
    {
        return [
            'id'                =>  (int)    $career->id,
            'nombre'            =>  (string) $career->name,
            'descripcion'       =>  (string) $career->description,
            'area_id'           =>  (int)    $career->area_id,
            'estado'            =>  (int)   $career->state,
            'fechaCreacion'     =>  (string) $career->created_at,
            'fechaActualizacion'=>  (string) $career->update_at,
            'links' =>[
                [
                    'rel'   =>  'self',
                    'href'  =>  route('careers.show',$career->id),
                ],   
                [
                    'rel'   =>  'career.students',
                    'href'  =>  route('careers.students.index',$career->id),
                ],  
                [
                    'rel'   => 'career.courses',
                    'href'  =>  route('careers.courses.index',$career->id),

                ]
            ]
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'id'                    => 'id',
            'nombre'                => 'name',
            'descripcion'           => 'description',
            'area_id'               => 'area_id',
            'estado'                => 'state',
            'fechaCreacion'         => 'created_at',
            'fechaActualizacion'    => 'updated_at',
            'fechaEliminacion'      => 'deleted_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
    public static function transformedAttribute($index){
        $attributes = [
            'id'                    => 'id',
            'name'                  => 'nombre',
            'description'           => 'descripcion',
            'area_id'               => 'area_id',
            'state'                => 'estado',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
