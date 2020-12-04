<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use App\Transformers\UserTransformer;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory,HasApiTokens, Notifiable,SoftDeletes;

    public $transformer = UserTransformer::class;

    const USUARIO_VERIFICADO = '1';
    const USUARIO_NO_VERIFICADO = '0';

    const USUARIO_ADMINISTRADOR = 'true';
    const USUARIO_REGULAR = 'false';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'verified',
        'verification_token',
        'admin',
        'role_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
        'remember_token',
        'verification_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function esVerificado(){
        return $this->verified ==User::USUARIO_VERIFICADO;
    }
    public function isAdmin(){
        return $this->admin == User::USUARIO_ADMINISTRADOR;
    }
    public static function generarVerificacionToken(){
        return Str::random(40);
    }

    public function student(){
        return $this->hasOne(Student::class);
    }

    //Mutadores - Accesores
    public function setNameAttribute($valor){
        $this->attributes['name'] = strtolower($valor);
    }
    public function getNameAttribute($valor){
        return \ucwords($valor);
    }
    public function setLastnameAttribute($valor)
    {
        $this->attributes['lastname']   = strtolower($valor);
    }
    public function getLastnameAttribute($valor)
    {
        return ucwords($valor);
    }
    public function setEmailAttribute($valor){
        $this->attributes['email'] = strtolower($valor);
    }
}
