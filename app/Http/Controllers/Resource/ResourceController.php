<?php

namespace App\Http\Controllers\Resource;

use App\Models\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Transformers\ResourceTransformer;

class ResourceController extends ApiController
{
    public function __construct()
    {
        // token
        parent::__construct();
        $this->middleware('client.credentials')->only(['index','show']);
        $this->middleware('transform.input:'. ResourceTransformer::class)->only(['store','update']);
        
        // $this->middleware('can:show,resource')->only('show');
        // $this->middleware('can:update,resource')->only('update');

    }
    public function index()
    {
        $resources = Resource::get();
        return $this->showAll($resources);
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
        
        $rules=[
            'name'          =>'required|string|min:2',
            'description'   =>'string|min:2', 
            'type'          =>'required|string|min:2',
        ];
        $this->validate($request,$rules);   
        $data = $request->all();
        $resource = Resource::create($data);
        $resource->save();
        return $this->showOne($resource);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        return $this->showOne($resource);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        $this->allowedAdminAction();
        
        $rules=[
            'name'          =>'string|min:2',
            'description'   =>'string|min:2', 
            'type'          =>'string|min:2',
        ];
        $this->validate($request,$rules);
        if($request->has('name')){
            $resource->name=$request->name;
        }
        if($request->has('description')){
            $resource->description=$request->description;
        }
        if($request->has('type')){
            $resource->type=$request->type;
        }
        if(!$resource->isDirty()){
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        }
        $resource->save();
        return $this->showOne($resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();
        return $this->showOne($resource);
    }
}
