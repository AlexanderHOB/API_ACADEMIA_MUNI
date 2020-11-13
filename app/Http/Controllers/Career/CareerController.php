<?php

namespace App\Http\Controllers\Career;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Transformers\CareerTransformer;

class CareerController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        // token
        $this->middleware('client.credentials')->only(['index']);
        $this->middleware('auth:api')->except(['index']);
        $this->middleware('transform.input:'. CareerTransformer::class)->only(['store','update']);

    }
    public function index()
    {
        $careers = Career::get();
        // return $careers;
        return $this->showAll($careers);
    }
    public function store(Request $request)
    {
        $rules = [
            'name'          => 'required|string|min:2',
            'area_id'       => 'integer|required',
            'state'         => 'string',
        ];  
        $this->validate($request,$rules);

        

        if(!$request->has('state')){
            $request->state=Career::CAREER_AVAILABLE;
        }
        $cycle = Career::create($request->all());
        return $this->showOne($cycle);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        //
    }
}
