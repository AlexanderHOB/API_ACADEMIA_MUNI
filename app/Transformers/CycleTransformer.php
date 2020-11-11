<?php

namespace App\Transformers;

use App\Models\Cycle;
use League\Fractal\TransformerAbstract;

class CycleTransformer extends TransformerAbstract
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
    public function transform(Cycle $cycle)
    {
        return [
            'id'                =>  (int)    $cycle->id,
            'nombre'            =>  (string) $cycle->name,
            'descripcion'       =>  (string) $cycle->description,
            'estado'            =>  (int)   $cycle->state,
            'cantidad'          =>  (int)   $cycle->quantity,
            'duracion'          => (string) $cycle->duration,
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
}
