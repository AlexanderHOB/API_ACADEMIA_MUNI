<?php

namespace App\Http\Controllers\Course;

use App\Models\Course;
use App\Http\Controllers\ApiController;

class CourseStudentController extends ApiController
{
    public function index(Course $course)
    {
        $students = $course->areas()
        ->with('careers.enrollments.student')
        ->get()
        ->pluck('careers')
        ->collapse()
        ->pluck('enrollments')
        ->collapse()
        ->pluck('student')
        ->unique()
        ->values()
        ;
        // return $students;
        return $this->showAll($students);
    }
}
