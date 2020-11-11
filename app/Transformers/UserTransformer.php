<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
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
    public function transform(User $user)
    {
        return [
            'id'                    =>  (int)$user->id,
            'nombre'                =>  (string)$user->name,
            'correo'                =>  (string)$user->email,
            'imagen'                =>  (string)url("assets/images/profiles/$user->image"),
            'role_id'               =>  (int)$user->role_id,
            'esVerificado'          =>  (int)$user->verified,
            'esAdministrador'       =>  ($user->admin === 'true'),
            'fechaCreacion'         =>  (string)$user->created_at,
            'fechaActualizacion'    =>  (string)$user->updated_at,
            'fechaEliminacion'      =>  isset($user->deleted_at)  ? (string)$user->deleted_at : null,
            'links' =>  [
                [
                    'self'  =>  'self',
                    'href'  =>  route('users.show',$user->id),
                ],
                
            ],

        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [

            'id'         =>  'id',
            'nombre'                =>  'name',
            'correo'                =>  'email',
            'imagen'                =>  'image',
            'role_id'               =>  'role_id',
            'esVerificado'          =>  'verified',
            'esAdministrador'       =>  'admin',
            'fechaCreacion'         =>  'created_at',
            'fechaActualizacion'    =>  'updated_at',
            'fechaEliminacion'      =>  'delete_at',
            'contrasena'            =>  'password',
            'contrasena_confirmada' =>  'password_confirmation',

        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
    public static function transformAttribute($index){
        $attributes = [
            'id'         => 'id',
            'name'       => 'nombre',
            'email'      =>'correo',
            'image'      =>'imagen',
            'role_id'    =>  'role_id',
            'verified'   => 'esVerificado',
            'admin'      =>'esAdministrador',
            'created_at' => 'fechaCreacion',
            'updated_at' =>'fechaActualizacion',
            'delete_at'  =>'fechaEliminacion',
            'password'   =>'contrasena',
            'password_confirmation' => 'contrasena_confirmada',

        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
