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
        $this->allowedAdminAction();

        $rules = [
            'name'              => 'required|string|min:2',
            'quantity'          => 'integer| required',
            'duration'          => 'required|string|min:2',
            'state'             => 'string',
            'start_date'        => 'date',
            'end_date'          => 'date',
            'category_moodle_id'=>'required|integer'
        ];  
        $this->validate($request,$rules);



        if(!$request->has('state')){
            $request->state=Cycle::CYCLE_AVAILABLE;
        }
        $cycle = Cycle::create($request->all());
        return $this->showOne($cycle);
    }


    public function show(Cycle $cycle)
    {
        return $this->showOne($cycle);
    }

    public function update(Request $request, Cycle $cycle)
    {
        $this->allowedAdminAction();

        $rules=[
            'name'          => 'string|min:2',
            'quantity'      => 'integer',
            'description'   => 'string',
            'duration'      => 'string|min:2',
            'state'         => 'string',
            'start_date'    => 'date',
            'end_date'      => 'date',
            'category_moodle_id'=>'integer'
        ];
        $this->validate($request,$rules);
        if($request->has('name')){
            $cycle->name=$request->name;
        }
        if($request->has('description')){
            $cycle->description=$request->description;
        }
        if($request->has('quantity')){
            $cycle->quantity=$request->quantity;
        }
        if($request->has('duration')){
            $cycle->duration=$request->duration;
        }
        if($request->has('state')){
            $cycle->state=$request->state;
        }
        if($request->has('start_date')){
            $cycle->start_date=$request->start_date;
        }
        if($request->has('end_date')){
            $cycle->end_date=$request->end_date;
        }
        if($request->has('category_moodle_id')){
            $cycle->category_moodle_id=$request->category_moodle_id;
        }
        if(!$cycle->isDirty()){
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        }
        $cycle->save();
        return $this->showOne($cycle);
    }


    public function destroy(Cycle $cycle)
    {
        $this->allowedAdminAction();

        $cycle->delete();
        return $cycle;
    }
}
