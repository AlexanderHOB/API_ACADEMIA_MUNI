<?php

use App\Models\Area;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name',80);
            $table->string('description',150)->nullable();
            $table->string('state',50)->default(Area::AREA_AVAILABLE);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('areas')->insert(array('id'=>'1','name'=>'Área I', 'description'=>'Ciencias de la Salud'));
        DB::table('areas')->insert(array('id'=>'2','name'=>'Área II', 'description'=>'Arquitectura e Ingenierías'));
        DB::table('areas')->insert(array('id'=>'3','name'=>'Área III', 'description'=>'Ciencias Administrativas Contables y Económicas'));
        DB::table('areas')->insert(array('id'=>'4','name'=>'Área IV', 'description'=>'Ciencias Sociales y Educación'));
        DB::table('areas')->insert(array('id'=>'5','name'=>'Área V', 'description'=>'Ciencias Agrarias y Sedes'));

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
