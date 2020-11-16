<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\ApiController;
use App\Models\Student;

class StudentVoucherController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:view,student')->only('index');

    }
    public function index(Student $student)
    {
        $vouchers = $student
        ->enrollments()->with('vouchers')
        ->get()
        ->pluck('vouchers')
        ->collapse()
        ->unique('id')
        ->values()
        ;
        return $this->showAll($vouchers);
    }
}
