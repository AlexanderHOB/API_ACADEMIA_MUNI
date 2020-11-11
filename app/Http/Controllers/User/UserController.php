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
        parent::__construct();
        $this->middleware('transform.input:'. UserTransformer::class)->only(['store','update']);

    }
    public function index()
    {
        $users = User::get();
        // return $users;
        return $this->showAll($users);
    }
    public function show(User $user)
    {
        return $this->showOne($user);
    }
    public function store(Request $request)
    {
        
    }
}
