<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\ApiController;
use App\Models\Area;

class AreaCourseController extends ApiController
{
    public function __construct()
    {

        $this->middleware('client.credentials')->only(['index']);

    }
    public function index(Area $area)
    {
        $courses = $area->courses;
        return $this->showAll($courses);
    }
}
