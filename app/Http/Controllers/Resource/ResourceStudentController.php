<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\ApiController;
use App\Models\Resource;

class ResourceStudentController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(Resource $resource)
    {
        $this->allowedAdminAction();
        $students = $resource->students;
        
        return $this->showAll($students);
    }
}
