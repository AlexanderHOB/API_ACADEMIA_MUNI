<?php

namespace App\Http\Controllers\Area;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Transformers\AreaTransformer;
use App\Http\Controllers\ApiController;

class AreaController extends ApiController
{
    public function __construct()
    {
        // token

        $this->middleware('client.credentials')->only(['index','show']);
        $this->middleware('auth:api')->except(['index','show']);
        $this->middleware('transform.input:'. AreaTransformer::class)->only(['store','update']);

    }
    public function index()
    {
        $areas = Area::get();
        return $this->showAll($areas);
    }

    public function store(Request $request)
    {
        $rules = [
            'name'          => 'required|string|min:2',
            'state'         => 'string',
        ];  
        $this->validate($request,$rules);
        if(!$request->has('state')){
            $request->state=Area::AREA_AVAILABLE;
        }
        $area = Area::create($request->all());
        return $this->showOne($area);
    }

    public function show(Area $area)
    {
        return $this->showOne($area);
    }


    public function update(Request $request, Area $area)
    {
        $rules=[
            'name'          => 'string|min:2',
            'description'   => 'string|min:2',
            'state'         => 'string',
        ];
        $this->validate($request,$rules);
        if($request->has('name')){
            $area->name=$request->name;
        }
        if($request->has('state')){
            $area->state=$request->state;
        }
        if($request->has('description')){
            $area->description=$request->description;
        }
        if(!$area->isDirty()){
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        }
        $area->save();
        return $this->showOne($area);
    }

    public function destroy(Area $area)
    {
        $area->delete();
        return $this->showOne($area);
    }
}
