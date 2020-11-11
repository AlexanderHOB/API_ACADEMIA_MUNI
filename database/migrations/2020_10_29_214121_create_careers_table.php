<?php

use App\Models\Career;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('name',120);
            $table->string('description',120)->nullable();
            $table->string('state',100)->default(Career::CAREER_AVAILABLE);
            $table->integer('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->softDeletes();
            
            $table->timestamps();
        });


        DB::table('careers')->insert(array('id'=>'1','name'=>'Enfermeria', 'description'=>'Ciencias de la Salud','area_id'=>'1'));
        DB::table('careers')->insert(array('id'=>'2','name'=>'Medicina Humana', 'description'=>'Ciencias de la Salud','area_id'=>'1'));

        DB::table('careers')->insert(array('id'=>'3','name'=>'Arquitectura', 'description'=>'Arquitectura e Ingenierías','area_id'=>'2'));
        DB::table('careers')->insert(array('id'=>'4','name'=>'Ingeniería Civil', 'description'=>'Arquitectura e Ingenierías','area_id'=>'2'));
        DB::table('careers')->insert(array('id'=>'5','name'=>'Ingeniería de Minas', 'description'=>'Arquitectura e Ingenierías','area_id'=>'2'));
        DB::table('careers')->insert(array('id'=>'6','name'=>'Ingeniería de Sistemas', 'description'=>'Arquitectura e Ingenierías','area_id'=>'2'));
        DB::table('careers')->insert(array('id'=>'7','name'=>'Ingeniería Eléctrica y Electrónica', 'description'=>'Arquitectura e Ingenierías','area_id'=>'2'));
        DB::table('careers')->insert(array('id'=>'8','name'=>'Ingeniería Mecánica', 'description'=>'Arquitectura e Ingenierías','area_id'=>'2'));
        DB::table('careers')->insert(array('id'=>'9','name'=>'Ingeniería Metalúrgica y de Minerales', 'description'=>'Arquitectura e Ingenierías','area_id'=>'2'));
        DB::table('careers')->insert(array('id'=>'10','name'=>'Ingeniería Química', 'description'=>'Arquitectura e Ingenierías','area_id'=>'2'));
        DB::table('careers')->insert(array('id'=>'11','name'=>'Ingeniería Química Industrial', 'description'=>'Arquitectura e Ingenierías','area_id'=>'2'));
        DB::table('careers')->insert(array('id'=>'12','name'=>'Ingeniería Química Ambiental', 'description'=>'Arquitectura e Ingenierías','area_id'=>'2'));

        DB::table('careers')->insert(array('id'=>'13','name'=>'Ciencias de la Administración', 'description'=>'Ciencias Administrativas Contables y Económicas','area_id'=>'3'));
        DB::table('careers')->insert(array('id'=>'14','name'=>'Contabilidad', 'description'=>'Ciencias Administrativas Contables y Económicas','area_id'=>'3'));
        DB::table('careers')->insert(array('id'=>'15','name'=>'Economía', 'description'=>'Ciencias Administrativas Contables y Económicas','area_id'=>'3'));
        
        DB::table('careers')->insert(array('id'=>'16','name'=>'Antropología', 'description'=>'Ciencias sociales y educación','area_id'=>'4'));
        DB::table('careers')->insert(array('id'=>'17','name'=>'Ciencias de la Computación', 'description'=>'Ciencias sociales y educación','area_id'=>'4'));
        DB::table('careers')->insert(array('id'=>'18','name'=>'Educación Inicial', 'description'=>'Ciencias sociales y educación','area_id'=>'4'));
        DB::table('careers')->insert(array('id'=>'19','name'=>'Educación Primaria', 'description'=>'Ciencias sociales y educación','area_id'=>'4'));
        DB::table('careers')->insert(array('id'=>'20','name'=>'Educación Filosofía, Ciencias Sociales y Relaciones Humanas', 'description'=>'Ciencias sociales y educación','area_id'=>'4'));
        DB::table('careers')->insert(array('id'=>'21','name'=>'Educación Lengua, Literatura y Comunicación', 'description'=>'Ciencias sociales y educación','area_id'=>'4'));
        DB::table('careers')->insert(array('id'=>'22','name'=>'Educación Ciencias Naturales y Ambientales', 'description'=>'Ciencias sociales y educación','area_id'=>'4'));
        DB::table('careers')->insert(array('id'=>'23','name'=>'Educación Ciencias Matemáticas e Informática', 'description'=>'Ciencias sociales y educación','area_id'=>'4'));
        DB::table('careers')->insert(array('id'=>'24','name'=>'Educación Física y Psicomotricidad', 'description'=>'Ciencias sociales y educación','area_id'=>'4'));
        DB::table('careers')->insert(array('id'=>'25','name'=>'Sociología', 'description'=>'Ciencias sociales y educación','area_id'=>'4'));
        DB::table('careers')->insert(array('id'=>'26','name'=>'Trabajo Social', 'description'=>'Ciencias sociales y educación','area_id'=>'4'));

        DB::table('careers')->insert(array('id'=>'27','name'=>'Agronomía', 'description'=>'Ciencias Agrarias y sedes','area_id'=>'5'));
        DB::table('careers')->insert(array('id'=>'28','name'=>'Ciencias Forestales y del Ambiente', 'description'=>'Ciencias Agrarias y sedes','area_id'=>'5'));
        DB::table('careers')->insert(array('id'=>'29','name'=>'Zootecnia', 'description'=>'Ciencias Agrarias y sedes','area_id'=>'5'));
        DB::table('careers')->insert(array('id'=>'30','name'=>'Ingeniería en Industrias Alimentarias', 'description'=>'Ciencias Agrarias y sedes','area_id'=>'5'));
        DB::table('careers')->insert(array('id'=>'31','name'=>'Ingeniería Agroindutrial - Tarma', 'description'=>'Ciencias Agrarias y sedes','area_id'=>'5'));
        DB::table('careers')->insert(array('id'=>'32','name'=>'Adm de Negocios - Tarma', 'description'=>'Ciencias Agrarias y sedes','area_id'=>'5'));
        DB::table('careers')->insert(array('id'=>'33','name'=>'Hoteleria y turismo - Tarma', 'description'=>'Ciencias Agrarias y sedes','area_id'=>'5'));
        DB::table('careers')->insert(array('id'=>'34','name'=>'Agronomía Tropical - Satipo', 'description'=>'Ciencias Agrarias y sedes','area_id'=>'5'));
        DB::table('careers')->insert(array('id'=>'35','name'=>'Ingeniería Forestal Tropical - Satipo', 'description'=>'Ciencias Agrarias y sedes','area_id'=>'5'));
        DB::table('careers')->insert(array('id'=>'36','name'=>'Industrias Alimentarias Tropical - Satipo', 'description'=>'Ciencias Agrarias y sedes','area_id'=>'5'));
        DB::table('careers')->insert(array('id'=>'37','name'=>'Zootecnia Tropical  - Satipo', 'description'=>'Ciencias Agrarias y sedes','area_id'=>'5'));


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('careers');
    }
}
