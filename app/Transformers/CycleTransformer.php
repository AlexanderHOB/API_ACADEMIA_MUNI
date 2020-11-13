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
            'estado'            =>  (string)   $cycle->state,
            'cantidad'          =>  (int)   $cycle->quantity,
            'duracion'          => (string) $cycle->duration,
            'inicio'            => (string) $cycle->start_date,
            'fin'               => (string) $cycle->end_date,
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'id'                    => 'id',
            'nombre'                => 'name',
            'descripcion'           => 'description',
            'cantidad'              => 'quantity',
            'duracion'              => 'duration',
            'estado'                =>  'state',
            'inicio'                =>  'start_date',
            'fin'                   => 'end_date',
            'fechaCreacion'         => 'created_at',
            'fechaActualizacion'    => 'updated_at',
            'fechaEliminacion'      => 'deleted_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index){
        $attributes = [
            'id'            => 'id',
            'name'          => 'nombre',
            'description'   => 'descripcion',
            'quantity'      => 'cantidad',
            'duration'      => 'duracion',
            'state'         => 'estado',
            'start_date'    => 'inicio',
            'end_date'      => 'fin',
            'created_at'    => 'fechaCreacion',
            'updated_at'    => 'fechaActualizacion',
            'deleted_at'    => 'fechaEliminacion',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
