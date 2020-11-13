<?php

namespace App\Http\Controllers\Voucher;

use App\Http\Controllers\ApiController;
use App\Models\Voucher;
use App\Transformers\VoucherTransformer;
use Illuminate\Http\Request;

class VoucherController extends ApiController
{  
    public function __construct()
    {
        parent::__construct();
        $this->middleware('transform.input:'. VoucherTransformer::class)->only(['store','update']);

    }

    public function index()
    {
        $vouchers = Voucher::get();
        return $this->showAll($vouchers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'code'          =>'required|string|min:2',
            'date'          =>'required|date', 
            'enrollment_id' =>'required|integer',
            'image'         =>'required|image',
        ];
        // dd($request);
        $this->validate($request,$rules);   
        // dd($request->all());
        $data = $request->all();

        $data['image'] = $request->image->store('','voucher');
        $data['state'] = Voucher::STATE_PENDIENTE;
        $voucher = Voucher::create($data);
        $voucher->save();
        return $this->showOne($voucher);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        //
    }
}
