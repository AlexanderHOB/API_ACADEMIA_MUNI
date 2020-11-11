<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\ApiController;
use App\Models\Resource;

class ResourceStudentController extends ApiController
{
    public function index(Resource $resource)
    {
        $students = $resource->students;
        
        // dd($students);
        return $this->showAll($students);
    }
}
