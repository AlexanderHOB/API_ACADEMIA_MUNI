<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\ApiController;
use App\Models\Student;

class StudentVoucherController extends ApiController
{
    public function index(Student $student)
    {
        $vouchers = $student->has('enrollments.vouchers')
        ->with('enrollments.vouchers')
        ->get()
        ->pluck('enrollments')
        ->collapse()
        ->pluck('vouchers')
        ->collapse()
        ->unique('id')
        ->values()
        ;
        // return $vouchers;
        // dd($students);
        return $this->showAll($vouchers);
    }
}
