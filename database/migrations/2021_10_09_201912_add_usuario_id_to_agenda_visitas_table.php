<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsuarioIdToAgendaVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('agenda_visitas', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_usuarioID');

            $table->foreign('fk_usuarioID')
            ->references('userID')->on('users')
            ->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('agenda_visitas', function (Blueprint $table) {
            $table->dropForeign(['fk_usuarioID']);
            $table->dropColumn('fk_usuarioID');
        });*/
    }
}
