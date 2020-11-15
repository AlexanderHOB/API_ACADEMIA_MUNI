<?php

namespace App\Http\Controllers\Voucher;

use App\Http\Controllers\ApiController;
use App\Models\Voucher;

class VoucherEnrollmentController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:enrollment,voucher')->only('index');
    }
    public function index(Voucher $voucher)
    {
        $enrollment = $voucher->enrollment;
        return $this->showOne($enrollment);
    }
}
