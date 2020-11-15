<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Transformers\UserTransformer;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['email']);
        $this->middleware('client.credentials')->only(['email']);
        $this->middleware('transform.input:'. UserTransformer::class)->only(['store','update']);
        $this->middleware('can:view,user')->only('show');
        $this->middleware('can:update,user')->only('update');
        $this->middleware('can:destroy,user')->only('destroy');


    }
    public function index()
    {

        $this->allowedAdminAction();
        $users = User::get();
        return $this->showAll($users);
    }
    public function email(Request $request)
    {
        $users = User::where('email','=',$request->email)->first();
        if(isset($users)){
            $user['email'] = $users->email;
            $user['nombre'] = $users->name;
            return $user;
        }
        return [];
    }
    public function show(User $user)
    {
        return $this->showOne($user);
    }
    public function me()
    {
        return response()->json(request()->user());
    }
    public function store(Request $request)
    {
        
    }
    public function update(Request $request, User $user)
    {
        $rules=[
            'name'      =>  'string|min:2',
            'email'     =>  'email|unique:users,email,'.$user->id,
            'password'  =>  'min:6|confirmed',
            'image'     =>  'image',
            'admin'     =>  'in:'. User::USUARIO_ADMINISTRADOR .','. User::USUARIO_REGULAR,
        ];
        
        $this->validate($request,$rules);
        if($request->has('name')){
            $user->name=$request->name;
        }
        if($request->hasFile('image')){
            Storage::disk('profile')->delete($user->image);
            $user->image = $request->image->store('','profile');
        }
        if($request->has('email') && $user->email != $request->email){
            $user->verified = User::USUARIO_NO_VERIFICADO;
            $user->verification_token = User::generarVerificacionToken();
            $user->email = $request->email;
        }
        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }
        if($request->has('admin')){
            if(!$user->esVerificado() || Gate::denies('update-admin',$user)){
                return $this->errorResponse('Unicamente los usuarios verificados pueden cambiar su valor de administrador',409);
            }
            $user->admin = $request->admin;
        }
        
        if(!$user->isDirty()){
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        }
        $user->save();
        return $this->showOne($user);
    }

    public function destroy(User $user)
    {
        Storage::disk('profile')->delete($user->image);
    
        $user->delete();
        return $this->showOne($user);
    }
    public function verify($token)
    {
        $user = User::where('verification_token',$token)->firstOrFail();

        $user->verified = User::USER_VERIFIED;

        $user->verification_token = null;

        $user->save();

        return $this->showMessage('La cuenta ha sido verificada');
    }
    public function resend(User $user)
    {
        if($user->isVerify()){
            return $this->errorResponse('Este usuario ya ha sido verificado',409);
        }
        retry(5,function() use ($user){
            Mail::to($user)->send(new UserCreated($user));
        },100);
        return $this->showMessage('El correo de verificación se ha reenviado');
    }
}
