<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('name',80);
            $table->string('lastname',120);
            $table->string('dni',8)->unique();
            $table->date('birthday')->nullable();
            $table->smallInteger('year_culmination')->nullable();
            $table->string('phone',9);
            $table->string('department',80);
            $table->string('province',80);
            $table->string('district',80);  
            $table->string('address',200);
            $table->string('relationship',80)->nullable();
            $table->integer('representative_id')->unsigned();
            $table->foreign('representative_id')->references('id')->on('representatives');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
