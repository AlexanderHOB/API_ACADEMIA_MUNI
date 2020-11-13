<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Transformers\StudentTransformer;
use App\Transformers\UserTransformer;

class UserController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['email']);
        $this->middleware('client.credentials')->only(['email']);

        $this->middleware('transform.input:'. UserTransformer::class)->only(['store','update']);

    }
    public function index()
    {
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
            'name'  =>  'string|min:2',
            'lastname'  =>'string|min:2',
            'username'  =>  'unique:users,username,'.$user->id,
            'email'     =>  'email|unique:users,email,'.$user->id,
            'password'  =>  'min:6|confirmed',
            'image'     =>  'image',
            'admin'     =>  'in:'. User::USER_NO_ADMIN .','. User::USER_ADMIN,
        ];
        $this->validate($request,$rules);
        if($request->has('name')){
            $user->name=$request->name;
        }
        if($request->has('lastname')){
            $user->lastname=$request->lastname;
        }
        if($request->has('username') && $user->username!=$request->username){
            $user->username = $request->username;
        }
        if($request->hasFile('image')){
            Storage::disk('profile')->delete($user->image);
            $user->image = $request->image->store('','profile');
        }
        if($request->has('email') && $user->email != $request->email){
            $user->verified = User::USER_NO_VERIFIED;
            $user->verification_token = User::generateVerificationToken();
            $user->email = $request->email;
        }
        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }
        if($request->has('admin')){
            if(!$user->isVerified() || Gate::denies('update-admin',$user)){
                return $this->errorResponse('Unicamente los usuarios verificados pueden cambiar su valor de administrador',409);
            }
            $user->admin = $request->admin;
        }
        if($request->has('writter')){
            if(!$user->isVerified() || Gate::denies('update-admin',$user)){
                return $this->errorResponse('Unicamente los usuarios verificados cambiar su rol a escritor',409);
            }
            $user->writter = $request->writter;
        }
        if(!$user->isDirty()){
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        }
        $user->save();
        return $this->showOne($user);
    }
}
