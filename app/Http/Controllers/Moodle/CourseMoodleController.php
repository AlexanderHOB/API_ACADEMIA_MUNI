<?php

namespace App\Http\Controllers\Moodle;

use Exception;
use App\Models\Area;
use App\Models\Career;
use App\Models\CourseMoodle;
use App\Models\EnrollMoodle;
use Illuminate\Http\Request;
use App\Models\EnrollDataMoodle;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Area\AreaCourseController;

class CourseMoodleController extends Controller
{
    public function __construct()
    {
        // token
        $this->middleware('auth:api')->except(['enrollCourses']);

    }
    public function index()
    {
        $course = CourseMoodle::select('id','fullname','shortname','category')->get();
        return response()->json(['data'=>$course]);
    }

    public function show($id)
    {
        $course = CourseMoodle::select('id','fullname','shortname','category')
        ->where('category','=',$id)
        ->get();
        return  $course;
    }

    public function enrollCourses($career_id,$user_id)
    {
        dd("Legue");
        $career =   Career::where('id','=',$career_id)->first();
        $area   =   Area::findOrFail($career->area->id);
        $courseArea = $area->courses()->select('name')->get();
        foreach($courseArea as $course){
            $datos=[];
            $error=[];
            //El curso existe
            if(CourseMoodle::where('fullname','like','%'. $course->name .'%')->exists()){
                try{
                $course_id = CourseMoodle::select('id')
                ->where('fullname','like','%'. $course->name .'%')
                ->first();
                $enroll_id = EnrollDataMoodle::select('id')
                ->where([['courseid','=',$course_id->id],['enrol','=','manual']])
                ->first();
                $datos['enrolid']   = $enroll_id->id;
                $datos['userid']    = $user_id;
                EnrollMoodle::create($datos);
                }catch(Exception $e){
                    $tmp =response()->json(['error'=>'Problemas con el curso'.$course],401);
                    array_push($error,$tmp); 
                }
            }
        }
        if(count($error)>0){
            return $error;
        }

        return $courseArea;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseMoodle  $courseMoodle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseMoodle $courseMoodle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseMoodle  $courseMoodle
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseMoodle $courseMoodle)
    {
        //
    }
}
