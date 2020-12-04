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
Route::resource('areas','Area\AreaController',['except'=>['create']]);
Route::resource('areas.careers','Area\AreaCareerController',['only'=>['index']]);
Route::resource('areas.courses','Area\AreaCourseController',['only'=>['index']]);
Route::resource('areas.students','Area\AreaStudentController',['only'=>['index']]);


/*
* User
*/
Route::resource('users','User\UserController',['except'=>['create']]);
Route::get('/me','User\UserController@me');
Route::get('/email','User\UserController@email');


/**
 * Career
 */
Route::resource('careers','Career\CareerController',['except'=>['create']]);
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
Route::resource('cycles','Cycle\CycleController',['except'=>['create']]);
Route::resource('cycles.students','Cycle\CycleStudentController',['only'=>['index']]);
Route::resource('cycles.representatives','Cycle\CycleRepresentativeController',['only'=>['index']]);


/**
 * Representative
 */
Route::resource('representatives','Representative\RepresentativeController',['except'=>['create']]);
Route::resource('representatives.students','Representative\RepresentativeStudentController',['only'=>['index']]);



/**
 * Resource
 */
Route::resource('resources','Resource\ResourceController',['except'=>['create']]);
Route::resource('resources.students','Resource\ResourceStudentController',['only'=>['index']]);


/**
 * Student
 */
Route::resource('students','Student\StudentController',['except'=>['create']]);
Route::resource('students.enrollments','Student\StudentEnrollmentController',['only'=>['index']]);
Route::resource('students.representatives','Student\StudentRepresentativeController',['only'=>['index']]);
Route::resource('students.resources','Student\StudentResourceController',['only'=>['index']]);
Route::resource('students.vouchers','Student\StudentVoucherController',['only'=>['index']]);

Route::resource('students.cycles.enrollments','Enrollment\EnrollmentStudentCycleController',['only'=>['store','update']]);


/**
 * Voucher
 */
Route::resource('vouchers','Voucher\VoucherController',['only'=>['index','show','store']]);
Route::resource('vouchers.enrollments','Voucher\VoucherEnrollmentController',['only'=>['index']]);

/**
 * Enrollment
 */
Route::resource('enrollments','Enrollment\EnrollmentController',['only'=>['index','show']]);

/*
/ Moodle
*/
Route::resource('moodleusers','Moodle\UserController',['only'=>['index','store']]);
Route::resource('moodlecategories','Moodle\CategoryMoodleController',['only'=>['index','show']]);



Route::name('verify')->get('users/verify/{token}','User\UserController@verify');
Route::name('resend')->get('users/{user}/resend','User\UserController@resend');


Route::post('oauth/token','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

