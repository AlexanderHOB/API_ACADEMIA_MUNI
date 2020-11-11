<?php

namespace App\Transformers;

use App\Models\Enrollment;
use League\Fractal\TransformerAbstract;

class EnrollmentTransformer extends TransformerAbstract
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
    public function transform(Enrollment $enrollment)
    {
        return [
            'id'                    =>  (int)    $enrollment->id,
            'estudiante_id'         =>  (int) $enrollment->student_id,
            'ciclo_id'              =>  (int) $enrollment->cycle_id,
            'carrera_id'            =>  (int) $enrollment->career_id,
            'estado'                 =>  (string) $enrollment->state,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id'                    => 'id',
            'estudiante_id'         => 'student_id',
            'ciclo_id'              => 'cycle_id',
            'carrera_id'            => 'career_id',
            'estado'                => 'state',
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
            'student_id'                      => 'estudiante_id',
            'cycle_id'                     => 'ciclo_id',
            'career_id'                      => 'carrera_id',
            'state'                     =>  'estado',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
