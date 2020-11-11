<?php

namespace App\Http\Controllers\Voucher;

use App\Http\Controllers\ApiController;
use App\Models\Voucher;

class VoucherEnrollmentController extends ApiController
{
    public function index(Voucher $voucher)
    {
        $enrollment = $voucher->enrollment->cycle;
        
        return $this->showOne($enrollment);
    }
}
