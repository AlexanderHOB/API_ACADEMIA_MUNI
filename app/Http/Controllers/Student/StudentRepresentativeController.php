<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\ApiController;
use App\Models\Student;

class StudentRepresentativeController extends ApiController
{
    public function index(Student $student)
    {
        $representative = $student->representative;

        // dd($students);
        return $this->showOne($representative);
    }
}
