<?php

namespace App\Http\Controllers\Student;

use Exception;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use App\Transformers\StudentTransformer;

class StudentController extends ApiController
{
    public function __construct()
    {
        // token
        $this->middleware('client.credentials')->only(['index','store']);
        $this->middleware('auth:api')->except(['index','store']);
        $this->middleware('transform.input:'. StudentTransformer::class)->only(['store','update']);

    }
    public function index()
    {
        $students = Student::get();
        return $this->showAll($students);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'email'         =>'required|email|unique:users',
            'password'      =>'required|min:6|confirmed',
            'name'          =>'required|string|min:2|regex:/^[\pL\s\-]+$/u',
            'lastname'      =>'required|string|min:2|regex:/^[\pL\s\-]+$/u',
            'dni'           =>'required|numeric|unique:students|digits:8',
            'birthday'      =>'required|date',
            'phone'         =>'required|numeric|digits:9',
            'province'      =>'required|string|regex:/^[\pL\s\-]+$/u',
            'district'      =>'required|string|regex:/^[\pL\s\-]+$/u',
            'year_culmination'=>'required|numeric|digits:4',
            'representative_id'=>'required|integer'
        ];

        $this->validate($request,$rules);
        try{
            $campos = $request->all();
            $campos['password'] = bcrypt($request->password);
            $campos['verified'] = User::USUARIO_NO_VERIFICADO;
            $campos['verification_token'] = User::generarVerificacionToken();
            $campos['admin']    = User::USUARIO_REGULAR;
            $campos['role_id']  = '3';

            DB::beginTransaction();
            $usuario = User::create($campos);

            $student = new Student();
            $student->id        =$usuario->id;
            $student->name      =$request->name;
            $student->lastname  =$request->lastname;
            $student->dni       =$request->dni;
            $student->birthday  =$request->birthday;
            $student->phone     =$request->phone;
            $student->province  =$request->province;
            $student->district  =$request->district;
            $student->relationship = $request->relationship;
            $student->year_culmination = $request->year_culmination;
            $student->representative_id =$request->representative_id;
            $student->save();
            
            DB::commit();
            return $this->showOne($student);
        } catch (Exception $e){
            DB::rollBack();
            return $this->showMessage(['error'=>$e],401);
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return $this->showOne($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
