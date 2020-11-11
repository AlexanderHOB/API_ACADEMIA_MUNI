<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\ApiController;
use App\Models\Student;
class StudentResourceController extends ApiController
{
    public function index(Student $student)
    {
        $resources = $student->has('resources')
        ->with('resources')
        ->get()
        ->pluck('resources')
        ->collapse()
        ->unique('id')
        ->values()
        ;
        // return $resources;
        // dd($students);
        return $this->showAll($resources);
    }
}
