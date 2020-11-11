<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Http\Controllers\ApiController;
use PhpParser\Node\Expr\Cast\Object_;

class StudentEnrollmentController extends ApiController
{
    public function index(Student $student)
    {
        $enrollments = $student->enrollments()->with(['cycle','career'])->get();

        return ['data'=>$enrollments];
        // dd($students);
        // return $this->showAll($enrollments);
    }
}
