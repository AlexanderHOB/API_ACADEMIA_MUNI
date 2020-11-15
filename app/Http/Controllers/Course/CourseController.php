<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\ApiController;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends ApiController
{
    public function __construct()
    {
        // token
        $this->middleware('client.credentials')->only(['index']);
        $this->middleware('auth:api')->except(['index']);
        $this->middleware('transform.input:'. CycleTransformer::class)->only(['store','update']);


    }
    public function index()
    {
        $courses = Course::get();
        return $this->showAll($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->allowedAdminAction();

        $rules = [
            'name'          => 'required|string|min:2',
            'quantity'      => 'integer| required',
            'duration'      => 'required|string|min:2',
            'state'         => 'string',
            'start_date'    => 'date',
            'end_date'      => 'date',

        ];  
        $this->validate($request,$rules);



        if(!$request->has('state')){
            $request->state=Cycle::CYCLE_AVAILABLE;
        }
        $cycle = Cycle::create($request->all());
        return $this->showOne($cycle);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
