<?php

namespace App\Http\Controllers\Enrollment;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EnrollmentController extends ApiController
{
    public function index()
    {
        $enrollments = Enrollment::get();

        return $this->showAll($enrollments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

}

