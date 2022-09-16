<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsuarioIdToProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_usersID')
            ->after('proyectoID');

            $table->foreign('fk_usersID')
            ->references('userID')->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropForeign(['fk_usuarioID']);
            $table->dropColumn('fk_usuarioID');
        });
    }
}
