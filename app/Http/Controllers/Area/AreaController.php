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
        $this->middleware('transform.input:'. AreaTransformer::class)->only(['store']);

    }
    public function index()
    {
        $areas = Area::get();
        return $this->showAll($areas);
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
            'state'         => 'string',
        ];  
        $this->validate($request,$rules);
        if(!$request->has('state')){
            $request->state=Area::AREA_AVAILABLE;
        }
        $area = Area::create($request->all());
        return $this->showOne($area);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return $this->showOne($area);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        //
    }
}
