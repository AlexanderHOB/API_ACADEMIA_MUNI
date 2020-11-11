<?php

namespace App\Transformers;

use App\Models\Student;
use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract
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
    public function transform(Student $student)
    {
        return [
            'id'                => (int)    $student->id,
            'nombre'            => (string) $student->name,
            'apellidos'         => (string) $student->lastname,
            'dni'               => (string) $student->dni,
            'fecha_nacimiento'  => (string) $student->birthday,
            'celular'           => (string) $student->phone,
            'provincia'         => (string) $student->province,
            'distrito'          => (string) $student->district,
            'relacion'          => (string) $student->relationship,
            'anio_culminacion'  => (int)    $student->year_culmination,
            'apoderado_id'      => (int)    $student->representative_id
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'id'                    => 'id',
            'nombre'                => 'name',
            'apellidos'             => 'lastname',
            'dni'                   => 'dni',
            'fecha_nacimiento'      => 'birthday',
            'celular'               => 'phone',
            'distrito'              => 'district',
            'provincia'             => 'province',
            'apoderado_id'          => 'representative_id',
            'fechaCreacion'         => 'created_at',
            'fechaActualizacion'    => 'updated_at',
            'fechaEliminacion'      => 'deleted_at',
            'password'              => 'password',
            'password_confirmation' => 'password_confirmation',
            'correo'                => 'email',
            'relacion'              => 'relationship',
            'anio_culminacion'      => 'year_culmination'

        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
    public static function transformedAttribute($index)
    {
        $attributes = [
            'id'                => 'id',
            'name'              => 'nombre',
            'lastname'          => 'apellidos',
            'dni'               => 'dni',
            'birthday'          => 'fecha_nacimiento',
            'email'             => 'correo',
            'password'          => 'password',
            'password_confirmation'    =>  'password_confirmation',
            'phone'             => 'celular',
            'district'          => 'distrito',
            'province'          => 'provincia',
            'representative_id' => 'apoderado_id',
            'relationship'          => 'relacion',
            'created_at'    => 'fechaCreacion',
            'updated_at'    => 'fechaActualizacion',
            'deleted_at'    => 'fechaEliminacion',
            'year_culmination'=>'anio_culminacion'
            
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
