<?php

namespace App\Http\Controllers\Voucher;

use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Transformers\VoucherTransformer;

class VoucherController extends ApiController
{  
    public function __construct()
    {
        parent::__construct();
        $this->middleware('transform.input:'. VoucherTransformer::class)->only(['store','update']);
        $this->middleware('can:view,voucher')->only('show');
        $this->middleware('can:destroy,voucher')->only('destroy');

    }

    public function index()
    {
        $this->allowedAdminAction();
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
        $this->validate($request,$rules);   
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
        return $this->showOne($voucher);
    }


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
        Storage::disk('voucher')->delete($voucher->image);
    
        $voucher->delete();
        return $this->showOne($voucher);
    }
}
