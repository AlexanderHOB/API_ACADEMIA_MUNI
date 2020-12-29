<?php

namespace App\Http\Controllers\Enrollment;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EnrollmentController extends ApiController
{
    public function __construct()
    {
        // token 
        $this->middleware('auth:api');

        $this->middleware('transform.input:'. RepresentativeTransformer::class)->only(['store','update']);

        $this->middleware('can:view,enrollment')->only('show');

        // $this->middleware('can:update,representative')->only('update');
    }
    public function index()
    {
        $this->allowedAdminAction();

        $enrollments = Enrollment::get();

        return $this->showAll($enrollments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Enrollment $enrollment)
    {
        return $this->showOne($enrollment);
    }

    public function enrolleds()
    {
        $enrollments = Enrollment::get();

        return $this->showAll($enrollments);
    }

}

