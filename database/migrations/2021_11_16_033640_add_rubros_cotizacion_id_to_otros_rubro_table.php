<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRubrosCotizacionIdToOtrosRubroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('otros_rubros', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_rubrosCotizacionID')
            ->after('rubroID');

            $table->unsignedBigInteger('fk_cotizacionID')
            ->after('rubroID');

            $table->foreign('fk_rubrosCotizacionID')
            ->references('rubrosCotizacionID')->on('rubros_cotizacions')
            ->onDelete('cascade');

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
        Schema::table('otros_rubros', function (Blueprint $table) {
            $table->dropForeign(['fk_rubrosCotizacionID']);
            $table->dropColumn('fk_rubrosCotizacionID');
        });
    }
}
