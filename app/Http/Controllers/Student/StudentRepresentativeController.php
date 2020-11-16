<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\ApiController;
use App\Models\Student;

class StudentRepresentativeController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:view,student')->only('index');

    }
    public function index(Student $student)
    {
        $representative = $student->representative;

        // dd($students);
        return $this->showOne($representative);
    }
}
