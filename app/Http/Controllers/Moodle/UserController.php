<?php

namespace App\Http\Controllers\Moodle;

use Exception;
use App\Models\User;
use App\Models\Student;
use App\Models\UserMoodle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function __construct(){
        // $this->middleware('auth:api');

    }
    public function index()
    {
        $users = UserMoodle::get();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Student $student)
    {
        try{
            if(!$userMoodle = UserMoodle::where('username','=',$student->dni)->exists()){
                $user = User::FindOrFail($student->id);
                DB::beginTransaction();
                    $userMoodle = new UserMoodle();
                    $userMoodle->auth         = UserMoodle::AUTH;
                    $userMoodle->mnethostid   = UserMoodle::MNETHOSTID;
                    $userMoodle->confirmed    = UserMoodle::CONFIRMED;
                    $userMoodle->username     = $student->dni;
                    $userMoodle->firstname    = $student->name;
                    $userMoodle->lastname     = $student->lastname;
                    $userMoodle->password     = $user->password;
                    $userMoodle->email        = $user->email;
                    $userMoodle->city         = 'Huancayo';
                    $userMoodle->save();
                DB::commit();
            }
        } catch (Exception $e){
            if ($e instanceof QueryException ){
                return 'Error regarding DB';
            }
            return response()->json(['error'=>$e]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserMoodle  $userMoodle
     * @return \Illuminate\Http\Response
     */
    public function show(UserMoodle $userMoodle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserMoodle  $userMoodle
     * @return \Illuminate\Http\Response
     */
    public function edit(UserMoodle $userMoodle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserMoodle  $userMoodle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserMoodle $userMoodle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserMoodle  $userMoodle
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserMoodle $userMoodle)
    {
        //
    }
}
