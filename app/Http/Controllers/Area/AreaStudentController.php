<?php

namespace App\Http\Controllers\Area;

use App\Models\Area;
use App\Http\Controllers\ApiController;

class AreaStudentController extends ApiController
{
    public function index(Area $area)
    {
        $students = $area->careers()->with('enrollments.student')->get()
        ->pluck('enrollments')
        ->collapse()
        ->pluck('student')
        ->unique('id')
        ->values()
        ;

        return $this->showAll($students);
    }
}
