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
        // return $users;
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
}
