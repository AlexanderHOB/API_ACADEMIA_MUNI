<?php

namespace App\Http\Controllers\Cycle;

use App\Models\Cycle;
use Illuminate\Http\Request;
use App\Transformers\CycleTransformer;
use App\Http\Controllers\ApiController;

class CycleController extends ApiController
{
    public function __construct()
    {
        // parent::__construct();
        // token
        $this->middleware('client.credentials')->only(['index']);
        $this->middleware('auth:api')->except(['index']);
        $this->middleware('transform.input:'. CycleTransformer::class)->only(['store','update']);


    }
    public function index()
    {
        $cycles= Cycle::get();
        return $this->showAll($cycles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function show(Cycle $cycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Cycle $cycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cycle $cycle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cycle $cycle)
    {
        //
    }
}
