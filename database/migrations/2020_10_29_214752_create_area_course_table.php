<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_course', function (Blueprint $table) {
            $table->id();
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->softDeletes();
            $table->timestamps();
        });
        //área I
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>1));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>2));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>3));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>4));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>5));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>6));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>9));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>10));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>11));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>12));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>13));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>14));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>15));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>18));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>20));
        DB::table('area_course')->insert(array('area_id'=>1,'course_id'=>22));

        //área II
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>1));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>2));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>3));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>4));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>5));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>6));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>7));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>8));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>9));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>10));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>11));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>12));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>13));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>14));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>18));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>20));
        DB::table('area_course')->insert(array('area_id'=>2,'course_id'=>23));


        //área III
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>1));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>2));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>3));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>4));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>5));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>6));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>7));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>8));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>9));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>14));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>17));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>18));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>19));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>20));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>21));
        DB::table('area_course')->insert(array('area_id'=>3,'course_id'=>24));

        //área IV
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>1));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>2));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>3));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>4));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>5));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>6));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>9));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>14));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>15));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>16));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>17));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>18));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>19));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>20));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>21));
        DB::table('area_course')->insert(array('area_id'=>4,'course_id'=>25));
        
        //área V
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>1));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>2));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>3));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>4));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>5));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>6));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>7));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>8));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>9));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>10));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>11));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>12));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>13));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>14));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>15));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>18));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>20));
        DB::table('area_course')->insert(array('area_id'=>5,'course_id'=>26));



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_course');
    }
}
