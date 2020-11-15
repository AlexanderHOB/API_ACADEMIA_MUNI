<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Http\Controllers\ApiController;
use App\Transformers\ResourceTransformer;

class StudentResourceController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        // token
        $this->middleware('transform.input:'. ResourceTransformer::class)->only(['index']);

        $this->middleware('can:view,student')->only('index');

    }
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
        return $this->showAll($resources);
    }
}
