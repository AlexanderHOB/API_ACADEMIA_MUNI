<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Area\AreaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('oauth/token','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

/*
* Areas
*/
Route::resource('areas','Area\AreaController',['only'=>['index','show']]);
Route::resource('areas.careers','Area\AreaCareerController',['only'=>['index']]);
Route::resource('areas.courses','Area\AreaCourseController',['only'=>['index']]);
Route::resource('areas.students','Area\AreaStudentController',['only'=>['index']]);


/*
* User
*/
Route::resource('users','User\UserController',['only'=>['index','show']]);


/**
 * Career
 */
Route::resource('careers','Career\CareerController',['only'=>['index','show']]);
Route::resource('careers.students','Career\CareerStudentController',['only'=>['index']]);
Route::resource('careers.courses','Career\CareerCourseController',['only'=>['index']]);


/**
 * Course
 */
Route::resource('courses','Course\CourseController',['only'=>['index','show']]);
Route::resource('courses.students','Course\CourseStudentController',['only'=>['index']]);


/**
 * Cycles
 */
Route::resource('cycles','Cycle\CycleController',['only'=>['index','show']]);
Route::resource('cycles.students','Cycle\CycleStudentController',['only'=>['index']]);
Route::resource('cycles.representatives','Cycle\CycleRepresentativeController',['only'=>['index']]);


/**
 * Representative
 */
Route::resource('representatives','Representative\RepresentativeController',['only'=>['index','show','store']]);
Route::resource('representatives.students','Representative\RepresentativeStudentController',['only'=>['index']]);



/**
 * Resource
 */
Route::resource('resources','Resource\ResourceController',['only'=>['index','show']]);
Route::resource('resources.students','Resource\ResourceStudentController',['only'=>['index']]);


/**
 * Student
 */
Route::resource('students','Student\StudentController',['only'=>['index','store','show']]);
Route::resource('students.enrollments','Student\StudentEnrollmentController',['only'=>['index']]);
Route::resource('students.representatives','Student\StudentRepresentativeController',['only'=>['index']]);
Route::resource('students.resources','Student\StudentResourceController',['only'=>['index']]);
Route::resource('students.vouchers','Student\StudentVoucherController',['only'=>['index']]);

Route::resource('students.cycles.enrollments','Enrollment\EnrollmentStudentCycleController',['only'=>['store']]);

/**
 * Voucher
 */
Route::resource('vouchers','Voucher\VoucherController',['only'=>['index','show','store']]);
Route::resource('vouchers.enrollments','Voucher\VoucherEnrollmentController',['only'=>['index']]);

/**
 * Enrollment
 */
Route::resource('enrollments','Enrollment\EnrollmentController',['only'=>['index','show']]);

