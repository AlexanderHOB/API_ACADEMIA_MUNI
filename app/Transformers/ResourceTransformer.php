<?php

namespace App\Transformers;

use App\Models\Resource;
use League\Fractal\TransformerAbstract;

class ResourceTransformer extends TransformerAbstract
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
    public function transform(Resource $resource)
    {
        return [
            'id'                =>  (int)    $resource->id,
            'nombre'            =>  (string) $resource->name,
            'descripcion'         =>  (string) $resource->description,
            'tipo'               =>  (string) $resource->type,
            'links' =>  [
                [
                    'self'  =>  'self',
                    'href'  =>  route('resources.show',$resource->id),
                ],
                [
                    'self'  =>  'resource.students',
                    'href'  =>  route('resources.students.index',$resource->id),
                ],
                
            ],
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'id'                    => 'id',
            'nombre'                => 'name',
            'descripcion'           => 'description',
            'tipo'                  => 'type',
            'fechaCreacion'         => 'created_at',
            'fechaActualizacion'    => 'updated_at',
            'fechaEliminacion'      => 'deleted_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
    public static function transformedAttribute($index){
        $attributes = [
            'id'                => 'id',
            'name'              => 'nombre',
            'description'       => 'descripcion',
            'type'              => 'tipo',
            'created_at'        => 'fechaCreacion',
            'updated_at'        => 'fechaActualizacion',
            'deleted_at'        => 'fechaEliminacion',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
