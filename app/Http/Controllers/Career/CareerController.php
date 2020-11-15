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
        // token
        $this->middleware('client.credentials')->only(['index','show']);
        $this->middleware('auth:api')->except(['index','show']);
        $this->middleware('transform.input:'. CareerTransformer::class)->only(['store','update']);

    }
    public function index()
    {
        $careers = Career::get();
        return $this->showAll($careers);
    }
    public function store(Request $request)
    {
        $this->allowedAdminAction();
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

    public function show(Career $career)
    {
        return $this->showOne($career);
    }


    public function update(Request $request, Career $career)
    {
        $this->allowedAdminAction();

        $rules=[
            'name'          => 'string|min:2',
            'description'   => 'string|min:2',
            'area_id'       => 'integer',
            'state'         => 'string',
        ];
        $this->validate($request,$rules);
        if($request->has('name')){
            $career->name=$request->name;
        }
        if($request->has('state')){
            $career->state=$request->state;
        }
        if($request->has('area_id')){
            $career->area_id=$request->area_id;
        }
        if($request->has('description')){
            $career->description=$request->description;
        }
        if(!$career->isDirty()){
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        }
        $career->save();
        return $this->showOne($career);
    }


    public function destroy(Career $career)
    {
        $this->allowedAdminAction();

        $career->delete();
        return $this->showOne($career);
    }
}
