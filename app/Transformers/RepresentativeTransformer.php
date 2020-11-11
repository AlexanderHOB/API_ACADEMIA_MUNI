<?php

namespace App\Transformers;

use App\Models\Representative;
use League\Fractal\TransformerAbstract;

class RepresentativeTransformer extends TransformerAbstract
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
    public function transform(Representative $representative)
    {
        return [
            'id'                =>  (int)    $representative->id,
            'nombre'            =>  (string) $representative->name,
            'apellidos'         =>  (string) $representative->lastname,
            'dni'               =>  (string) $representative->dni,
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'id'                    => 'id',
            'nombre'                => 'name',
            'apellidos'             => 'lastname',
            'dni'                   => 'dni',
            'fechaCreacion'         => 'created_at',
            'fechaActualizacion'    => 'updated_at',
            'fechaEliminacion'      => 'deleted_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
    public static function transformedAttribute($index)
    {
        $attributes = [
            'id'                    => 'id',
            'name'                  => 'nombre',
            'lastname'              => 'apellidos',
            'dni'                   => 'dni',
            'created_at'            => 'fechaCreacion',
            'updated_at'            => 'fechaActualizacion',
            'deleted_at'            => 'fechaEliminacion',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
