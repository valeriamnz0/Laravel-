<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('userID');
            $table->string('name', 255);
            $table->string('email')->unique();
            $table->string('provincia', 100)->nullable();
            $table->string('canton', 100)->nullable();
            $table->string('distrito', 100)->nullable();
            $table->string('identificacion', 12)->nullable();
            $table->integer('telefono');
            $table->string('otraSenia', 300)->nullable();
            $table->string('password', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /*public function down()
    {
        Schema::dropIfExists('users');
        Schema::table('users', function (Blueprint $table) {
            $table->string('provincia')->change();
            $table->string('canton')->change();
            $table->string('distrito')->change();
            $table->string('identificacion')->change();
            $table->string('otraSenia')->change();
            $table->string('password')->change();
        });
    }*/
}
