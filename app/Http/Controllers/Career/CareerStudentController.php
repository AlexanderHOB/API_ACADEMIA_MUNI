<?php

namespace App\Http\Controllers\Career;

use App\Http\Controllers\ApiController;
use App\Models\Career;

class CareerStudentController extends ApiController
{
    public function index(Career $career)
    {
        $this->allowedAdminAction();
        $students = $career->enrollments()->with('student')->get()->pluck('student')->unique()->values();
        return $this->showAll($students);
    }
}
