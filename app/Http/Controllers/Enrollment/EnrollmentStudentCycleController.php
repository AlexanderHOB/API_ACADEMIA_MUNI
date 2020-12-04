<?php

namespace App\Http\Controllers\Enrollment;

use App\Models\Cycle;
use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Transformers\EnrollmentTransformer;
use App\Http\Controllers\Moodle\UserController;

class EnrollmentStudentCycleController extends ApiController
{ 
    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:enrollment,student')->only(['store','update']);
        $this->middleware('transform.input:'. EnrollmentTransformer::class)->only(['store','update']);

    }

    public function store(Request $request,Student $student, Cycle $cycle)
    {
        $rules = [
            'career_id'     => 'required|integer',
        ];
        $this->validate($request,$rules);
        $data               = $request->all();
        $data['student_id'] = $student->id;
        $data['cycle_id']   = $cycle->id;
        $data['state']      = Enrollment::STATE_PENDING;
        $enrollment         = Enrollment::create($data);
        return $this->showOne($enrollment);
        
    }

    public function update(Request $request,Student $student, Cycle $cycle,Enrollment $enrollment)
    {
        
        $rules = [
            'career_id'     => 'integer',
            'state'         => 'in:'.Enrollment::STATE_PENDING.','.Enrollment::STATE_PROGRESS.','.Enrollment::STATE_TIMEOUT.','.Enrollment::STATE_DISAPPROVED,
        ];
        $this->validate($request,$rules);
        if($request->has('career_id')){
            $enrollment->career_id=$request->career_id;
        }
        if($request->has('state')){
            $enrollment->state=$request->state;
            if($request->state === Enrollment::STATE_PROGRESS){
                app(UserController::class)->store($student);
            }
        }
        if(!$enrollment->isDirty()){
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        }
        $enrollment->save();
        return $this->showOne($enrollment);
        
    }
}
