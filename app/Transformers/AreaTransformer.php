<?php

namespace App\Transformers;

use App\Models\Area;
use League\Fractal\TransformerAbstract;

class AreaTransformer extends TransformerAbstract
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
    public function transform(Area $area)
    {
        return [
            'id'                =>  (int)    $area->id,
            'nombre'            =>  (string) $area->name,
            'descripcion'       =>  (string) $area->description,
            'estado'            =>  (int)   $area->state,
            'fechaCreacion'     =>  (string) $area->created_at,
            'fechaActualizacion'=>  (string) $area->update_at,
            'links' =>[
                [
                    'rel'   =>  'self',
                    'href'  =>  route('areas.show',$area->id),
                ],   
                [
                    'rel'   =>  'area.careers',
                    'href'  =>  route('areas.careers.index',$area->id),
                ],  
            ]
            
        ];
        
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id'                    => 'id',
            'nombre'                => 'name',
            'descripcion'           => 'description',
            'estado'                =>  'state',
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
            'state'                 => 'estado',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
