<?php

namespace App\Http\Controllers\Career;

use App\Http\Controllers\ApiController;
use App\Models\Career;

class CareerCourseController extends ApiController
{
    public function __construct()
    {
        // token
        $this->middleware('client.credentials')->only(['index']);

    }
    public function index(Career $career)
    {
        $courses = $career->area()->with('courses')->get()->pluck('courses')->collapse()->unique()->values();
        // return $courses;
        return $this->showAll($courses);
    }
}
