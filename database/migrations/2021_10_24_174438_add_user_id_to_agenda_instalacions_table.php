<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToAgendaInstalacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agenda_instalacions', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_tecnicoID')
            ->after('agendaInstalacionID');

            $table->foreign('fk_tecnicoID')
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
        Schema::table('agenda_instalacions', function (Blueprint $table) {
            $table->dropForeign(['fk_tecnicoID']);
            $table->dropColumn('fk_tecnicoID');
        });
    }
}
