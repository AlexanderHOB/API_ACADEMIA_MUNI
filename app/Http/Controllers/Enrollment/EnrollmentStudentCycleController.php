<?php

namespace App\Http\Controllers\Enrollment;

use App\Models\Cycle;
use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Transformers\EnrollmentTransformer;

class EnrollmentStudentCycleController extends ApiController
{ 
    public function __construct()
    {
        parent::__construct();
        $this->middleware('transform.input:'. EnrollmentTransformer::class)->only(['store']);

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
        $data['state']      = Enrollment::STATE_AVAILABLE;
        $enrollment         = Enrollment::create($data);
        return $this->showOne($enrollment);
        
    }
}
