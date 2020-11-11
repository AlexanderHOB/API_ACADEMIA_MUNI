<?php

use App\Models\Voucher;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code',12);
            $table->string('image');
            $table->dateTime('date');
            $table->string('state')->default(Voucher::STATE_PENDIENTE);
            $table->integer('enrollment_id')->unsigned();
            $table->foreign('enrollment_id')->references('id')->on('enrollments');
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
        Schema::dropIfExists('vouchers');
    }
}
