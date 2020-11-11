<?php

namespace App\Http\Controllers\Representative;

use App\Http\Controllers\ApiController;
use App\Models\Representative;
use App\Transformers\RepresentativeTransformer;
use Illuminate\Http\Request;

class RepresentativeController extends ApiController
{
    public function __construct()
    {
        // token 
        $this->middleware('client.credentials')->only(['index']);
        $this->middleware('auth:api')->except(['index','show']);

        $this->middleware('transform.input:'. RepresentativeTransformer::class)->only(['store']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representatives = Representative::get();
        return $this->showAll($representatives);
    }

    public function store(Request $request)
    {
        $rules = [
            'name'          =>'required|string|min:2|regex:/^[\pL\s\-]+$/u',
            'lastname'      =>'required|string|min:2|regex:/^[\pL\s\-]+$/u',
            'dni'           =>'required|numeric|unique:representatives|digits:8',
        ];
        $this->validate($request, $rules);

        $representative = Representative::create($request->all());
        return $this->showOne($representative);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function show(Representative $representative)
    {
        return $this->showOne($representative);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function dni($dni)
    {   
        $representative = Representative::where('dni','=',$dni);
        
        return $this->showOne($representative);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Representative $representative)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Representative $representative)
    {
        //
    }
}
