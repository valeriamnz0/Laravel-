<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsuarioIdAndProyectoIdToCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotizacions', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_userID');
            $table->unsignedBigInteger('fk_proyectoID');

            $table->foreign('fk_userID')
            ->references('userID')->on('users')
            ->onDelete('cascade');

            $table->foreign('fk_proyectoID')
            ->references('proyectoID')->on('proyectos')
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
        Schema::table('cotizacions', function (Blueprint $table) {
            $table->dropForeign(['fk_usuarioID']);
            $table->dropColumn('fk_usuarioID');
            $table->dropForeign(['fk_proyectoID']);
            $table->dropColumn('fk_proyectoID'); 
        });
    }
}
