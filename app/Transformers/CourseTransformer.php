<?php

namespace App\Transformers;

use App\Models\Course;
use League\Fractal\TransformerAbstract;

class CourseTransformer extends TransformerAbstract
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
    public function transform(Course $course)
    {
        return [
            'id'                =>  (int)    $course->id,
            'nombre'            =>  (string) $course->name,
            'descripcion'       =>  (string) $course->description,
            'estado'            =>  (int)    $course->state,
            'fechaCreacion'     =>  (string) $course->created_at,
            'fechaActualizacion'=>  (string) $course->update_at,
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
