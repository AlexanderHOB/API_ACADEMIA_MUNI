<?php

use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('description',120)->nullable();
            $table->string('state',50)->default(Course::COURSE_AVAILABLE);
            $table->string('image')->nullable();
            
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('courses')->insert(array('id'=>'1','name'=>'Aptitud Lógico Matemático'));
        DB::table('courses')->insert(array('id'=>'2','name'=>'Aptitud Comunicativa'));
        DB::table('courses')->insert(array('id'=>'3','name'=>'Inglés'));
        DB::table('courses')->insert(array('id'=>'4','name'=>'Comunicación'));
        DB::table('courses')->insert(array('id'=>'5','name'=>'Aritmética'));
        DB::table('courses')->insert(array('id'=>'6','name'=>'Álgebra'));
        DB::table('courses')->insert(array('id'=>'7','name'=>'Geometría'));
        DB::table('courses')->insert(array('id'=>'8','name'=>'Trigonometría'));
        DB::table('courses')->insert(array('id'=>'9','name'=>'Estadística'));
        DB::table('courses')->insert(array('id'=>'10','name'=>'Física I'));
        DB::table('courses')->insert(array('id'=>'11','name'=>'Física II'));
        DB::table('courses')->insert(array('id'=>'12','name'=>'Química I'));
        DB::table('courses')->insert(array('id'=>'13','name'=>'Química II'));
        DB::table('courses')->insert(array('id'=>'14','name'=>'Ecología'));
        DB::table('courses')->insert(array('id'=>'15','name'=>'Biología'));
        DB::table('courses')->insert(array('id'=>'16','name'=>'Historia del Perú'));
        DB::table('courses')->insert(array('id'=>'17','name'=>'Geografía'));
        DB::table('courses')->insert(array('id'=>'18','name'=>'Cívica'));
        DB::table('courses')->insert(array('id'=>'19','name'=>'Economía'));
        DB::table('courses')->insert(array('id'=>'20','name'=>'Psicología'));
        DB::table('courses')->insert(array('id'=>'21','name'=>'Filosofía'));






    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
