<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre del rol de usuario');
    		$table->text('description');
            $table->timestamps();
        });
        DB::table('roles')->insert(array('id'=>'1','name'=>'Administrador', 'description'=>'Roor'));
        DB::table('roles')->insert(array('id'=>'2','name'=>'Profesor', 'description'=>'Profesor'));
        DB::table('roles')->insert(array('id'=>'3','name'=>'Estudiante', 'description'=>'Estudiante'));


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
