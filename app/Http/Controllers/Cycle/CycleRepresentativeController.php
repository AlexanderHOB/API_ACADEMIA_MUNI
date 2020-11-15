<?php

namespace App\Http\Controllers\Cycle;

use App\Http\Controllers\ApiController;
use App\Models\Cycle;

class CycleRepresentativeController extends ApiController
{
    public function index(Cycle $cycle)
    {
        $this->allowedAdminAction();

        $students = $cycle->enrollments()
        ->with('student.representative')
        ->get()
        ->pluck('student.representative')
        ->unique('id')
        ->values();
        
        // dd($students);
        return $this->showAll($students);
    }
}
