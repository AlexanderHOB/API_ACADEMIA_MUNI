<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();

            //cashier columns
	        $table->string('stripe_id')->nullable();
	        $table->string('card_brand')->nullable();
	        $table->string('card_last_four')->nullable();
	        $table->timestamp('trial_ends_at')->nullable();

            $table->string('verified')->default(User::USUARIO_NO_VERIFICADO);
            $table->string('verification_token')->nullable();
            $table->string('admin')->default(User::USUARIO_REGULAR);
            
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
