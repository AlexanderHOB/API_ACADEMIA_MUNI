<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Http\Controllers\ApiController;
use PhpParser\Node\Expr\Cast\Object_;

class StudentEnrollmentController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:view,student')->only('index');

    }
    public function index(Student $student)
    {
        $enrollments = $student->enrollments;
        return $this->showAll($enrollments);
        
    }
}
