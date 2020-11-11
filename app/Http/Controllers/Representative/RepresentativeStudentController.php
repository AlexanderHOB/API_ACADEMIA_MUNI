<?php

namespace App\Http\Controllers\Representative;

use App\Http\Controllers\ApiController;
use App\Models\Representative;

class RepresentativeStudentController extends ApiController
{
    public function index(Representative $representative)
    {
        $students = $representative->students;
        
        // dd($students);
        return $this->showAll($students);
    }
}
