<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToAgendaVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agenda_visitas', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_vendedorID')
            ->after('agendaID');
            $table->unsignedBigInteger('fk_clienteID')
            ->after('fk_vendedorID');

            $table->foreign('fk_vendedorID')
            ->references('userID')->on('users')
            ->onDelete('cascade');

            $table->foreign('fk_clienteID')
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
        Schema::table('agenda_visitas', function (Blueprint $table) {
            $table->dropForeign(['fk_vendedorID']);
            $table->dropColumn('fk_vendedorID');
            $table->dropForeign(['fk_clienteID']);
            $table->dropColumn('fk_clienteID');
        });
    }
}
