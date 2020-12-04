<?php

use App\Models\Cycle;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycles', function (Blueprint $table) {
            $table->id();
            $table->string('name',80);
            $table->string('description',150)->nullable();
            $table->smallInteger('quantity');
            $table->string('duration');
            $table->string('state',50)->default(Cycle::CYCLE_AVAILABLE);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('category_moodle_id')->nullable();
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
        Schema::dropIfExists('cycles');
    }
}
