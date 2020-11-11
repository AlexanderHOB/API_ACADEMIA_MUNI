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
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'id'                    => 'id',
            'nombre'                => 'name',
            'descripcion'           => 'description',
            'fechaCreacion'         => 'created_at',
            'fechaActualizacion'    => 'updated_at',
            'fechaEliminacion'      => 'deleted_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
