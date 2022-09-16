<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCotizacionIdToAgendaInstalacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agenda_instalacions', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_cotizacionID');

            $table->foreign('fk_cotizacionID')
            ->references('cotizacionID')->on('cotizacions')
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
            $table->dropForeign(['fk_cotizacionID']);
            $table->dropColumn('fk_cotizacionID');
        });
    }
}
