<?php

namespace App\Http\Controllers\Cycle;

use App\Http\Controllers\ApiController;
use App\Models\Cycle;

class CycleStudentController extends ApiController
{
    public function index(Cycle $cycle)
    {
        $this->allowedAdminAction();

        $students = $cycle->enrollments()
        ->with('student')
        ->get()
        ->pluck('student')
        ->unique('id')
        ->values();
        
        // dd($students);
        return $this->showAll($students);
    }
}
